<?php

if($notrack !== 1) {
include 'cc.php';
if($_COOKIE['cookieconsent'] = 'allow') {
echo '';
}
}

class modernCMS {

function redirect_to($url)
	{
		header( 'Location:'.$url );
	}
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

$return = '';

		else:
			$sql = "SELECT * FROM cms_content WHERE private = '0' ORDER BY id DESC LIMIT 0,15";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<br><br><div class="post"><h3><a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h3>';
                        echo '<p class="meta"><span class="posted" style="color:#282828;">Published by ' .$row['author'] . '</span></p>';
                        echo '<div style="clear: both;">&nbsp;</div>';
$body = $row['body'];
$abm = '</i><br><abbr title="Trimmed, click to read in full." /><a href="http://pulsir.eu/p?id=' . $row['id'] . '">(...)</a></abbr>';
$body = stripslashes(((strlen($body) > 200) ? substr($body,0,197) : $body));
$body = $body.$abm;

			echo '<div class=entry> <p>' . $body , '</p> </div> <div class="fb-like" data-send="false" data-layout="box_count" data-width="450" data-show-faces="true"></div></div>';
                       echo '<br><br><hr>';
                       
		}
		else:
			echo '<h1> Ups, ovo ne postoji.</h1> Jeste li zalutali?</p>';
		endif;
echo $return;
	
}

function verify_invite($hash = '') {
		if($hash != ''):
			$hash = mysql_real_escape_string($hash);
			$sql = "SELECT * FROM tblInvites WHERE hash = '$hash'" ;

$return = '';

		else:
			die('Invalid invite');
		endif;



		$res = mysql_query($sql) or die(mysql_error());

	
		while($row = mysql_fetch_assoc($res)) {
				if($hash == $row['hash']):
                              
                        	$sechash =  crypt('Valid invite');
                       echo "<!-- ". $sechash . " -->";
						else: 
					die('Invalid invite');
					endif;
		}
	
	
echo $return;
	
}
function get_content_api($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE id = '$id'";
$loops=15;

$return = '';

		else:
			$sql = "SELECT * FROM cms_content ORDER BY id DESC LIMIT 0,15";
$loops=1;
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
echo '{"posts": [';
		while($row = mysql_fetch_assoc($res)) {
if($loops==15){
                        			echo '{"post_id": "' . $row['id'] . '" , "post_title": "'  . $row['title'] .  '" , "post_body": "' . htmlentities($row['body']) .' , "post_author": "' . $row['author'] . '" }' ;
}
else{
                        			echo '{"post_id": "' . $row['id'] . '" , "post_title": "'  . $row['title'] .  '" , "post_body": "' . htmlentities($row['body']) .' , "post_author": "' . $row['author'] . '" },' ;
}
$loops=$loops+1;

		}
echo ']';
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

                        			echo '<div class="row"><div class="four columns"><div class="metadata"><h1 class="title"> <b><a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></b></h1>';
                        echo '<hr> posted by <span class="post-author">' .$row['author'] . '</span> with tag <span class="post-author">'. $row['tags'] . '</span><br>';
$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
if(crypt($_COOKIE['plluser'].$_COOKIE['expon'].$_COOKIE['pllgroup'], $salt) == $_COOKIE['psession']):
if($_COOKIE['plluser']==$row['author']){
echo '<hr><a href="/moderator/delete-content.php?delete='.$row['id'].'">Delete this post</a>';
}
endif;

echo '</div></div>';

                        			echo '<div class="eight columns"> <div class="post-body">' . stripslashes($row['body']) . '</div></div></div>';

                        
include 'ads.php';

                        include 'comm.php';
echo '</div>';


                       
                       
		}
		else:
			echo '<h1> Four-oh-four! </h1> That ain\'t here.</p>';
		endif;
echo $return;
	
}

function get_title($id = '') {
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
                        			echo " " .$row['title'], " — a post on Pulsir";
                        			

}
		else:
			echo "Four-oh-four!";
		endif;
echo $return;

}



