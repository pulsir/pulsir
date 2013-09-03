<?php

header('Location: http://pulsir.eu/500');

?>

<?php echo '
<script type="text/javascript">
  var GoSquared = {};
  GoSquared.acct = "GSN-500602-F";
  (function(w){
    function gs(){
      w._gstc_lt = +new Date;
      var d = document, g = d.createElement("script");
      g.type = "text/javascript";
      g.src = "//d1l6p2sc9645hc.cloudfront.net/tracker.js";
      var s = d.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(g, s);
    }
    w.addEventListener ?
      w.addEventListener("load", gs, false) :
      w.attachEvent("onload", gs);
  })(window);
</script>';
?>



<?php
// <div id="tehnotice" class="fixed style="display: block; top: 0px; "">
//    <div class="inner">Važno: <a href="http://pulsir.eu/p?id=143">Pomozite nam dizajnirati Pulsir!</a> (globalna obavijest)</div>
//
//      <div class="shadow" style="display:block;"><span></span></div>
// </div>
// <br>
// <br>
class modernCMS {

	var $host;
	var $username;
	var $password;
	var $db;

	function connect() {
		$con = mysql_connect($this->host, $this->username, $this->password) or die(mysql_error());
		mysql_select_db($this->db, $con) or die(mysql_error());
	}

	function get_content($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content ORDER BY id DESC LIMIT 0,15";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h1><a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1>';
                        echo '<p class="meta"><span class="posted">Autor: ' .$row['author'] . '</span></p>';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div> <div class="fb-like" data-send="false" data-layout="box_count" data-width="450" data-show-faces="true"></div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       
		}
		else:
			echo '<h1> Ups, ovo ne postoji.</h1> Jeste li zalutali?</p>';
		endif;
echo $return;
	
}
function get_content_api($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE approved = 'true'";
echo "posts{{id:'" . $row['id'] , "', title:'"  . $row['title'] .  "',author:" .$row['author'] . "}}";
$return = '';

		else:
			$sql = "SELECT * FROM cms_content WHERE approved = 'true' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo "post{{id:'" . $row['id'] , "', title:'"  . $row['title'] .  "',author:" .$row['author'] . "}}";
                      
                       
		}
		else:
			echo "error{{id:'01',message:'No posts found!'}}";
		endif;
echo $return;
	
}

	function read_content($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE id = '$id'";

$return = '';

		else:
			$sql = "SELECT * FROM cms_content ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1>';
                        echo '<p class="meta"><span class="posted">Autor: ' .$row['author'] . '</span></p><hr>';
                        			echo ' <p>' . $row['body'] . '</p></div>';
                        
include 'ads.php';
                        include 'comm.php';

                       
                       
		}
		else:
			echo '<h1> Ups, ovo ne postoji.</h1> Jeste li zalutali?</p>';
		endif;
echo $return;
	
}

function read_content_api($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE id = '$id'";

$return = '';

		else:
			$sql = "SELECT * FROM cms_content ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo "post{{id:'" . $row['id'] , "',title:'"  . $row['title'] .  "',author:'" .$row['author'] . "',body:'" .$row['body'] , "'}}";
                        			

}
		else:
			echo "error{{id:2,message:'Post not found!'}}";
		endif;
echo $return;
	
}

function get_profile_iweb($id = '') {
		if($id != ''):
			$id = $mysqli->real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'iweb [dev]'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'iweb [dev]' ORDER BY id DESC";
		endif;



		// $res = mysqli_query(mysqli $link) or die(mysql_error());

		if(mysqli_num_rows($res) !=0):
		while($row = mysqli_fetch_assoc($res)) {
                        			echo '<h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div> <div class="fb-like" data-send="false" data-layout="box_count" data-width="450" data-show-faces="true"></div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       
		}
		else:
			echo '<h1> Ups, ovo ne postoji.</h1> Jeste li zalutali?</p>';
		endif;
echo $return;
	
}


function get_profile_max($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'max360se'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'max360se' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h1 class="title"><h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p.php?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       
		}
		else:
			echo '<h1> Ups.</h1> Ovaj korisnik zasad nije napisao nijedan post. :(</p>';
		endif;
echo $return;
	
}

function get_profile_sumski($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'sumski'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'sumski' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p.php?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       
		}
		else:
			echo '<h1> Ups.</h1> Ovaj korisnik zasad nije napisao nijedan post. :(</p>';
		endif;
echo $return;
	
}

function get_profile_jazavac($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'jazavac'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'jazavac' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p.php?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       
		}
		else:
			echo '<h1> Ups.</h1> Ovaj korisnik zasad nije napisao nijedan post. :(</p>';
		endif;
echo $return;
	
}

