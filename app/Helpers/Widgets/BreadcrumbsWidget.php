<?php

namespace App\Helpers\Widgets;


use App\Libraries\BaseView;

class BreadcrumbsWidget extends BaseWidget
{
    /**
     * @param BaseView $view
     * @param array $data
     * @return string
     */
    public static function register(BaseView $view, array $data = [])
    {
        if (empty($data) || !isset($data['links']) || empty($data['links'])) return null;

        return static::render($view, 'breadcrumbs', $data);
    }
}