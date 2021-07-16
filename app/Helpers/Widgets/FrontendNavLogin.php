<?php

namespace App\Helpers\Widgets;

use App\Libraries\BaseView;
use App\Models\CategoryModel;
use App\Models\ProjectCategoryModel;
use App\Models\SettingsModel;

class FrontendNavLogin extends BaseWidget
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

        $settings =  new SettingsModel();
        $settings = $settings->findAll();
        $setting_array = [];
        if($settings){
            foreach ($settings as $setting){
                $setting_array[$setting->key] = $setting->value;
            }
        }

        return static::render($view, 'frontend_nav_login', [
            'settings' => $setting_array
        ]);
    }
}