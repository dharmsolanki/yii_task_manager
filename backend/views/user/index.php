<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Listing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'email', // Column for email
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    
                    return ($model->status === 10) ? 'Active' : 'Inactive';
                },
                'filter' => [
                    10 => 'Active',
                    9 => 'Inactive',
                ],
            ],
            'created_at:datetime', // Column with datetime formatting

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
</div>
