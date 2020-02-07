<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

?>
<div class="site-index">
    <div class="title">Список книг</div><div class="right"><?= Html::a('Добавить книгу',['site/add-book']) ?></div>
    <div class="grid-view">
    <?php Pjax::begin(); ?>
<?php /* js-script to call book info on row click */
$this->registerJs( "$('td').click( function (e) { ".
	"var id = $(this).closest('tr').data('key'); if(e.target == this) location.href = '" .Url::to(['site/show-book']) ."&id=' + id;".
	"});",
	yii\web\View::POS_READY,
	'row-js');

?>
	<?= GridView::widget([
	'dataProvider' => $bookshelf,
	'columns' => [ 'ID','TITLE',
		[ 'attribute' => 'authorFamily', 'value' => function ($data) { return $data->authorName.' '.$data->authorFamily; } ],
		'STYLE', 'ISBN'],
	'layout' => '{items}<div class="left">{summary}<br>{pager}</div>',
	'summary' => 'Показаны записи <strong>{begin}-{end}</strong> из <strong>{totalCount}</strong>.'
	]) ?>
	<!-- LinkPager::widget(['pagination' => $pagination]) -->
    <?php Pjax::end(); ?>
    </div>
</div>

