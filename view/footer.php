<section id="footer-bar">
				<div class="row">
					<div class="span3">
						</div>
					<div class="span4">
						<h4><a href='contact.php'>Kontakt podaci</a></h4>
                        <?php
                        $rezultatfooter=$konekcija->query('SELECT * FROM podaci')->fetchall();
                        
                        ?>
						<ul class="nav">
                           <?php foreach($rezultatfooter as $rf):?>
							<li><a  href='contact.php'>Adresa:&nbsp;<?=$rf['adresa']?></a></li>
							<li><a href="contact.php">Broj telefona:<?=$rf['broj']?></a></li>
							<li><a href="contact.php">Fax:</strong>&nbsp;<?=$rf['fax']?></a></li>
							<li><a href="contact.php">Email:</strong>&nbsp;<?=$rf['email']?>	</a></li>
                          <?php endforeach?>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>

						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>		
    </body>
</html>