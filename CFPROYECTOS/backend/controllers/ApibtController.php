<?php


namespace backend\controllers;


use backend\models\Bitacoratiempos;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class ApibtController extends ActiveController {

    /**
     * Funcion para eliminar la acción de index en la api rest
     * @return array
     */
    public function actions() {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public $modelClass = 'backend\models\BitacoraTiempos';

    /**
     * Con esto bloqueamos las peticiones de personas que no estan autenticadas en la aplicacion
     * @return array|array[]
     */
    public function behaviors() {
        return ArrayHelper::merge( parent::behaviors() ,[
            'authenticator' => [
                'class' => HttpBasicAuth::className(),
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'delete', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ]);
    }

    /**
     * Accion index
     * NOTA: Esta funcion debe usar las funciones de PDO con la finalidad de evitar inyecciones SQL
     * @param $inicio
     * @param $final
     * @return array|Bitacoratiempos[]|\yii\db\ActiveRecord[]
     */
    public function actionIndex($inicio, $final) {
        $query = Bitacoratiempos::find();
        $query->andWhere("Fecha>='".$inicio."'");
        $query->andWhere("Fecha<='".$final."'");
        return $query->all();
    }

}