function get_profile_vlado($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'Vl@do'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'Vl@do' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p.php?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       
		}
		else:
			echo '<h1> Ups.</h1> Ovaj korisnik zasad nije napisao nijedan post. :(</p>';
		endif;
echo $return;
	
}

function get_liveblog_info($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'Info liveblog'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'Info liveblog' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p.php?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       
		}
		else:
			echo '<h1> Ups.</h1> Ovaj liveblog nema još postova, :(</p>';
		endif;
echo $return;
	
}


function api_jazavac($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'jazavac'";

$return = '';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'jazavac' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
 echo "post{{id:'" . $row['id'] , "',title:'"  . $row['title'] .  "',author:'" . $row['author'] . "', body:'" . $row['body'] . "'}}";
                       
                       
		}
		else:
			echo "error{{id:04,message:'No posts found for this profile!'}}";
		endif;
echo $return;
	
}

function api_sumski($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'sumski'";

$return = '';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'sumski' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
 echo "post{{id:'" . $row['id'] , "',title:'"  . $row['title'] .  "',author:'" . $row['author'] . "', body:'" . $row['body'] . "'}}";
                       
                       
		}
		else:
			echo "error{{id:04,message:'No posts found for this profile!'}}";
		endif;
echo $return;
	
}

function api_vlado($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'Vl@do'";

$return = '';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'Vl@do' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
 echo "post{{id:'" . $row['id'] , "',title:'"  . $row['title'] .  "',author:'" . $row['author'] . "', body:'" . $row['body'] . "'}}";
                       
                       
		}
		else:
			echo "error{{id:04,message:'No posts found for this profile!'}}";
		endif;
echo $return;
	
}


function api_info($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'Info liveblog'";

$return = '';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'Info liveblog' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
 echo "post{{id:'" . $row['id'] , "',title:'"  . $row['title'] .  "',author:'" . $row['author'] . "', body:'" . $row['body'] . "'}}";
                       
                       
		}
		else:
			echo "error{{id:04,message:'No posts found for this liveblog!'}}";
		endif;
echo $return;
	
}

function api_iweb($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'iweb [dev]'";

$return = '';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'iweb [dev]' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
 echo "post{{id:'" . $row['id'] , "',title:'"  . $row['title'] .  "',author:'" . $row['author'] . "', body:'" . $row['body'] . "'}}";
                       
                       
		}
		else:
			echo "error{{id:04,message:'No posts found for this profile!'}}";
		endif;
echo $return;
	
}

function api_max360se($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'max360se'";

$return = '';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'max360se' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
 echo "post{{id:'" . $row['id'] , "',title:'"  . $row['title'] .  "',author:'" . $row['author'] . "', body:'" . $row['body'] . "'}}";
                       
                       
		}
		else:
			echo "error{{id:04,message:'No posts found for this profile!'}}";
		endif;
echo $return;
	
}



	function fb_read_content($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE id = '$id'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h1 class="title"> <a href="?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1>';
                        echo '<p class="meta"><span class="posted">Objavio/la: ' .$row['author'] . '</span></p>';
                        echo '<div style="clear: both;">&nbsp;</div>';
                        echo '<div class=entry> <p>' . $row['body'] . '</p> </div>';
			                        echo '<p class="links"><a href="http://pulsir.eu/p.php?id=' . $row['id'] , '">Permalink  <a></p>';
include 'fb_integrate.php';
                       
                       
		}
		else:
			echo '<h1> Ups, ovo ne postoji.</h1> Jeste li zalutali?</p>';
		endif;
echo $return;
	
}

function get_content_mobile() {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE id = '$id'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h2> <a href="?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h2>';
                        echo '<p><span>Objavio: ' .$row['author'] . '</span></p>';
                        echo '<div style="blog-content">&nbsp;';
			echo '<p>' . $row['body'] . '</p> </div> ';
                        echo '<p class="links"><a href="?id=' . $row['id'] , '">Permalink // <a> <a href="?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       
		}
		else:
			echo '<h1> Ups, ovo ne postoji.</h1> Jeste li zalutali?</p>';
		endif;
echo $return;
	
}

	function read_content_mobile($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE id = '$id'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h2 class="title"> <a href="?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h2>';
                        echo '<p class="meta"><span class="posted">Objavio/la: ' .$row['author'] . '</span></p>';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class="blog-content"> <p>' . $row['body'] . '</p> </div> ';
                        echo '<p class="links"><a href="?id=' . $row['id'] , '">Permalink / <a></p>';
include 'comm.php';
                       
                       
		}
		else:
			echo '<h1> Ups, ovo ne postoji.</h1> Jeste li zalutali?</p>';
		endif;
echo $return;
	
}

