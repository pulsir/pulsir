                                                                                                <?php

/**
* PULSIR FUNCTIONS
* most of pulsir functions are stored here
**/

/** this piece of code gives out cookie constent warnings **/
if($notrack !== 1) { // checks if the $notrack variable is set true (it's true on some pages that don't allow warnings to be shown, such as login)
/** gives out csrf tokens to people that aren't logged in **/
if(!$_COOKIE['pllsessionid']){
	$arr = str_split('ABCDEFGHIJKLMNOPRSTUVZQYabcdefghijklmnoprstuvzqy1234567890');
	shuffle($arr);
	$arr = array_slice($arr, 0, rand(3, 58));
	$r = implode('', $arr);
	setcookie('pllsessionid', crypt($r), time()+2700);
}

/** if the person has seen the cookie warning and has dark mode enabled, this will turn the page dark **/
/** this is legacy code **/
if($_COOKIE['cookieconsent'] == 'allow') {
	if($_COOKIE['darkmode'] == 'enabled'){
		echo '<style>body{background-color:#1A2426 !important;}p,div,pre,h1,h2,h3,h4,h5,span,body{color:#fff !important;}</style>';
	}
}
if(!$_GET['nosnow']){
// no snow anyway.
}
}



/** starts the pulsir class. modernCMS is legacy **/

class modernCMS {

	/** database things **/
	var $host;
	var $username;
	var $password;
	var $db;


	function purify($body){
		require_once 'HTMLPurifier.standalone.php';
		$config = HTMLPurifier_Config::createDefault();
    $config->set('Core.Encoding', 'UTF-8'); // replace with your encoding
    $config->set('HTML.Doctype', 'HTML 4.01 Transitional'); // replace with your doctype
    $purifier = new HTMLPurifier($config);
    $body = $purifier->purify($body);
    return $body;
  }

  /** starts the database connection **/
  function connect() {
  	$con = mysql_connect($this->host, $this->username, $this->password) or die(mysql_error());
  	mysql_select_db($this->db, $con) or die(mysql_error());
  }
  /** gets a content list **/
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



  			echo '<article><h2 class="post-title"><a href="p.php?id=' . $row['id'] , '">'  . preg_replace("/</", "&lt;", stripslashes($row['title'])) .  '</a></h2>';

  			if($row['author'] == 'anpo'){
  				echo '<p class="help-block">anonymous post &middot; <a href="/topic/?view='.$row['tags'].'">'.$row['tags'].'</a></p>';
  			}
  			else{
  				echo '<p class="help-block">by <a href="/'.$row['author'].'">'.$row['author'].'</a>';
  				if($row['tags']!=''){
  				echo ' &middot; <a href="/topic/?view='.$row['tags'].'">'.$row['tags'].'</a></p>';
  				}
  			}
  			echo '<div class="post-snip">';
  			$body = $row['body'];
  			$body = stripslashes(((strlen($body) > 200) ? substr($body,0,197) : $body));
				//$body = strip_tags($body, "<p><br></p></br><img></img><ul><li><ol></ul></li></ul>");

  			if($row['tags'] == 'nsfw'){$body = '<b style="color:red;">NSFW</b> This post is not safe for work/school environments and can contain adult content. Be warned.';} 
  			include_once 'Parsedown.php';
  			$Parsedown = new Parsedown();
  			$body = $Parsedown->text(stripslashes($body));
  			$body = $this->purify($body);
        $abm = '</i><br><abbr title="Trimmed, click to read in full." /><a href="p.php?id=' . $row['id'] . '">(...)</a></abbr>';
        $body = $body.$abm;

