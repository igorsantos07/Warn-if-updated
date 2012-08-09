<?php

class VerifyCommand extends CConsoleCommand {

	public function actionIndex() {
		Yii::import('ext.mail.*');
		require 'HTTP/Request2.php';

		$pages = Page::model()->with('users')->findAll();
		foreach ($pages as $page) {
			$headers = get_headers($page->url, true);
			$mod = strtotime($headers['Last-Modified']);
			if ($page->last_fetch < $mod) {
				$request = new HTTP_Request2($page->url, HTTP_Request2::METHOD_GET);
				try {
					$response = $request->send();
					$status = $response->getStatus();
					if ($status == 200) {
						/** @todo verify if it's possible to use binary data in mysql, so we could use the binary md5 that's 16b only */
						$current_md5 = md5($response->getBody()/*, true*/);
						if ($current_md5 != $page->last_md5) {
							$page->last_md5 = $current_md5;

							/** @todo find a better way to render the mail content! */
							$mail = new YiiMailMessage('WIU - Uma página foi atualizada!');
							$mail->setBody(eval(file_get_contents(Yii::getPathOfAlias('application.views.emails.updated_page').'.php')), 'text/html');
							$mail->addFrom(Yii::app()->params['email'], 'WIUdroid');
							$mail->addReplyTo(Yii::app()->params['email']);
							$mail->addTo(Yii::app()->params['email']);
							foreach($page->users as $user) $mail->addBcc($user->email, $user->name);
							Yii::app()->mail->send($mail);
						}
					}
					else {
						Yii::log("Unexpected status: $status ".$response->getReasonPhrase()." $page->url", CLogger::LEVEL_WARNING, 'console.verify');
					}
				}
				catch (HTTP_Request2_Exception $e) {
					Yii::log("Unexpected exception: ".  print_r($e, true), CLogger::LEVEL_ERROR, 'console.verify');
				}
				$page->last_fetch = $mod;
				$page->save();
			}
		}
	}

}