function add_content($p) {
	$title = mysql_real_escape_string($p['title']);
	$body = mysql_real_escape_string($p['body']);
        $email = mysql_real_escape_string($p['email']);
        $delcode = mysql_real_escape_string($p['delcode']);
        $author = mysql_real_escape_string($p['author']);
        $approved = mysql_real_escape_string($p['approved']);

	if(!$title || !$body || !$author || !$approved):
echo '<p>Neki traženi podatak nedostaje. <a href="index.php"> Pokušajte ponovno </a> </p>' ;
		
	
	else:
	
	$sql = "INSERT INTO cms_content VALUES (null, '$title', '$body', '$email', '$delcode', '$author', $approved)";
	$res = mysql_query($sql) or die(mysql_error());
	echo 'Uspješno dodano. Vaša objava čeka moderaciju, a nakon što je uspješno odobrena, pokazat će se na popisu novih objava.';

	endif;
	
}
	function manage_content($id = '') {
	echo '<div id="manage">';
	$sql = "SELECT * FROM cms_content ";
	$res = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($res)) :
	?>

	<div>
<style>
.dotted { 
border-top: 1px dotted #ffffff;
  color: #fff;
  background-color: #fff;
  height: 5px;
  width:10%;
}
</style>
	<h2 class="title"><?=$row['title']?></h2>
<p><h4>Tijelo posta:</h4><?=$row['body']?><br><br>Autor: <?=$row['author']?>
	<span class="actions"><a href="update-content.php?id=<?=$row['id']; ?>">Uredi</a> | <a href="?delete=<?=$row['id']; ?>">Obrisi</a> | <a href="http://pulsir.eu/p?id=<?=$row['id'];?>">Posjeti na Pulsiru</a><br><hr class="dotted"></span>
	</div>
	<?php
		endwhile;
		echo '</div>'; // Zatvara div "manage"

	
	}

	function delete_content($id) {
		if(!$id) {
			return false;
		
		}else {
		$id = mysql_real_escape_string($id);
		$sql = "DELETE FROM cms_content WHERE id = '$id'";
		$res = mysql_query($sql) or die(mysql_error());
		echo 'Sadrzaj uspjesno izbrisan.';
}
		
	}

function update_content_form($id) {	
	$id = mysql_real_escape_string($id);
	$sql = "SELECT * FROM cms_content WHERE id= '$id'";
	$res = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($res);
?>
<form method="post" action="index.php">
<input type="hidden" name="update" value="true" />
<input type="hidden" name="id" value="<?=$row['id']?>" />	
	<div>
<label for="title">Naslov:</label>
<input type="text" name="title" id="title" value="<?=$row['title']?>" />
	</div>
	
	<div>
<label for="body">Sadrzaj objave:</label>
<textarea name="body" id="body" rows="8" cols="48" ><?=$row['body']?> </textarea>
	</div>
<input type="text" name="approved" id="approved" value="<?=$row['approved']?>" />
<input type="submit" name="sumbit" value="Azuriraj" />
</form>
<?php	

	}

	function update_content($p) {
	$title = mysql_real_escape_string($p['title']);
	$body = mysql_real_escape_string($p['body']);
	$approved = mysql_real_escape_string($p['approved']);
	$id = mysql_real_escape_string($p['id']);

	if(!$title || !$body || !$approved):
echo '<p>Nešto nedostaje. <a href="update-content.php?id='.    $id    .'"> Pokušajte ponovno </a> </p>' ;
		
	
	else:
	
	$sql = "UPDATE cms_content SET title = '$title', body= '$body', approved = '$approved'  WHERE id = '$id'";
	$res = mysql_query($sql) or die(mysql_error());
	echo 'Uspjesno azurirano.';

	endif;
		
	}

function get_latest_iweb() {
if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'iweb [dev]'";

$return = '';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'iweb [dev]' ORDER BY id DESC LIMIT 0,1";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
 echo '<a href="http://pulsir.eu/p?id=' .$row['id'], '">' .$row['title'], '</a>' ;
                       
                       
		}
		else:
			echo "Oops.";
		endif;
echo $return;
}

function get_latest_max() {
if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'max360se'";

$return = '';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'max360se' ORDER BY id DESC LIMIT 0,1";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
 echo '<a href="http://pulsir.eu/p?id=' .$row['id'], '">' .$row['title'], '</a>' ;
                       
                       
		}
		else:
			echo "Oops.";
		endif;
echo $return;
}


function get_latest_vlado() {
if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'Vl@do'";

$return = '';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'Vl@do' ORDER BY id DESC LIMIT 0,1";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
 echo '<a href="http://pulsir.eu/p?id=' .$row['id'], '">' .$row['title'], '</a>' ;
                       
                       
		}
		else:
			echo "Oops.";
		endif;
echo $return;
}
		
		} // Zavrsava class

?>