        echo $body;
  			echo '</div></article><hr>';



  		}

  	} else {
  		echo 'Invalid URL manipulation :(';
  	}

  }




  /** wait, this api works now! **/
  function get_content_api($id = '') {
  	if($id != ''):
  		$id = mysql_real_escape_string($id);
  	$sql = "SELECT * FROM cms_content WHERE id = '$id'";


  	else:
  		$sql = "SELECT * FROM cms_content WHERE private = '0' ORDER BY id DESC LIMIT 0,15";

  	endif;



  	$res = mysql_query($sql) or die(mysql_error());
  	$posts = array();


  	if(mysql_num_rows($res) !=0):
  		while($row = mysql_fetch_assoc($res)) {
  			array_push($posts, $row);

  		}
  		else:
  			echo 'mysql_no_results';
  		endif;
  		$r = json_encode($posts);
// on newer versions of php use JSON_PRETTY_PRINT
  		echo $r;
  	}

  	/** an api for getting posts by a user **/
  	function get_profile_api($user = '') {
  		if($user != ''):
  			$id = mysql_real_escape_string($id);
  		$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";


  		else:
  			$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";
  		endif;



  		$res = mysql_query($sql) or die(mysql_error());

  		$posts = array();


  		if(mysql_num_rows($res) !=0):
  			while($row = mysql_fetch_assoc($res)) {
  				if($private == 0){
  					array_push($posts, $row);
  				}

  			}
  			else:
  				echo 'mysql_no_results';
  			endif;
  			$r = json_encode($posts);
//on newer versions of PHP use JSON_PRETTY_PRINT
  			echo $r;


  		}

  		/** an api for getting posts by a user **/
  		function get_profile_export_api($user = '') {
  			if($user != ''):
  				$id = mysql_real_escape_string($id);
  			$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";


  			else:
  				$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";
  			endif;



  			$res = mysql_query($sql) or die(mysql_error());

  			$posts = array();


  			if(mysql_num_rows($res) !=0):
  				while($row = mysql_fetch_assoc($res)) {
  					array_push($posts, $row);

  				}
  				else:
  					echo 'mysql_no_results';
  				endif;
  				$r = json_encode($posts);
//on newer versions of PHP use JSON_PRETTY_PRINT
  				echo $r;


  			}

  			function get_session_export_api($user = '') {
  				if($user != ''):
  					$id = mysql_real_escape_string($id);
  				$sql = "SELECT * FROM tblSessions WHERE username = '". $user ."' ORDER BY id DESC";
  				else:
  					echo 'mysql_no_results';
  				endif;




  				$res = mysql_query($sql) or die(mysql_error());

  				$posts = array();


  				if(mysql_num_rows($res) !=0):
  					while($row = mysql_fetch_assoc($res)) {
  						array_push($posts, $row);

  					}
  					else:
  						echo 'mysql_no_results';
  					endif;
  					$r = json_encode($posts);
//on newer versions of PHP use JSON_PRETTY_PRINT
  					echo $r;


  				}
  				function get_user_export_api($user = '') {
  					if($user != ''):
  						$id = mysql_real_escape_string($id);
  					$sql = "SELECT * FROM tblUser WHERE username = '". $user ."' ORDER BY id DESC";
  					else:
  						echo 'mysql_no_results';
  					endif;




  					$res = mysql_query($sql) or die(mysql_error());

  					$posts = array();


  					if(mysql_num_rows($res) !=0):
  						while($row = mysql_fetch_assoc($res)) {
  							array_push($posts, $row);

  						}
  						else:
  							echo 'mysql_no_results';
  						endif;
  						$r = json_encode($posts);
//on newer versions of PHP use JSON_PRETTY_PRINT
  						echo $r;


  					}

  					/** a post reading interface **/

  					function read_content($id = '') {
  						include 'Parsedown.php';
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
  								if($row['featured_img']){
  									echo '<style>';
  									echo '.cover{';
  									echo 'background-image: url(\''.$row['featured_img'].'\');';
  									echo 'background-size: cover;';
  									echo 'height: 120px;';
  									echo '}';
  									echo '.post, .replies{';
						//	echo 'background-color:#fff;';
						//	echo 'opacity: 0.9;';
						//	echo '-webkit-filter: blur(-5px) !important;';
  									echo '}';
  									echo '.metadata, .post-body{';
						//	echo 'opacity: 1.0 !important;';
  									echo '}';
  									echo '</style>';
  								}
  								echo '<div class="row"><div class="eleven columns"><div class="cover"></div><div class="post"><div class="metadata"><h1 class="title"> <b><a href="p.php?id=' . $row['id'] , '">'  . stripslashes($row['title']) .  '</a></b></h1>';
  								$rid = preg_replace("/[^0-9]/", "", $row['tags']);
  								$isr = preg_replace("/[^a-zA-Z]/", "", $row['tags']);
  								if($isr == 'reply'){
  									if($row['author'] !== 'anpo'){
  										echo '<br><span class="post-author"><img src="http://www.gravatar.com/avatar/'.$this->get_user_gravatar($row['author']).'?r=pg&d=identicon&s=64" style="height:24px;" /> <a href="/'.$row['author'].'">' .$row['author'] . '</a></span> as a reply to post <a href="p.php?id='.$rid.'">#'.$rid.'</a><hr>';
  									}
  									else{
  										echo '<br> posted  <span class="post-author">anonymously</span> as a reply to post <a href="p.php?id='.$rid.'">#'.$rid.'</a><hr>';
  									}
  								}
  								else{
  									if($row['author'] !== 'anpo'){
  										echo '<br><span class="post-author"><img src="http://www.gravatar.com/avatar/'.$this->get_user_gravatar($row['author']).'?r=pg&d=identicon&s=64" style="height:24px;" class="user-pic-post" /> <a href="/' .$row['author'] . '">'.$row['author'].'</a> </span></hr>';
  									}
  									else{
  										echo '<br> posted <span class="post-author">anonymously</span> ';
  									}
  									if($row['tags'] == 'pulsatingbits'){
  										echo '&middot; <a href="http://pulsatingbits.pulsir.eu"><span class="post-blog">Pulsating Bits</a></span>, the Pulsir team blog.<br><hr>';

  									}
  									elseif($row['tags'] !== ''){
  										echo '&middot; <a href="/topic/?view='.$row['tags'].'"><span class="post-author">'. $row['tags'] . '</a></span><br><hr>';

  									}
  								}

  								if(($this->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) == 0) && (strtolower($_COOKIE['plluser']) == strtolower($row['author']))){
  									echo '<form action="update.php" method="post"><input type="hidden" name="token" value="'.$this->get_session_csrf($_COOKIE['psid']).'"><input type="hidden" name="delete" value="'.$row['id'].'"><a href="add.php?update='.$row['id'].'">update post</a><input type="submit" class="btn btn-link" value="&#x2715; delete post"></form>';
  								}

  								$rpt = 'reply'.$id.'';
  								if($row['private'] !== '1'){
  									if($row['paste'] !== '1'){ 
  										$Parsedown = new Parsedown();
  										$body = $Parsedown->text(stripslashes($row['body']));
  										if($row['paste'] == 0){$body = $this->purify($body);}

  										echo '<div class="post-body">' . $body . '</div><hr> <div class="replies"><h4>Post replies</h4><p><a href="add.php?autotag='.$rpt.'"><i class="fa fa-reply"></i> Add your thoughts</a><br><sub>or tag your post with '.$rpt.' to reply.</sub></br></div>';
  									}
  									else{
  										echo '<code class="brush: '.$row['tags'].'">' . htmlspecialchars(stripslashes($row['body'])) . '</code><hr><h4>Post replies</h4><p><a href="add.php?autotag='.$rpt.'"><i class="fa fa-reply"></i> Add your thoughts</a><br><sub>or tag your post with '.$rpt.' to reply.</sub></br></div>';
  									}
  								}
  								else{
  									die('This is a private post');
  								}

  								$this->get_post_replies($rpt, 'read_content');

								$this->get_user_css($row['author']);
  							}
  						}
  						else{
  							echo '<h1> Four-oh-four! </h1> That ain\'t here.</p>';
  						}


  					}

  					/** a spin-off function of read_content for getting post replies, $rpt is the reply tag, $caller is the function that calls this **/
  					function get_post_replies($rpt, $caller) {
  						$rpt = mysql_real_escape_string($rpt);
  						$commsql = "SELECT * FROM cms_content WHERE tags = '$rpt'";
  						$gc = mysql_query($commsql) or die(mysql_error());
  						if(mysql_num_rows($gc) !=0){
  							while($row = mysql_fetch_assoc($gc)) {

  								echo '<div class="reply"><a href="p.php?id='.$row['id'].'">'.stripslashes($row['title']).'</a><br>';
  								if($row['author'] == 'anpo'){
  									echo '<p class="help-block">anonymous post</p>';
  								}
  								else{
  									echo '<p class="help-block">by <a href="/'.$row['author'].'">'.$row['author'].'</a></p>';
  								}
  								echo '<div class="post-snip">';
  								$body = $row['body'];
  								$body = $this->purify($body);
  								$abm = '<br><abbr title="Trimmed, click to read in full." /><a href="p.php?id=' . $row['id'] . '">(...)</a></abbr>';
  								$body = stripslashes(((strlen($body) > 200) ? substr($body,0,197) : $body));
  								$body = strip_tags($body, "");
  								$body = $body.$abm;
  								echo '</div>';
  								echo $body;
  								$rr = 'reply'.$row['id'];
  								$this->get_post_replies($rr, 'get_post_replies');
  								echo '</div>';

  							}
  						}

  						else{
  							if($caller != 'get_post_replies'){
  								echo "<strong>No replies yet.</strong>";
  							}
  						}
  					}

  					/** a more simple content reading interface, designed for embedded blogs such as pulsating bits **/
  					function read_content_simple($id = '') {
  						include 'Parsedown.php';
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
  								if($row['featured_img']){
  									echo '<style>';
  									echo 'body{';
  									echo 'background-image: url(\''.$row['featured_img'].'\');';
  									echo '}';
  									echo '.post, .replies{';
  									echo 'background-color:#fff;';
  									echo 'opacity: 0.9;';
  									echo '}';
  									echo '.metadata, .post-body{';
  									echo 'opacity: 1.0 !important;';
  									echo '}';
  									echo '</style>';
  								}
  								echo '<div class="post"><div class="metadata"><h1 class="title"> <b><a href="p.php?id=' . $row['id'] , '">'  . stripslashes($row['title']) .  '</a></b></h1><div class="author">posted by <img src="http://api.pulsir.eu/pic?who='.$row['author'].'" style="border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;width:24px;">'.$row['author'].'</div></div><hr>';





  								$Parsedown = new Parsedown();
  								$body = $Parsedown->text(stripslashes($row['body']));
  								$body = $this->purify($body);


  								echo '<div class="post-body">' . $body . '</div></div>';



  							}
  						}
  						else{
  							echo '<h1> Four-oh-four! </h1> That ain\'t here.</p>';
  						}


  					}


  					/** gets the post title **/
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
  								return $this->purify(stripslashes($row['title']));


  							}
  							else:
  								echo "Four-oh-four!";
  							endif;
  							echo $return;

  						}

  						/** gets post metadata, @tm it's only noindex **/
  						function get_meta($id = '') {
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
  									if($row['noindex'] == 1){
  										echo '<meta name="robots" content="noindex">';
  									}


  								}
  								else:
  									echo "Four-oh-four!";
  								endif;
  								echo $return;

  							}

  							/** gets the featured image **/
  							function get_featured_image($id = '') {
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

  										return $this->purify($row['featured_img']);

  									}
  									else:
  										return 10;
  									endif;
  									echo $return;

  								}

  								/** gets the email for a specified user **/
  								function get_user_email($uname = '') {
  									if($uname != ''):
  										$id = mysql_real_escape_string($id);
  									$sql = "SELECT * FROM tblUser WHERE username = '$uname'";


  									else:
  										die('No user set. wat');
  									endif;



  									$res = mysql_query($sql) or die(mysql_error());

  									if(mysql_num_rows($res) !=0):
  										while($row = mysql_fetch_assoc($res)) {
  											return $row['email'];


  										}
  										else:
  											die(header('Location: '.domainroot.'404.php'));
  										endif;

  									}

  									/** gets a gravatar hash for a specified user **/
  									function get_user_gravatar($uname = '') {
  										if($uname != ''):
  											$id = mysql_real_escape_string($id);
  										$sql = "SELECT * FROM tblUser WHERE username = '$uname'";


  										else:
  											die('No user set. wat');
  										endif;



  										$res = mysql_query($sql) or die(mysql_error());

  										if(mysql_num_rows($res) !=0):
  											while($row = mysql_fetch_assoc($res)) {
  												return md5(strtolower(trim($row['email'])));



  											}
  											else:
  												die('That user does not exist. :(');
  													endif;

  												}

  												/** gets custom css defined by user **/
  												function get_user_css($uname = '') {
  													if($uname != ''):
  														$id = mysql_real_escape_string($id);
  													$sql = "SELECT * FROM tblUser WHERE username = '$uname'";


  													else:
  														die('No user set. wat');
  													endif;



  													$res = mysql_query($sql) or die(mysql_error());

  													if(mysql_num_rows($res) !=0):
  														while($row = mysql_fetch_assoc($res)) {
  															echo '<style>'.$this->purify($row['cucss']).'</style>';


  														}
  														else:
  															die('That user does not exist. :(');
  																endif;

  															}

                                /** gets rawcustom css defined by user **/
                          function get_user_raw_css($uname = '') {
                            if($uname != ''):
                              $id = mysql_real_escape_string($id);
                            $sql = "SELECT * FROM tblUser WHERE username = '$uname'";


                            else:
                              die('No user set. wat');
                            endif;



                            $res = mysql_query($sql) or die(mysql_error());

                            if(mysql_num_rows($res) !=0):
                              while($row = mysql_fetch_assoc($res)) {
                                echo $this->purify($row['cucss']);


                              }
                              else:
                                die('That user does not exist. :(');
                                  endif;

                                }


