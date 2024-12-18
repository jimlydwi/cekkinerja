<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Laporankinerjasales $model */

$this->title = 'Create Laporankinerjasales';
$this->params['breadcrumbs'][] = ['label' => 'Laporankinerjasales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporankinerjasales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
