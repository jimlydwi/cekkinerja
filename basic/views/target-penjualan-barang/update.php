<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TargetPenjualanBarang $model */

$this->title = 'Update Target Penjualan Barang: ' . $model->id_target;
$this->params['breadcrumbs'][] = ['label' => 'Target Penjualan Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_target, 'url' => ['view', 'id_target' => $model->id_target]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="target-penjualan-barang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
