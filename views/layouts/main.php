<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body><?php $this->beginBody() ?>
<div class="wrapper">
	<header class="header" style="background-image: url('<?= URL::to('@web/images/bookshelf-header.jpg',true); ?>'); background-size:cover">
	<a href='<?= URL::to(['site/index']) ?>'><center><?= Html::img('@web/images/bookshelf-title-org.png', ['style' => 'width: auto;']) ?></center></a>
	</header><!-- .header-->
	<main class="content"> <?= $content ?>
	</main><!-- .content -->
</div><!-- .wrapper -->
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer><!-- .footer -->
<?php $this->endBody() ?></body>
</html>
<?php $this->endPage() ?>
