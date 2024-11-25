<?php

namespace backend\controllers;

use common\models\User;
use common\models\UserSearch;
use frontend\models\SignupForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('userListing', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(Url::to(['site/index']));
        }

        $this->layout = 'blank';

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $user = User::findOne($id);
        // echo "<pre>"; print_r($user); exit();
        $this->layout = 'blank';
        return $this->render('update',[
            'model' => $user,
        ]);
    }
}
