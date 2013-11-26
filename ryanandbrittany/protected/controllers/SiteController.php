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
	
	public function actionAbout()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('about');
	}
	
	public function actionDirections()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('directions');
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
	
	

	/**
	 * Displays the contact page
	 */
	public function actionConfirm()
	{
		$this->layout = "minimal";
		// Declare variables that are needed to default
		$fName = '';
		$lName = '';
		$email = '';
		$meal = 'none';
		$date = 'off';
		$kids = 0;
		$message = 'No content available';
		
		// Set all of the variables to their passed-in values, if
		// available
		if(isset($_POST['fName'])) { $fName = $_POST['fName']; }
		if(isset($_POST['lName'])) { $lName = $_POST['lName']; }
		if(isset($_POST['email'])) { $email = $_POST['email']; }
		if(isset($_POST['meal'])) { $meal = $this->getMeal($_POST['meal']); }		
		$date = isset($_POST['date']) ? "Yes" : "No";		
		if(isset($_POST['kids'])) { $kids = $_POST['kids']; }
		if(isset($_POST['message'])) { $note = $_POST['message']; }
		
		
		$name= $fName . ' ' . $lName;
		$subject='RSVP from ' . $name;
		$headers="From: $name <{$email}>\r\n".
			"Reply-To: {$email}\r\n" .
			"MIME-Version: 1.0\r\n" .
			"Content-Type: text/plain; charset=UTF-8";
		
		// Set the message, provided we have SOMETHING to work with from the form
		if (isset($_POST['fName']) || isset($_POST['lName']) || isset($_POST['email'])) {
			$message = '
RSVP from ' . $fName .  ' ' . $lName . ' (' . $email . ')
Choice of meal: ' . $meal . '
Bringing a date: ' . $date . '
Number of kids: ' . $kids . '
						';
		}
		
		if($date === "Yes")
		{
			$dateName = $_POST['date-0-fName'] . ' ' . $_POST['date-0-lName'];
			$dateMeal = $this->getMeal($_POST['date-0-meal']);
				
			$message .= '
Date: ' . $dateName .'
Meal: ' .$dateMeal . '
';
		}
		
		if ($_POST['kids'] > 0)
		{
			$kidNum = $_POST['kids'];
			$message .= '
'. $kidNum . ' kids:
';
			while($kidNum > 0)
			{
				$message .= '
';
				$kidName = $_POST['kid-' . $kidNum . '-fName'] . ' ' . $_POST['kid-' . $kidNum . '-lName'];
				$kidMeal = $this->getMeal($_POST['kid-' . $kidNum . '-meal']);
				
				$message .= 
'Name: ' . $kidName . ' 
Meal:' . $kidMeal;
				
				$kidNum--;
			}
		}		
		
		if(isset($note))
		{
			$message .= '
Note:
' . $note;
		}

		Yii::app()->user->setFlash('contact',mail("rsvp@ryanandbrittany.com",$subject,$message,$headers) ? "True" : "False");
		
		$this->render('confirm');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function getMeal($mealNum) {
		if ($mealNum == 0) {
			return "Chicken";
		}
		else {
			return "Roast Beef";
		}
	}
}