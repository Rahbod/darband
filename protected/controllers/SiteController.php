<?php

class SiteController extends Controller
{
    /**
     * @return array actions type list
     */
    public static function actionsType()
    {
        return array(
            'frontend' => array(
                'index',
                'error',
                'contact',
            )
        );
    }

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&views=FileName
            'page' => array(
                'class' => 'CViewAction',
            )
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        Yii::app()->theme = "frontend";
        $this->layout = "public";

        $pages = Pages::model()->findAll();

        $productCategories = ProductCategories::model()->findAll('type = :type', [':type' => ProductCategories::TYPE_PRODUCT]);
        $slider = Slideshow::model()->findAll();
        $this->render('index', compact('pages', 'productCategories', 'slider'));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        Yii::app()->theme = 'frontend';
        $this->layout = '//layouts/error';
        if($error = Yii::app()->errorHandler->error){
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionContact()
    {
        Yii::import('pages.models.*');
        Yii::app()->getModule('contact');
        Yii::app()->theme = 'frontend';
        $this->layout = '//layouts/inner';
        $model = new ContactForm();
//        $page = Pages::getPageContentWithTitle('تماس با ما');
//        $this->pageBanner = $page->image ?: null;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            $contactModel = new ContactMessages();
            $contactModel->attributes = $_POST['ContactForm'];
            $dep = ContactDepartment::model()->findByPk($contactModel->department_id);
            if ($model->validate() && $contactModel->save()) {
                $siteName = Yii::app()->name;
                $subject = 'Punica Stone - New ' . ucfirst($dep->title). ' Contact Message';
                $body = "<div style='padding:15px;white-space: pre-line'>"
                    . "<p>Body:</p>"
                    . "<p>" . $model->body . "</p>"
                    . "<p>"
                    . "<strong>Sender Name : </strong>" . $model->name . "<br>"
                    . "<strong>Phone Number : </strong>" . $model->tel
                    . "</p><br><br>
                    <p>
                    <strong>For reply click ".
                    CHtml::link("here",
                        Yii::app()->createAbsoluteUrl('/contact/messages/view?id=' . $contactModel->id), array(
                            'style' => 'color:#1aa4de;font-size:12px;text-decoration: underline;'
                        ))
                    ."</strong>
                    </p>
                    <hr>
                    <span style='font-size:10px'>
                    sent by darband restaurant.
                    </span>
                    </div>                  
                    ";
                $receivers = [];
                $receivers[] = SiteSetting::getOption('master_email');
                foreach ($contactModel->department->receivers as $receiver)
                    $receivers[] = $receiver->email;
                Mailer::mail($receivers, $subject, $body, $model->email);
                Yii::app()->user->setFlash('success', '<b>THANK YOU!</b><br>We have received your request and will be in touch shortly.');
                $this->redirect($_POST['return']);
            }
        }

        $this->render('contact', array('model' => $model));
    }

    public function actionMenu()
    {
        $this->pageTitle = 'Download Darband Menu';
        $this->keywords = 'Darband Menu, darband, menu file, menu, foods, foods menu';
        $pdf = SiteSetting::getOption('menu_pdf');
        $path = Yii::getPathOfAlias('webroot') . '/uploads/setting/';
        $url = Yii::app()->getBaseUrl(true) . '/uploads/setting/';
        if ($pdf && is_file($path . $pdf))
            $this->redirect($url . $pdf);
        throw new HttpException("Sorry! File not found.", 404);
    }
}