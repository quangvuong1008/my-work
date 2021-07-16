<?php

namespace App\Helpers\Widgets;


use App\Libraries\BaseView;
use App\Models\ProjectModel;
use App\Models\UserRecruitmentModel;

class MenuRecruitmentWidget extends BaseWidget
{

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
        if($user_id){
            $models = $model->find($user_id);
        }
        return static::render($view, 'menu_recruitment', [
            'models' => $models
        ]);
    }
}