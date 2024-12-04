<?php

namespace frontend\controllers;

use frontend\models\Task;
use Yii;
use yii\data\ActiveDataProvider;
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
        // Use ActiveDataProvider instead of fetching all tasks into an array
        $dataProvider = new ActiveDataProvider([
            'query' => Task::getTasksByUser(), // Query to get tasks created by the logged-in user
            'pagination' => [
                'pageSize' => 10, // Adjust page size if needed
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider, // Pass the data provider to the view
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
