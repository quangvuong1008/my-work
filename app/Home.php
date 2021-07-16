<?php namespace App\Controllers;

use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\SettingHelper;
use App\Helpers\StringHelper;
use App\Helpers\Widgets\ContactWidget;
use App\Models\CategoryModel;
use App\Models\FormRequestModel;
use App\Models\NewsModel;
use App\Models\PartnerModel;
use App\Models\ProductCategoryModel;
use App\Models\ProjectCategoryModel;
use App\Models\RouterUrlModel;
use App\Models\SettingsModel;
use App\Models\SliderModel;
use App\Models\TestimonialModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';

use Google_Client;
use Google_Service_Gmail;
use Google_Service_Gmail_Message;

class Home extends BaseController
{
    /**
     * @return string
     */
    public function index()
    {
        // Sliders
        $sliders = (new SliderModel())
            ->where('is_lock', 0)
            ->orderBy('order_no', SORT_ASC)
            ->findAll();

        // Project Category
        $projectCategories = (new ProjectCategoryModel())
            ->where('is_lock', 0)
            ->findAll(6);

        // Category
        $categories = (new CategoryModel())
            ->addQuery('where', ['is_lock', 0])
            ->getCategoryRecursive(0, 0, 2);



        // Testimonials
        $testimonials = (new TestimonialModel())
            ->where('is_lock', 0)
            ->findAll(4);

        // Testimonials
        $partners = (new PartnerModel())
            ->where('is_lock', 0)
            ->findAll(20);

        $newsItems = (new NewsModel())
            ->where('is_lock', 0)
            ->where('is_hot', 1)
            ->findAll(3);

        $settings =  new SettingsModel();
        $settings = $settings->findAll();
        $setting_array = [];
        if($settings){
            foreach ($settings as $setting){
                $setting_array[$setting->key] = $setting->value;
            }
        }


        $categories_menu = (new CategoryModel())
            ->addQuery('where', ['is_lock', 0])
            ->addQuery('orderBy', ['menu_order', 'asc'])
            ->getCategoryRecursive_menu(0, 0, 3);
        $fisrt_home_block = null;
        foreach ($categories_menu as $cate ){
            if($cate->id == $setting_array['home_first_block_id']){
                $fisrt_home_block = $cate;
            }
        }

        return $this->render('index', [
            'sliders' => $sliders,
            'projectCategories' => $projectCategories,
            'categories' => $categories,
            'newsItems' => $newsItems,
            'testimonials' => $testimonials,
            'partners' => $partners,
            'title' => $setting_array['home_meta_title'],
            'settings' => $setting_array,
            'fisrt_home_block' => $fisrt_home_block,
            'meta_image_url'=> SettingHelper::getSettingImage($setting_array['home_meta_link'])
        ]);
    }

    /**
     * @return string
     */
    public function search()
    {
        $query = $this->request->getGet('query');

        $model = new RouterUrlModel();

        $model
            ->where('frontend_router', 'IS NOT NULL')
            ->where('original_title', 'IS NOT NULL');

        if ($query && !empty($query)) {
            $model
                ->like('slug', StringHelper::rewrite($query))
                ->orLike('original_title', $query);
        }

        return $this->render('home/search', [
            'model' => $model,
            'models' => $model->paginate(20),
            'pager' => $model->pager
        ]);
    }

    /**
     * @return \CodeIgniter\HTTP\Response|string
     * @throws \ReflectionException
     */
    public function register()
    {
        if (!$this->isPost() || !($data = $this->request->getPost()) || empty($data)) {
            return $this->response->redirect('/');
        }

        $data['user_ip'] = $this->request->getIPAddress();;

        $model = new FormRequestModel();

        $fallBackUrl = ArrayHelper::getValue($data, 'ref_url', '/');

        if ($this->validate($model->getRules()) && $model->process($data)) {
            SessionHelper::getInstance()->setFlash(ContactWidget::SESSION_ALERT_KEY, [
                'type' => 'FRONT_SUCCESS',
                'message' => 'Gửi yêu cầu thành công'
            ]);
        } else {
            SessionHelper::getInstance()->setFlash(ContactWidget::SESSION_ALERT_KEY, [
                'type' => 'FRONT_ERROR',
                'message' => 'Đã có lỗi xảy ra, hãy thử lại'
            ]);
        }


//        $this->send_email($data);
           $this->process_gmail_api($data);

        return $this->response->redirect($fallBackUrl);
    }

