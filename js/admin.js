$(document).ready(function(){
    console.log("pera");
    $.ajax({
        url : 'models/svikorisnici.php',
        method : 'GET',
        datatype:'json',
        
        success:function(korisnici){
           
           prikaz(korisnici,'korisnici');
           
           
           
           
            
        },
        error: function(xhr, status, statusText){
            console.log(xhr);
            console.log(statusText)
            console.log(status)
            
           
        }        
    });

    $.ajax({
        url : 'models/sveporudzbine.php',
        method : 'GET',
        datatype:'json',
        
        success:function(data){
           console.log(data)
           let prikaz=""
            for(k of data){
                prikaz+=`<tr>
                <td scope="col">${k.ime}</td>
                <td scope="col">${k.prezime}</td>
                <td scope="col">${k.adresa}</td>
                <td scope="col">${k.brojtelefona}</td>
                <td scope="col">${k.email}</td>
                <td scope="col">${k.naziv}</td>
                <td scope="col"><a href='models/obrisipo.php?id=${k.idporudzbina}'>Obrisi porudzbinu</a></td>
                
                
              </tr>`
            }
           document.getElementById('porudzbine').innerHTML=prikaz
           
           
           
            
        },
        error: function(xhr, status, statusText){
            console.log(xhr);
            console.log(statusText)
            console.log(status)
            
           
        }        
    });
    $.ajax({
        url : 'models/poruka.php',
        method : 'GET',
        datatype:'json',
        
        success:function(data){
           console.log(data)
           let prikaz=""
            for(k of data){
                prikaz+=`<tr>
                <td scope="col">${k.email}</td>
                <td scope="col">${k.Poruka}</td>
                <td scope="col"><a href='models/obrisime.php?id=${k.idPoruke}'>Obrisi poruku</a></td>
                
              </tr>`
            }
           document.getElementById('poruke').innerHTML=prikaz
           
           
           
            
        },
        error: function(xhr, status, statusText){
            console.log(xhr);
            console.log(statusText)
            console.log(status)
            
           
        }        
    });
    $.ajax({
        url : 'models/svevrste.php',
        method : 'GET',
        datatype:'json',
        
        success:function(vrste){
            console.log(vrste)
            let prikazvrste=""
            for(v of vrste){
                prikazvrste+=`<option value=${v['idvrsta']}>${v['vrstanaziv']}</option>`
            }
            
            document.getElementById('vrste').innerHTML=prikazvrste;
            
        
        },
        error: function(xhr, status, statusText){
            console.log(xhr);
            console.log(statusText)
            console.log(status)
        }        
    });
    $.ajax({
        url : 'models/svepol.php',
        method : 'GET',
        datatype:'json',
        
        success:function(pol){
            console.log(pol);
            
            let prikazvrste=""
            for(p of pol){
                prikazvrste+=`<option value=${p['idpol']}>${p['nazivpola']}</option>`
            }
            
            document.getElementById('pol').innerHTML=prikazvrste;
            
        
        },
        error: function(xhr, status, statusText){
            console.log(xhr);
            console.log(statusText)
            console.log(status)
        }        
    });
    $.ajax({
        url : 'models/svevelicine.php',
        method : 'GET',
        datatype:'json',
        
        success:function(precnik){
           
            
           let prikazvrste=""
            for(p of precnik){
                prikazvrste+=`<option value=${p['idprecnik']}>${p['velicina']}mm</option>`
            }
           
            
            document.getElementById('precnik').innerHTML=prikazvrste;
            
        
        },
        error: function(xhr, status, statusText){
            console.log(xhr);
            console.log(statusText)
            console.log(status)
        }        
    });
    $.ajax({
        url : 'models/svenarukvice.php',
        method : 'GET',
        datatype:'json',
        
        success:function(narukvice){
           
            console.log(narukvice);
           let prikazvrste=""
            for(n of narukvice){
                prikazvrste+=`<option value=${n['idnarukvica']}>${n['naziv']}</option>`
            }
           
            
            document.getElementById('narukvica').innerHTML=prikazvrste;
            
        
        },
        error: function(xhr, status, statusText){
            console.log(xhr);
            console.log(statusText)
            console.log(status)
        }        
    });
    $.ajax({
        url : 'models/svemahanizam.php',
        method : 'GET',
        datatype:'json',
        
        success:function(mehanizam){
           console.log(mehanizam);
            console.log(mehanizam);
           let prikazvrste=""
            for(m of mehanizam){
                prikazvrste+=`<option value=${m['idmehanizam']}>${m['naziv']}</option>`
            }
           
            
            document.getElementById('mehanizam').innerHTML=prikazvrste;
            
        
        },
        error: function(xhr, status, statusText){
            console.log(xhr);
            console.log(statusText)
            console.log(status)
        }        
    });
   









})//kraj documenata
function prikaz(data,id){
    let prikaz=""
    for(k of data){
        prikaz+=`<tr>
        <td scope="col">${k.ime}</td>
        <td scope="col">${k.prezime}</td>
        <td scope="col">${k.email}</td>
        <td scope="col"><a href='models/obrisikorisnika.php?id=${k.idkorisnik}'>Obrisi korisnika</a></td>
        
        
      </tr>`
    }
   document.getElementById(id).innerHTML=prikaz


}
