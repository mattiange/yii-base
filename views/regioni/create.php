<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Regioni */

$this->title = 'Create Regioni';
$this->params['breadcrumbs'][] = ['label' => 'Regionis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regioni-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