    public function send_email($data){

        require APPPATH .'../vendor/autoload.php';

        $settings =  new SettingsModel();
        $settings = $settings->findAll();
        $setting_array = [];
        if($settings){
            foreach ($settings as $setting){
                $setting_array[$setting->key] = $setting->value;
            }
        }

        if(!$setting_array['send_email_smtp_host']) return;

        $mail = new PHPMailer(true);
//        $mail->SMTPOptions = array(
//
//            'ssl' => array(
//                'verify_peer' => false,
//                'verify_peer_name' => false,
//                'allow_self_signed' => true
//            )
//        );
//        $mail->SMTPAutoTLS = false;
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = $setting_array['send_email_smtp_host'];                    // Set the SMTP server to send through
            //$mail->Host = gethostbyname('mail.lananhadv.com');
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $setting_array['send_email_smtp_username'];                     // SMTP username
            $mail->Password   = $setting_array['send_email_smtp_password'];                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = $setting_array['send_email_smtp_port'];                                    // TCP port to connect to
            $mail->setLanguage('vi');
            $mail->setFrom($setting_array['send_email_smtp_username'], 'angiakhang.com');
            $mail->addAddress($setting_array['home_email'], 'Lien He');     // Add a recipient
            $mail->addBCC('aman.secret.vn@gmail.com');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Thong tin khach hang';
            $noi_dung = '<p>Thông tin khách hàng được gửi từ hệ thống web angiakhang.com</p>';
            $noi_dung .= '<p>Tên khách hàng: '. $data['full_name'] .'</p>';
            $noi_dung .= '<p>Email: '. $data['email'] .'</p>';
            $noi_dung .= '<p>Phone: '. $data['phone'] .'</p>';
            $noi_dung .= '<p>Yêu cầu: '. $data['request'] .'</p>';

            $mail->Body    = $noi_dung;
            $mail->AltBody = 'Đây là email gửi từ web angiakhang.com';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo} ||||";
            SessionHelper::getInstance()->setFlash(ContactWidget::SESSION_ALERT_KEY, [
                'type' => 'FRONT_ERROR',
                'message' => 'Đã có lỗi xảy ra, hãy thử lại' . $e->getMessage() .'|||'. $e->getCode() .'|||'. $e->getTraceAsString()
            ]);
        }
    }
    /**
     * @return string
     */
    public function contact()
    {
        $model = FormRequestModel::getInstance();

        $message = SessionHelper::getInstance()->getFlash(ContactWidget::SESSION_ALERT_KEY);

        $settings =  new SettingsModel();
        $settings = $settings->findAll();
        $setting_array = [];
        if($settings){
            foreach ($settings as $setting){
                $setting_array[$setting->key] = $setting->value;
            }
        }

        return $this->render('home/contact', [
            'model' => $model,
            'message' => $message,
            'settings' => $setting_array
        ]);
    }


    function getClient()
    {


        $client = new Google_Client();
        $client->setApplicationName('Gmail API PHP Quickstart');
        $client->setScopes([Google_Service_Gmail::GMAIL_READONLY,Google_Service_Gmail::GMAIL_SEND]);

        $client->setAuthConfig(__DIR__ . '/../../credentials.json');

        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = __DIR__ . '/../../token.json';

        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        return $client;
    }

    public function process_gmail_api($data){
        // Get the API client and construct the service object.
        $client = $this->getClient();
        $service = new Google_Service_Gmail($client);
        $this->createMessage($service,$data);

    }

    function createMessage($service,$data) {
        try{
            $settings =  new SettingsModel();
            $settings = $settings->findAll();
            $setting_array = [];
            if($settings){
                foreach ($settings as $setting){
                    $setting_array[$setting->key] = $setting->value;
                }
            }

            $strSubject = 'Thong tin khach hang' . date('M d, Y h:i:s A');
            $strRawMessage = "From: angiakhang<denguyen.website@gmail.com>\r\n";
            $strRawMessage .= "To: lienhe<".$setting_array['home_email'].">\r\n";
            $strRawMessage .= 'Subject: =?utf-8?B?' . base64_encode($strSubject) . "?=\r\n";
            $strRawMessage .= "MIME-Version: 1.0\r\n";
            $strRawMessage .= "Content-Type: text/html; charset=utf-8\r\n";
            $strRawMessage .= 'Content-Transfer-Encoding: quoted-printable' . "\r\n\r\n";

            $strRawMessage .= '<p>Thông tin khách hàng được gửi từ hệ thống web angiakhang.com</p>';
            $strRawMessage .= '<p>Tên khách hàng: '. $data['full_name'] .'</p>';
            $strRawMessage .= '<p>Email: '. $data['email'] .'</p>';
            $strRawMessage .= '<p>Phone: '. $data['phone'] .'</p>';
            $strRawMessage .= '<p>Yêu cầu: '. $data['request'] .'</p>';

            $message = new Google_Service_Gmail_Message();
            $email = strtr(base64_encode($strRawMessage), array('+' => '-', '/' => '_'));
            $message->setRaw($email);

            $service->users_messages->send("me", $message);
        }catch (\Exception $ex){
            var_dump($ex->getMessage());die;
        }


//        return $message;
    }
}
