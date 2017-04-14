<?php

    class ASiteController extends AController
    {
        public function init()
        {
            parent::init();
            $this->pageTitle = Yii::app()->params->project_name;

        }

        public function actionIndex()
        {
            if (Yii::app()->user->isGuest) {
                $this->redirect(array('/user/login'));
            } else {
                $this->render('index');
            }
        }

        // Uncomment the following methods and override them if needed
        /*
        public function filters()
        {
            // return the filter configuration for this controller, e.g.:
            return array(
                'inlineFilterName',
                array(
                    'class'=>'path.to.FilterClass',
                    'propertyName'=>'propertyValue',
                ),
            );
        }
    */
        public function actions()
        {
            // return external action classes, e.g.:
            return array(
                // captcha action renders the CAPTCHA image displayed on the contact page
                'captcha' => array(
                    'class'   => 'CaptchaExtendedAction',
                    'density' => 10,
                    'lines'   => 15
                    //'backColor'=>0xFFFFFF,
                ),
            );
        }

        /**
         * This is the action to handle external exceptions.
         */
        public function actionError()
        {
            if ($error = Yii::app()->errorHandler->error) {
                if (Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
                else
                    $this->render('error', $error);
            }
        }
    }