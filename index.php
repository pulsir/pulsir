<?php

include '_class/boot.php';


?>
<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Pulsir is a simple, open source platform for blogging. It's highly customizable and we only approve the best blogs, so there are no crazy groupies and cactus lovers." />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Blogs, reinvented.</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/pv.css">
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="javascripts/modernizr.foundation.js"></script>

<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,200' rel='stylesheet' type='text/css'>
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->


<script type="text/javascript">
    window._idl = {};
    _idl.variant = "banner";
    (function() {
        var idl = document.createElement('script');
        idl.type = 'text/javascript';
        idl.async = true;
        idl.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'members.internetdefenseleague.org/include/?url=' + (_idl.url || '') + '&campaign=' + (_idl.campaign || '') + '&variant=' + (_idl.variant || 'banner');
        document.getElementsByTagName('body')[0].appendChild(idl);
    })();
</script>


<meta name="google-site-verification" content="lyjU3KsLakf35VgIofkNQbpL_NHLuQJcjY4iUu7VTxw" />


</head>
<?php
	if($_POST['add']):
echo '<div class="alert-box secondary">';
		$obj->add_content($_POST);
echo '<a href="" class="close">&times;</a></div>';
	elseif($_POST['update']):
		$obj->update_content($_POST);
	endif;
if ($_POST['action']=='add'):
$obj->add_user($_POST);
endif;
?>

<body class="home">

<div class="show-for-medium-up hide-for-small"><p><span style="text-align:left;font-family:'Raleway', 'Source Sans Pro', 'Roboto', sans-serif;font-size:27px;margin-right:800px;"><a href="http://pulsir.eu">pulsir</a></span><span style="text-align:right;margin-right:20px;"><a href="http://pulsir.eu/new">New posts</a> </span><span style="text-align:right;margin-right:20px;"><a href="/login">Log in</a></span><span style="text-align:right;margin-right:20px;"><a href="http://support.pulsir.eu">Support</a></p>
</div>

<div class="show-for-small"><p><span style="text-align:left;font-family:'Raleway', 'Source Sans Pro', 'Roboto', sans-serif;font-size:27px;margin-right:300px;"><a href="http://pulsir.eu">pulsir</a></span><span style="text-align:right;margin-right:20px;"><a href="http://pulsir.eu/new">New posts</a> </span><span style="text-align:right;margin-right:20px;"><a href="/login">Log in</a></span><span style="text-align:right;margin-right:20px;"><a href="http://support.pulsir.eu">Support</a></p>
</div>

 <div class="home">

<br>
  <div class="row">
    <div class="twelve columns">
    

<h4 class="home">Tell your story, one post at a time.</h4>

<p class="home">Write the best post you can and leave the tech to us. Follow your favourite bloggers and be a part of discussions.<br>

<a href="http://pulsir.eu/add">Add your first post</a> today or <a href="#getaprofile">open a profile</a>. If you're not in mood for writing, <a href="http://pulsir.eu/new">see what's new</a>.</p>


<img src="http://d.pulsir.eu/hil.png" /><hr>

<a href="/source">But I'm interested in Pulsir source!</a>

</div>
</div> 
</div>
</div>

 <div id="getaprofile">
<div class="row">
<div class="twelve columns">

<a id="getaprofile"></a>
	<center><h4 class="getaprofile">Get your profile.</h4>

   <form action="index.php" method="post" id="hash">

<input type="hidden" name="action" id="action" value="add" />
<div class="row"><div class="six columns">
<input type="text" name="username" id="username" placeholder="Username (choose wisely)" required />
</div><div class="six columns">
<input type="password" name="password" id="password" placeholder="Password (anything you want)" required />
</div><div class="six columns">
<input type="text" name="email" id="email" placeholder="Email (used for Gravatar and notifications)" required />
</div><div class="six columns">
<input type="submit" id="submit" class="medium button" value="Geronimo! &rarr;"><br>
</div></div>
<span class="privacy"><b><a href="/login">I want to log in!</a> / <a href="http://pulsirsupport.tenderapp.com/kb/basic-documentation/why-we-dont-give-everyone-pulsir-blogs">We don't let everybody in.</a></b> <br>Your email won't be shared. <b><a href="http://pulsir.eu/privacy">See our privacy policy &rarr;</a></b><br></span></center>

</div>
</form>
</div>
</div>

<br><br><br><br>

