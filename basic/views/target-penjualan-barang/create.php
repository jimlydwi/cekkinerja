<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TargetPenjualanBarang $model */

$this->title = 'Create Target Penjualan Barang';
$this->params['breadcrumbs'][] = ['label' => 'Target Penjualan Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="target-penjualan-barang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
