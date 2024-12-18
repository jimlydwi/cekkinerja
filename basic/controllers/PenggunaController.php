<?php

namespace app\controllers;

use app\models\Pengguna;
use app\models\PenggunaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * PenggunaController implements the CRUD actions for Pengguna model.
 */
class PenggunaController extends Controller
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
     * Lists all Pengguna models.
     *
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->user->isGuest ? $this->redirect(['view/login']):"";
        $searchModel = new PenggunaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengguna model.
     * @param int $id_pengguna Id Pengguna
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pengguna)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pengguna),
        ]);
    }

    /**
     * Creates a new Pengguna model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pengguna();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pengguna' => $model->id_pengguna]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pengguna model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pengguna Id Pengguna
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pengguna)
    {
        $model = $this->findModel($id_pengguna);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pengguna' => $model->id_pengguna]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pengguna model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pengguna Id Pengguna
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pengguna)
    {
        $this->findModel($id_pengguna)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengguna model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pengguna Id Pengguna
     * @return Pengguna the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pengguna)
    {
        if (($model = Pengguna::findOne(['id_pengguna' => $id_pengguna])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
