<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Anagrafe */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'cognome')->textInput(['maxlength' => 50]) ?>

<?= $form->field($model, 'nome')->textInput(['maxlength' => 50]) ?>

<?= $form->field($model, 'indirizzo')->textInput(['maxlength' => 50]) ?>

<?= $form->field($model, 'com_residenza_id')->textInput() ?>

<!-- Date picker Jquery UI associato a field -->
<?=
$form->field($model, 'data_nascita')->widget(DatePicker::classname(), [
    'language' => 'it',
    'dateFormat' => 'yyyy-MM-dd',
])
?>

<?= $form->field($model, 'com_nascita_id')->textInput() ?>

<?= $form->field($model, 'email')->textInput(['maxlength' => 30]) ?>

<?= $form->field($model, 'cellulare')->textInput(['maxlength' => 15]) ?>

<?= $form->field($model, 'telefono')->textInput(['maxlength' => 15]) ?>

<?= $form->field($model, 'username')->textInput(['maxlength' => 50]) ?>

<?= $form->field($model, 'password')->passwordInput(['maxlength' => 50]) ?>

<!-- i campi "creato il" e "aggiornato il" sono a sola lettura -->
<?= $form->field($model, 'creato_il')->textInput(['readonly' => true]) ?>

<?= $form->field($model, 'aggiornato_il')->textInput(['readonly' => true]) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>


