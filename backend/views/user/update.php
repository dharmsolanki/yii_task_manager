<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use common\models\User;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Update';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="card shadow p-4" style="max-width: 450px; width: 100%;">
        <div class="card-body">
            <h2 class="text-center mb-4"><?= Html::encode($this->title) ?></h2>
            <p class="text-muted text-center">Create a new account by filling in the details below.</p>

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username', [
                'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Enter your username']
            ])->label(false) ?>

            <?= $form->field($model, 'email', [
                'inputOptions' => ['class' => 'form-control', 'placeholder' => 'Enter your email']
            ])->label(false) ?>

            <?= $form->field($model, 'status')->dropDownList(
                // Options for the dropdown list
                [User::STATUS_ACTIVE => 'Active', User::STATUS_INACTIVE => 'Inactive'],
            ) ?>

            <div class="form-group">
                <?= Html::submitButton('Sign Up', ['class' => 'btn btn-primary w-100', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>