function read_content_api($id = '') {
		
$return = '';

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



		 $res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
if($row['private'] != 1){
                        			echo '<h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div> <div class="fb-like" data-send="false" data-layout="box_count" data-width="450" data-show-faces="true"></div>';
}
else {
}
                       
		}
		else:
			echo '<h1> Ups, ovo ne postoji.</h1> Jeste li zalutali?</p>';
		endif;
echo $return;
	
}


function get_profile_heisenberg($id = '') {
		if($id != ''):
			$id = $mysqli->real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'Heisenberg'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'Heisenberg' ORDER BY id DESC";
		endif;



		 $res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo '<h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div> <div class="fb-like" data-send="false" data-layout="box_count" data-width="450" data-show-faces="true"></div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       
		}
		else:
			echo "<h1> Ups.</h1> Ovaj korisnik zasad nije napisao nijedan post. :'( ";
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
if($row['private'] != 1){
                        			echo '<h1 class="title"><h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p.php?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       }
else{
}
		}
		else:
			echo '<h1> Ups.</h1> Ovaj korisnik zasad nije napisao nijedan post. :(</p>';
		endif;
echo $return;
	
}


function get_ivan($id = '') {
		if($id != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = 'Ivan Galgoci'";

$return = '<p><a href="index.php">naslovnica</a></p>';

		else:
			$sql = "SELECT * FROM cms_content WHERE author = 'Ivan Galgoci' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
if($row['private'] != 1){
                        			echo '<h1 class="title"><h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p.php?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       } else {
}
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
if($row['private'] != 1){
                        			echo '<h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p.php?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
} else {
}                       
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
if($row['private']!=1){
                        			echo '<h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p.php?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       } else {
}
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
if($row['private']!=1){
                        			echo '<h1 class="title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '<div style="clear: both;">&nbsp;</div>';
			echo '<div class=entry> <p>' . $row['body'] . '</p> </div>';
                        echo '<p class="links"><a href="http://pulsir.eu/p?id=' . $row['id'] , '">Poveznica na objavu // <a> <a href="http://pulsir.eu/p.php?id=' . $row['id'] , '#disqus_thread">Komentari</a></p>';
                       } else {
}
		}
		else:
			echo '<h1> Ups.</h1> Ovaj korisnik zasad nije napisao nijedan post. :(</p>';
		endif;
echo $return;
	
}

function get_profile_posts($user = '') {
		if($user != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";


		else:
			$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
if($row['private'] != 1){
                        			echo '<h1 class="title"> <a href="/p?id=' . $row['id'] , '">'  . $row['title'] .  '</a></h1 >';
                        echo '&nbsp;';
			echo '' . stripslashes($row['body']) . '';
                     
}
else {
}
                       
		}
		else:
			echo '<h1> :( </h1> This user hasn\'t posted anything yet.</p>';
		endif;
echo $return;
	
}


function get_private_posts($user = '') {
		if($user != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";


		else:
			$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
if($row['private'] != 0){
                        			echo '<h1 class="title">'  . $row['title'] .  '</h1>';
                        echo '';
			echo '<p>' . $row['body'] . '</p>';
                     
}
else {
}
                       
		}
		else:
			echo '<h1> :( </h1> This user hasn\'t posted anything yet.</p>';
		endif;
echo $return;
	
}

function export_profile_posts($user = '') {
		if($user != ''):
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";


		else:
			$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
                        			echo 'Title:'  . $row['title'] .  ' | Permalink: http://pulsir.eu/p?id=' . $row['id'] . '';
                        
			echo 'Post body:' . $row['body'] . '';
                     
                       
		}
		else:
			echo 'Export error: the user has not posted anything.';
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
		
$return = '';

	
echo $return;
	
}

function api_sumski($id = '') {
echo '';		
	
}

function api_vlado($id = '') {
	echo '';
	
}


function api_info($id = '') {
		echo '';
	
}

function api_iweb($id = '') {
	  echo '';
	
}

