<?php

namespace App\Helpers\Widgets;

use App\Libraries\BaseView;
use App\Models\CategoryModel;
use App\Models\ProjectCategoryModel;
use App\Models\SettingsModel;
use App\Models\UserModel;

class SeekerLeftMenu extends BaseWidget
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
        return static::render($view, 'seeker_left_menu', [
        ]);
    }
}