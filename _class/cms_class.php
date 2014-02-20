<?php



if($notrack !== 1) {
	include 'cc.php';
	if(!$_COOKIE['pllsessionid']){
		$arr = str_split('ABCDEFGHIJKLMNOPRSTUVZQYabcdefghijklmnoprstuvzqy1234567890');
		shuffle($arr);
		$arr = array_slice($arr, 0, rand(3, 58));
		$r = implode('', $arr);
		setcookie('pllsessionid', crypt($r), time()+600);
	}

	echo '<!-- hello! you are reading our source :) we are glad about that :D if you find anything weird or want to contact us, feel free to send us an email at say.hello@pulsir.eu ;) / generated at ' . time() .' on the '  . gethostname() . ' server -->';
if($_COOKIE['cookieconsent'] == 'allow') {
	if($_COOKIE['darkmode'] == 'enabled'){
		echo '<style>body{background-color:#1A2426 !important;}p,div,pre,h1,h2,h3,h4,h5,span,body{color:#fff !important;}</style>';
	}
}
if(!$_GET['nosnow']){
// no snow anyway.
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

		if(mysql_num_rows($res) !=0){
			while($row = mysql_fetch_assoc($res)) {



				echo '<br><br><div class="post"><h3><a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . preg_replace("/</", "&lt;", stripslashes($row['title'])) .  '</a></h3>';

				if($row['author'] == 'anpo'){
					echo '<p class="meta"><span class="posted" style="color:#282828;">Posted anonymously</span></p>';
				}
				else{
					echo '<p class="meta"><span class="posted" style="color:#282828;">Posted by '.$row['author'].'</span></p>';
				}
				echo '<div style="clear: both;">&nbsp;</div>';
				$body = $row['body'];
				$abm = '</i><br><abbr title="Trimmed, click to read in full." /><a href="http://pulsir.eu/p?id=' . $row['id'] . '">(...)</a></abbr>';
				$body = stripslashes(((strlen($body) > 200) ? substr($body,0,197) : $body));
				$body = strip_tags($body, "<p><br></p></br><img></img><ul><li><ol></ul></li></ul>");
				$body = $body.$abm;

				echo '<div class=entry> <p>' . $body, '</p> </div></div>';
				echo '<br><br><hr>';

			}
		} else {
			echo 'Invalid URL manipulation :(';
		}

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
			$sql = "SELECT * FROM cms_content WHERE private = '0' ORDER BY id DESC LIMIT 0,15";
		$loops=1;
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
			echo '{"posts": [';
		while($row = mysql_fetch_assoc($res)) {
			if($loops==15){
				echo '{"post_id": "' . $row['id'] . '" , "post_title": "'  . $row['title'] .  '" , "post_body": "' . htmlentities($row['body']) .' , "post_author": "' . $row['author'] . '" , "post_tags": "'.$row['tags'].'" , "paste": "'.$row['paste'].'" }' ;
			}
			else{
				echo '{"post_id": "' . $row['id'] . '" , "post_title": "'  . $row['title'] .  '" , "post_body": "' . htmlentities($row['body']) .' , "post_author": "' . $row['author'] . '" , "post_tags": "'.$row['tags'].'"  , "paste": "'.$row['paste'].'" },' ;
			}
			$loops=$loops+1;

		}
		echo ']';
		else:
			echo 'mysql_no_results';
		endif;
		echo $return;


	}

	function get_profile_api($user = '') {
		if($user != ''):
			$id = mysql_real_escape_string($id);
		$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";


		else:
			$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";
		endif;



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
			echo '{"posts": [';
		while($row = mysql_fetch_assoc($res)) {
			if($loops==mysql_num_rows($res)){
				echo '{"post_id": "' . $row['id'] . '" , "post_title": "'  . $row['title'] .  '" , "post_body": "' . htmlentities($row['body']) .' , "post_author": "' . $row['author'] . '" , "post_tags": "'.$row['tags'].'" , "paste": "'.$row['paste'].'" }' ;
			}
			else{
				echo '{"post_id": "' . $row['id'] . '" , "post_title": "'  . $row['title'] .  '" , "post_body": "' . htmlentities($row['body']) .' , "post_author": "' . $row['author'] . '" , "post_tags": "'.$row['tags'].'"  , "paste": "'.$row['paste'].'" },' ;
			}


		}
		echo ']';
		else:
			echo 'mysql_no_results';
		endif;
		echo $return;


	}


	function read_content($id = '') {
		if($id != ''){
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE id = '$id'";

		}

		else{
			$sql = "SELECT * FROM cms_content ORDER BY id DESC";
		}



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0){
			while($row = mysql_fetch_assoc($res)) {

				echo '<div class="row"><div class="four columns"><div class="metadata"><h1 class="title"> <b><a href="http://pulsir.eu/p?id=' . $row['id'] , '">'  . stripslashes($row['title']) .  '</a></b></h1>';
				$rid = preg_replace("/[^0-9]/", "", $row['tags']);
				$isr = preg_replace("/[^a-zA-Z]/", "", $row['tags']);
				if($isr == 'reply'){
					if($row['author'] !== 'anpo'){
						echo '<hr> posted by <span class="post-author"><a href="/'.$row['author'].'">' .$row['author'] . '</a></span> as a reply to post <a href="http://pulsir.eu/p?id='.$rid.'">#'.$rid.'</a>';
					}
					else{
						echo '<hr> posted  <span class="post-author">anonymously</span> as a reply to post <a href="http://pulsir.eu/p?id='.$rid.'">#'.$rid.'</a>';
					}
				}
				else{
					if($row['author'] !== 'anpo'){
						echo '<hr> posted by <span class="post-author">' .$row['author'] . ' </span>';
					}
					else{
						echo '<hr> posted <span class="post-author">anonymously</span>';
					}
					if($row['tags'] !== ''){
						echo 'with tag <span class="post-author">'. $row['tags'] . '</span><br>';

					}
				}


				$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
				if(crypt($_COOKIE['plluser'].$_COOKIE['expon'].$_COOKIE['pllgroup'], $salt) == $_COOKIE['psession']):
					if($_COOKIE['plluser']==$row['author']){
						echo '<hr><a href="/moderator/delete-content.php?delete='.$row['id'].'">Delete this post</a>';
					}
					endif;

					echo '</div></div>';
					$rpt = 'reply'.$id.'';
					if($row['private'] !== '1'){
						if($row['paste'] !== '1'){ 

							echo '<div class="eight columns"> <div class="post-body">' . stripslashes($row['body']) . '</div></div></div><div class="row"><div class="twelve columns"><h4>Post replies</h4><p><a href="http://pulsir.eu/add?autotag='.$rpt.'">Add a reply</a><sub>reply tag: '.$rpt.'</sub></br>';
						}
						else{
							echo '<div class="eight columns"> <div class="post-body"><br><div class="alert-box info">This is a paste. Pulsir is not responsible for its contents, and they can be malicious. Be careful. </div><code class="brush: '.$row['tags'].'">' . htmlentities(stripslashes($row['body'])) . '</code></div></div></div><div class="row"><div class="twelve columns"><h4>Post replies</h4><p><a href="http://pulsir.eu/add?autotag='.$rpt.'">Add a reply</a><sub>reply tag: '.$rpt.'</sub></br>';
						}
					}
					else{
						die('This is a private post');
					}

					$rpt = mysql_real_escape_string($rpt);
					$commsql = "SELECT * FROM cms_content WHERE tags = '$rpt'";
					$gc = mysql_query($commsql) or die(mysql_error());
					if(mysql_num_rows($gc) !=0){
						while($row = mysql_fetch_assoc($gc)) {

							echo '<a href="http://pulsir.eu/p?id='.$row['id'].'">'.stripslashes($row['title']).'</a><br>';

						}
					}

					else{
						echo "<strong>No replies yet.</strong>";
					}


				}
			}
			else{
				echo '<h1> Four-oh-four! </h1> That ain\'t here.</p>';
			}


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
					echo " " .stripslashes($row['title']), " — a post on Pulsir";


				}
				else:
					echo "Four-oh-four!";
				endif;
				echo $return;

			}

			function get_user_email($uname = '') {
				if($uname != ''):
					$id = mysql_real_escape_string($id);
				$sql = "SELECT * FROM tblUser WHERE username = '$uname'";

				$return = '';

				else:
					die('No user set. wat');
				endif;



				$res = mysql_query($sql) or die(mysql_error());

				if(mysql_num_rows($res) !=0):
					while($row = mysql_fetch_assoc($res)) {
						return $row['email'];


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







				function get_profile_posts($user = '') {
					if($user != ''):
						$id = mysql_real_escape_string($id);
					$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";


					else:
						$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";
					endif;



					$res = mysql_query($sql) or die(mysql_error());

					if(mysql_num_rows($res) !== 0):
						while($row = mysql_fetch_assoc($res)) {
							if($row['private'] != 1){
								echo '<section class="post"><header class="post-header"><h2 class="post-title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '" id="p'.$row['id'].'">'  . stripslashes($row['title']) .  '</a></h2></header>';
								echo '&nbsp;';
								echo '<div class="post-description">' . stripslashes($row['body']) . '</div></section>';

							}
							else {
							}

						}
						else:
							echo '<h1> :( </h1> This user hasn\'t posted anything yet.</p>';
								endif;
								echo $return;

							}

							function get_profile_latest($user = '') {
								if($user != ''):
									$id = mysql_real_escape_string($id);
								$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC LIMIT 0,15";


								else:
									$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC LIMIT 0,15";
								endif;



								$res = mysql_query($sql) or die(mysql_error());

								if(mysql_num_rows($res) !== 0):
									while($row = mysql_fetch_assoc($res)) {
										if($row['private'] != 1){
											echo '<section class="post"><header class="post-header"><h2 class="post-title"> <a href="http://pulsir.eu/p?id=' . $row['id'] , '" id="p'.$row['id'].'">'  . stripslashes($row['title']) .  '</a></h2></header>';
											echo '&nbsp;';
											echo '<div class="post-description">' . stripslashes($row['body']) . '</div></section>';

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
														echo '<p>' . stripslashes($row['body']) . '</p>';

													}
													else {
													}

												}
												else:
													echo '<h1> :( </h1> This user hasn\'t posted anything yet.</p>';
														endif;
														echo $return;

													}


													function get_tagged_posts($tag = '') {
														if($tag != ''):
															$id = mysql_real_escape_string($id);
														$sql = "SELECT * FROM cms_content WHERE tags = '". $tag ."' ORDER BY id DESC";


														else:
															$sql = "SELECT * FROM cms_content WHERE tags = '". $tag ."' ORDER BY id DESC";
														endif;



														$res = mysql_query($sql) or die(mysql_error());

														if(mysql_num_rows($res) !=0):
															while($row = mysql_fetch_assoc($res)) {

																echo '<h1 class="title">'  . stripslashes($row['title']) .  '</h1>';
																echo '';
																echo '<p>' . stripslashes($row['body']) . '</p>';
																echo '<i>posted by '.$row['author'].'</i>';




															}
															else:
																echo '<h1> :( </h1> No posts are tagged with that.</p>';
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

																	function add_content($p) {

																		$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
																		include 'akismet.php';
																		$WordPressAPIKey = ''; // this is where the API key koes
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
																			$anon = mysql_real_escape_string($p['anon']);
																			$paste = mysql_real_escape_string($p['paste']);
																		}

																		else {
																			$author = mysql_real_escape_string('Guest');
																		}
																		$approved = mysql_real_escape_string($p['approved']);

																		if($anon == 1){
																			$author = 'anpo';
																		}


																		if(!$title || !$body || !$author):
																			echo '
																		<div class="alert-box alert">
																			Something is missing. <a href="index.php"> Reload this page </a>
																			<a href="" class="close">&times;</a>
																		</div>' ;


																		else:

																			$sql = "INSERT INTO cms_content VALUES (null, '$title', '$body', '$author', '$approved', '$tags', '$private', '$paste')";
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
																	<p><h4>Post body:</h4><?=$row['body']?><br><br>Author: <?=$row['author']?>
																		<span class="actions"><a href="update-content.php?id=<?=$row['id']; ?>">Edit</a> | <a href="?delete=<?=$row['id']; ?>">Delete</a> | <a href="http://pulsir.eu/p?id=<?=$row['id'];?>">Posjeti na Pulsiru</a><br><hr class="dotted"></span>
																	</div>
																	<?php
																	endwhile;
																	echo '</div>'; 


																}

																function delete_content($id) {
																	if(!$id) {
																		return false;

																	}else {
																		$id = mysql_real_escape_string($id);
																		$sql = "DELETE FROM cms_content WHERE id = '$id'";
																		$res = mysql_query($sql) or die(mysql_error());
																		echo 'Deleted.';
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
																	echo '<div class="alert-box success">Updated.</div>';

																	endif;
																	
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

																



															}



															?>