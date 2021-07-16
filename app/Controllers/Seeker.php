<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\FieldsOfOperationModel;
use App\Models\JobModel;
use App\Models\NewsModel;
use App\Models\NewsRecruitmentModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductModel;
use App\Models\ProductPriceModel;
use App\Models\ProvinceModel;
use App\Models\SliderModel;
use App\Models\UserRecruitmentFieldsModel;
use App\Models\UserRecruitmentModel;
use App\Models\VotesModel;
use App\Models\SettingsModel;
use App\Helpers\SessionHelper;
use DateTime;

class Seeker extends BaseController
{
    public function index()
    {
        // Sliders
        $sliders = (new SliderModel())
            ->where('is_lock', 0)
            ->orderBy('order_no', SORT_ASC)
            ->findAll();
        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
        $recruitment = (new NewsRecruitmentModel());
        $new_rcm = $recruitment
            ->where('status', 0)
            ->where('product_id', 14)
            ->orderBy('updated_at', 'DESC')
            ->findAll(20);
        $rcm_interesting = $recruitment
            ->where('status', 0)
            ->where('product_id', 15)
            ->orderBy('updated_at', 'DESC')
            ->findAll(20);
        $rcm_high_salary = $recruitment
            ->where('status', 0)
            ->where('product_id', 16)
            ->orderBy('updated_at', 'DESC')
            ->findAll(20);

        $settings = new SettingsModel();
        $settings = $settings->findAll();
        $setting_array = [];
        if ($settings) {
            foreach ($settings as $setting) {
                $setting_array[$setting->key] = $setting->value;
            }
        }
        $province = (new ProvinceModel())->findAll();

        return $this->render('seeker/index', [
            'sliders' => $sliders,
            'job' => $job,
            'new_rcm' => $new_rcm,
            'settings' => $setting_array,
            'rcm_interesting' => $rcm_interesting,
            'rcm_high_salary' => $rcm_high_salary,
            'province' => $province

        ]);
    }



}