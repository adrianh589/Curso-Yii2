<?php

namespace backend\controllers;
use backend\models\Proyectos;
use yii\web\Controller;

/**
 * Class ProyectosController
 * @package backend\controllers
 */
class ProyectosController extends Controller{

    public function actionIndex(){
//        $model = new Proyectos();
//
//        $models = Proyectos::findAll(['Activo' => 1]);
//        \Yii::$app->response->format = 'json';
//        return $models;
        return 'Hola';
    }

    public function actionCreate($nombre){
        $model = new Proyectos();
        $model->Activo = true;
        $model->nombreProyecto = $nombre;
        $model->save();
        \Yii::$app->response->format = 'json';
        return $model;
    }

    public function actionUpdate($id, $activo){
        $model = Proyectos::findOne($id);
        if ($model !== null){
            $model->Activo = $activo;
            $model->save();
            \Yii::$app->response->format = 'json';
            return $model;
        }
    }

    public function actionDelete($id){
        $model = Proyectos::findOne($id);
        if($model !== null){
            $model->delete();
            \Yii::$app->response->format = 'json';
            return $model;
        }
    }

}