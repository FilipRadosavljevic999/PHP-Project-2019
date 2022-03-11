<?php include('view/header.php')?>							
			<section class="google_map">
				<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.536
		948480363!2d20.4574210150479!3d44.8106246848358!2m3!1f0!2f0!3f0!3m
		2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aaebc6241bd%3A0x33aad42c1266e277!2sBalkanska+24%2C+Beo
		grad!5e0!3m2!1sen!2srs!4v1547760037315"></iframe>
			</section>
			<section class="header_text sub">
			
				<h4><span>Kontaktirajte nas</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">				
					<div class="span5">
						<div>
						<?php 
						$rezultat=$konekcija->query('SELECT * FROM podaci')->fetchall();
						
						foreach($rezultat as $r):
						?>
							<h5><strong>Adresa:</strong>&nbsp;<?=$r['adresa']?><br></h5>
							<p><strong>Broj telefona:</strong>&nbsp;<?=$r['broj']?><br>
							<strong>Fax:</strong>&nbsp;<?=$r['fax']?><br>
							<strong>Email:</strong>&nbsp;<?=$r['email']?>							
							</p>
							<br/>
							
							<?php endforeach?>
						</div>
					</div>
					<div class="span7">
						<?php if(isset($_SESSION['korisnik'])){?>
						<p>Napišite poruku:</p>
						<form method="post" action="models/kontakt.php">
							<fieldset>
								
								
				
								
								<div class="clearfix">
									<label for="message"><span>Poruka:</span></label>
									<div class="input">
										<textarea tabindex="3" class="input-xlarge" id="message" name="poruka" rows="7" placeholder="Poruka"></textarea>
									</div>
								</div>
								
								<div class="actions">
									<button tabindex="3" type="submit" class="btn btn-inverse" name='posali'>Pošalji poruku</button>
								</div>
							</fieldset>
							<ul>
								
									
									<?php 
										if(isset($_SESSION['porukauspelo'])):
                                        ?>
                                            <li><?=$_SESSION['porukauspelo']?>
                                            <?php unset($_SESSION['porukauspelo']);
                                            ?>
                                            <?php endif;?>
											<?php
                                            if(isset($_SESSION['greskeporuka'])):
                                                foreach($_SESSION['greskeporuka'] as $g):?>
                                            <li><?=$g?></li>
                                            <?php unset($_SESSION['greskeporuka']);?>
                                            <?php 
                                                endforeach;
                                            endif;
                                            ?>
                                       

								</ul>
						</form>
						<?php
						}
						else
						{?>
						<h4 class="title"><span class="text"><a href="register.php"><strong>Morate se ulogovati da bi poslali poruku</strong></a> </span></h4>
						<?php
						};
						?>
					</div>				
				</div>
			</section>			
<?php include('view/footer.php')?>