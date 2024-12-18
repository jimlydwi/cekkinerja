<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LaporankinerjasalesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="laporankinerjasales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_transaksi') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'jumlah_terjual') ?>

    <?= $form->field($model, 'id_target') ?>

    <?= $form->field($model, 'id_pengguna') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
