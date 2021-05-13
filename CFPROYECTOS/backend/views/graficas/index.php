<?php

<<<<<<< HEAD
use yii\helpers\Html;
=======
>>>>>>> 77890b5568d4447c747dad038d872ff209dbd1ec
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\HighchartsAsset;

HighchartsAsset::register($this)->withScripts(['highstock', 'modules/exporting', 'modules/drilldown']);
<<<<<<< HEAD
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProyectosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Productividad');
$this->params['breadcrumbs'][] = $this->title;
?>
=======

/* @var $this yii\web\View */
/* @var $searchModel  backend\models\search\ProyectosSearch */
/* @var $dataProvider  yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Productividad');
$this->params['breadcrumbs'][] = $this->title;
?>

>>>>>>> 77890b5568d4447c747dad038d872ff209dbd1ec
<div class="container">

    <?=
    Highcharts::widget([
        'options' => [
            'credits' => ['enabled' => false],
            'chart' => ['type' => 'area'],
            'title' => ['text' => 'Productividad ' . Yii::$app->user->identity->username],
            'exporting' => [
<<<<<<< HEAD
                'chartOptions' => [// specific options for the exported image
=======
                'chartOptions' => [
>>>>>>> 77890b5568d4447c747dad038d872ff209dbd1ec
                    'plotOptions' => [
                        'series' => [
                            'dataLabels' => [
                                'enabled' => true
                            ]
                        ]
                    ]
                ],
                'scale' => 3,
                'fallbackToExportServer' => false
            ],
            'plotOptions' => [
<<<<<<< HEAD
                'area' => [
                    'stacking' => 'normal',
                    'lineColor' => '#666666',
                    'lineWidth' => 1,
                    'marker' => [
                        'lineWidth' => 1,
                        'lineColor' => '#666666'
                    ]
                ]
            ],
            'xAxis' => [
                'categories' => $fechas
            ],
            'yAxis' => [
                'title' => ['text' => 'Horas productivas']
=======
                    'area' => [
                            'stacking' => 'normal',
                        'lineColor' => '#666666',
                        'lineWidth' => 1,
                        'marker' => [
                                'lineWidth' => 1,
                            'lineColor' => "#666666"
                        ]
                    ]
            ],
            'xAxis' => [
                    'categories' => $fechas
            ],
            'yAxis' => [
                    'title' => ['text' => 'Horas productivas']
>>>>>>> 77890b5568d4447c747dad038d872ff209dbd1ec
            ],
            'series' => $series
        ]
    ]);
    ?>

<<<<<<< HEAD
</div>
=======
</div>
>>>>>>> 77890b5568d4447c747dad038d872ff209dbd1ec
