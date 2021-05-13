<?php


namespace backend\controllers;
use backend\models\ProyectosSinGii;

class ProyectosControllerSinGii extends \yii\web\Controller
{
    public function actionIndex(){
        $model = new ProyectosSinGii();
        $models = ProyectosSinGii::findAll(['Activo' => 1]);
        \Yii::$app->response->format = 'json';
        return $models;
    }

    public function actionCreate($nombre){
        $model = new ProyectosSinGii();
        $model->Activo = true;
        $model->NombreProyecto = $nombre;
        $model->save();
        \Yii::$app->response->format = 'json';
        return $model;
    }

    public function actionUpdate($id, $activo){
        $model = ProyectosSinGii::findOne($id);
        if ($model !== null){
            $model->Activo = $activo;
            $model->save();
            \Yii::$app->response->format = 'json';
            return $model;
        }
    }

    public function actionDelete($id){
        $model = ProyectosSinGii::findOne($id);
        if($model !== null){
            $model->delete();
            \Yii::$app->response->format = 'json';
            return $model;
        }
    }
}