function api_max360se($id = '') {
		echo '';
	
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
$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
include 'akismet.php';
$WordPressAPIKey = '612375863092';
$MyBlogURL = 'http://pulsir.eu';

$akismet = new Akismet($MyBlogURL ,$WordPressAPIKey);
$akismet->setCommentAuthor($name);
$akismet->setCommentAuthorEmail($email);
$akismet->setCommentAuthorURL($url);
$akismet->setCommentContent($comment);
$akismet->setPermalink('http://pulsir.eu/p');

if($akismet->isCommentSpam())
 echo '
<div class="alert-box alert">
  Akismet thinks this is spam. If it is\'t, drop us an email at dev@pulsir.eu
  <a href="" class="close">&times;</a>
</div>';
else
  // store the comment normally
	$title = mysql_real_escape_string($p['title']);
	$body = mysql_real_escape_string($p['body']);
 if(crypt($_COOKIE['plluser'].$_COOKIE['expon'].$_COOKIE['pllgroup'], $salt) == $_COOKIE['psession']) {
$author = mysql_real_escape_string($_COOKIE['plluser']); 
        $tags = mysql_real_escape_string($p['tags']);
$approved = '';
$private = mysql_real_escape_string($p['private']);
}

else {
$author = mysql_real_escape_string('Guest');
}
        $approved = mysql_real_escape_string($p['approved']);



	if(!$title || !$body || !$author):
echo '
<div class="alert-box alert">
 Something is missing. <a href="index.php"> Reload this page </a>
  <a href="" class="close">&times;</a>
</div>' ;
		
	
	else:
	
	$sql = "INSERT INTO cms_content VALUES (null, '$title', '$body', '$author', '$approved', '$tags', '$private')";
	$res = mysql_query($sql) or die(mysql_error());
	echo '<div class="alert-box success">
 Your post has been added. <a href="http://pulsir.eu/new">Show new posts</a>
  <a href="" class="close">&times;</a>
</div>';

	endif;
	
}

function add_user($p) {

$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';

	$username = mysql_real_escape_string($p['username']);

	$password = mysql_real_escape_string(crypt($p['password'], $salt));
		$email = mysql_real_escape_string($p['email']);

	
	$sql = "INSERT INTO tblUser VALUES (null, '$username', '$password', '$email', '$username', '', '$email', '', 'creators', '', '')";
	$res = mysql_query($sql) or die(mysql_error());
	echo '<div class="alert-box success">
 Great! You can log in and post now, but it may take some time for us to create your profile, private feed and mailbox. We\'ll let you know over email when it\'s ready. 
  <a href="" class="close">&times;</a>
</div>';
}




	function manage_content($id = '') {
	echo '<div id="manage">';
	$sql = "SELECT * FROM cms_content ORDER BY id DESC ";
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
<label for="title">Title:</label>
<input type="text" name="title" id="title" value="<?=$row['title']?>" />
	</div>
	
	<div>
<label for="body">Body:</label>
<textarea name="body" id="body" rows="8" cols="48" ><?=$row['body']?> </textarea>
	</div>
<input type="text" name="approved" id="approved" value="<?=$row['approved']?>" />
<input type="submit" name="sumbit" value="Update" type="button" />
</form>
<?php	

	}

	function update_content($p) {
	$title = mysql_real_escape_string($p['title']);
	$body = mysql_real_escape_string($p['body']);
	$id = mysql_real_escape_string($p['id']);

	if(!$title || !$body):
echo '<div class="alert-box alert"><p>Something is missing. <a href="edit.php?id='.    $id    .'"> Try again </a> </p></div>' ;
		
	
	else:
	
	$sql = "UPDATE cms_content SET title = '$title', body = '$body'  WHERE id = '$id'";
	$res = mysql_query($sql) or die(mysql_error());
	echo '<div class="alert-box success">Uspjesno azurirano.</div>';

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

function is_logged_in()
	{
		return (isset($_SESSION['username']));
	}

	function username()
	{
		
		if(isset($_SESSION['username'])) 
		{
			$username=$_SESSION['username'];
						return $username;
		}
		else {
		echo "";
		}
	}

	


function do_login($username, $password) {

}


		}
		
		
		 // Zavrsava class

?>