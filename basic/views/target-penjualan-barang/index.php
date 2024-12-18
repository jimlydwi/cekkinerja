<?php

use app\models\TargetPenjualanBarang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TargetPenjualanBarangSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Target Penjualan Barangs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="target-penjualan-barang-index">

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
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_target',
            'jumlah_target',
            'nm_barang',
            'id_pengguna',
            [
                'class' => ActionColumn::className(),
                'visibleButtons' => [
                    'update' => ($jabatan === 'supervisor'), // Hanya supervisor bisa update
                    'delete' => ($jabatan === 'supervisor'), // Hanya supervisor bisa delete
                    'view' => true, // Semua jabatan bisa melihat
                ],
                'urlCreator' => function ($action, TargetPenjualanBarang $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_target' => $model->id_target]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
