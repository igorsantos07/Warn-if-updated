<?php
	$lang = Yii::app()->language;
	$app_badger = '['.Yii::app()->name.']';
	if (strpos(strtolower($this->pageTitle), $app_badger) === false)
		$this->pageTitle = $this->pageTitle.' '.$app_badger;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=$lang?>" lang="<?=$lang?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?=$lang?>" />

	<title><?=CHtml::encode($this->pageTitle)?></title>

	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?=Yii::app()->request->baseUrl?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<?php
		Yii::app()->clientScript
			->registerCssFile('screen.css', 'screen, projection')
			->registerCssFile('form.css', 'screen, projection')
			->registerCssFile('print.css', 'print')
			->registerScriptfile('/js/main.js', CClientScript::POS_END);
		echo Yii::app()->clientScript->compile('main.cssp');
	?>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<img src="/img/warn-refresh-072.png" alt="logo" />
			<?=Yii::t('app', 'Warn If Updated')?>
		</div>
	</div>

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
//				array('label'=>'Home', 'url'=>array('/site/index')),
//				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
//				array('label'=>'Contact', 'url'=>array('/site/contact')),
//				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
//				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>

	<?php
		if(isset($this->breadcrumbs))
			$this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs));

		if (sizeof($flashes = Yii::app()->user->flashes) > 0) {
			echo CHtml::openTag('div', array('id' => 'flash-messages'));
				foreach($flashes as $key => $message)
					echo CHtml::tag('div', array('class' => "flash-message $key"), $message);
			echo Chtml::closeTag('div');
		}

		echo $content;
	?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?=date('Y')?> by <a href="http://www.igorsantos.com.br">Igor Santos</a><br/>
		All Rights Reserved<br/>
	</div>

</div>

</body>
</html>
