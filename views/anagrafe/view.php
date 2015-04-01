<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Anagrafe */

$this->title = $model->idContatto;
$this->params['breadcrumbs'][] = ['label' => 'Anagraves', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--  Messaggi FLASH -->
<?php
/**
 * Visualizza un messaggio utilizzando le classi alert di boostrap 
 * success, info, warning, danger 
 * 
 * Uso nel controller
 * ==================
 * Un messaggio
 * Yii::$app->session->setFlash('success', 'Il nuovo utente è stato aggiornato correttamente');
 * 
 * Più messaggi
 * Yii::$app->session->addFlash('success', 'Per ora ho aggiornato');
 * Yii::$app->session->addFlash('warning', 'Non ha ancora registrato il programma');
 * Yii::$app->session->addFlash('danger', 'smetterà di funzionare tra 10gg');
 * Yii::$app->session->addFlash('info', 'sto scherzando :-)');
 */
$n = 0;
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    echo '<div id="flash' . $n . '" class="alert alert-' . $key . '">';
    foreach ($message as $msg) {
        echo $msg;
    }
    echo '</div>';
    $n++;
}

/*
 * Registra una funzione Jquery per ogni messaggio Flash presente nella sessione
 * JQuery funzione - nasconde, fade-in, attende, fade-out
 */
for ($i = 0; $i < $n; $i++) {
    //il primo attende 200ms i successivi attendono la scomparsa del precedente
    $delay = 200 + $i * 4000;
    $js = '$(\'#flash' . $i . '\').hide().delay(' . $delay . ').fadeIn(500).delay(3000).fadeOut(500)';
    $this->registerJs($js);
}
?>
<!-- Fine messaggi FLASH -->

<div class="anagrafe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idContatto], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->idContatto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idContatto',
            'cognome',
            'nome',
            'indirizzo',
            'com_residenza_id',
            'data_nascita',
            'com_nascita_id',
            'email:email',
            'cellulare',
            'telefono',
            'username',
            'password',
            'creato_il',
            'aggiornato_il',
        ],
    ])
    ?>

</div>
