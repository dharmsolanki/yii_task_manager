<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Dashboard';
?>

<!-- Main Content -->

<!-- Dashboard Header -->
<h1 class="mb-4"><?= Html::encode($this->title) ?></h1>
<p class="text-muted">Welcome to your dashboard. Manage your activities and tasks here.</p>

<div class="row">
    <!-- Create Task Card -->
    <div class="col-md-4">
        <div class="card shadow-lg border-0 bg-primary text-white">
            <div class="card-body text-center">
                <div class="icon mb-3" style="font-size: 40px; color: #ffffff;">
                    <i class="fas fa-tasks"></i>
                </div>
                <h5 class="card-title">Create Task</h5>
                <p class="card-text text-light">Add new tasks to your project effortlessly.</p>
                <?= Html::a('Create Task', Url::to(['task/create']), ['class' => 'btn btn-light text-primary w-100']) ?>
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
