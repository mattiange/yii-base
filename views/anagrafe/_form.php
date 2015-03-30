<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use \yii\helpers\ArrayHelper;
use app\models\Comuni;
use app\models\Province;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\models\Anagrafe */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'cognome')->textInput(['maxlength' => 50]) ?>

<?= $form->field($model, 'nome')->textInput(['maxlength' => 50]) ?>

<?= $form->field($model, 'indirizzo')->textInput(['maxlength' => 50]) ?>

<!-- Dropdown list a cascata con dati caricati da DB - Province -->
<?=
$form->field($model, 'provincia')->dropDownList(
        ArrayHelper::map(Province::find()->orderBy('provincia')->all(), 'id', 'provincia'), [
            'id' => 'provincia-id', //id da usare nella dropbox dipendente
            'prompt' => 'Scegli la provincia...',
        ]
);
?>
<!-- Dropdown List kartik/DepDrop con dati caricati in base alla Provincia -->
<?php
// Dependent Dropdown
echo $form->field($model, 'com_residenza_id')->widget(DepDrop::classname(), [
    'options' => ['id' => 'comune'],
    'pluginOptions' => [
        'depends' => ['provincia-id'], //id dropbox da cui dipende
        'placeholder' => 'Scegli il comune...',
        'url' => Url::to(['/comuni/comuni-provincia'])
    ]
]);
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


