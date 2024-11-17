<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>
<div class="site-login d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="card p-4 shadow" style="max-width: 400px; width: 100%; border-radius: 10px;">
        <div class="text-center mb-4">
            <h3 class="login-title"><?= Html::encode($this->title) ?></h3>
            <p class="text-muted">Welcome back! Please login to your account</p>
        </div>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <div class="mb-3">
            <?= $form->field($model, 'username', [
                'inputOptions' => ['class' => 'form-control form-control-lg', 'placeholder' => 'Username or Email']
            ])->label(false) ?>
        </div>

        <div class="mb-3">
            <?= $form->field($model, 'password', [
                'inputOptions' => ['class' => 'form-control form-control-lg', 'placeholder' => 'Password']
            ])->passwordInput()->label(false) ?>
        </div>

        <div class="form-check mb-4">
            <?= $form->field($model, 'rememberMe')->checkbox([
                'class' => 'form-check-input', 
                'labelOptions' => ['class' => 'form-check-label']
            ])->label('Remember Me') ?>
        </div>

        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg w-100']) ?>

        <?php ActiveForm::end(); ?>

        <div class="text-center mt-4">
            <p class="small">
                <?= Html::a('Forgot Password?', ['/site/request-password-reset'], ['class' => 'text-decoration-none link-primary']) ?>
            </p>
            <p class="small">
                <?= Html::a('Create an Account', ['/site/signup'], ['class' => 'text-decoration-none link-primary']) ?>
            </p>
        </div>
    </div>
</div>
