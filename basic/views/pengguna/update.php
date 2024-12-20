<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pengguna $model */

$this->title = 'Update Pengguna: ' . $model->id_pengguna;
$this->params['breadcrumbs'][] = ['label' => 'Penggunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pengguna, 'url' => ['view', 'id_pengguna' => $model->id_pengguna]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengguna-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
