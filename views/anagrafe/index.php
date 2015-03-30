<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnagrafeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anagraves';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anagrafe-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Anagrafe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idContatto',
            'cognome',
            'nome',
            'indirizzo',
            'com_residenza_id',
            // 'data_nascita',
            // 'com_nascita_id',
            // 'email:email',
            // 'cellulare',
            // 'telefono',
            // 'username',
            // 'password',
            // 'creato_il',
            // 'aggiornato_il',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
