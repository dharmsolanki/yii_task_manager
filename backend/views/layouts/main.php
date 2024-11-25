<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            /* background-color: #f0f0f0; */
            background-color: #f0f0f0;
            /* Change this to your desired color */
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #212529;
            /* Dark background for sidebar */
            color: white;
            padding-top: 20px;
            transition: all 0.3s;
        }

        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            font-size: 16px;
        }

        .sidebar a:hover {
            background-color: #007bff;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a.active {
            background-color: #28a745;
            /* Highlight active link */
        }

        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar {
            z-index: 1000;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <?php Pjax::begin() ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center text-white"><?= Yii::$app->name ?></h3>
        <hr class="text-white">
        <a href="<?= Yii::$app->homeUrl ?>" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="<?= Url::to(['user/index']) ?>"><i class="fas fa-users"></i> Users</a>
        <a href="<?= Url::to(['site/logout']) ?>" data-method="post"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">

        <!-- Main Content -->
        <main role="main" class="flex-shrink-0">
            <div class="container mt-4">
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </main>
    </div>
    <?php Pjax::end(); ?>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>