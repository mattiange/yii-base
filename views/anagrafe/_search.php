<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AnagrafeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anagrafe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idContatto') ?>

    <?= $form->field($model, 'cognome') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'indirizzo') ?>

    <?= $form->field($model, 'com_residenza_id') ?>

    <?php // echo $form->field($model, 'data_nascita') ?>

    <?php // echo $form->field($model, 'com_nascita_id') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'cellulare') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'creato_il') ?>

    <?php // echo $form->field($model, 'aggiornato_il') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
