<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anagrafe */

$this->title = 'Update Anagrafe: ' . ' ' . $model->idContatto;
$this->params['breadcrumbs'][] = ['label' => 'Anagraves', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idContatto, 'url' => ['view', 'id' => $model->idContatto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anagrafe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
