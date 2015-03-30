<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Comuni */

$this->title = 'Create Comuni';
$this->params['breadcrumbs'][] = ['label' => 'Comunis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comuni-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
