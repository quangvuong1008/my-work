<?php

use App\Helpers\Assets\AppAsset;
use App\Helpers\Widgets\FrontendNav;
use App\Helpers\SessionHelper;
use App\Helpers\Html;
use App\Helpers\Widgets\FrontFooter;
use App\Helpers\Widgets\MetaTags;
use App\Helpers\SettingHelper;
use App\Models\SettingsModel;

/**
 * @var \App\Libraries\BaseView $this
 * @var string $content
 */
AppAsset::register($this);
// MetaTags::register($this);

$alert = SessionHelper::getInstance()->getFlash('GLOBAL');
$settings = new SettingsModel();
$settings = $settings->findAll();
$setting_array = [];
if ($settings) {
    foreach ($settings as $setting) {
        $setting_array[$setting->key] = $setting->value;
    }
}
?>
<!DOCTYPE html>
<html lang=vi>

<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo $setting_array['home_meta_title']; ?></title>
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
   
    <script src="https://use.fontawesome.com/6536336419.js"></script>
    <script src="https://kit.fontawesome.com/edd8733a20.js" crossorigin="anonymous"></script>
    <meta property="og:image" itemprop="thumbnailUrl" content="<?php echo $this->meta_image_url ?>">
    <meta property="og:image:width" content="<?php echo $setting_array['home_meta_width']; ?>" />
    <meta property="og:image:height" content="<?php echo $setting_array['home_meta_height']; ?>" />
    <meta name="keywords" content="<?php echo $setting_array['home_meta_keywords']; ?>" />
    <meta name="description" content="<?php echo $setting_array['home_meta_description']; ?>" />
    <meta name="copyright" content="angiakhang.com"/>
    <meta name="author" content="angiakhang.com"/>
    <?php $this->head(); ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <?php echo $setting_array['main_header_script']; ?>
    <meta name='dmca-site-verification' content='djMzU1hjVU9iUzF5Q2d5K1FYbExDTWNjR2JkLzhRcU4wWkhKZmh2VW03bz01' />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body style="background-color: #f2f3f5">
    <?php echo $setting_array['main_body_script']; ?>


    <?php
    if ($alert && !empty($alert) && isset($alert['type']) && isset($alert['message'])) {
        echo Html::tag('div', $alert['message'], [
            'class' => ['alert', 'alert-' . strtolower($alert['type']), 'text-center']
        ]) . "\n";
    }
    ?>
    <section>
        <?= $content ?>
    </section>

    <?= FrontFooter::register($this) ?>

    <?php $this->registerAssets() ?>
</body>
<?php echo $setting_array['main_footer_script'] ?>