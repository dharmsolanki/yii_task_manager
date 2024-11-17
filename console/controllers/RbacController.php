<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // Create roles
        $adminRole = $auth->createRole('admin');
        $adminRole->description = 'Administrator';
        $auth->add($adminRole);

        // Add other roles and permissions if necessary
        echo "RBAC roles initialized.\n";
    }
}
