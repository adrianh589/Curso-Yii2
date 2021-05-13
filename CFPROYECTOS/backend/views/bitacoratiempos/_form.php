<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \backend\models\Proyectos;


/* @var $this yii\web\View */
/* @var $model backend\models\Bitacoratiempos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bitacoratiempos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
        $form->field($model, 'Fecha')->widget(\yii\jui\DatePicker::className(), [
               'dateFormat' => 'dd-MM-yyyy',
                'value' => date('d/mY'),
                'options' => ['style' => 'position: relative; z-index: 999', 'class' => 'form-control']
            ]);
    ?>

    <?=
        $form->field($model, 'HoraInicio')->widget(kartik\time\TimePicker::className(), [
                'pluginOptions' => ['minuteStep' => 1]
        ])
    ?>

    <?=
    $form->field($model, 'HoraFinal')->widget(kartik\time\TimePicker::className(), [
        'pluginOptions' => ['minuteStep' => 1]
    ])
    ?>

    <?= $form->field($model, 'Interrupcion')->textInput() ?>


    <?= $form->field($model, 'ActividadNoPlaneada')->textInput(['maxlength' => true]) ?>


    <?php
        $proyectos = ArrayHelper::map(Proyectos::find()->where(['Activo' => 1 ])->orderBy('NombreProyecto')->all(), 'idProyecto', 'NombreProyecto');
        echo $form->field($model, 'idProyecto')->widget(select2::classname(), [
                'data' => $proyectos,
            'language' => 'es',
            'options' => ['placeholder' => 'Selecione un proyecto'],
            'pluginOptions' => [
                    'allowClear' => true
            ]
        ])
    ?>


    <?= $form->field($model, 'Artefacto')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
