<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Dashboard';
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

<!-- Main Content -->

<!-- Dashboard Header -->
<h1 class="mb-4"><?= Html::encode($this->title) ?></h1>
<p class="text-muted">Welcome to your dashboard. Manage your activities and user settings here.</p>

<div class="row">
    <!-- Create User Card -->
    <div class="col-md-4">
        <div class="card shadow-lg border-0 bg-primary text-white">
            <div class="card-body text-center">
                <div class="icon mb-3" style="font-size: 40px; color: #ffffff;">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h5 class="card-title">Create User</h5>
                <p class="card-text text-light">Add new users to the system easily.</p>
                <?= Html::a('Create User', Url::to(['user/signup']), ['class' => 'btn btn-light text-primary w-100']) ?>
            </div>
        </div>
    </div>

    <!-- Manage Users Card -->
    <div class="col-md-4">
        <div class="card shadow-lg border-0 bg-secondary">
            <div class="card-body text-center">
                <div class="icon mb-3" style="font-size: 40px; color: #ffffff;">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h5 class="card-title">Manage Users</h5>
                <p class="card-text text-light">View, edit, and manage existing users.</p>
                <?= Html::a('Manage Users', Url::to(['user/index']), ['class' => 'btn btn-light text-primary w-100']) ?>
            </div>
        </div>
    </div>

    <!-- Reports Card -->
    <div class="col-md-4">
        <div class="card shadow-lg border-0 bg-success text-white">
            <div class="card-body text-center">
                <div class="icon mb-3" style="font-size: 40px; color: #ffffff;">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h5 class="card-title">Generate Reports</h5>
                <p class="card-text text-light">Create and view various reports.</p>
                <?= Html::a('View Reports', Url::to(['reports/index']), ['class' => 'btn btn-light text-primary w-100']) ?>
            </div>
        </div>
    </div>
</div>

<?php
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', [
    'depends' => [\yii\web\YiiAsset::class],
]);

// Additional custom styling for cards
$this->registerCss(
    <<<CSS
    .card {
        border-radius: 10px;
    }
    .card-body {
        padding: 20px;
    }
    .icon {
        margin-bottom: 20px;
    }
    .btn {
        font-weight: bold;
        padding: 10px 15px;
    }
CSS
);
?>