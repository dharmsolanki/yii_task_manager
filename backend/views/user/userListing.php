<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Listing';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/sweetalert2.min.css');
$this->registerJsFile('@web/js/sweetalert2.min.js');
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    // Check for success or error flash messages and display them using SweetAlert2
    if (Yii::$app->session->hasFlash('success')) {
        $this->registerJs("
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '" . Yii::$app->session->getFlash('success') . "',
                confirmButtonText: 'OK'
            });
        ");
    } elseif (Yii::$app->session->hasFlash('error')) {
        $this->registerJs("
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '" . Yii::$app->session->getFlash('error') . "',
                confirmButtonText: 'Try Again'
            });
        ");
    }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'email', // Column for email
            [
                'attribute' => 'status',
                'value' => function ($model) {

                    return ($model->status === 10) ? 'Active' : 'Inactive';
                },
            ],
            'created_at:datetime', // Column with datetime formatting

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
</div>