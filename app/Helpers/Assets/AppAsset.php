<?php

namespace App\Helpers\Assets;


class AppAsset extends BaseAsset
{
    public $css = [
        'css/main.css?v=0.2.0',
        ['https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css','crossorigin'],
        ['assets/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css','crossorigin'],
    ];

    public $js = [
        ['https://unpkg.com/react@16/umd/react.development.js', 'crossorigin'],
        ['https://unpkg.com/react-dom@16/umd/react-dom.development.js', 'crossorigin'],
        'admin/js/shopping_cart.js?v=0.0.1',
        'js/main.js?v=0.0.9',
        ['https://www.google.com/recaptcha/api.js','async'],
        ['assets/bower_components/moment/min/moment.min.js','crossorigin'],
        ['https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js','crossorigin'],
        ['https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js','crossorigin'],
        ['assets/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js','crossorigin'],
    ];

    public $depends = [
        Bootstrap3Asset::class,
        LightSliderAsset::class,
        SwiperAsset::class,
        JqueryToastAsset::class,
        FontAwesomeAsset::class,
        VotesAsset::class
    ];
}