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

    <!-- Page Heading -->
    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

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

    <!-- Button Section for Create/Additional Actions -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <?= Html::a('Create User', ['signup'], [
            'class' => 'btn btn-success btn-lg shadow-sm',
            'title' => 'Create a new user',
            'style' => 'font-size: 16px; padding: 10px 20px; border-radius: 8px;',
        ]) ?>
    </div>

    <!-- GridView with Custom Styling and Icons for Actions -->
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
                'template' => '{view} {update} {delete} {permission}', // Add {permission} placeholder
                'buttons' => [
                    'permission' => function ($url, $model, $key) {
                        return Html::a(
                            '<i class="fas fa-lock"></i>', // Icon for "Manage Permissions"
                            ['permission', 'userId' => $model->id],
                            [
                                'class' => 'btn btn-warning btn-sm',
                                'title' => Yii::t('app', 'Manage Permissions'),
                                'aria-label' => Yii::t('app', 'Manage Permissions'),
                                'style' => 'margin-left: 5px;',
                                'data-pjax' => '0', // Prevent PJAX for the link
                            ]
                        );
                    },
                    'view' => function ($url, $model, $key) {
                        return Html::a(
                            '<i class="fas fa-eye"></i>', // View icon
                            $url,
                            ['class' => 'btn btn-primary btn-sm', 'title' => 'View User']
                        );
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a(
                            '<i class="fas fa-edit"></i>', // Update icon
                            $url,
                            ['class' => 'btn btn-info btn-sm', 'title' => 'Update User']
                        );
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a(
                            '<i class="fas fa-trash"></i>', // Delete icon
                            $url,
                            [
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'Delete User',
                                'data-method' => 'post',
                                'data-confirm' => 'Are you sure you want to delete this user?',
                                'style' => 'margin-left: 5px;',
                            ]
                        );
                    },
                ],
            ],
        ],
        'tableOptions' => ['class' => 'table table-bordered table-striped table-hover'],
        'layout' => "{items}\n{pager}",
    ]); ?>

</div>