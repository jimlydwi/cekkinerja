<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TargetPenjualanBarang $model */

$this->title = $model->id_target;
$this->params['breadcrumbs'][] = ['label' => 'Target Penjualan Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="target-penjualan-barang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_target' => $model->id_target], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_target' => $model->id_target], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_target',
            'jumlah_target',
            'nm_barang',
            'id_pengguna',
        ],
    ]) ?>

</div>
