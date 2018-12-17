<?php

class ProductsCategoriesController extends Controller
{
	public $layout = '//layouts/column2';
	public $defaultAction = 'admin';

    /**
     * @return array actions type list
     */
    public static function actionsType()
    {
        return array(
            'backend' => array(
                'create',
                'update',
                'admin',
                'delete',
            )
        );
    }

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'checkAccess', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'views' page.
     */
    public function actionCreate()
    {
        $model = new ProductCategories();

        $this->performAjaxValidation($model);

        if (isset($_POST['ProductCategories'])) {
            $model->attributes = $_POST['ProductCategories'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'اطلاعات با موفقیت ثبت شد.');
                $this->redirect(array('admin'));
            } else
                Yii::app()->user->setFlash('failed', 'در ثبت اطلاعات خطایی رخ داده است! لطفا مجددا تلاش کنید.');
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'views' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $this->pageTitle = 'ویرایش دسته بندی';
        $model = $this->loadModel($id);
        $model->setScenario('update');

        if (isset($_POST['ProductCategories'])) {
            $model->attributes = $_POST['ProductCategories'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'عملیات با موفقیت انجام شد.');
                $this->redirect(array('admin'));
            } else
                Yii::app()->user->setFlash('failed', 'درخواست با خطا مواجه است. لطفا مجددا سعی نمایید.');
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new ProductCategories('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductCategories']))
			$model->attributes = $_GET['ProductCategories'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if($id != Yii::app()->user->id)
            $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid views), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ProductCategories the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=ProductCategories::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ProductCategories $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax'] === 'product-categories-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}