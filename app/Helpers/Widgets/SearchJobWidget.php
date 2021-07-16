<?php

namespace App\Helpers\Widgets;


use App\Libraries\BaseView;
use App\Models\ProjectModel;
use App\Models\UserRecruitmentModel;

class SearchJobWidget extends BaseWidget
{

    /**
     * @param BaseView $view
     * @param array $data
     * @return string
     */
    public static function register(BaseView $view, array $province = [], array $job = [], string $search_navbar = '', string $province_navbar = '', string $job_navbar = '')
    {

        return static::render($view, 'search_job', [
            'models' => '',
            'province' => $province,
            'job' => $job,
            'search_navbar' => $search_navbar,
            'job_navbar' => $job_navbar,
            'province_navbar' => $province_navbar,
        ]);
    }
}
