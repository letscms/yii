<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Posts;
use yii\web\HttpException;
use yii\helpers\Url;
class PostController extends Controller
{

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			]
		];
	}

	private function loadModel($id)
	{

		$model = Posts::findOne($id);

		if ($model == NULL)
			throw new HttpException(404, 'Model not found.');

		return $model;
	}

	public function actionDelete($id=NULL)
	{
		$model = $this->loadModel($id);

		if (!$model->delete())
			Yii::$app->session->setFlash('error', 'Unable to delete model');

		$this->redirect(Url::to(['post/index']));
	}
	
	public function actionIndex()
	{
		
		$models = Posts::find()->all();
		echo $this->render('index', array('models' => $models));
	}
	
	public function actionSave($id=NULL)
	{
		if ($id == NULL)
			$model = new Posts;
		else
			$model = $this->loadModel($id);

		if (isset($_POST['Posts']))
		{
			$model->load($_POST);

			if ($model->save())
			{
				Yii::$app->session->setFlash('success', 'Model has been saved');
				$this->redirect(Url::to(['post/index']));
			}
			else
				Yii::$app->session->setFlash('error', 'Model could not be saved');
		}

		echo $this->render('save', array('model' => $model));
	}

}
