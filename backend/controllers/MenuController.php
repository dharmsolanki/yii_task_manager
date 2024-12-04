<?php

namespace backend\controllers;

use common\models\Menu;
use Yii;
use yii\data\ActiveDataProvider;

class MenuController extends \yii\web\Controller
{
    public function actionIndex()
    {
        // ActiveDataProvider fetches data from the database with pagination
        $dataProvider = new ActiveDataProvider([
            'query' => Menu::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Menu();
        
        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save(false))
        {
            Yii::$app->session->setFlash('success', 'Menu Created');
            return $this->redirect('index');
        }

        return $this->render('form',[
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Menu::findOne($id);

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save(false))
        {
            Yii::$app->session->setFlash('success', 'Menu Updated');
            return $this->redirect('index');
        }

        return $this->render('form',[
            'model' => $model
        ]);
    }
}
