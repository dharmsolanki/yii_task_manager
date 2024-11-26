<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
$this->title = 'Task Manager';
$this->registerCssFile('@web/css/sweetalert2.min.css');
$this->registerJsFile('@web/js/sweetalert2.min.js');
?>

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
<div class="site-index">
    <!-- Hero Section with Dark Transparent Overlay -->
    <div class="hero-overlay">
        <div class="container text-center text-light py-5">
            <h1 class="display-4">Welcome to Task Manager</h1>
            <p class="fs-4">An efficient tool to manage your tasks effortlessly.</p>
            <p>
                <!-- Button to navigate to Login Page -->
                <a class="btn btn-primary btn-lg" href="<?= yii\helpers\Url::to(['site/login']) ?>">Login</a>
                <a class="btn btn-outline-light btn-lg" href="<?= yii\helpers\Url::to(['site/signup']) ?>">Register</a>
            </p>
        </div>
    </div>

    <!-- Task Overview Section -->
    <div class="container py-5 text-center">
        <h2 class="text-light">Task Overview</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="card text-light bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Tasks</h5>
                        <p class="card-text">Track all the tasks you've created and managed.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-light bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title">In Progress</h5>
                        <p class="card-text">View tasks that are actively being worked on.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-light bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Completed</h5>
                        <p class="card-text">See the tasks that have been completed.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styling for Dark + Transparent Theme -->
<style>
    body {
        background-color: #121212;
        /* Dark background */
        color: #fff;
    }

    /* Hero section with dark overlay and transparency */
    .hero-overlay {
        background: rgba(0, 0, 0, 0.6);
        /* Transparent dark overlay */
        background-image: url('path_to_your_image.jpg');
        /* Optional: Add background image */
        background-size: cover;
        background-position: center;
        padding: 120px 0;
        color: #fff;
    }

    .card {
        border-radius: 10px;
    }

    .card-body {
        padding: 20px;
    }

    .btn-primary {
        background-color: #1d78d7;
        border: none;
    }

    .btn-outline-light {
        color: #fff;
        border: 2px solid #fff;
    }

    .btn-lg {
        font-size: 1.2rem;
        padding: 12px 30px;
    }

    .container {
        max-width: 1100px;
    }

    .text-light {
        color: #f0f0f0 !important;
    }

    /* Styling for the Hero Text */
    .display-4 {
        font-size: 3rem;
        font-weight: 600;
    }

    .fs-4 {
        font-size: 1.5rem;
        font-weight: 400;
    }
</style>