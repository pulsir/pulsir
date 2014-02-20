<style>
body{
margin-top:20px;
margin-left:25px;
margin-right:25px;
}
input, button, input:focus, button:focus, .ned {
outline: none;
line-height: 20px;
float: left;
background: #f0f0f0;
font-family: 'Helvetica Neue', 'Helvetica', 'Open Sans', 'Segoe UI', 'Arial', 'Calibri', sans-serif;;
border: none;
border-radius: 0px;
color: #4f4e4f;
box-shadow: 0 0 0 0 0;
-moz-box-shadow: 0 0 0 0 0;
-webkit-box-shadow: 0 0 0 0 0;

}

.transparent{
background-color: transparent;
}

.transparent:hover{
background-color: #fff;
}

.save{
border:none;
background-image: url('http://d.pulsir.eu/circletosave.png');
height:45px;
width:42px;
}

.save:hover{
border:none;
background-image: url('http://d.pulsir.eu/circletosave.png');
background-repeat: no-repeat;
}

input[type="text"],input[type="text"]:hover,input[type="text"]:focus,input[type="text"]:active, textarea
{
    border: 0;
    outline: none;
    outline-offset: 0;
    box-shadow: 0 0 0 0 !important;
-moz-box-shadow: 0 0 0 0 0 !important;
-webkit-box-shadow: 0 0 0 0 0 !important;
}

#wysihtml5-editor-toolbar{
text-align:center;
}


</style>
<?php error_reporting(0); ?>
<?php $salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882'; ?>


<form action="index.php" method="post">
				<input type="hidden" name="add" value="true" />
<div class="row"><div class="four columns"><div class="metadata"><h1 class="title"> <b><a href="#"><input type="text" name="title" id="title-field" class="ned title" placeholder="Add a title..." /></a></b></h1>
                        <hr> you're posting as <span class="post-author"><?php echo $_COOKIE['plluser']; ?></span><br><br> <span class="post-author"> <input id="tags" type="text" name="tags" placeholder="Add a tag..." <?php if($_GET['autotag']){echo 'value="'.htmlentities($_GET['autotag']).'"';} ?> /><br></span>
<a href="#" onclick="showElement('ao');">Additional options</a>
<div id="ao" class="ao" style="display:none;">
<input type="checkbox" name="private" value="1"> Make this post private <br><br>
<input type="checkbox" name="anon" value="1"> Post anonymously <br><br>
<input type="checkbox" name="paste" value="1"> This is a paste
<a href="#" onclick="hideElement('ao')"><small>(hide)</small></a>
</div>
<br><hr>
		<input type="submit" id="submit" class="button" value="Publish"></div></div>
<div class="eight columns"> 


<div class="post-body">







				<textarea name="body" id="body-field" rows="40" cols="30" placeholder="Type away..." class="ned" > </textarea>



</div>
</div>
</div>


		



	
</div>
<div class="five columns">		
</div>
<?php echo $msg; ?>

<input type="hidden" name="approved" value="false" />
				
			
			

		</form>



	