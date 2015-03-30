<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use \yii\helpers\ArrayHelper;
use app\models\Comuni;
use app\models\Province;

/* @var $this yii\web\View */
/* @var $model app\models\Anagrafe */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'cognome')->textInput(['maxlength' => 50]) ?>

<?= $form->field($model, 'nome')->textInput(['maxlength' => 50]) ?>

<?= $form->field($model, 'indirizzo')->textInput(['maxlength' => 50]) ?>
<!-- Dropdown list a cascata 
     con dati caricati da DB - Province 
     e aggiornamento delle <option> dei comuni
-->
<?=
$form->field($model, 'provincia')->dropDownList(
        ArrayHelper::map(Province::find()->orderBy('provincia')->all(), 'id', 'provincia'), 
    [ 'prompt' => 'Scegli la provincia',
      'onchange' => '$.post("index.php?r=comuni/list&id=' . '"+$(this).val(), 
                 function (data) {
                    $("select#anagrafe-com_residenza_id").html(data);
                 });'
    ]);
?>
<!-- Dropdown list con dati caricati da DB - Comuni della provincia di Bari -->
<?=
$form->field($model, 'com_residenza_id')->dropDownList(
        ArrayHelper::map(Comuni::findAll(['id_provincia' => 72]), 'id', 'comune'), ['prompt' => 'Scegli il comune']
)
?>
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


