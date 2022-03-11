<?php 
include("view/header.php");?>
<section class="main-content">				
				<div class="row">						
					<div class="span9">
                        <?php
                            $autor=$konekcija->query("SELECT * FROM autor")->fetchall();
                            
                        ?>
						<div class="row">
                        <?php foreach($autor as $a):?>
							<div class="span4">
							
								<img alt="" src="img/<?=$a['slika']?>">											
								
								
							</div>
							<div class="span5">
								<address>
									<strong>Podaci:</strong> <span><?=$a['ime']?></span><br>
																
								</address>									
								<h4><strong></strong></h4>
                            </div>
                        <div>
                        <?php endforeach?>
                    </div>
                </div>
</section>
<?php 
include("view/footer.php");
?>