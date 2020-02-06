<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\DetailView;	

?>
<div class="book-info">
    <div class="title">Информация о книге</div>
    <div class="body-content">
	<?= DetailView::widget([
	'model' => $model,
	'attributes' => [
		[ 'attribute' => 'ID', 'label' =>'№ книги'],
		[ 'attribute' => 'TITLE', 'label' => 'Название книги' ],
		[ 'attribute' => 'authorFamily', 'label' =>'Автор', 
			'value' => function ($data) { return $data->authorName.' '.$data->authorFamily; } ],
		[ 'attribute' => 'ISBN', 'label' => 'ISBN' ],
		[ 'attribute' => 'DESCR', 'label' => 'Аннотация' ],
		],
	]) ?>
    </div>
</div>
