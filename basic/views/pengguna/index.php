<?php

use app\models\Pengguna;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\PenggunaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengguna-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    // Menyimpan jabatan pengguna yang sedang login
    $jabatan = Yii::$app->user->identity->jabatan; // Ambil jabatan pengguna
    ?>

    <?php if ($jabatan === 'supervisor'): ?>
        <!-- Supervisor dapat membuat pengguna baru -->
        <p>
            <?= Html::a('Create Pengguna', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pengguna',
            'nama_pengguna',
            'email:email',
            'password',
            'jabatan',

            // Kolom aksi hanya tampil untuk supervisor
            [
                'class' => ActionColumn::className(),
                'visibleButtons' => [
                    'update' => ($jabatan === 'supervisor'), // Hanya supervisor bisa update
                    'delete' => ($jabatan === 'supervisor'), // Hanya supervisor bisa delete
                    'view' => true, // Semua jabatan bisa melihat
                ],
                'urlCreator' => function ($action, Pengguna $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_pengguna' => $model->id_pengguna]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
