<?php
/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Dashboard';
?>
<div class="dashboard-container d-flex">
    <!-- Sidebar -->
    <nav class="sidebar bg-primary text-white p-3" style="width: 250px; min-height: 100vh;">
        <h4 class="text-white mb-4">My Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <?= Html::a('Home', ['/site/index'], ['class' => 'nav-link text-white']) ?>
            </li>

            <li class="nav-item mb-2">
                <?= Html::a('Users', ['/user/index'], ['class' => 'nav-link text-white']) ?>
            </li>
            <li class="nav-item">
                <?= Html::a('Logout', ['/site/logout'], ['class' => 'nav-link text-white', 'data-method' => 'post']) ?>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="content w-100">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container-fluid">
                <span class="navbar-brand">Welcome, User</span>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <?= Html::a('Notifications', ['/notifications'], ['class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('Messages', ['/messages'], ['class' => 'nav-link']) ?>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="container mt-4">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>Welcome to your dashboard. Manage your activities here.</p>

            <div class="row">
                <div class="col-md-4 mt-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Create Single User</h5>
                            <p class="card-text">Add a new user to the system.</p>
                            <?= Html::a('Create User', Url::to(['user/signup']), ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
