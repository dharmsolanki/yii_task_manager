<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

$this->title = 'Signup';

// Register a custom CSS file
$this->registerCssFile('@web/css/login.css');
$this->registerCss("
body {
    background-color: #080710;
}
");
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', [
    'depends' => [\yii\web\YiiAsset::class],
]);

$this->registerCssFile('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap', [
    'depends' => [\yii\web\YiiAsset::class],
]);

$this->registerLinkTag([
    'rel' => 'preconnect',
    'href' => 'https://fonts.gstatic.com',
]);
?>

<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'username', [
    'inputOptions' => ['id' => 'username', 'placeholder' => 'Username or Email']
])->label('Username') ?>

<?= $form->field($model, 'email', [
    'inputOptions' => ['id' => 'email', 'placeholder' => 'Enter your email']
])->label('Email') ?>


<?= $form->field($model, 'password', [
    'inputOptions' => ['id' => 'password', 'placeholder' => 'Password']
])->passwordInput()->label('Password') ?>

<?= Html::submitButton('Signup', ['id' => 'btn-submit']) ?>

<?php ActiveForm::end(); ?>