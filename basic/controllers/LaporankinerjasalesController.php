<?php

namespace app\controllers;

use app\models\Laporankinerjasales;
use app\models\LaporankinerjasalesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use Yii;

/**
 * LaporankinerjasalesController implements the CRUD actions for Laporankinerjasales model.
 */
class LaporankinerjasalesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Laporankinerjasales models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = LaporanKinerjaSales::find()
        ->joinWith('target'); 

    
    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);

    
    return $this->render('index', [
        'dataProvider' => $dataProvider,
    ]);

        Yii::$app->user->isGuest ? $this->redirect(['view/login']):"";
        $searchModel = new LaporankinerjasalesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Laporankinerjasales model.
     * @param int $id_transaksi Id Transaksi
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_transaksi)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_transaksi),
        ]);
    }

    /**
     * Creates a new Laporankinerjasales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Laporankinerjasales();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_transaksi' => $model->id_transaksi]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Laporankinerjasales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_transaksi Id Transaksi
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_transaksi)
    {
        $model = $this->findModel($id_transaksi);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_transaksi' => $model->id_transaksi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Laporankinerjasales model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_transaksi Id Transaksi
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_transaksi)
    {
        $this->findModel($id_transaksi)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Laporankinerjasales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_transaksi Id Transaksi
     * @return Laporankinerjasales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_transaksi)
    {
        if (($model = Laporankinerjasales::findOne(['id_transaksi' => $id_transaksi])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
