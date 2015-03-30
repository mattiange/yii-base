<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Anagrafe */

$this->title = 'Create Anagrafe';
$this->params['breadcrumbs'][] = ['label' => 'Anagraves', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anagrafe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
