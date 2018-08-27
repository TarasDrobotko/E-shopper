<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ItAppAsset;

AppAsset::register($this);
ItAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?> 
    </head><!--/head-->

    <body>
        <?php $this->beginBody() ?>
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +38 066 244 68 56</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> drobotkot@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="https://www.facebook.com/drobotkot123"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://plus.google.com/u/0/110657820951659908228"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="<?= \yii\helpers\Url::home(); ?>">
                                    <?= Html::img('@web/images/home/logo.png', ['alt' => 'E-SHOPPER']); ?>
                                </a>                          
                            </div>

                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <?php if (!Yii::$app->user->isGuest): ?>
                                        <li><a href="<?= \yii\helpers\Url::to('/site/logout'); ?>"><i class="fa fa-user"></i>
                                                <?= Yii::$app->user->identity['username'] ?> (Выход)</a></li>
                                            <?php endif; ?>

                                    <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i>Корзина</a></li>
                                    <li><a href="<?= \yii\helpers\Url::to(['/admin']); ?>"><i class="fa fa-lock"></i>Вход в админку</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="<?= \yii\helpers\Url::home(); ?>" class="active">Домашняя страница</a></li>			
                                    <li><a href="<?= \yii\helpers\Url::to(['site/contact']); ?>">Контакты</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <form method="get" 
                                      action="<?= yii\helpers\Url::to(['category/search']) ?>">
                                    <input type="text" placeholder="Поиск" name="q"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->

        <?= $content; ?>

        <footer id="footer"><!--Footer-->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="companyinfo">
                                <h2><span>e</span>-shopper</h2>
                                <p>Интернет-магазин качесвенной, доступной и стильной одежды.</p>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-sm-3">
                                <div class="video-gallery text-center">

                                    <div class="iframe-img">
                                        <img src="/images/home/iframe1.png" alt="" />
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">

                                    <div class="iframe-img">
                                        <img src="/images/home/iframe2.png" alt="" />
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">

                                    <div class="iframe-img">
                                        <img src="/images/home/iframe3.png" alt="" />
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">

                                    <div class="iframe-img">
                                        <img src="/images/home/iframe4.png" alt="" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="address">
                                <img src="/images/home/map.png" alt="" />
                                <p>г. Луцк, Волынская обл., Украина</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>		

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © <?= date('Y') ?> E-SHOPPER Inc. Все права защищены.</p>
                        <p class="pull-right">Дизайн <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                    </div>
                </div>
            </div>

        </footer><!--/Footer-->

        <?php
        \yii\bootstrap\Modal::begin([
            'header' => '<h2>Корзина</h2>',
            'id' => 'cart',
            'size' => 'modal-lg',
            'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">
                Продолжить покупки</button>
        <a href="' . \yii\helpers\Url::to(['cart/view']) . '" class="btn btn-success">Оформить заказ</a>
        <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>',
        ]);
        \yii\bootstrap\Modal::end();
        ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>