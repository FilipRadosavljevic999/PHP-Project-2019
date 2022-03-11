<?php
include('view/header.php');
$brojevi=$konekcija->query('SELECT * FROM artikl WHERE kolicina>0')->fetchall();
$broj=count($brojevi);

$limit=6;
$offset=0;
$brojstrana=ceil($broj/$limit); 
if(isset($_GET["stranica"])) {
    $offset = ($_GET["stranica"] - 1) * $limit; 
}
//var_dump($brojstrana);

//var_dump( $_SESSION['korisnik']);
?>

			<section class="header_text sub">
			
				<h4><span>Proizvodi</span></h4>
			</section>
			<section class="main-content">
				
				<div class="row">						
					<div class="span9">								
						<ul class="thumbnails listing-products">
							<?php
							$artikli=$konekcija->query("SELECT a.idartikl AS id,a.vecaslika AS slika,a.naziv AS ime,c.cena AS cena FROM artikl as a INNER JOIN cenovnik as c ON a.idartikl=c.idartikl WHERE c.aktivna=1 AND a.kolicina>0 LIMIT $limit OFFSET $offset")->fetchall();
							//var_dump($artikli);
							foreach($artikli as $a):
							?>

							<li class="span3">
								<div class="product-box">
									<span class="sale_tag"></span>												
									<a href="proizvod.php?id=<?=$a['id']?>"><img alt="" src="img/<?=$a['slika']?>"></a><br/>
									<a href="proizvod.php?id=<?=$a['id']?>" class="title"><?=$a['ime']?></a><br/>
									
									<p class="price">$<?=$a['cena']?></p>
									<?php
									if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']['nazivuloge']=="admin"):
									
									?>
									<a href="models/obrisiartikl.php?id=<?=$a['id']?>" class="title">Obrisi ovaj artikl</a><br/>
									<?php endif?>
								</div>
							</li> 
							<?php endforeach?>      
						
						</ul>								
						<hr>
						<?php?>
						<div class="pagination pagination-small pagination-centered">
							<ul>
								<?php for($i=0;$i<$brojstrana;$i++):?>
								<li><a href="<?= $_SERVER["PHP_SELF"] . "?stranica=" . ($i + 1) ?>"><?= $i+1 ?></a></li>
								<?php endfor?>
								<!-- <li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li> -->
								
							</ul>
						</div>
					</div>
					<!--<div class="span3 col">
						<div class="block">	
							<ul class="nav nav-list">
								<li class="nav-header">SUB CATEGORIES</li>
								<li><a href="products.html">Nullam semper elementum</a></li>
								<li class="active"><a href="products.html">Phasellus ultricies</a></li>
								<li><a href="products.html">Donec laoreet dui</a></li>
								<li><a href="products.html">Nullam semper elementum</a></li>
								<li><a href="products.html">Phasellus ultricies</a></li>
								<li><a href="products.html">Donec laoreet dui</a></li>
							</ul>
							<br/>
							<ul class="nav nav-list below">
								<li class="nav-header">MANUFACTURES</li>
								<li><a href="products.html">Adidas</a></li>
								<li><a href="products.html">Nike</a></li>
								<li><a href="products.html">Dunlop</a></li>
								<li><a href="products.html">Yamaha</a></li>
							</ul>
						</div>
						<div class="block">
							<h4 class="title">
								<span class="pull-left"><span class="text">Randomize</span></span>
								<span class="pull-right">
									<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
								</span>
							</h4>
							<div id="myCarousel" class="carousel slide">
								<div class="carousel-inner">
									<div class="active item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">
													<span class="sale_tag"></span>												
													<img alt="" src="themes/images/ladies/1.jpg"><br/>
													<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
													<a href="#" class="category">Suspendisse aliquet</a>
													<p class="price">$261</p>
												</div>
											</li>
										</ul>
									</div>
									<div class="item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">												
													<img alt="" src="themes/images/ladies/2.jpg"><br/>
													<a href="product_detail.html" class="title">Tempor sem sodales</a><br/>
													<a href="#" class="category">Urna nec lectus mollis</a>
													<p class="price">$134</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="block">								
							<h4 class="title"><strong>Best</strong> Seller</h4>								
							<ul class="small-product">
								<li>
									<a href="#" title="Praesent tempor sem sodales">
										<img src="themes/images/ladies/3.jpg" alt="Praesent tempor sem sodales">
									</a>
									<a href="#">Praesent tempor sem</a>
								</li>
								<li>
									<a href="#" title="Luctus quam ultrices rutrum">
										<img src="themes/images/ladies/4.jpg" alt="Luctus quam ultrices rutrum">
									</a>
									<a href="#">Luctus quam ultrices rutrum</a>
								</li>
								<li>
									<a href="#" title="Fusce id molestie massa">
										<img src="themes/images/ladies/5.jpg" alt="Fusce id molestie massa">
									</a>
									<a href="#">Fusce id molestie massa</a>
								</li>   
							</ul>
						</div>
					</div>//-->
				</div>
			</section>
<?php include('view/footer.php')?>