 <?php

/**
* PULSIR FUNCTIONS
* most of pulsir functions are stored here
**/

/** this peice of code gives out cookie constent warnings **/
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

	/** starts the database connection **/
	function connect() {
		$con = mysqli_connect($this->host, $this->username, $this->password) or die(mysqli_error($con));
		mysqli_select_db($con, $this->db) or die(mysqli_error($con));
	}
	/** gets a content list **/
	function get_content($id = '') {
		if($id != ''):
			$id = mysqli_real_escape_string($id);
		$sql = "SELECT * FROM cms_content";

		$return = '';

		else:
			$sql = "SELECT * FROM cms_content WHERE private = '0' ORDER BY id DESC LIMIT 0,15";
		endif;



		$res = mysqli_query($sql) or die(mysqli_error());

		if(mysqli_num_rows($res) !=0){
			while($row = mysqli_fetch_assoc($res)) {



				echo '<article><h2 class="post-title"><a href="p.php?id=' . $row['id'] , '">'  . preg_replace("/</", "&lt;", stripslashes($row['title'])) .  '</a></h2>';

				if($row['author'] == 'anpo'){
					echo '<p class="help-block">anonymous post &middot; <a href="/topic/?view='.$row['tags'].'">'.$row['tags'].'</a></p>';
				}
				else{
					echo '<p class="help-block">by <a href="/'.$row['author'].'">'.$row['author'].'</a> &middot; <a href="/topic/?view='.$row['tags'].'">'.$row['tags'].'</a></p>';
				}
				echo '<div class="post-snip">';
				$body = $row['body'];
				$abm = '</i><br><abbr title="Trimmed, click to read in full." /><a href="p.php?id=' . $row['id'] . '">(...)</a></abbr>';
				$body = stripslashes(((strlen($body) > 200) ? substr($body,0,197) : $body));
				$body = strip_tags($body, "<p><br></p></br><img></img><ul><li><ol></ul></li></ul>");
				$body = $body.$abm;
				if($row['tags'] == 'nsfw'){$body = '<b style="color:red;">NSFW</b> This post is not safe for work/school environments and can contain adult content. Be warned.';} 

				echo $body;
				echo '</div></article><hr>';



			}

		} else {
			echo 'Invalid URL manipulation :(';
		}

	}




	/** an api for this that really needs to be rewritten as it's crap **/
	function get_content_api($id = '') {
		if($id != ''):
			$id = mysqli_real_escape_string($id);
		$sql = "SELECT * FROM cms_content WHERE id = '$id'";


		else:
			$sql = "SELECT * FROM cms_content WHERE private = '0' ORDER BY id DESC LIMIT 0,15";

		endif;



		$res = mysqli_query($sql) or die(mysqli_error());
		$posts = array();

		
		if(mysqli_num_rows($res) !=0):
			while($row = mysqli_fetch_assoc($res)) {
				array_push($posts, $row);
				
			}
			else:
				echo 'mysqli_no_results';
			endif;
			$r = json_encode($posts);
// on newer versions of php use JSON_PRETTY_PRINT
			echo $r;
		}

		/** an api for getting posts by a user **/
		function get_profile_api($user = '') {
			if($user != ''):
				$id = mysqli_real_escape_string($id);
			$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";


			else:
				$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";
			endif;



			$res = mysqli_query($sql) or die(mysqli_error());

			$posts = array();

			
			if(mysqli_num_rows($res) !=0):
				while($row = mysqli_fetch_assoc($res)) {
					array_push($posts, $row);
					
				}
				else:
					echo 'mysqli_no_results';
				endif;
				$r = json_encode($posts);
//on newer versions of PHP use JSON_PRETTY_PRINT
				echo $r;


			}

			/** a post reading interface **/

			function read_content($id = '') {
				include 'Parsedown.php';
				if($id != ''){
					$id = mysqli_real_escape_string($id);
					$sql = "SELECT * FROM cms_content WHERE id = '$id'";

				}

				else{
					$sql = "SELECT * FROM cms_content ORDER BY id DESC";
				}



				$res = mysqli_query($sql) or die(mysqli_error());

				if(mysqli_num_rows($res) !=0){
					while($row = mysqli_fetch_assoc($res)) {
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
						echo '<div class="row"><div class="eleven columns"><div class="post"><div class="metadata"><h1 class="title"> <b><a href="p.php?id=' . $row['id'] , '">'  . stripslashes($row['title']) .  '</a></b></h1>';
						$rid = preg_replace("/[^0-9]/", "", $row['tags']);
						$isr = preg_replace("/[^a-zA-Z]/", "", $row['tags']);
						if($isr == 'reply'){
							if($row['author'] !== 'anpo'){
								echo '<br>posted by <span class="post-author"><img src="http://www.gravatar.com/avatar/'.$this->get_user_gravatar($row['author']).'?r=pg&d=identicon&s=64" style="height:24px;" /><a href="/'.$row['author'].'">' .$row['author'] . '</a></span> as a reply to post <a href="p.php?id='.$rid.'">#'.$rid.'</a><hr>';
							}
							else{
								echo '<br> posted  <span class="post-author">anonymously</span> as a reply to post <a href="p.php?id='.$rid.'">#'.$rid.'</a><hr>';
							}
						}
						else{
							if($row['author'] !== 'anpo'){
								echo '<br> posted by <span class="post-author"><img src="http://www.gravatar.com/avatar/'.$this->get_user_gravatar($row['author']).'?r=pg&d=identicon&s=64" style="height:24px;" class="user-pic-post" /><a href="/' .$row['author'] . '">'.$row['author'].'</a> </span></hr>';
							}
							else{
								echo '<br> posted <span class="post-author">anonymously</span> ';
							}
							if($row['tags'] == 'pulsatingbits'){
								echo 'to <a href="http://pulsatingbits.pulsir.eu"><span class="post-blog">Pulsating Bits</a></span>, the Pulsir team blog.<br><hr>';

							}
							elseif($row['tags'] !== ''){
								echo 'on the topic <a href="/topic/?view='.$row['tags'].'"><span class="post-author">'. $row['tags'] . '</a></span><br><hr>';

							}
						}


						$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';


						$rpt = 'reply'.$id.'';
						if($row['private'] !== '1'){
							if($row['paste'] !== '1'){ 
								$Parsedown = new Parsedown();
								$body = $Parsedown->text(stripslashes($row['body']));

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


					}
				}
				else{
					echo '<h1> Four-oh-four! </h1> That ain\'t here.</p>';
				}


			}

			/** a spin-off function of read_content for getting post replies, $rpt is the reply tag, $caller is the function that calls this **/
			function get_post_replies($rpt, $caller) {
				$rpt = mysqli_real_escape_string($rpt);
				$commsql = "SELECT * FROM cms_content WHERE tags = '$rpt'";
				$gc = mysqli_query($commsql) or die(mysqli_error());
				if(mysqli_num_rows($gc) !=0){
					while($row = mysqli_fetch_assoc($gc)) {

						echo '<div class="reply"><a href="p.php?id='.$row['id'].'">'.stripslashes($row['title']).'</a><br>';
						if($row['author'] == 'anpo'){
							echo '<p class="help-block">anonymous post</p>';
						}
						else{
							echo '<p class="help-block">by <a href="/'.$row['author'].'">'.$row['author'].'</a></p>';
						}
						echo '<div class="post-snip">';
						$body = $row['body'];
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
					$id = mysqli_real_escape_string($id);
					$sql = "SELECT * FROM cms_content WHERE id = '$id'";

				}

				else{
					$sql = "SELECT * FROM cms_content ORDER BY id DESC";
				}



				$res = mysqli_query($sql) or die(mysqli_error());

				if(mysqli_num_rows($res) !=0){
					while($row = mysqli_fetch_assoc($res)) {
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
					$id = mysqli_real_escape_string($id);
				$sql = "SELECT * FROM cms_content WHERE id = '$id'";

				$return = '';

				else:
					$sql = "SELECT * FROM cms_content ORDER BY id DESC";
				endif;



				$res = mysqli_query($sql) or die(mysqli_error());

				if(mysqli_num_rows($res) !=0):
					while($row = mysqli_fetch_assoc($res)) {
						return stripslashes($row['title']);


					}
					else:
						echo "Four-oh-four!";
					endif;
					echo $return;

				}

				/** gets post metadata, @tm it's only noindex **/
				function get_meta($id = '') {
					if($id != ''):
						$id = mysqli_real_escape_string($id);
					$sql = "SELECT * FROM cms_content WHERE id = '$id'";

					$return = '';

					else:
						$sql = "SELECT * FROM cms_content ORDER BY id DESC";
					endif;



					$res = mysqli_query($sql) or die(mysqli_error());

					if(mysqli_num_rows($res) !=0):
						while($row = mysqli_fetch_assoc($res)) {
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
							$id = mysqli_real_escape_string($id);
						$sql = "SELECT * FROM cms_content WHERE id = '$id'";

						$return = '';

						else:
							$sql = "SELECT * FROM cms_content ORDER BY id DESC";
						endif;



						$res = mysqli_query($sql) or die(mysqli_error());

						if(mysqli_num_rows($res) !=0):
							while($row = mysqli_fetch_assoc($res)) {

								return $row['featured_img'];

							}
							else:
								return 10;
							endif;
							echo $return;

						}

						/** gets the email for a specified user **/
						function get_user_email($uname = '') {
							if($uname != ''):
								$id = mysqli_real_escape_string($id);
							$sql = "SELECT * FROM tblUser WHERE username = '$uname'";


							else:
								die('No user set. wat');
							endif;



							$res = mysqli_query($sql) or die(mysqli_error());

							if(mysqli_num_rows($res) !=0):
								while($row = mysqli_fetch_assoc($res)) {
									return $row['email'];


								}
								else:
									die(header('Location: '.$domainroot.'404.php'));
								endif;

							}

							/** gets a gravatar hash for a specified user **/
							function get_user_gravatar($uname = '') {
								if($uname != ''):
									$id = mysqli_real_escape_string($id);
								$sql = "SELECT * FROM tblUser WHERE username = '$uname'";


								else:
									die('No user set. wat');
								endif;



								$res = mysqli_query($sql) or die(mysqli_error());

								if(mysqli_num_rows($res) !=0):
									while($row = mysqli_fetch_assoc($res)) {
										return md5(strtolower(trim($row['email'])));



									}
									else:
										die('That user does not exist. :(');
											endif;

										}

										/** gets custom css defined by user **/
										function get_user_css($uname = '') {
											if($uname != ''):
												$id = mysqli_real_escape_string($id);
											$sql = "SELECT * FROM tblUser WHERE username = '$uname'";


											else:
												die('No user set. wat');
											endif;



											$res = mysqli_query($sql) or die(mysqli_error());

											if(mysqli_num_rows($res) !=0):
												while($row = mysqli_fetch_assoc($res)) {
													echo $row['cucss'];


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
		$id = mysqli_real_escape_string($id);
	$sql = "SELECT * FROM tblUser WHERE username = '$uname'";


	else:
		die('No user set. wat');
	endif;



	$res = mysqli_query($sql) or die(mysqli_error());

	if(mysqli_num_rows($res) !=0):
		while($row = mysqli_fetch_assoc($res)) {
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
					$id = mysqli_real_escape_string($id);
				$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";


				else:
					$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";
				endif;



				$res = mysqli_query($sql) or die(mysqli_error());

				if(mysqli_num_rows($res) !== 0):
					while($row = mysqli_fetch_assoc($res)) {
						if($row['private'] != 1){
							echo '<section class="post"><header class="post-header"><h2 class="post-title"> <a href="p.php?id=' . $row['id'] , '" id="p'.$row['id'].'">'  . stripslashes($row['title']) .  '</a></h2></header>';
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

						/** gets the latest 15 posts by a user **/
						function get_profile_latest($user = '') {
							if($user != ''):
								$id = mysqli_real_escape_string($id);
							$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC LIMIT 0,15";


							else:
								$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC LIMIT 0,15";
							endif;



							$res = mysqli_query($sql) or die(mysqli_error());

							if(mysqli_num_rows($res) !== 0):
								while($row = mysqli_fetch_assoc($res)) {
									if($row['private'] != 1){
										echo '<section class="post"><header class="post-header"><h2 class="post-title"> <a href="p.php?id=' . $row['id'] , '" id="p'.$row['id'].'">'  . stripslashes($row['title']) .  '</a></h2></header>';
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

									/** gets the titles of the users 15 latest posts **/
									function get_profile_latest_titles($user = '') {
										if($user != ''):
											$id = mysqli_real_escape_string($id);
										$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC LIMIT 0,15";


										else:
											$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC LIMIT 0,15";
										endif;



										$res = mysqli_query($sql) or die(mysqli_error());

										if(mysqli_num_rows($res) !== 0):

											echo '<ul class="postlist">';
										while($row = mysqli_fetch_assoc($res)) {
											if($row['private'] != 1){
												echo '<li class="postlistitem"><a href="p.php?id=' . $row['id'] , '" id="p'.$row['id'].'">'  . stripslashes($row['title']) .  '</a></li>';

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
													$id = mysqli_real_escape_string($id);
												$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";


												else:
													$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";
												endif;



												$res = mysqli_query($sql) or die(mysqli_error());

												if(mysqli_num_rows($res) !=0):
													while($row = mysqli_fetch_assoc($res)) {
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

														/** gets all posts about a topic, that is, posts that are tagged with a specified tag **/
														function get_tagged_posts($tag = '') {
															if($tag != ''):
																$tag = mysqli_real_escape_string($tag);
															$sql = "SELECT * FROM cms_content WHERE tags = '". $tag ."' ORDER BY id DESC";


															else:
																$sql = "SELECT * FROM cms_content WHERE tags = '". $tag ."' ORDER BY id DESC";
															endif;



															$res = mysqli_query($sql) or die(mysqli_error());

															if(mysqli_num_rows($res) !=0):
																while($row = mysqli_fetch_assoc($res)) {
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
																		$body = strip_tags($body, "<p><br></p></br><img></img><ul><li><ol></ul></li></ul>");
																		$body = $body.$abm;

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



	$res = mysqli_query($sql) or die(mysqli_error());

	if(mysqli_num_rows($res) !=0):
		while($row = mysqli_fetch_assoc($res)) {
			if($row['private'] != 1){
				echo '<div class="post"><h3><a href="/read.php?id=' . $row['id'] , '">'  . preg_replace("/</", "&lt;", stripslashes($row['title'])) .  '</a></h3>';


				echo '<p class="meta"><span class="posted">written by <img src="http://api.pulsir.eu/pic?who='.$row['author'].'" style="width:16px;"> '.$row['author'].'</span></p>';
				$body = $row['body'];
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



			/** a simple post export tool **/
			function export_profile_posts($user = '') {
				if($user != ''):
					$id = mysqli_real_escape_string($id);
				$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";


				else:
					$sql = "SELECT * FROM cms_content WHERE author = '". $user ."' ORDER BY id DESC";
				endif;



				$res = mysqli_query($sql) or die(mysqli_error());

				if(mysqli_num_rows($res) !=0):
					while($row = mysqli_fetch_assoc($res)) {
						echo 'Title:'  . $row['title'] .  ' | Permalink: http://'.$domainroot.'/p?id=' . $row['id'] . '';

						echo 'Post body:' . $row['body'] . '';


					}
					else:
						echo 'Export error: the user has not posted anything.';
					endif;
					echo $return;

				}

				/** adds a post to the database. requires the POST request as an argument, containing at least the title, body and author fields **/
				function add_content($p) {

					include 'akismet.php';
					$WordPressAPIKey = '612375863092';
					$MyBlogURL = 'http://pulsir.eu';

					$akismet = new Akismet($MyBlogURL ,$WordPressAPIKey);
					$akismet->setCommentAuthor($name);
					$akismet->setCommentAuthorEmail($email);
					$akismet->setCommentAuthorURL($url);
					$akismet->setCommentContent($comment);
					$akismet->setPermalink('http://pulsir.eu/p');

					if($akismet->isCommentSpam()){
						die( '
							<div class="alert-box alert">
								Akismet thinks this is spam. If it is\'t, drop us an email at dev@pulsir.eu
								<a href="" class="close">&times;</a>
							</div>');
					}


  // store the comment normally
					$title = mysqli_real_escape_string($p['title']);
					$body = mysqli_real_escape_string($p['body']);
					if($this->validate_session($_COOKIE['plluser'], $_COOKIE['psid'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']) == 0){
						$author = mysqli_real_escape_string($_COOKIE['plluser']); 
					}
					else {
						$author = mysqli_real_escape_string('Guest');
					}
					$tags = mysqli_real_escape_string($p['tags']);
					$approved = '';
					$private = mysqli_real_escape_string($p['private']);
					$anon = mysqli_real_escape_string($p['anon']);
					$paste = mysqli_real_escape_string($p['paste']);
					$noindex = mysqli_real_escape_string($p['noindex']);

					$featured_img = mysqli_real_escape_string($p['featured_img']);
					$ff = $p[$_FILES['ff']];
					$approved = mysqli_real_escape_string($p['approved']);

					if($anon == 1){
						$author = 'anpo';
					}


					if(!$title || !$body || !$author){
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
					$sql = "INSERT INTO cms_content VALUES (null, '$title', '$body', '$author', '$approved', '$tags', '$private', '$paste', '$noindex', '$featured_img')";
					$res = mysqli_query($sql) or die(mysqli_error());
					echo '<div class="alert-box success">
					Your post has been added. 
					<a href="" class="close">&times;</a>
				</div>';



			}




			/** adds a user to the database, using a randomly generated, unique password salt, and hashes using blowfish **/

			function add_user($p) {

				$salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882';
				$arr = str_split('ABCDEFGHIJKLMNOPRSTUVZQYabcdefghijklmnoprstuvzqy1234567890');
				shuffle($arr);
				$arr = array_slice($arr, 0, rand(3, 58));
				$r = implode('', $arr);
				$uus = '$2a$07$'.$r;

				$username = mysqli_real_escape_string($p['username']);

				$password = mysqli_real_escape_string(crypt($p['password'], $uus));
				$email = mysqli_real_escape_string($p['email']);


				$sql = "INSERT INTO tblUser VALUES (null, '$username', '$password', '$email', '$username', '', '$email', '', 'creators', '', '', '', '$uus')";
				$res = mysqli_query($sql) or die(mysqli_error());

			}


			/** gets a random ad that meets the requirements **/		

			function get_ad($target){
				$target = mysqli_real_escape_string($target);

				$sql = 'SELECT * FROM ads WHERE (target = "$target" OR target = "everything") AND (\'from\' <= UNIX_TIMESTAMP() AND until >= UNIX_TIMESTAMP()) ORDER BY RAND() LIMIT 1';
				$res = mysqli_query($sql) or die(mysqli_error());
				if(mysqli_num_rows($res) !=0){
					while($row = mysqli_fetch_assoc($res)) {
						echo '<div class="pulsir-ad" style="display:inline;background-color:#247f77;margin-right:2px;border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;width:100%;height:18px;max-height:18px;"><div class="ad-info" style="display:inline;background-color:#e5e5e5;height:18px;max-height:18px;">Ad</div><div class="ad-content" style="display:inline;"><a href="'.$row['url'].'" style="color:#fff !important;" target="_blank"><img src="'.$row['favicon'].'" class="ad-fav" style="width:16px;height:16px;">'.$row['text'].'</a></div></div>';
					}
				}
			}

			/** gets the header for a specified page and theme **/
			function get_page_header($theme, $pagetitle, $pagedescription){
				$template = 'template/'.$theme.'/header.php';
				if(!file_exists($template)){
					$template = '../template/'.$theme.'/header.php';
				}
				$header = file_get_contents($template);
				$header = str_replace('{{PAGETITLE}}', $pagetitle, $header);
				$header = str_replace('{{PAGEDESCRIPTION}}', $pagedescription, $header);
				echo $header;
				if(($notrack !== 1) && ($_COOKIE['cookieconsent'] != 'allow')) { // checks if the $notrack variable is set true (it's true on some pages that don't allow warnings to be shown, such as login)
					include 'cc.php'; // includes the cookie constent warning
				}
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
				}
				else{
					$template = 'template/'.$theme.'/menu_public.php';
					if(!file_exists($template)){
						$template = '../template/'.$theme.'/menu_public.php';
					}
					$menu = file_get_contents($template);
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
				echo $footer;
			}

			/** sets a session **/

			function set_user_session($user, $ip, $useragent, $time){
				$user = mysqli_real_escape_string($user);
				$ip = mysqli_real_escape_string($ip);
				$useragent = mysqli_real_escape_string($useragent);
				$time = mysqli_real_escape_string($time);
				$expon = time() + (3*24*60*60);
				$arr = str_split('ABCDEFGHIJKLMNOPRSTUVZQYabcdefghijklmnoprstuvzqy1234567890');
				shuffle($arr);
				$arr = array_slice($arr, 0, rand(3, 58));
				$r = implode('', $arr);
				$csrf = mysqli_real_escape_string(crypt($r));
				setcookie('pllsessionid', $csrf, $expon);
				$sql = "INSERT INTO tblSessions VALUES (null, '$user', '$ip', '$useragent', '$time', '$expon', '$csrf')";
				$res = mysqli_query($sql) or die(mysqli_error());
				$id = mysqli_insert_id();
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
**/
function validate_session($user, $session, $ip, $useragent){
	if($session != ''){
		$id = mysqli_real_escape_string($id);
		$sql = "SELECT * FROM tblSessions WHERE id = '$session'";
		$res = mysqli_query($con, $sql) or die('MySQLi error');
		if(mysqli_num_rows($res) != 0){
			while($row = mysqli_fetch_assoc($res)) {
				if($row['username'] != $user){return 5;}
				elseif($row['ip'] != $ip){return 2;}
				elseif($row['useragent'] != $useragent){return 3;}
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
	$user = mysqli_real_escape_string($user);
	$sql = "SELECT * FROM tblTwoFactor WHERE user = '$user'";
	$res = mysqli_query($sql) or die(mysqli_error());
	if(mysqli_num_rows($res) != 0){
		while($row = mysqli_fetch_assoc($res)) {
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
	$user = mysqli_real_escape_string($user);
	$sql = "SELECT * FROM tblTwoFactor WHERE user = '$user'";
	$res = mysqli_query($sql) or die(mysqli_error());
	if(mysqli_num_rows($res) != 0){
		while($row = mysqli_fetch_assoc($res)) {
			return $row['secret'];
		}
	}
	else{return false;}

}


	}	 // ends the class
