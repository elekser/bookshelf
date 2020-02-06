<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

/* js-script to call book info on row click */

//$this->registerJs( 
//	"$('#grid-view tr').on('click',function(){ var id = $(this).data('data-key');var url = '".Url::to(['site/show-book'],true)."?ID=';".
//	"$(location).attr('href',url+id);})",
//	yii\web\View::POS_READY,
//	'row-js');
/*
$this->registerJs( "function tr-click() { ".
	"$('td').click(function (e) { var id = $(this).closest('tr').data('key');".
	"if(e.target == this) location.href = '" .Url::to(['site/show-book']) ."&id=' + id; });".
	"} tr-click();".
	"$(document).on('pjax:success', function() { tr-click(); });",
	yii\web\View::POS_READY,
	'row-js');
*/
?>
<div class="site-index">
    <div class="title">Список книг</div>
    <div class="body-content">
    <?php Pjax::begin(); ?>
	<?= GridView::widget([
	'dataProvider' => $bookshelf,
	'columns' => [
		[ 'attribute' => 'ID', 'label' =>'№ книги'],
		[ 'attribute' => 'TITLE', 'label' => 'Название книги' ],
		[ 'attribute' => 'authorFamily', 'label' =>'Автор', 
			'value' => function ($data) { return $data->authorName.' '.$data->authorFamily; } ],
		[ 'attribute' => 'ISBN', 'label' => 'ISBN' ]
		],
	'layout' => '{items}{summary}{pager}',
	'summary' => 'Показаны записи <strong>{begin}-{end}</strong> из <strong>{totalCount}</strong>.'
	]) ?>
	<!-- LinkPager::widget(['pagination' => $pagination]) -->
    <?php Pjax::end(); ?>
    </div>
</div>

