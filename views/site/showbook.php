<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;	

?>
<div class="book-info">
    <div class="title">Информация о книге</div>
    <div class="detail-view">
	<?= DetailView::widget([
	'model' => $model,
	'attributes' => [
		'ID', 'TITLE',
		[ 'attribute' => 'authorFamily', 'label' =>'Автор', 
			'value' => function ($data) { return $data->authorName.' '.$data->authorFamily; } ],
		'ISBN','STYLE','DESCR'],
	]) ?>
	<center><?= Html::button('Вернуться на главную страницу',['class'=>'btn btn-primary','onClick'=>'location.href="'.Url::to(['site/index']).'"']); ?></center>
    </div>
</div>

