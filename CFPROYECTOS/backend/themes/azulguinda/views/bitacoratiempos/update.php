<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bitacoratiempos */

$this->title = Yii::t('app', 'Update Bitacoratiempos: {name}', [
    'name' => $model->idBitacoraTiempos,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bitacoratiempos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idBitacoraTiempos, 'url' => ['view', 'id' => $model->idBitacoraTiempos]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bitacoratiempos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
