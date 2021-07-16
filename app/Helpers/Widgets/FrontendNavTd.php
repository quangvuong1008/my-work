<?php

namespace App\Helpers\Widgets;

use App\Libraries\BaseView;
use App\Models\CategoryModel;
use App\Models\ProjectCategoryModel;
use App\Models\SettingsModel;
use App\Models\UserRecruitmentModel;

class FrontendNavTd extends BaseWidget
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
        $model = new UserRecruitmentModel();

        $session = session();

        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        if($user_id && $user_type =='recruitment'){
            $models = $model->find($user_id);
        }

        $settings =  new SettingsModel();
        $settings = $settings->findAll();
        $setting_array = [];
        if($settings){
            foreach ($settings as $setting){
                $setting_array[$setting->key] = $setting->value;
            }
        }
        return static::render($view, 'frontend_nav_td', [
            'models'=>$models,
            'settings' => $setting_array
        ]);
    }
}