/** gets the badges a user has. if the verif value equals one, it shows a simple verified simbol and if it equals two, it shows a hammer representing a team mebmer
* at the moment, this is only meant for pulsir.eu usage and should be rewritten to allow better usage by self-hosted sites.
**/
function get_user_badges($uname = '') {
	if($uname != ''):
		$id = mysql_real_escape_string($id);
	$sql = "SELECT * FROM tblUser WHERE username = '$uname'";


	else:
		die('No user set. wat');
	endif;



	$res = mysql_query($sql) or die(mysql_error());

	if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
			if($row['verif']=='1'){
				echo '<img src="http://d.pulsir.eu/check.png" style="height:16px;" alt="Verified" title="This is a verified user" />';
			}
			if($row['verif']=='2'){
				echo '<img src="http://d.pulsir.eu/icon_4211.svg" style="height:16px;" alt="Developer" title="This is a Pulsir developer" />';
			}


		}
		else:
			die('That user does not exist. :(');
				endif;
				echo $return;

			}

			/** gets a user profile **/

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
							echo '<section class="post"><header class="post-header"><h2 class="post-title"> <a href="p.php?id=' . $row['id'] , '" id="p'.$row['id'].'">'  . stripslashes($row['title']) .  '</a></h2></header>';
							echo '&nbsp;';
							$body = $row['body'];
							include_once 'Parsedown.php';
							$Parsedown = new Parsedown();
							$body = $Parsedown->text(stripslashes($body));
							$body = $this->purify($body);
							echo '<div class="post-description">' . $body . '</div></section>';

						}
						else {
						}

					}
					else:
						echo '<h1> :( </h1> This user hasn\'t posted anything yet.</p>';
							endif;
							echo $return;

						}

						/** gets the latest 15 posts by a user **/
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
										echo '<section class="post"><header class="post-header"><h2 class="post-title"> <a href="p.php?id=' . $row['id'] , '" id="p'.$row['id'].'">'  . stripslashes($row['title']) .  '</a></h2></header>';
										echo '&nbsp;';
										$body = $row['body'];
										include_once 'Parsedown.php';
										$Parsedown = new Parsedown();
										$body = $Parsedown->text(stripslashes($body));
										$body = $this->purify($body);
										echo '<div class="post-description">' . $body . '</div></section>';

									}
									else {
									}

								}
								else:
									echo '<h1> :( </h1> This user hasn\'t posted anything yet.</p>';
										endif;
										echo $return;

									}

									/** gets the titles of the users 15 latest posts **/
									function get_profile_latest_titles($user = '') {
										if($user != ''):
											$id = mysql_real_escape_string($id);
										$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC LIMIT 0,15";


										else:
											$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC LIMIT 0,15";
										endif;



										$res = mysql_query($sql) or die(mysql_error());

										if(mysql_num_rows($res) !== 0):

											echo '<ul class="postlist">';
										while($row = mysql_fetch_assoc($res)) {
											if($row['private'] != 1){
												echo '<li class="postlistitem"><a href="p.php?id=' . $row['id'] , '" id="p'.$row['id'].'">'  . $this->purify(stripslashes($row['title'])) .  '</a></li>';

											}
											else {
											}

										}
										echo '</ul>';
										else:
											echo '<h1> :( </h1> You haven\'t posted anything yet.</p>';
												endif;
												echo $return;

											}

											/** gets all the private posts by a user **/
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
															$body = $row['body'];
															include_once 'Parsedown.php';
															$Parsedown = new Parsedown();
															$body = $Parsedown->text(stripslashes($body));
															$body = $this->purify($body);
															echo '<p>' . $body . '</p>';

														}
														else {
														}

													}
													else:
														echo '<h1> :( </h1> This user hasn\'t posted anything yet.</p>';
															endif;
															echo $return;

														}

														/** gets all posts about a topic, that is, posts that are tagged with a specified tag **/
														function get_tagged_posts($tag = '') {
															if($tag != ''):
																$tag = mysql_real_escape_string($tag);
															$sql = "SELECT * FROM cms_content WHERE tags = '". $tag ."' ORDER BY id DESC";


															else:
																$sql = "SELECT * FROM cms_content WHERE tags = '". $tag ."' ORDER BY id DESC";
															endif;



															$res = mysql_query($sql) or die(mysql_error());

															if(mysql_num_rows($res) !=0):
																while($row = mysql_fetch_assoc($res)) {
																	if($row['private'] != 1){

																		echo '<br><br><div class="post"><h3><a href="..
																		/p.php?id=' . $row['id'] , '">'  . preg_replace("/</", "&lt;", stripslashes($row['title'])) .  '</a></h3>';

																		if($row['author'] == 'anpo'){
																			echo '<p class="meta"><span class="posted" style="color:#282828;">Posted anonymously</span></p>';
																		}
																		else{
																			echo '<p class="meta"><span class="posted" style="color:#282828;">Posted by '.$row['author'].'</span></p>';
																		}
																		echo '<div style="clear: both;">&nbsp;</div>';
																		$body = $row['body'];
																		$abm = '</i><br><abbr title="Trimmed, click to read in full." /><a href="p.php?id=' . $row['id'] . '">(...)</a></abbr>';
																		$body = stripslashes(((strlen($body) > 200) ? substr($body,0,197) : $body));
																		$body = $body.$abm;
																		$body = $row['body'];
																		include_once 'Parsedown.php';
																		$Parsedown = new Parsedown();
																		$body = $Parsedown->text(stripslashes($body));
																		$body = $this->purify($body);

																		echo '<div class=entry> <p>' . $body, '</p> </div></div>';
																		echo '<br><br><hr>';
																	}



																}
																else:
																	echo '<h1> :( </h1> No posts are tagged with that.</p>';
																		endif;
																		echo $return;

																	}


