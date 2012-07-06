<h1><?=Yii::t('app', 'What page do you wanna track?')?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array('id'=>'page-form', 'enableAjaxValidation'=>true)) ?>

	<p class="note"><?=Yii::t('forms', 'Fields with <span class="required">*</span> are required.')?></p>

	<?=$form->errorSummary($model)?>

	<div class="row">
		<?=$form->labelEx($model,'url')?>
		<?=$form->textField($model,'url',array('size'=>60,'maxlength'=>255))?>
		<?=$form->error($model,'url')?>
	</div>

	<div class="row buttons">
		<?=CHtml::submitButton($model->isNewRecord? Yii::t('forms', 'Create') : Yii::t('forms', 'Save'))?>
	</div>

<? $this->endWidget() ?>

</div><!-- form -->