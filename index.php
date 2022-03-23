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
								
								
							</ul>
						</div>
					</div>
				</div>
			</section>
<?php include('view/footer.php')?>
