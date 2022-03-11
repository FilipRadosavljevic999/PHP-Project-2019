<?php
include('view/header.php');
	if(!isset($_SESSION['korisnik']) && $_SESSION['korisnik']['nazivuloge']!="admin"){
        header('Location:404.php');
    }
?>
<section class="main-content">
    <div class="row">
        <div class="span9">
        <h4><span>Korisnici</span></h4>	
        <div class="col">
            <table class="table table-bordered table-dark" >
                <thead>
                    <tr>
                    <th scope="col">Ime</th>
                    <th scope="col">Prezime</th>
                    <th scope="col">Email</th>
                    <th scope="col">Obrisi</th>
                    
                    </tr>
                </thead>
                <tbody id='korisnici'>
                  
                </tbody>
            </table>
        </div>
        
        <h4><span>Porudžbine</span></h4>	
        <div class="col">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                    <th scope="col">Ime</th>
                    <th scope="col">Prezime</th>
                    <th scope="col">Adresa</th>
                    <th scope="col">Broj telefona</th>
                    <th scope="col">Email Korisnika</th>
                    <th scope="col">Artikl</th>
                    <th scope="col">Obrisi porudzbinu</th>
                    </tr>
                </thead>
                <tbody id='porudzbine'>
                  
                </tbody>
            </table>
        </div>
        <div class="w-100"></div>
        <h4><span>Poruke</span></h4>
        <div class="col">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Poruka</th>
                    <th scope="col">Obrisi poruku</th>
                    
                    </tr>
                </thead>
                <tbody id='poruke'>
                  
                </tbody>
            </table>
        </div>
        
        <div class="col ">
            <h4 class="title">
            <span class="text"><strong>Dodaj artikl</strong> </span></h4>
						<form action="models/dodajartikl.php" method="post" class="form-stacked" enctype="multipart/form-data">
							<fieldset>
                                 <div class="control-group">
									<label class="control-label">Izaberi sliku:</label>
									<div class="controls">
                                        <input type="file" class="form-control-file"  name='slike'>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Ime artikla:</label>
									<div class="controls">
										<input type="text" placeholder="Unesi naziv artikla" class="input-xlarge" name='imeartikla'>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Količina:</label>
									<div class="controls">
										<input type="text" placeholder="Unesi količinu" class="input-xlarge" name='kolicina'>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Vodootpornost:</label>
									<div class="controls">
										<input type="text" placeholder="Unesi vodootpornost" class="input-xlarge" name='otpornost'>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Cena:</label>
									<div class="controls">
										<input type="number" placeholder="Unesi cenu" class="input-xlarge"
										name="cena">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Izaberi vrstu:</label>
									<div class="controls">
                                        <select class="form-control form-control-lg" id='vrste' name='vrste'>
                                            
                                        </select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Izaberi pol:</label>
									<div class="controls">
                                        <select class="form-control form-control-lg" id='pol' name='pol'>
                                            
                                        </select>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Izaberi prečnik:</label>
									<div class="controls">
                                        <select class="form-control form-control-lg" id='precnik' name='precnik'>
                                            
                                        </select>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Izaberi narukvicu:</label>
									<div class="controls">
                                        <select class="form-control form-control-lg" id='narukvica' name='narukvica'>
                                            
                                        </select>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Izaberi mehanizam:</label>
									<div class="controls">
                                        <select class="form-control form-control-lg" id='mehanizam' name='mehanizam'>
                                            
                                        </select>
									</div>
								</div>							                            
								<hr>
								<div class="actions">
                                    <input tabindex="9" class="btn btn-inverse large" type="submit" value="Dodaj artikl" name="dugmeartikl">
                                </div>
								<ul>
								
									
									<?php 
										if(isset($_SESSION['uspeoUnos'])):
                                        ?>
                                            <li><?=$_SESSION['uspeoUnos']?>
                                            <?php unset($_SESSION['uspeoUnos']);
                                            ?>
                                            <?php endif;?>
                                        <?php
                                            if(isset($_SESSION['greskaunos'])):
                                                foreach($_SESSION['greskaunos'] as $g):?>
                                            <li><?=$g?></li>
                                            <?php unset($_SESSION['greskaunos']);?>
                                            <?php 
                                                endforeach;
                                            endif;
                                            ?>

								</ul>
        
        
                                </fieldset>
						</form>					
					</div>				
				</div>	
                					
    </div>
  
    <script src="js/admin.js"></script>
<?php include('view/footer.php');
?>