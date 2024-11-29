<?php

use frontend\models\Task;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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

$form = ActiveForm::begin([
    'id' => 'task-form',
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-2 control-label'],
    ],
]) ?>
<?= $form->field($model, 'task_name') ?>
<?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>

<?= $form->field($model, 'priority')->dropDownList([
    Task::PRIORITY_LOW => 'Low',
    Task::PRIORITY_MEDIUM => 'Medium',
    Task::PRIORITY_HIGH => 'High',
], ['prompt' => 'Select Priority']) ?>


<div class="form-group">
    <div class="col-lg-offset-2 col-lg-8">
        <?= Html::submitButton('<i class="fa fa-plus-circle"></i> Create', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
