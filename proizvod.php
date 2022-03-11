<?php
include("view/header.php");
if(!isset($_GET['id'])){
	header('Location:404.php');
}
$id=$_GET['id'];
$upit=$konekcija->prepare("SELECT a.idartikl,a.naziv AS artikl,a.vecaslika,a.kolicina,a.vodootpornost,c.cena,c.aktivna,m.naziv AS mehanizam,p.nazivpola,n.naziv,pr.velicina,v.vrstanaziv FROM (((((artikl AS a INNER JOIN cenovnik AS c ON a.idartikl=c.idartikl)INNER JOIN mehanizam AS m ON a.idmehanizam=m.idmehanizam) INNER JOIN pol AS p ON a.idpol=p.idpol)INNER JOIN narukvica AS n ON a.idnarukvica=n.idnarukvica)INNER JOIN precnik AS pr ON a.idPrecnik=pr.idprecnik)INNER JOIN vrsta AS v ON a.idvrsta=v.idvrsta WHERE a.idartikl=:id AND c.aktivna=1");

$upit->bindParam(":id",$id);
$upit->execute();
$rezultat=$upit->fetchall();

?>
			<section class="header_text sub">
		
				<h4><span>Proizvod detalji</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
							<?php foreach($rezultat as $r):?>
								<img alt="" src="img/<?=$r['vecaslika']?>">											
								
								
							</div>
							<div class="span5">
								<address>
									<strong>Naziv:</strong> <span><?=$r['artikl']?></span><br>
									<strong>Vrsta:</strong> <span><?=$r['vrstanaziv']?></span><br>
									<strong>Vodootpornost:</strong> <span><?=$r['vodootpornost']?></span><br>
									<strong>Mehanizam:</strong> <span><?=$r['mehanizam']?></span><br>	
									<strong>Pol:</strong> <span><?=$r['nazivpola']?></span><br>
									<strong>Precnik:</strong> <span><?=$r['velicina']?> mm</span><br>							
								</address>									
								<h4><strong>Cena: $<?=$r['cena']?></strong></h4>
							</div>
							<?php endforeach?>
							<div class="span5">
								
								<?php if(isset($_SESSION['korisnik'])){?>
													
								<h4 class="title"><span class="text"><strong>Porudžbina</strong> </span></h4>
							<form action="models/poruci.php?id=<?php echo($id)?>" method="post">
						
							
								<div class="control-group">
									<label class="control-label">Ime:</label>
									<div class="controls">
										<input type="text" placeholder="Unesi ime" name="ime" id="username" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Prezime:</label>
									<div class="controls">
										<input type="text" placeholder="Unesi prezime" name="prezime"  id="password" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Adresa:</label>
									<div class="controls">
										<input type="text" placeholder="Unesi adresu" name="adresa"  id="password" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Broj telefona:</label>
									<div class="controls">
										<input type="text" placeholder="Unesi broj telefona" name="broj"  id="password" class="input-xlarge">
									</div>
								</div>
								
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" value="Poruči te">
								</div>
								
							
							</form>
							<?php
								}
								else
								{?>
								<h4 class="title"><span class="text"><a href="register.php"><strong>Morate se ulogovati da bi poručili</strong></a> </span></h4>
								<?php
								};
							?>	
							<?php if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']['nazivuloge']=="admin"):
								?>
							<h4 class="title"><span class="text"><strong>Nova cena</strong> </span></h4>
								<form action="models/novacena.php?id=<?php echo($rezultat[0]['idartikl'])?>" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Cena</label>
									<div class="controls">
										<input type="number" placeholder="Unesi cenu" id="username" class="input-xlarge" name="cena">
									</div>
								</div>
								
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" name="cenadugme "value="Unesi novu cenu"> 
									
									
								</div>
							</fieldset>
						</form>
						<?php endif?>	
									
					
					
					
										
						
					
				
				</div>
			</section>			
			<?php include("view/footer.php")?>
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});
		</script>
    </body>
</html>