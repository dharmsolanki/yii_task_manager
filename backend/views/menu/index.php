<?php

use common\models\Menu;
use yii\grid\GridView;
use yii\helpers\Html;

// Registering SweetAlert2 for flash messages
$this->registerCssFile('@web/css/sweetalert2.min.css');
$this->registerJsFile('@web/js/sweetalert2.min.js');

// Flash Messages for SweetAlert2
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

<!-- Professional Button and Layout -->
<div class="menu-index">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- Create Button -->
        <?= Html::a('Create Menu', ['create'], [
            'class' => 'btn btn-success btn-lg shadow-sm',
            'title' => 'Create a new menu item',
            'style' => 'font-size: 16px; padding: 10px 20px; border-radius: 8px;',
        ]) ?>
    </div>

    <!-- GridView Widget with a professional design -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider, // Use the ActiveDataProvider directly
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'label',
            'url',
            [
                'attribute' => 'is_active',
                'value' => function ($model) {
                    return $model->is_active == Menu::IS_ACTIVE ? "Active" : "In-Active";
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-edit"></i>', $url, [
                            'class' => 'btn btn-primary btn-sm',
                            'title' => 'Update Menu',
                            'style' => 'margin-right: 5px;',
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-trash"></i>', $url, [
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete Menu',
                            'style' => 'margin-left: 5px;',
                            'data-method' => 'post',
                            'data-confirm' => 'Are you sure you want to delete this menu item?',
                        ]);
                    },
                ],
            ],
        ],
        'tableOptions' => ['class' => 'table table-bordered table-striped table-hover'],
        'layout' => "{items}\n{pager}",
    ]) ?>

</div>
