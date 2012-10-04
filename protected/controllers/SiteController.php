<?php

class SiteController extends Controller {

	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return [
			'captcha' => ['class' => 'CCaptchaAction', 'backColor' => 0xFFFFFF],
			'page' => ['class' => 'CViewAction'],
		];
	}

	public function actionIndex() {
		$page = new Page;
		$user = new User;

//		$this->performAjaxValidation($model);

		if (isset($_POST['Page'])) {
			$stop = false;

			$this_user = (new User)->findByAttributes(['email' => $_POST['User']['email']]);
			if ($this_user)
				$user = $this_user;
			else {
				$email = $_POST['User']['email'];
				$user->attributes = [
					'name'		=> strtok($email, '@'),
					'email'		=> $email,
					'username'	=> $email,
					'password'	=> sha1(''),
				];
				$stop = !$user->save();
			}

			if (!$stop) {
				$this_page = (new Page)->findByAttributes(['url' => $_POST['Page']['url']]);
				if ($this_page)
					$page = $this_page;
				else {
					$page->url = $_POST['Page']['url'];
					$stop = !$page->save();
				}
			}

			if (!$stop) {
				if ((new UserPage)->exists("user_id = $user->id AND page_id = $page->id")) {
					Yii::app()->user->setFlash('info', Yii::t('app', 'You have already requested that.'));
				}
				else {
					$relation = new UserPage;
					$relation->attributes = ['user_id' => $user->id, 'page_id' => $page->id];
					if ($relation->save()) {
						Yii::app()->user->setFlash('success', Yii::t('app', 'Page saved! It will be verified each 15 minutes.'));
					}
					else {
						Yii::app()->user->setFlash('error', Yii::t('app', 'We got an error when saving the page :('));
						Yii::log('Error when saving relation: '.print_r($relation->errors, true), CLogger::LEVEL_ERROR);
					}
				}
			}
		}

		$this->render('index', compact('page', 'user'));
	}

	public function actionError() {
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login', ['model' => $model]);
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

}