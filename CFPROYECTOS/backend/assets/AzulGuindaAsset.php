<?php

namespace backend\assets;

use yii\web\AssetBundle;

class AzulGuindaAsset extends AssetBundle{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/azulguinda/css/azulguinda.css',
    ];
    public $js = [
    ];
}