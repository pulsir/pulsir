                                <style>
      body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
<div class="container">

      <form class="form-signin" action="index.php" method="post" role="form">
        <input type="hidden" name="return" value="<?php if($_GET['return']){echo $_GET['return'];}else{echo 'new';} ?>" />
        <h1 class="text-center"><a href="index.php"><img src="http://d.pulsir.eu/assets/midres-final2-logo.png" width=64 style="border-radius:3px;" alt="Pulsir"></a></h1>
	<h1 class="text-center">You are banned.</h1>
	<p>Your Pulsir account has been banned for violating our <a href="http://legal.pulsir.eu">Terms of Service</a>.</p>
	<p>If you have any questions about this, please contact us at <a href="mailto:say.hello@pulsir.eu">say.hello@pulsir.eu</a>
      </form>

    </div>
  </body>
</html>

                            
