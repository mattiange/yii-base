<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comuni */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comuni-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_regione')->textInput() ?>

    <?= $form->field($model, 'id_provincia')->textInput() ?>

    <?= $form->field($model, 'comune')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
