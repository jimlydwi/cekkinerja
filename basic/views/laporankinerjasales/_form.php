<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Laporankinerjasales $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="laporankinerjasales-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'tanggal')->textInput() ?> -->

    <?= $form->field($model, 'jumlah_terjual')->textInput() ?>

    <?= $form->field($model, 'id_target')->textInput() ?>

    <?= $form->field($model, 'id_pengguna')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
