<?php

namespace frontend\controllers;

use frontend\models\Task;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

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
        $tasks = Task::getTasksByUser()->all();
        return $this->render('index', [
            'tasks' => $tasks,
        ]);
    }    

    public function actionCreate()
    {
        $model = new Task();
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save(false)) {
            Yii::$app->session->setFlash('success', 'Task Created.');
            return $this->redirect(['task/index']);
        }
        return $this->render('form', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Task::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException('The requested record does not exist.');
        }

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save(false)) {
            Yii::$app->session->setFlash('success', 'Task Updated');
            return $this->redirect(['task/index']);
        }

        return $this->render('form', [
            'model' => $model
        ]);
    }
}
