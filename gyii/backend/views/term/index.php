<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WpTermsQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wp Terms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wp-terms-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Wp Terms', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'term_id',
            'name',
            'slug',
            'term_group',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
