<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TargetPenjualanBarang $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="target-penjualan-barang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jumlah_target')->textInput() ?>

    <?= $form->field($model, 'nm_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pengguna')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
