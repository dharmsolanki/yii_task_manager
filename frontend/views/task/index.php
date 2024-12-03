<?php

use frontend\models\Task;
use yii\grid\GridView;
use yii\helpers\Html;

$this->registerCssFile('@web/css/sweetalert2.min.css');
$this->registerJsFile('@web/js/sweetalert2.min.js');
// SweetAlert2 Flash Messages
if (Yii::$app->session->hasFlash('success')) {
    $this->registerJs("
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '" . Html::encode(Yii::$app->session->getFlash('success')) . "',
            confirmButtonText: 'OK'
        });
    ");
} elseif (Yii::$app->session->hasFlash('error')) {
    $this->registerJs("
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '" . Html::encode(Yii::$app->session->getFlash('error')) . "',
            confirmButtonText: 'Try Again'
        });
    ");
}

echo GridView::widget([
    'dataProvider' => new yii\data\ArrayDataProvider([
        'allModels' => $tasks,
        'pagination' => [
            'pageSize' => 10,
        ],
    ]),
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'task_name',
        'description',
        [
            'attribute' => 'priority',
            'value' => function ($model) {
                return $model->priority == Task::PRIORITY_LOW
                    ? "Low"
                    : ($model->priority == Task::PRIORITY_MEDIUM
                        ? "Medium"
                        : "High");
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
        ],
    ],
]);
