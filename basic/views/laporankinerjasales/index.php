<?php

use app\models\Laporankinerjasales;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\LaporankinerjasalesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Laporan Kinerja Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporankinerjasales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
   
    $jabatan = Yii::$app->user->identity->jabatan; 
    ?>

    <?php if ($jabatan === 'sales'): ?>
        
        <p>
            <?= Html::a('Create Laporan Kinerja Sales', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_transaksi',
            'tanggal',
            'jumlah_terjual',
            'id_target',
            'id_pengguna',

            'target.jumlah_target', 
            'target.nm_barang',
            

            
            [
                'class' => ActionColumn::className(),
                'visibleButtons' => [
                    'update' => ($jabatan === 'supervisor'), 
                    'delete' => ($jabatan === 'supervisor'), 
                    'view' => true, 
                ],
                'urlCreator' => function ($action, Laporankinerjasales $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_transaksi' => $model->id_transaksi]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