/** this function powers the pulsating bits blog. while it's meant to be used in-house, it's a representation of how you can modify pulsir to suit you 
* feel free to modify this function in any way you want
**/
function get_pulsatingbits_blog() {
	$sql = "SELECT * FROM cms_content WHERE tags = 'pulsatingbits' ORDER BY id DESC";



	$res = mysql_query($sql) or die(mysql_error());

	if(mysql_num_rows($res) !=0):
		while($row = mysql_fetch_assoc($res)) {
			if($row['private'] != 1){
				echo '<div class="post"><h3><a href="/read.php?id=' . $row['id'] , '">'  . preg_replace("/</", "&lt;", stripslashes($row['title'])) .  '</a></h3>';


				echo '<p class="meta"><span class="posted">written by <img src="http://api.pulsir.eu/pic?who='.$row['author'].'" style="width:16px;"> '.$row['author'].'</span></p>';
				$body = $row['body'];
				include_once 'Parsedown.php';
				$Parsedown = new Parsedown();
				$body = $Parsedown->text(stripslashes($body));
				$body = $this->purify($body);
				$body = stripslashes($body);

				echo $body;
				echo '</div><hr>';
			}



		}
		else:
			echo '<h1> :( </h1> No posts are tagged with that.</p>';
				endif;
				echo $return;

			}



      /** adds a post to the database. requires the POST request as an argument, containing at least the title, body and author fields **/
      function add_content($p) {

       include_once 'akismet.php';
       $WordPressAPIKey = '612375863092';
       $MyBlogURL = 'http://pulsir.eu';

       if($this->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) == 0){
        $author = mysql_real_escape_string($_COOKIE['plluser']); 
      }


      $akismet = new Akismet($MyBlogURL ,$WordPressAPIKey);
      $akismet->setCommentAuthor($author);
      $akismet->setCommentAuthorEmail($email);
      $akismet->setCommentAuthorURL($url);
      $akismet->setCommentContent($comment);
      $akismet->setPermalink('http://pulsir.eu/p');

      if($akismet->isCommentSpam()){
        die( '
         <div class="alert alert-danger">
          Akismet thinks this is spam. If it isn\'t, drop us an email at say.hello@pulsir.eu
          <a href="" class="close">&times;</a>
        </div>');
      }


  // store the comment normally
      $title = mysql_real_escape_string($p['title']);
      $body = mysql_real_escape_string($p['body']);
      if($this->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) == 0){
        $author = mysql_real_escape_string($_COOKIE['plluser']); 
      }
      else {
        $author = mysql_real_escape_string('Guest');
        die(header('Location: /login.php?e=ae'));
      }
      $tags = mysql_real_escape_string($p['tags']);
      $approved = '';
      $private = mysql_real_escape_string($p['private']);
      $anon = mysql_real_escape_string($p['anon']);
      $paste = mysql_real_escape_string($p['paste']);
      $noindex = mysql_real_escape_string($p['noindex']);

      $featured_img = mysql_real_escape_string($p['featured_img']);
      $ff = $p[$_FILES['ff']];
      $approved = mysql_real_escape_string($p['approved']);

      if($anon == 1){
        $author = 'anpo';
      }


      if(!$body || !$author){
        echo '
        <div class="alert-box alert">
         Something is missing. <a href="index.php"> Reload this page </a>
         <a href="" class="close">&times;</a>
       </div>' ;
     }
     if($tags == 'changelog' || $tags == 'pulsatingbits'){
      if($_COOKIE['pllgroup'] != 'moderators'){
       echo '
       <div class="alert-box alert">
        Sorry, you can\'t post with this tag.
        <a href="" class="close">&times;</a>
      </div>' ;
      die();
    }
  }


  /** adds the post to the database **/
  $sql = "INSERT INTO cms_content VALUES (null, '$title', '$body', '$author', '$approved', '$tags', '$private', '$paste', '$noindex', '$featured_img')";
  $res = mysql_query($sql) or die(mysql_error());
  $pid = mysql_insert_id();
  header('Location: /p?id='.$pid.'');




}




