<?php

use frontend\models\Task;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'task-form',
    'options' => ['class' => 'form-horizontal', 'style' => 'max-width: 600px; margin: auto;'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-10\">{input}</div>\n<div class=\"col-lg-12 text-danger small\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-2 control-label'],
    ],
]) ?>

<div class="card shadow-sm p-4">
    <h4 class="card-title text-center mb-4"><i class="fa fa-tasks"></i> Create Task</h4>

    <!-- Task Name -->
    <?= $form->field($model, 'task_name')->textInput([
        'placeholder' => 'Enter task name',
        'class' => 'form-control shadow-sm',
    ])->label('<i class="fa fa-pencil"></i> Task Name', ['class' => 'control-label fw-bold']); ?>

    <!-- Description -->
    <?= $form->field($model, 'description')->textarea([
        'rows' => 6,
        'placeholder' => 'Enter a detailed description',
        'class' => 'form-control shadow-sm',
    ])->label('<i class="fa fa-align-left"></i> Description', ['class' => 'control-label fw-bold']); ?>

    <!-- Priority -->
    <?= $form->field($model, 'priority')->dropDownList([
        Task::PRIORITY_LOW => 'Low',
        Task::PRIORITY_MEDIUM => 'Medium',
        Task::PRIORITY_HIGH => 'High',
    ], [
        'prompt' => 'Select Priority',
        'class' => 'form-select shadow-sm',
    ])->label('<i class="fa fa-exclamation-circle"></i> Priority', ['class' => 'control-label fw-bold']); ?>

    <!-- Submit Button -->
    <div class="form-group text-center my-3">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ]) ?>
    </div>
</div>

<?php ActiveForm::end() ?>