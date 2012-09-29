<?php

include '_class/start.php';

?>
<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Pulsir</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="javascripts/modernizr.foundation.js"></script>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

<style type="text/css">
body{
background-image: url('http://d.plsr.tk/b/FernandoGarcaaRedondo.jpg');
}
background-repeat:no-repeat;

div.heart{
color: red;
}

div.intro{
background-color: white;
opacity:0.6;
}

div.post{
background-color: white;
opacity:0.6;
}
</style>

</head>
<body>

  <div class="row">
    <div class="twelve columns">
      <h2></h2>
      <p></p>
      <br />
    </div>
  </div>
 <div id="tos" class="reveal-modal">
    <h2>Uvjeti korištenja</h2>
    <p>
     Kako bismo na Pulsiru održali red i diskusije na prihvatljivom nivou, molimo Vas da se pridržavate uvjeta korištenja. Na Pulsiru je zabranjeno:
<ul>
<li>kršenje zakona Republike Hrvatske (posebno Vam skrećemo pažnju na pozivanje na mržnju ili diskriminaciju, opravdavanje ili veličanje kaznenih dijela, kršenje autorskih prava, te pedofiliju, mučenje životinja i sl.)
<li>reklamiranje usluga, proizvoda i komercijalnih firmi
postanje nepotrebnih i nepoželjnih informacija, informacija nevezanih za temu ili postanje na način koji smanjuje čitljivost foruma (uključuje i neprimjerene naslove)
<li>ometanje rada Pulsira (ignoriranje upozorenja, vraćanje izbrisanih tekstova, razbijanje servera :D)
<li>vrijeđanje sugovornika, namjerno provociranje svađe na osobnom nivou, nekonstruktivnih nacionalnih, vjerskih i sličnih sukoba (trollanje)
<li>objavljivanje privatnih podataka drugih korisnika
</ul>
Svi postovi su mišljenja njihovih autora, a ne samog Pulsira, njegovih moderatora, VlexoFree hostinga, kao ni autora Minima platforme. <br>Oni se ne mogu smatrati odgovornima za njihov sadržaj. <br>Moderatori rade na tome da se nedozvoljeni postovi sankcioniraju, no možda će neke postove previdjeti ili ih neće uočiti na vrijeme. Molimo Vas da imate razumijevanja, i, ako želite pomoći, slobodni ste svaki post za koji smatrate da krši pravila prijaviti moderatorima na report@plsr.tk<br><br>
Zahvaljujemo na pažnji i želimo vam ugodan boravak na Pulsiru.    </p>
    <a class="close-reveal-modal">×</a>
  </div></p>
 <div id="privacy" class="reveal-modal">
    <h2>Privatnost</h2>
    <p>
     Pulsir <strong>ne bilježi</strong> nikakve informacije o korisnicima, osim onih unesenih prilikom dodavanja posta ili komentiranja.<br> Podatci uneseni prilikom posta bit će dostupni javno, dok e-mail adresa unesena prilikom komentiranja će biti dostupna moderatorima, ali neće biti dijeljena s drugima van Pulsir tima niti će biti zloupotrebljena, spamana, pa čak ni kontaktirana. Unošenje iste možete izbjeći prijavom s Facebook ili Twitter profilom. <br> <strong>Ukratko, ništa što ne unesete se ne bilježi, a osobne informacije [koje nisu prikazane] se ne dijele.</strong> </p>
    <a class="close-reveal-modal">×</a>
  </div></p>
  <div class="row">
    <div class="eight columns">
       <small></small> 
<div class="intro"><h1>Brz i jednostavan način za bloganje.</h1><br><h4>Napišite svoj najbolji tekst i dopustite nama da odradimo tehnikalije. </h4></br><p>Prestanite se brinuti zbog tehnikalija. Spavajte mirno znajući da je vaš blog <strong>u dobrim rukama</strong><center><a href="add.php" class="large button">Dodaj post</a></center><br><br></div>
 
  
 <?php
	if(isset($_GET['id'])):
echo '<div class="post">';
		$obj->read_content($_GET['id']);
	else:
	 echo '';
	endif;
?>


 


<?php
	if($_POST['add']):
		$obj->add_content($_POST);
	elseif($_POST['update']):
		echo 'Sorry, ali još si wannabe haxxor. Nećemo ti samo tako dati prava za update sadržaja. <br> -- Hugs and killalls, Pulsir.';
	endif;
?>
<br><br><br><br><hr>
<p> 
  <div class="row">
    <div class="twelve columns">
           <p><a href="http://plsr.tk"><img src="http://pulsir.vlexofree.com/blogs/assets/plsrLogo.png"></a><a href="new.php">Novi postovi</a> | <a href="#" data-reveal-id="tos">Uvjeti korištenja</a> | <a href="#" data-reveal-id="privacy">Privatnost</a></p>
    </div>
  </div>
  
 <hr>

<p>Pokreće Pulsir. <div class="heart">&lt;3</div> Pozadinska fotografija: London Eye by Fernando Garcaa Redondo </p><br>

      
      
      
  
  <!-- Included JS Files (Uncompressed) -->
  <!--
  
  <script src="javascripts/modernizr.foundation.js"></script>
  
  <script src="javascripts/jquery.js"></script>
  
  <script src="javascripts/jquery.foundation.mediaQueryToggle.js"></script>
  
  <script src="javascripts/jquery.foundation.reveal.js"></script>
  
  <script src="javascripts/jquery.foundation.orbit.js"></script>
  
  <script src="javascripts/jquery.foundation.navigation.js"></script>
  
  <script src="javascripts/jquery.foundation.buttons.js"></script>
  
  <script src="javascripts/jquery.foundation.tabs.js"></script>
  
  <script src="javascripts/jquery.foundation.forms.js"></script>
  
  <script src="javascripts/jquery.foundation.tooltips.js"></script>
  
  <script src="javascripts/jquery.foundation.accordion.js"></script>
  
  <script src="javascripts/jquery.placeholder.js"></script>
  
  <script src="javascripts/jquery.foundation.alerts.js"></script>
  
  -->
  
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>
</body>
</html>
            
