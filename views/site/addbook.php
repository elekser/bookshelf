<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

?>
<div class="book-info">
    <div class="title">Добавить книгу</div>
    <div class="add-form">

<?php 
    $form = ActiveForm::begin([
	'id' => 'add-form',
	'layout' => 'horizontal',
	'options' => ['class' => 'form-vertical, form-center'],
	'fieldConfig' => [
		'template' => '{label}{beginWrapper}{input}{endWrapper}',
	]
    ]);
?>
    <?= $form->field($model, 'TITLE') ?>
    <?= $form->field($model, 'authorName') ?>
    <?= $form->field($model, 'authorFamily') ?>
    <?= $form->field($model, 'STYLE') ?>
    <?= $form->field($model, 'ISBN') ?>
    <?= $form->field($model, 'DESCR')->textarea(['rows'=>5,'cols'=>50]) ?>

    <center><?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?></center>
<?php ActiveForm::end() ?>
    </div>
</div>

