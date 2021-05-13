<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreProyecto')->textInput(['maxlength' => true]) ?>

    <!-- Si es un nuevo registro entonces va a mostrar este campo -->
    <?php
    if (!$model->isNewRecord) {
        echo $form->field($model, 'Activo')->checkbox();
        ?>
        <h2>Actividades</h2>
        <?=
        GridView::widget([
            'dataProvider' => new ActiveDataProvider([
                'query' => $model->getActividades(),
                'pagination' => false,
//                'controller' => 'actividades',
            ]),
            'columns' => [
                'NombreActividad',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'controller' => 'actividades',
                    'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;Agregar nueva', [
                            'actividades/create-con-proyecto', 'idProyecto' => $model->idProyecto
                    ]),
                    'template' => '{update_con_proyecto} {delete}',//Dado que el update-con-proyecto no existe por default, toca poner que este boton apunta a la accion que yo necesito
                    'buttons' => [
                            'update_con_proyecto' => function($url, $model){
                                return Html::a( '<span class="glyphicon glyphicon-pencil"></span>', $url);
                            }
                    ],
                    'urlCreator' => function($action, $model, $key, $index){
                        $url = 'site/index';
                        if($action === 'update_con_proyecto'){
                            $url = Url::toRoute(['actividades/update-con-proyecto', 'id' => $model->idActividad]);
                        }elseif ($action === 'delete'){
                            $url = Url::toRoute(['actividades/delete-con-proyecto', 'id' => $model->idActividad]);
                        }
                        return $url;
                    }
                ]
            ]
        ]);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
