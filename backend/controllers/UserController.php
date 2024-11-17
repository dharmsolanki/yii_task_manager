<?php

namespace backend\controllers;

use common\models\User;
use frontend\models\SignupForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = User::find()->where(['status' => User::STATUS_INACTIVE]);
        $provider = new ActiveDataProvider([
           'query' => $query,
           'pagination' => [
              'pageSize' => 10,
           ],
        ]);
        return $this->render('index',[
            'dataProvider' => $provider
        ]);
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', "User Created");
            return $this->redirect(Url::to(['site/index']));
        }

        $this->layout = 'blank';

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

}