/** adds a user to the database, using a randomly generated, unique password salt, and hashes using blowfish **/

function add_user($p) {

  $salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
  $arr = str_split('ABCDEFGHIJKLMNOPRSTUVZQYabcdefghijklmnoprstuvzqy1234567890');
  shuffle($arr);
  $arr = array_slice($arr, 0, rand(3, 58));
  $r = implode('', $arr);
  $uus = '$2a$07$'.$r.'$';

  $username = mysql_real_escape_string($p['username']);

  $password = mysql_real_escape_string(crypt($p['password'], $uus));
  $email = mysql_real_escape_string($p['email']);
  $username=$this->purify($username);
  $emaik=$this->purify($email);


  $sql = "INSERT INTO tblUser VALUES (null, '$username', '$password', '$email', '$username', '', '$email', '', 'creators', '', '', '', '$uus')";
  $res = mysql_query($sql) or die(mysql_error());

}


/** gets a random ad that meets the requirements **/		

function get_ad($target){
  $target = mysql_real_escape_string($target);

  $sql = 'SELECT * FROM ads WHERE (target = "$target" OR target = "everything") AND (\'from\' <= UNIX_TIMESTAMP() AND until >= UNIX_TIMESTAMP()) ORDER BY RAND() LIMIT 1';
  $res = mysql_query($sql) or die(mysql_error());
  if(mysql_num_rows($res) !=0){
   while($row = mysql_fetch_assoc($res)) {
    echo '<div class="pulsir-ad" style="display:inline;background-color:#F5D76E;border-color:#f7ca18;border:1px solid #f7ca18;margin:3px;padding:3px;margin-right:2px;border-radius:0px;-webkit-border-radius:0px;-moz-border-radius:0px;width:100%;height:18px;max-height:18px;"><div class="ad-info" style="display:inline;height:18px;max-height:18px;border-right:1px solid #6c7a89;margin-right:3px;padding-right:7px;">Ad</div> <div class="ad-content" style="display:inline;"><a href="'.$this->purify($row['url']).'" style="color:#0e0e0e !important;" target="_blank"><img src="'.$this->purify($row['favicon']).'" class="ad-fav" style="width:16px;height:16px; margin-right:2px;border-right:1px solid #f7ca18;"> '.$this->purify($row['text']).'</a></div></div>';
  }
}
}

/** gets the header for a specified page and theme **/
function get_page_header($theme, $pagetitle, $pagedescription){
  $template = 'template/'.$theme.'/header.php';
  if(!file_exists($template)){
   $template = '../template/'.$theme.'/header.php';
 }
 $ifvar =  array('theme' => $theme , 'pagetitle' => $pagetitle, 'pagedecription' => $pagedecription);

 $header = file_get_contents($template);
 $header = $this->theme_engine_if($header, $ifvar);
 $header = str_replace('{{PAGETITLE}}', $pagetitle, $header);
 $header = str_replace('{{PAGEDESCRIPTION}}', $pagedescription, $header);
 $header = str_replace('{{BASEURL}}', domainroot, $header); 
 echo $header;
				if(($notrack !== 1) && ($_COOKIE['cookieconsent'] != 'allow')) { // checks if the $notrack variable is set true (it's true on some pages that don't allow warnings to be shown, such as login)
					include 'cc.php'; // includes the cookie constent warning
				}
			}

