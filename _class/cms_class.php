<?php

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
			$sql = "SELECT * FROM cms_content WHERE id = '$id'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content ORDER BY id DESC LIMIT 0,3";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h1 class="title"> <a href="' . $url , 'p.php?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<p class="meta"><span class="posted">Objavio: ' .$row['author'] . '</span></p>';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div> <div class="fb-like" data-send="false" data-layout="box_count" data-width="450" data-show-faces="true"></div>';
                        echo '<p class="links"><a href="'. $url , 'p.php?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="' . $url ,  'p.php?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       
		}
		else:
			echo '<h1> Ups, ovo ne postoji.</h1> Jeste li zalutali?</p>';
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
                        			echo '<h1 class="title"> <a href="'. $url , 'p.php?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1>';
                        echo '<p class="meta"><span class="posted">[autor: ' .$row['author'] . ']</span></p><hr>';
                        			echo ' <p>' . $row['body'] . '</p></div>';
                        echo '  <a href="?id=' . $row['id'] , '">Permalink</a>';
include 'share.php';
include 'comm.php';
                       
                       
		}
		else:
			echo '<h1> Ups, ovo ne postoji.</h1> Jeste li zalutali?</p>';
		endif;
echo $return;
	
}

function get_profile_iweb($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'iweb [dev]'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'iweb [dev]' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h1 class="title"> <a href="'. $url , 'p.php?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<p class="meta"><span class="posted">Objavio: ' .$row['author'] . '</span></p>';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div> <div class="fb-like" data-send="false" data-layout="box_count" data-width="450" data-show-faces="true"></div>';
                        echo '<p class="links"><a href="'. $url , 'p.php?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="'. $url , 'p.php?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       
		}
		else:
			echo '<h1> Ups, ovo ne postoji.</h1> Jeste li zalutali?</p>';
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
			                        echo '<p class="links"><a href="http://plsr.tk/p.php?id=' . $row['id'] , '">Permalink  <a></p>';
include 'fb_integrate.php';
                       
                       
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

	if(!$title || !$body || !$author):
echo '<p>Neki traženi podatak nedostaje. <a href="index.php"> Pokušajte ponovno </a> </p>' ;
		
	
	else:
	
	$sql = "INSERT INTO cms_content VALUES (null, '$title', '$body', '$email', '$delcode', '$author')";
	$res = mysql_query($sql) or die(mysql_error());
	echo 'Uspješno dodano. Vaša objava će se pokazati na popisu novih objava, gdje možete dobiti link.';

	endif;
	
}
	function manage_content($id = '') {
	echo '<div id="manage">';
	$sql = "SELECT * FROM cms_content ";
	$res = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($res)) :
	?>

	<div>
	<h2 class="title"><?=$row['title']?></h2>
	<span class="actions"><a href="update-content.php?id=<?=$row['id']; ?>">Uredi</a> | <a href="?delete=<?=$row['id']; ?>">Obrisi</a></span>
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
<input type="submit" name="sumbit" value="Azuriraj" />
</form>
<?php	

	}

	function update_content($p) {
	$title = mysql_real_escape_string($p['title']);
	$body = mysql_real_escape_string($p['body']);
	$id = mysql_real_escape_string($p['id']);

	if(!$title || !$body):
echo '<p>Naslov i/ili tekst objave nedostaje. <a href="update-content.php?id='.    $id    .'"> Pokušajte ponovno </a> </p>' ;
		
	
	else:
	
	$sql = "UPDATE cms_content SET title = '$title', body= '$body'  WHERE id = '$id'";
	$res = mysql_query($sql) or die(mysql_error());
	echo 'Uspjesno azurirano.';

	endif;
		
	}
		
		} // Zavrsava class

?>
