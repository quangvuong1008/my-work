<?php

namespace App\Helpers\Widgets;

use App\Libraries\BaseView;
use App\Models\CategoryModel;
use App\Models\ProjectCategoryModel;
use App\Models\SettingsModel;
use App\Models\UserModel;

class FrontendNav extends BaseWidget
{
    private static $items;

    private static $projects;

    /**
     * @param BaseView $view
     * @param array $data
     * @return string
     */
    public static function register(BaseView $view, array $data = [])
    {

        $model = null;
        $session = session();

        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        if($user_id && $user_type =='seeker'){
            $model = new UserModel();

            $model = $model->find($user_id);
        }

        $settings =  new SettingsModel();
        $settings = $settings->findAll();
        $setting_array = [];
        if($settings){
            foreach ($settings as $setting){
                $setting_array[$setting->key] = $setting->value;
            }
        }

        return static::render($view, 'frontend_nav', [
            'model'=> $model,
            'settings' => $setting_array
        ]);
    }
}