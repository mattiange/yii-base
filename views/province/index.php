<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProvinceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Provinces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="province-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Province', ['value'=>Url::to('index.php?r=province/create'), 'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    
    <?php
    Modal::begin([
            'header'=>'<h4>Province</h4>',
            'id' => 'modal',
            'size'=>'modal-lg', //classe bootstrap
        ]);
 
    echo "<div id='modalContent'></div>";
 
    Modal::end();
    ?>
    
    <?php
    /*
     * Con la classe Pjax gli aggiornamenti sulla griglia saranno fatti
     * vi AJAX senza ricaricare la pagina
     */
    Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_regione',
            'provincia:ntext',
            'sigla',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
    Pjax::end();
    ?>

</div>
