<?php

use frontend\models\Task;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
?>

<!-- Button Section for Create/Additional Actions -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <?= Html::a('Create Task', ['create'], [
        'class' => 'btn btn-success btn-lg shadow-sm',
        'title' => 'Create a new task',
        'style' => 'font-size: 16px; padding: 10px 20px; border-radius: 8px;',
    ]) ?>
</div>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider, // Use dataProvider passed from the controller
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
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a('<i class="fas fa-edit"></i>', $url, [
                        'class' => 'btn btn-primary btn-sm',
                        'title' => 'Update Task',
                        'style' => 'margin-right: 5px;',
                    ]);
                },

                'delete' => function ($url, $model, $key) {
                    return Html::a('<i class="fas fa-trash"></i>', $url, [
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Delete Task',
                        'style' => 'margin-left: 5px;',
                        'data-method' => 'post',
                        'data-confirm' => 'Are you sure you want to delete this task?',
                    ]);
                },
            ],
        ],
    ],
]);
?>