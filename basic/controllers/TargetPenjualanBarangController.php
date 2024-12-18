<?php

namespace app\controllers;

use app\models\TargetPenjualanBarang;
use app\models\LaporanKinerjaSales;
use app\models\TargetPenjualanBarangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TargetPenjualanBarangController implements the CRUD actions for TargetPenjualanBarang model.
 */
class TargetPenjualanBarangController extends Controller
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
     * Lists all TargetPenjualanBarang models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TargetPenjualanBarangSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TargetPenjualanBarang model.
     * @param int $id_target Id Target
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_target)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_target),
        ]);
    }

    /**
     * Creates a new TargetPenjualanBarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TargetPenjualanBarang();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_target' => $model->id_target]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TargetPenjualanBarang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_target Id Target
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_target)
    {
        $model = $this->findModel($id_target);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_target' => $model->id_target]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TargetPenjualanBarang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_target Id Target
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_target)
    {
        $LaporanKinerjaSales= LaporanKinerjaSales::findAll(["id_target"=>$id_target]);
        foreach ($LaporanKinerjaSales as $value) {
            $value->delete();
        }
        $this->findModel($id_target)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TargetPenjualanBarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_target Id Target
     * @return TargetPenjualanBarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_target)
    {
        if (($model = TargetPenjualanBarang::findOne(['id_target' => $id_target])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
