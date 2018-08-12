<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

?>
<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Женские платья</h2>
									<p>В нашем магазине на Вас ждут приятные сюпризы! </p>
								
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Пальто</h2>
									<p>Стильно. По доступной цене!  </p>
									
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Блузки</h2>
									<p>Красивые. Легкие. Удобные. </p>
									
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Категории</h2>
                      <ul class="catalog category-products">
<?=  \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
</ul>                          
										
				
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
                   
				<div class="col-sm-9 padding-right">
                                    <?php if(!empty($hits)): ?>
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Популярные товары</h2>
                                                <?php foreach($hits as $hit): ?>
                                                <?php $mainImg = $hit->getImage(); ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
                                                    <?= Html::img($mainImg->getUrl(), ['alt' => $hit->name]) ?>
                                                                                        
											<h2>$<?= $hit->price?></h2>
                                                                                        <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>">
                                                                                                        <?= $hit->name; ?></a></p>
                                                                                        <a href="<?= \yii\helpers\Url::to(['card/add', 'id' => $hit->id]); ?>"
                                                                                          data-id="<?= $hit->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
										</div>
										
                                                                    <?php if($hit->sale): ?>
                                                              <?= Html::img("@web/images/home/sale.png", 
                                                                                                ['alt' => 'Распродажа', 'class' => 'new']);  ?>   
                                                                  <?php endif; ?>
                                                                  <?php if($hit->new): ?>
                                                              <?= Html::img("@web/images/home/new.png", 
                                                                                                ['alt' => 'Новинка', 'class' => 'new']);  ?>   
                                                                  <?php endif; ?>
								</div>

							</div>
						</div>
						<?php endforeach; ?>
					</div><!--features_items-->
					<?php endif; ?>
                                        				
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Рекомендованные товары </h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
                                                         
                                                            <?php $count = count($hits);  $i=0; foreach($hits as $hit): ?> 
                                                            <?php 
                                                                    $image = $hit->getImage();   
                                                             ?>	
                                                            <?php if($i % 3 == 0): ?>
								<div class="item <?php if($i == 0) echo 'active'; ?>">
                                                                    <?php endif; ?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<?= Html::img($image->getUrl(), ['alt' => $hit->name]) ?>
													<h2>$<?= $hit->price; ?></h2>
                                                                                                        <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]);?>">
                                                                                                        <?= $hit->name; ?></a></p>
													<a class="btn btn-default add-to-cart"
                                                                                                           href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $hit->id])?>" 
                                                                                   data-id="<?= $hit->id?>">
                                                                                                            <i class="fa fa-shopping-cart"></i>В корзину</a>
												</div>
											</div>
										</div>
									</div>
								<?php $i++; if($i % 3 == 0 || $i == $count): ?>	
								</div>
                                                             <?php endif; ?>
								<?php endforeach; ?>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>