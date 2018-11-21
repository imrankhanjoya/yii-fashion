<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'sku',
            'SalesRank',
            'ListPrice',
            'price',
            'LowestNewPrice',
            'post_date',
            'post_content:ntext',
            'post_title:ntext',
            'post_excerpt:ntext',
            'post_status',
            'post_parent',
            'image',
            'DetailPageURL',
            'Publisher',
            'Manufacturer',
            'Brand',
            'guid',
        ],
    ]) ?>

</div>
