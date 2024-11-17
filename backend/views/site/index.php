<?php
/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Dashboard';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p>
    </div>

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
