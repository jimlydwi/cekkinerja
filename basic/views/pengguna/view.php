<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pengguna $model */

$this->title = $model->id_pengguna;
$this->params['breadcrumbs'][] = ['label' => 'Penggunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pengguna-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_pengguna' => $model->id_pengguna], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_pengguna' => $model->id_pengguna], [
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
            'id_pengguna',
            'nama_pengguna',
            'email:email',
            'password',
            'jabatan',
        ],
    ]) ?>

</div>