<div class="row">
<h4>Pulsir is... </h4>
<div class="three columns">
<h5><img src="http://d.pulsir.eu/hpi/stopwatch.png" /> Fast</h5>
<p>Pulsir is <i>really</i> fast. Most of the time.</p>
<small>Icon by Ilsur Aptukov, from The Noun Project </small>
</div>
<div class="four columns">
<h5><img src="http://d.pulsir.eu/hpi/open.png"  /> Open source</h5>
<p>And we're open source! <a href="http://github.com/pulsir/pulsir">See the source on Github</a>.</p>
<small>Icon by unknown designer, from The Noun Project </small>
</div>
<div class="three columns">
<h5><img src="http://d.pulsir.eu/hpi/present.png" /> Free</h5>
<p>And always will be. </p>
<small>Icon by Pascual Bilotta, from The Noun Project</small>
</div>
<div class="two columns">
<h5><img src="http://d.pulsir.eu/hpi/paintbrush.png" />It's pretty</h5>
<p>And fully customizable. </p>
<small>Icon by Thomas Le Bas, from The Noun Project</small>
</div>
</div>

<!--End mc_embed_signup-->
</div>
</div>


</div>
</div>
<br><br>
<div id="support">
<div class="row">
<div class="six columns">
<h4 class="support">Need help?</h4>
<p class="support">Let us know! We'll be happy to answer your questions.</p>
</div>
<div class="six columns">
<br>
<a href="http://support.pulsir.eu" class="medium button radius">Visit our support forum</a> 

</div>
</div>
</div>

<div class="bigthing">
<h5>Featured posts</h5>

<div class="row">
<div class="four columns">
<h5><a href="http://pulsir.eu/p?id=371">Hack the shell</a></h5>
<p>Što je to shell?
Shell je poseban interaktivan alat koji omogućava pokretanje programa, obradu teksta, manipulaciju datotekama, manipulaciju datotečnim sustavima, upravljanje procesima, nadzor sustva i još puno toga. Ukratko, glavni posao shella je pretvoriti korisnikove naredbe u jezik razumljiv sustavu... <span class="author">by Lutherus</span></p>
</div>
<div class="four columns">
<h5><a href="http://pulsir.eu/p?id=352">ZTE Blade III - prvih mjesec dana</a></h5>
<p>Sada je već prošlo izvjesno vrijeme otkako sam kupio ZTE Blade III pametni telefon. Pisao sam o njemu na LZS web stranici, svega nekoliko dana nakon kupovine. Moram reći da moje oduševljenje nije splasnulo, jednostavno sam zavolio ovaj mobitel. Brat je također postao vlasnik jednog nakon moje preporuke (on ga je kupio u VIP-u za 999kn, zaključan)... <span class="author">by Ivan Galgoci</span>
</div>
<div class="four columns">
<h5><a href="/new">Your next post</a></h5>
<p>Write a post and it may just get featured here...</p>
</div>
</div>
</div>


  <div class="row">
    <div class="twelve columns" style="text-align:left;">
            <a href="http://pulsir.eu/p?id=380">Terms of Service</a> | <a href="http://pulsir.eu/privacy">Privacy policy</a> | <a href="http://pulsirsupport.tenderapp.com">Support</a> | <a href="http://pulsir.eu/team">Team</a> <br> Friends: <a href="http://internetdefenseleague.org"><img src="http://internetdefenseleague.org/images/badges/final/footer_badge.png" alt="Member of The Internet Defense League" /></a> | <a href="http://linuxzasve.com">Linux za sve</a><br><p><span class="heart" style="color: red;"><3</div></p><br>
 </p>
   
  </div>
  



    
      
 
</div>
  
  <!-- Included JS Files (Uncompressed) -->

  
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
  

  
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>

<style>

.orbit-wrapper .slider-nav span { filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0); opacity: 0; -webkit-transition: opacity 400ms; -moz-transition: opacity 400ms; -o-transition: opacity 400ms; transition: opacity 400ms; }
.orbit-wrapper:hover .slider-nav span { filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100); 
</style>

<!-- legal stuff -->
 <div id="tos" class="reveal-modal">
    <h2>Terms of Service</h2>
    <p>
     To keep Pulsir in order, you need to follow our Terms of Service. By using Pulsir, you agree that you will not:
<ul>
<li>break the laws of Republic of Croatia or the United States (especially discrimination/hatred-related laws, justifying or glorifying illegal acts, breaking copyright, pedophilia, abuse of animals etc.)
<li>advertising (just buy an ad, don<?php echo'\''; ?>t spam, ffs)</li>
<li>post spam</li>
<li>ignore bans, restore delete posts, smash our servers </li>
<li>troll or insult other users or provoke personal arguments</li>
<li>post other users' personal data.</li>
</ul>
All posts are opinions of their authors, not Pulsir itself or its moderators, of VlexoFree hosting or the authors of the Minima platform.
They can't be held responsible for their content, and our moderators are working on deleting posts that break the TOS, but they may not notice some posts or won't notice them at time. Please be aware of that and report all TOS-breaking posts at dev@pulsir.eu
<br><br>
Thanks.    </p>
    <a class="close-reveal-modal">×</a>
  </div></p>
</body>
</html>
            
