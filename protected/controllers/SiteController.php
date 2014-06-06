<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}



public function actionShortLink()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');	
		$real_link = Yii::app()->request->hostInfo . Yii::app()->request->url;
		//echo "real_link = $real_link<br>";
	
		$m_short_link =  ajax::model()->find('short_link=:real_link',array(':real_link' => $real_link));
		if($m_short_link)
		  {
		   //echo $m_short_link->long_link;
		     $this->redirect($m_short_link->long_link);
	      }
	    else
	      {
			echo"<h2 style='color:red;'>Корткая ссылка не существует</h2>";  
		  }	    
	}





    public function actionDetails()
		{
			$ajax_val = Yii::app()->request->getPost('url_a');
			$sh_l = Yii::app()->getSecurityManager()->generateRandomString(5);
			$base_url = Yii::app()->request->baseUrl;
			//$domain = parse_url($x, PHP_URL_HOST);
			$domain = Yii::app()->request->hostinfo;
			$model = new ajax;
			$model->id = '';
			$model->long_link = "$ajax_val";
			$model->short_link = "$domain$base_url/$sh_l";
			$model->save(false);		
			//echo CJSON::encode($x);
			echo"$domain$base_url/$sh_l";
			Yii::app()->end();
		}


  public function filters()
		{
			return array(
				'ajaxOnly + details',
			);
		}






	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}



}
