<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Menu';
?>
<div class="menu-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['rows' => 4]) ?>

    <?= $form->field($model, 'icon')->textInput(['rows' => 4]) ?>

    <?= $form->field($model, 'is_active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Create Menu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
