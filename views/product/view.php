<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

?>
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
							<img src="/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
		<?php 
                  $mainImg = $product->getImage();
                   $gallery = $product->getImages(); 
                 // debug($gallery);
                 
                ?>		
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<?= Html::img($mainImg->getUrl(), ['alt' => $product->name]) ?>
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
                                                            <!-- Wrapper for slides -->
                                                            <div class="carousel-inner">
                                                            <?php $count = count($gallery); $i = 0; foreach ($gallery as $img): ?>
                                                               
                                                                <?php if($i % 3 == 0): ?>
                                                                    <div class="item <?php if($i == 0) echo 'active'; ?>">
                                                                <?php endif; ?>
                                                                    <?= Html::img($img->getUrl('84x85'), ['alt' => '']) ?>
                                                    
                                                                <?php $i++;  if($i % 3 == 0 || $i == $count): ?>     
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                            </div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
                                                    <div class="product-information"><!--/product-information-->

                                                        <?php if ($product->sale): ?>
                                                            <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'newarrival']);
                                                            ?>   
                                                        <?php endif; ?>
                                                        <?php if ($product->new): ?>
                                                            <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'newarrival']);
                                                            ?>   
                                                        <?php endif; ?> 
                                                        <h2><?= $product->name; ?></h2>
                                                        <p>Web ID: 1089772</p>
                                                        <img src="/images/product-details/rating.png" alt="" />
                                                        <span>
                                                            <!--<span>US $<?= $product->price; ?></span>-->
                                                            <label>Количество:</label>
                                                            <input type="text" value="1" id="qty" />
                                                            <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product->id?>" class="btn btn-default add-to-cart cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                В корзину
                                                            </a>
                                                        </span>
                                                        <p><b>Доступность:</b> В наличии</p>
                                                        <p><b>Состояние:</b> Новый</p>
                                                        <p><b>Бренд:</b> <a 
                                                                href="<?= \yii\helpers\Url::to(['category/view', 'id' => $product->category->id]); ?>">
                                                            <?= $product->category->name; ?></a></p>
                                                        
                                                            <img src="/images/product-details/share.png" class="share img-responsive" 
                                                                 alt="" />
                                                            <?= $product->content?>
                                                    </div><!--/product-information-->
                                                </div>
                                        </div><!--/product-details-->					
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">рекомендованные товары</h2>
						
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