<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Laporankinerjasales $model */

$this->title = 'Update Laporankinerjasales: ' . $model->id_transaksi;
$this->params['breadcrumbs'][] = ['label' => 'Laporankinerjasales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_transaksi, 'url' => ['view', 'id_transaksi' => $model->id_transaksi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="laporankinerjasales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