/** provides if/then/else functionality for the theme engine **/
function theme_engine_if($content, $variables){
  $no = substr_count($content, '{{IF;');
   if($no>0){
    for($i=0;$i<$no;$i++){
      $location_include = strpos($content, '{{IF;');
      $value = substr($content, $location_include+strlen('{{IF;'));
      $where = strlen($value) - strpos($value, ';}}');
      $includeline = substr($value, 0, -$where);
      // echo $includeline;
      $if = explode(';', $includeline);
      $finc = '{{IF;'.$if[0].';'.$if[1].';'.$if[2].';'.'}}';
      if($variables[$if[0]] == $if[1]){
        $fc = file_get_contents($if[2]);
        $content = str_replace($finc, $fc, $content);
      }
      else{
        $content = str_replace($finc, '', $content);
      }
    }
  }
  return $content;
}

			/** gets the menu for a specified user and theme **/

			function get_page_menu($theme, $user){

				if(isset($user)){
					if($this->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) == 0) {
						$template = 'template/'.$theme.'/menu_logged_in.php';
						if(!file_exists($template)){
							$template = '../template/'.$theme.'/menu_logged_in.php';
						}
					}
					else{
						$template = 'template/'.$theme.'/menu_public.php';
						if(!file_exists($template)){
							$template = '../template/'.$theme.'/menu_public.php';

						}
					}
					$menu = file_get_contents($template);
					$menu = str_replace('{{USER}}', $user, $menu);
					$menu = str_replace('{{BASEURL}}', domainroot, $menu);
			
	}
				else{
					$template = 'template/'.$theme.'/menu_public.php';
					if(!file_exists($template)){
						$template = '../template/'.$theme.'/menu_public.php';
					}
					$menu = file_get_contents($template);
					$menu = str_replace('{{BASEURL}}', domainroot, $menu);
				}

				if($user){
					$this->get_user_css($user);
				}

				echo $menu;
			}

			/** gets the footer for a specified theme **/

			function get_page_footer($theme){
				$template = 'template/'.$theme.'/footer.php';
				if(!file_exists($template)){
					$template = '../template/'.$theme.'/footer.php';

				}
				$footer = file_get_contents($template);
        $footer = str_replace('{{BASEURL}}', domainroot, $footer);
				echo $footer;
			}

			/** sets a session **/

			function set_user_session($user, $ip, $useragent, $time){
				$user = mysql_real_escape_string($user);
				$ip = mysql_real_escape_string($ip);
				$useragent = mysql_real_escape_string($useragent);
				$time = mysql_real_escape_string($time);
				$expon = time() + (3*24*60*60);
				$arr = str_split('ABCDEFGHIJKLMNOPRSTUVZQYabcdefghijklmnoprstuvzqy1234567890');
				shuffle($arr);
				$arr = array_slice($arr, 0, rand(3, 58));
				$r = implode('', $arr);
				$csrf = mysql_real_escape_string(crypt($r));

        $arr = str_split('ABCDEFGHIJKLMNOPRSTUVZQYabcdefghijklmnoprstuvzqy1234567890');
        shuffle($arr);
        $arr = array_slice($arr, 0, rand(7, 58));
        $x = implode('', $arr);
        setcookie('pllsessionx', $x, time()+259200);
        $cid = md5($x.$ip.$useragent);
				$sql = "INSERT INTO tblSessions VALUES (null, '$user', '$ip', '$useragent', '$time', '$expon', '$csrf', '$cid')";
				$res = mysql_query($sql) or die(mysql_error());
				$id = mysql_insert_id();
				return $id;
			}

/** validates a session
* error codes:
* 0 - the session is valid
* 1 - there is no session to validate
* 2 - the IP doesn't match
* 3 - the user agent doesn't match
* 4 - the cookies don't match
* 5 - the user doesn't match
* 6 - wtf error
* 7 - verification cookie doesn't match 
**/
function validate_session($user, $session, $ip, $useragent){
	if($session != ''){
		$id = mysql_real_escape_string($id);
		$sql = "SELECT * FROM tblSessions WHERE id = '$session'";
		$res = mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($res) != 0){
			while($row = mysql_fetch_assoc($res)) {
				if($row['username'] != $user){return 5;}
				elseif($row['ip'] != $ip){return 2;}
				elseif($row['useragent'] != $useragent){return 3;}
        elseif($row['cookieid'] != md5($_COOKIE['pllsessionx'].$ip.$useragent)){return 7;}
				else{
					return 0;
				}
			}
		}
		else{return 6;}

	}
	else {
		return 1;
	}

}

/** checks if user has twofactor authentication enabled, returns true if true, returns false if false. **/
function twofactor_check($user){
	$user = mysql_real_escape_string($user);
	$sql = "SELECT * FROM tblTwoFactor WHERE user = '$user'";
	$res = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($res) != 0){
		while($row = mysql_fetch_assoc($res)) {
			if($row['enabled'] == true){
				return true;
			}
			else{
				return false;
			}
		}
	}
	else{return false;}

}

/** returns the shared secret for twofactor **/
function twofactor_get_secret($user){
	$user = mysql_real_escape_string($user);
	$sql = "SELECT * FROM tblTwoFactor WHERE user = '$user'";
	$res = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($res) != 0){
		while($row = mysql_fetch_assoc($res)) {
			return $row['secret'];
		}
	}
	else{return false;}

}

/** deletes the database entry for twofactor **/
function twofactor_disable($user){
  $user = mysql_real_escape_string($user);
  $sql = "DELETE FROM tblTwoFactor WHERE user = '$user'";
  $res = mysql_query($sql) or die(mysql_error());
}

/** sets the twofactor secret **/
function twofactor_set_secret($user, $secret){
  $user = mysql_real_escape_string($user);
  $secret = mysql_real_escape_string($secret);
  $sql = "INSERT INTO tblTwoFactor VALUES (null, '$user', '1', '$secret')";
  $res = mysql_query($sql) or die(mysql_error());
}

/** checks if a username already exists, if yes, returns 1, else returns 0 **/
function check_username_collisions($user){
	$user = mysql_real_escape_string($user);
	$sql = "SELECT * FROM tblUser WHERE username = '$user'";
	$res = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($res) != 0){
		return 1;
	}
	else{
		return 0;
	}
}




/** checks if a username is reserved if yes, returns 1, else returns 0 **/
function check_username_reserved($user){
	$user = mysql_real_escape_string($user);
	$sql = "SELECT * FROM tblReserved WHERE username = '$user'";
	$res = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($res) != 0){
		return 1;
	}
	else{
		return 0;
	}
}

/** gets notifications, useless currently **/
function get_notifications($user) {
	$user = mysql_real_escape_string($user);
	$sql = "SELECT * FROM tblNotifications WHERE usr_to = '$user' ORDER BY id DESC LIMIT 0,35";




	$res = mysql_query($sql) or die(mysql_error());

	if(mysql_num_rows($res) !=0){
		while($row = mysql_fetch_assoc($res)) {
			if($row['about'] == 'reply'){$msg='replied to your post';$action='View reply.';$url='/p?id=';}
			echo '<div class="notif"><a href="/'.$row['from'].'">'.$user.'</a> '.$msg.' <a href="'.$url.$contid.'">'.$action.'</a>';


		}

	} else {
		echo 'Nothing new :)';
}

}

