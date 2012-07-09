<? $this->pageTitle = 'Main page'; ?>

<h1><?=Yii::t('app', 'What page do you wanna track?')?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'page-form', 'enableAjaxValidation'=>true)) ?>

	<?=$form->errorSummary($page)?>
	<?=$form->errorSummary($user)?>

	<div class="row">
		<?=$form->labelEx($page,'url')?>
		<?=$form->textField($page,'url',array('size'=>60,'maxlength'=>255))?>
		<?=$form->error($page,'url')?>
	</div>

	<div class="row">
		<?=$form->labelEx($user,'email')?>
		<?=$form->textField($user,'email',array('size'=>60,'maxlength'=>255))?>
		<?=$form->error($user,'email')?>
	</div>

	<div class="row buttons">
		<?=CHtml::submitButton(Yii::t('forms', 'Save'))?>
	</div>

<? $this->endWidget() ?>

</div><!-- form -->