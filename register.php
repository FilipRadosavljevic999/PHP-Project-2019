<!DOCTYPE html>

<?php 


include('view/header.php');
if(isset($_SESSION['korisnik'])){
	header('Location:404.php');
}
?>		
			<section class="header_text sub">
			
				<h4><span>Login or Regsiter</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
					<div class="span5">					
						<h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
						<form action="models/logovanje.php" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Email</label>
									<div class="controls">
										<input type="text" placeholder="Unesi email" id="username" class="input-xlarge" name="email">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password</label>
									<div class="controls">
										<input type="password" placeholder="Unesi sifru" id="password" class="input-xlarge" name="sifra">
									</div>
								</div>
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" name="logindugme "value="Uloguj se"> 
									<ul>
									<?php
                                            if(isset($_SESSION['greskalogin'])):
                                        ?>
                                            <li><?=$_SESSION['greskalogin']?>
                                            <?php unset($_SESSION['greskalogin']);
                                            ?>
                                            <?php endif;?>
                                        <?php
                                            if(isset($_SESSION['greskalogovanje'])):
                                                foreach($_SESSION['greskalogovanje'] as $g):?>
                                            <li><?=$g?></li>
                                            <?php unset($_SESSION['greskalogovanje']);?>
                                            <?php 
                                                endforeach;
                                            endif;
                                            ?>
									</ul>
									
								</div>
							</fieldset>
						</form>				
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
						<form action="models/registracija.php" method="post" class="form-stacked">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Ime:</label>
									<div class="controls">
										<input type="text" placeholder="Unesi ime,npr:Filip ili Ana Marija" class="input-xlarge" name='ime'>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Prezime:</label>
									<div class="controls">
										<input type="text" placeholder="Unesi prezime,npr:Mitic ili Hadzi Popovic" class="input-xlarge"
										name="prezime">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email:</label>
									<div class="controls">
										<input type="text" placeholder="Unesi email" class="input-xlarge" name="emailreg">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Šifra:</label>
									<div class="controls">
										<input type="password" placeholder="Unesi šifru" class="input-xlarge" name="password">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Potvrda šifre:</label>
									<div class="controls">
										<input type="password" placeholder="Potvrdi šifru" class="input-xlarge" name="potvrda">
									</div>
								</div>							                            
								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Registruj se" name="registerdugme">
								<ul>
								<?php
										if(isset($_SESSION['uspelareg'])):?>
										<li><?=$_SESSION['uspelareg']?>
                                            <?php unset($_SESSION['uspelareg']);
                                            ?>
										<?php endif?>
									
									<?php 
										if(isset($_SESSION['greskabaze'])):
                                        ?>
                                            <li><?=$_SESSION['greskabaze']?>
                                            <?php unset($_SESSION['greskabaze']);
                                            ?>
                                            <?php endif;?>
                                        <?php
                                            if(isset($_SESSION['greskereg'])):
                                                foreach($_SESSION['greskereg'] as $g):?>
                                            <li><?=$g?></li>
                                            <?php unset($_SESSION['greskereg']);?>
                                            <?php 
                                                endforeach;
                                            endif;
                                            ?>

								</ul>
								</div>
							</fieldset>
						</form>					
					</div>				
				</div>
			</section>			
			<?php include('view/footer.php')?>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>		
    </body>
</html>