/** delete an account forever **/
function delete_user($user) {
	$user = mysql_real_escape_string($user);
	$this->revoke_sessions($user);
	$this->delete_all_posts($user);
	$this->reserve_account($user, 'deleted');
	$email = $this->get_user_email($user);
	mail($email, 'Pulsir account deleted', 'Hey there, '.$user.'! \n\n We just wanted to let you know \n\n that your Pulsir account has been deleted \n\n at your request. We\'re sorry to see you go. :(  \n\n If this wasn\'t you, please let us know \n\n right now - send us an email \n\n at say.hello@pulsir.eu');
		echo '<div class="alert alert-warning">Notification email has been sent.</div>';
		$sql = "DELETE FROM tblUser WHERE username = '$user'";
		$res=mysql_query($sql) or die(mysql_error());
		echo '<div class="alert alert-warning">User database entry deleted.</div>';
		echo '<div class="alert alert-warning">Your account has been deleted completely. Sorry to see you go. :(</div>';
	}
	/** revokes all user sessions **/
	function revoke_sessions($user) {
		$user=mysql_real_escape_string($user);
		$sql="DELETE FROM tblSessions WHERE username = '$user'";
		$res=mysql_query($sql) or die(mysql_error());
		echo '<div class="alert alert-warning">All sessions for this account have been revoked.</div>';
		setcookie('plluser', '', 1);
		setcookie('psession', '', 1);
		setcookie('pllgroup', '', 1); 
		setcookie('expon','',1);
		setcookie('psid','-1', 1);
	}

    /** revokes a specific user session, used when logging out **/
    function revoke_session($cid) {
    $cid=mysql_real_escape_string($cid);
    $sql="DELETE FROM tblSessions WHERE cookieid = '$cid'";
    $res=mysql_query($sql) or die(mysql_error());
  }

	/** mark an account as reserved **/
	function reserve_account($user, $reason){
		$user=mysql_real_escape_string($user);
		$reason=mysql_real_escape_string($reason);
		$sql = "INSERT INTO tblReserved VALUES (null, '$user', '$reason')";
    $res = mysql_query($sql) or die(mysql_error());
		echo '<div class="alert alert-warning">Your username has been marked as unavailable.</div>';

	}
	/** gets a session timestamp **/
	function get_session_timestamp($id){
		$id=mysql_real_escape_string($id);
		$sql="SELECT * FROM tblSessions WHERE id = '$id'";
		$res=mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($res) !=0){
			while($row = mysql_fetch_assoc($res)) {
				return $row['time'];
			}
		}

	}

	function delete_all_posts($user){
		$user=mysql_real_escape_string($user);
		$sql="DELETE FROM cms_content WHERE author = '$user'";
		$res=mysql_query($sql) or die(mysql_error());
		echo '<div class="alert alert-warning">All of your posts have been deleted.</div>';

	}

	/** changes things in an account, used by ucp.php and probably the admin panel in the future **/

	function change_profile_data($p) {

		$arr = str_split('ABCDEFGHIJKLMNOPRSTUVZQYabcdefghijklmnoprstuvzqy1234567890');
		shuffle($arr);
		$arr = array_slice($arr, 0, rand(3, 58));
		$r = implode('', $arr);
		$uus = '$2a$07$'.$r.'$';

		$username = mysql_real_escape_string($_COOKIE['plluser']);

		$password = mysql_real_escape_string(crypt($p['password'], $uus));
		$email = $this->purify(mysql_real_escape_string($p['email']));
		$cucss = $this->purify(mysql_real_escape_string(str_replace("<", "&lt;", $p['cucss'])));

		if($p['password'] !== ''){

			$sql = "UPDATE tblUser SET password = '$password', salt='$uus', email = '$email', cucss = '$cucss', gravatar = '$email' WHERE username = '$username'";
		}

		else{
			$sql = "UPDATE tblUser SET email = '$email', cucss = '$cucss', gravatar = '$email' WHERE username = '$username'";

		}
		$res = mysql_query($sql) or die(mysql_error());
	}

	/** gets a csrf token for a specified session id **/
	function get_session_csrf($id) {
		if((!isset($id)) && ($id == '')){
			die('request invalid');
		}
		$id = mysql_real_escape_string($id);
		$sql = "SELECT * FROM tblSessions WHERE id = '$id' LIMIT 1";



		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) !=0):
			while($row = mysql_fetch_assoc($res)) {
				return $row['csrf'];
			}
			else:
				die('session invalid');
			endif;


		}

		/** validates a csrf token for a specified session token and id, true if valid, false if not **/
		function validate_session_csrf($token, $id) {
			if((!isset($id)) && ($id == '')){
				return false;
			}
			if((!isset($token)) && ($token == '')){
				return false;
			}
			$id = mysql_real_escape_string($id);
			$sql = "SELECT * FROM tblSessions WHERE id = '$id' LIMIT 1";



			$res = mysql_query($sql) or die(mysql_error());

			if(mysql_num_rows($res) !=0):
				while($row = mysql_fetch_assoc($res)) {
					$rt = $row['csrf'];
					if($rt == $token){
						return true;
					}

				}
				else:
					return false;
				endif;


			}


			/** returns a number of failed login attemps for a user **/
			function count_recent_failed_attempts($user){
				$user = mysql_real_escape_string($user);
				$time = time()-30*60;
				$sql = "SELECT * FROM tblSessions WHERE ip = '0.0.0.0' AND useragent = 'pulsir_failed_login_attempt' AND username = '$user' AND time >= '$time'";

				$res = mysql_query($sql) or die(mysql_error());
				$count = 0;
				while($row = mysql_fetch_assoc($res)) {
					$count++;
				}
				return $count;

			}

			function delete_post($id, $user){
				$id = mysql_real_escape_string($id);
				$user = mysql_real_escape_string($user);
				if(!isset($id)){die(header('Location: /403.php'));}
       $sql = "SELECT * FROM cms_content WHERE id = '$id'";
       $posts = mysql_query($sql) or die(mysql_error());
       if(mysql_num_rows($posts) == 1){
         $row = mysql_fetch_assoc($posts);
         $author = $row['author'];

       }
       else{
         die(header('Location: /403.php'));
       }

       if(strtolower($author) != strtolower($user)){
         die(header('Location: /403.php'));
       }

       $dsql = "DELETE FROM cms_content WHERE id = '$id'";
       $delete = mysql_query($dsql) or die(mysql_error());
       echo 'Post deleted.';

     }

     function verify_post_author($user, $id){
      $id = mysql_real_escape_string($id);
      $user = mysql_real_escape_string($user);
      if(!isset($id)){die(header('Location: /403.php'));}
      $sql = "SELECT * FROM cms_content WHERE id = '$id'";
      $posts = mysql_query($sql) or die(mysql_error());
      if(mysql_num_rows($posts) == 1){
        $row = mysql_fetch_assoc($posts);
        $author = $row['author'];

      }
      else{
        die(header('Location: /403.php'));
      }

      if(strtolower($author) != strtolower($user)){
        die(header('Location: /403.php'));
      }

      else{
        return true;
      } 
      

    }


    function get_post_data($id = '') {
      $id = mysql_real_escape_string($id);
      $sql = "SELECT * FROM cms_content WHERE id = '$id'";

      $res = mysql_query($sql) or die(mysql_error());
      $row = mysql_fetch_assoc($res);

      return $row;
    }


    function update_post($p) {

       include_once 'akismet.php';
       $WordPressAPIKey = '612375863092';
       $MyBlogURL = 'http://pulsir.eu';

       if($this->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) == 0){
        $author = mysql_real_escape_string($_COOKIE['plluser']); 
      }


      $akismet = new Akismet($MyBlogURL ,$WordPressAPIKey);
      $akismet->setCommentAuthor($author);
      $akismet->setCommentAuthorEmail($email);
      $akismet->setCommentAuthorURL($url);
      $akismet->setCommentContent($comment);
      $akismet->setPermalink('http://pulsir.eu/p');

      if($akismet->isCommentSpam()){
        die( '
         <div class="alert alert-danger">
          Akismet thinks this is spam. If it isn\'t, drop us an email at say.hello@pulsir.eu
          <a href="" class="close">&times;</a>
        </div>');
      }


  // store the comment normally
      $id = mysql_real_escape_string($p['update']);
      $title = mysql_real_escape_string($p['title']);
      $body = mysql_real_escape_string($p['body']);
      if($this->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) == 0){
        $author = mysql_real_escape_string($_COOKIE['plluser']); 
      }
      else {
        $author = mysql_real_escape_string('Guest');
        die(header('Location: /login.php?e=ae'));
      }
      $tags = mysql_real_escape_string($p['tags']);
      $approved = '';
      $private = mysql_real_escape_string($p['private']);
      $anon = mysql_real_escape_string($p['anon']);
      $paste = mysql_real_escape_string($p['paste']);
      $noindex = mysql_real_escape_string($p['noindex']);

      $featured_img = mysql_real_escape_string($p['featured_img']);
      $ff = $p[$_FILES['ff']];
      $approved = mysql_real_escape_string($p['approved']);

      if($anon == 1){
        $author = 'anpo';
      }


      if(!$body || !$author){
        echo '
        <div class="alert-box alert">
         Something is missing. <a href="index.php"> Reload this page </a>
         <a href="" class="close">&times;</a>
       </div>' ;
     }
     if($tags == 'changelog' || $tags == 'pulsatingbits'){
      if($_COOKIE['pllgroup'] != 'moderators'){
       echo '
       <div class="alert-box alert">
        Sorry, you can\'t post with this tag.
        <a href="" class="close">&times;</a>
      </div>' ;
    }
  }


  /** adds the post to the database **/
  $sql = "UPDATE cms_content SET title = '$title', body = '$body', author = '$author', tags = '$tags', paste = '$paste', noindex = '$noindex', featured_img = '$featured_img' WHERE id = '$id'";
  $res = mysql_query($sql) or die(mysql_error());
  header('Location: /p?id='.$id.'');

  }

  /** gets the secret app token for a specified app name **/
  function get_app_secret($app = '') {

    $jwtSecurityFail = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Something went wrong.</title>
  <style>
    body, a:link {
      background-color: #400318;
      color: #fefefe !important;
      font-family: "Helvetica Neue", "Arial", sans-serif;
    }
  </style>
</head>
<body>
<h1>Something went wrong.</h1>
<p>We couldn\'t find an app token for your login request. This could mean a lot of things, but hopefully it\'s just a simple mistake. <a href="http://pulsir.eu/login">Try logging in to Pulsir normally</a></a></p>
</body>
</html>';
    if($app != ''):
      $id = mysql_real_escape_string($id);
      $sql = "SELECT * FROM tblApps WHERE appname = '$app'";


    else:
      die('$jwtSecurityFail');
    endif;



    $res = mysql_query($sql) or die(mysql_error());

    if(mysql_num_rows($res) !=0):
      while($row = mysql_fetch_assoc($res)) {
        return $row['secret'];


      }
    else:
      die($jwtSecurityFail);
    endif;

  }



  /** gets the payload return url for a specified app name **/
  function get_app_returnto($app = '') {

    $jwtSecurityFail = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Something went wrong.</title>
  <style>
    body, a:link {
      background-color: #400318;
      color: #fefefe !important;
      font-family: "Helvetica Neue", "Arial", sans-serif;
    }
  </style>
</head>
<body>
<h1>Something went wrong.</h1>
<p>We couldn\'t find a return URL for the app you are trying to use. This is probably just the app being misconfigured. Sorry about that. <a href="http://pulsir.eu/login">Try logging in to Pulsir normally</a></a></p>
</body>
</html>';
    if($app != ''):
      $id = mysql_real_escape_string($id);
      $sql = "SELECT * FROM tblApps WHERE appname = '$app'";


    else:
      die('$jwtSecurityFail');
    endif;



    $res = mysql_query($sql) or die(mysql_error());

    if(mysql_num_rows($res) !=0):
      while($row = mysql_fetch_assoc($res)) {
        return $row['returnto'];


      }
    else:
      die($jwtSecurityFail);
    endif;

  }


	}	 // ends the class



                            

                            
                            