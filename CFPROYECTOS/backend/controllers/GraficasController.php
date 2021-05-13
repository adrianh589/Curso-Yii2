<?php

namespace backend\controllers;

use backend\models\Graficas;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class GraficasController extends \yii\web\Controller{

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [/* Esto implica que si el usuario esta autentificado puede acceder a todas estas rutas sin importar el rol */
                        'actions' => ['index', 'view', 'create', 'delete', 'update'],
                        'allow' => true,
                        'roles' => ['@'] /* Esto significa que @ es para usuarios autenticados y ? los que no estan autenticados */
                    ]
                ]
            ],
        ];
    }

    const NUM_DIAS = 15;

    public function actionIndex() {
        $fechas = array();
        for ($i = 0; $i < self::NUM_DIAS; $i++)
            $fechas[$i] = date("d-m-Y", strtotime((self::NUM_DIAS - $i) . " days ago"));
        $grafica = new Graficas();
        $datos = $grafica->obtenDatos(self::NUM_DIAS, date('Y-m-d'), \Yii::$app->user->id);
        return $this->render('index', ['fechas' => $fechas, 'series' => $datos]);

    }

//    public function actionDatos() {
//
//    }

}
