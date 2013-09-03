<?php error_reporting(0); ?>
<?php $salt = '9572186cd8f2e34eb43126434391bc77$1$mwI2qhKq$CzGzM43JmtvRWwKpbbl7..$1$CHBkox0S$nEoSlWNwnTB89.U0BRsax/3862f21b65bdb8d2223ef223a978ff6f3862f21b65bdb8d2223ef223a978ff6ff6ff879a322fe3222d8bdb56b12f2683883258566443752882'; ?>

<form action="index.php" method="post">
			
				
			
				<input type="hidden" name="add" value="true" />

<input type="text" name="title" id="title-field" class="ned" placeholder="Title" autofocus />



<style>

input, button, input:focus, button:focus, .ned {
outline: none;
line-height: 20px;
font-weight: lighter;
float: left;
background: #fff;
font-family: inherit;
border: none;
border-radius: 0px;
color: #4A525F;
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
}

</style>
<?php include 'toolbar.php'; ?>


				<textarea name="body" id="body-field" rows="40" cols="30" placeholder="Post body" class="ned"> </textarea>


 <script>
      var editor = new wysihtml5.Editor("body-field", {
        toolbar:     "wysihtml5-editor-toolbar",
        stylesheets: ["http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css", "http://xing.github.com/wysihtml5/css/editor.css"],
        parserRules: wysihtml5ParserRules
      });
      
      editor.on("load", function() {
        var composer = editor.composer,
            h1 = editor.composer.element.querySelector("h1");
        if (h1) {
          composer.selection.selectNode(h1);
        }
      });
    </script>

<div class="row">

<div class="five columns">
				



		

		<input id="tags" type="text" name="tags" placeholder="Describe this post in one word." />

	
</div>
<div class="five columns">		<input type="checkbox" name="private" value="1"> Make this post private? </div>
		<div class="two columns"><input type="submit" id="submit" class="transparent save button" value=""></div>
</div>
<?php echo $msg; ?>

<input type="hidden" name="approved" value="false" />
				
			
			

		</form>

<style>
		

			.tagbox-item .name, .tagbox-item .email { /* The name and email within the dropdown */
				display: block;
				float: left;
				width: 35%;

				overflow: hidden;
				text-overflow: ellipsis;
			}
				.tagbox-item .email {
					float: right;
					width: 65%;
				}
		</style>
		<link rel="stylesheet" href="tagbox.css">
	