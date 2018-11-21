<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductsQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'sku',
            'SalesRank',
            'ListPrice',
            'price',
            //'LowestNewPrice',
            //'post_date',
            //'post_content:ntext',
            //'post_title:ntext',
            //'post_excerpt:ntext',
            //'post_status',
            //'post_parent',
            //'image',
            //'DetailPageURL',
            //'Publisher',
            //'Manufacturer',
            //'Brand',
            //'guid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
