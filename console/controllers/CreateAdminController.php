<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User; // Adjust namespace if necessary

class CreateAdminController extends Controller
{
    public function actionIndex($username, $email, $password)
    {
        // Create a new user
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();

        if ($user->save()) {
            // Assign the 'admin' role
            $auth = Yii::$app->authManager;
            $adminRole = $auth->getRole('admin');
            if ($adminRole) {
                $auth->assign($adminRole, $user->id);
                echo "Admin user created and assigned the 'admin' role.\n";
            } else {
                echo "Error: Admin role does not exist.\n";
            }
        } else {
            echo "Error creating user: " . implode(", ", $user->getFirstErrors()) . "\n";
        }
    }
}
