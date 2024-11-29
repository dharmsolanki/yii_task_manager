<?php

namespace frontend\controllers;

use frontend\models\Task;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class TaskController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'), // Use current time for both columns
            ],
        ];
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate() 
    {
        $model = new Task();
        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save(false)) {
            Yii::$app->session->setFlash('success', 'Task Created.');
            return $this->redirect(['task/create']);
        }
       return $this->render('create',[
        'model' => $model
       ]);
    }
}
