<!--DOCTYPE HTML-->
<head>
<!-- fontovi -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200|Inika' rel='stylesheet' type='text/css'>
<!-- i ja mrzim inline css -->
<style>
html {
	background: #3A5884;
	height: 100%;
	box-shadow: inset 0px 0px 1000px 50px rgba(0, 0, 0, 0.5);
}

p, h1{
color: #FFFFFF;
}

.box {
	width: 300px;
	height: 400px;
	
	/* So that absolutely positioned elements will stay inside .box */
	position: relative;
	background-image: linear-gradient(top, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.4));
	box-shadow: 0px 1px 2px black;
	margin: 80px auto;
}

/* Now we'll start with the ribbon. */
.ribbon {
	width: 340px; /* It will extend 20px from both sides */
	height: 40px;
	background-image: linear-gradient(top, #3A5884, #1E0C67);
	box-shadow: 0px 20px 5px -19px rgba(0, 0, 0, 0.6);
	position: relative;
	left: -20px;
	top: 40px;
}

/* Now, the only things that we need are the folds of the ribbon. If you look closely to a ribbon, the folds just look like triangles. So, we'll use the famous css border hack to create triangles, let's start */

/* We'll use the :after and :before pseudo elements for the triangles */

.ribbon:after, .ribbon:before {
	position: absolute;
	content: ''; 
	
	/* We'll just use borders so we won't need any height or width */
	width: 0;
	height: 0;
	
	/* Now the magic */
	border-style: solid;
	border-width: 20px;
	top: -20px;
	z-index: -1;
}

/* Let's separate the triangles */
.ribbon:after {
	border-color: transparent #372b54 transparent transparent;
	left: -20px;
}

.ribbon:before {
	border-color: transparent transparent transparent #372b54;
	right: -20px;
}


h3.plsr{
font-family: 'Source Sans Pro', sans-serif;
}

body{
font-family: 'Source Sans Pro', sans-serif;
}

span.per{
color: #E01B6A;
}
</style>
<title>...</title>
</head>
<body>
<center><h1>Four - oh - three<span class="per">.</span></h1><p>Nemate pristup ovom podrucju. :(</p>



<br><br><br><br><br><br><br><br><br><br>
</body>