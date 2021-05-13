<?php
namespace backend\controllers;

use backend\models\Bitacoratiempos;
use backend\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        //para una sola accion se modifica el layout
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionUpload() {
        $model = new UploadForm();
        $registro = new Bitacoratiempos();

        if (Yii::$app->request->isPost) {
            $model->excelFile = UploadedFile::getInstance($model, 'excelFile');
            if ($model->upload()) {
                if($registro->guardaRegistro('uploads/' . $model->excelFile->name))
                    return $this->goHome();
                else
                    return $this->render('error', ['message' => 'El archivo no tiene el formato deseado', 'name' => 'Error al guardar los datos']);
            }
            else {
                return $this->render('error', ['message' => 'El archivo ya fue cargado', 'name' => 'archivo duplicado']);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

//    private function guardaRegistro($inputFile) {
//
//        try
//        {
//            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
//            $objReader = \PHPEXCEL_IOFactory::createReader($inputFileType);
//            $objPHPExcel = $objReader->load($inputFile);
//
//
//            $sheet = $objPHPExcel->getSheet(0);
//            $highestRow = $sheet->getHighestRow();
//            $highestColumn = $sheet->getHighestColumn();
//            for ($row = 1; $row <= $highestRow; $row++) {
//                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
//                if ($row == 1) {
//                    continue;
//                }
//
//                $registro = new Bitacoratiempos();
//                $registro->Fecha = $rowData[0][0];
//                $registro->HoraInicio = $rowData[0][1];
//                $registro->Interrupcion = $rowData[0][2];
//                $registro->HoraFinal = $rowData[0][3];
//                $registro->ActividadNoPlaneada = $rowData[0][6];
//                $registro->idProyecto = $rowData[0][7];
//                $registro->Artefacto = $rowData[0][8];
//                $registro->save();
//            }
//            return true;
//        }
//        catch(yii\db\Exception $e)
//        {
//            return false;
//        }
//    }
}
