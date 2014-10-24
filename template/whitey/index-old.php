</div></div></div>
<div class="contain wow fadeInUp" style="width:100% !important;max-width:100% !important;height:820px !important;max-height:820px !important;" data-wow-duration="0.5s" data-wow-offset="0">
 <h1 class="text-center">Blogs, reinvented.</h1>
 <p class="text-center lead">Tell your story, one post at a time.</p>
 <p class="text-center">
   <a class="btn btn-primary" href="#features">Find out more</a>
   <a class="btn btn-primary" href="#signup">Sign up</a>
 </p>
</div>
</div>
<div class="container">

 <div class="features">
   <a id="features"></a>
   <h2 class="text-center">Suits everybody.</h2>
   <div class="for-writers wow fadeInUp" style="width:100% !important;max-width:100% !important;height:100% !important;max-height:100% !important;"><h1 class="suits">For storytellers</h1></div>
   <div class="row"><div class="col-md-4">
     <h3><i class="fa fa-magic"></i> A beautiful editor</h3>
     <p>Focus on <b>writing</b>, not coding.</p>
   </div><div class="col-md-4">
   <h3><i class="icon-legal"></i> Always yours</h3>
   <p>Your content always remains yours, no asterisks. Plus, we truly care about your privacy.</p>
 </div><div class="col-md-4">
 <h3><i class="icon-code"></i> Worry less</h3>
 <p>All the maintenance, hosting and uptime is up to us. Sleep worry-free.</p>
</div></div>

<div class="for-devs wow fadeInUp" style="width:100% !important;max-width:100% !important;height:100% !important;max-height:100% !important;"><h1 class="suits">For developers</h1></div>
<div class="row" data-wow-offset="0" data-wow-duration="1.5s"><div class="col-md-4">
 <h3><i class="icon-terminal"></i> A simple API</h3>
 <p>Get a JSON output of everything we've got using simple requests</p>
</div><div class="col-md-4">
<h3><i class="icon-cog"></i> Great docs</h3>
<p>Every single API and theme engine feature is documented.</p>
</div><div class="col-md-4">
<h3><i class="icon-stethoscope"></i> Support that knows things</h3>
<p>If you're having trouble, our knowledgable support team will respond quickly and accurately.</p>
</div></div>

<div class="for-everybody wow fadeInUp" style="width:100% !important;max-width:100% !important;height:100% !important;max-height:100% !important;"><h1 class="suits">For everybody</h1></div>
<div class="row"><div class="col-md-4">
 <h3><i class="icon-gift"></i> Free and open source</h3>
 <p>Pulsir is free and will always remain free, and you can always look at <a href="http://github.com/pulsir/pulsir">the source</a>.</p>
</div><div class="col-md-4">
<h3><i class="fa fa-picture-o"></i> Simple and pretty</h3>
<p>We strive to make Pulsir simple to use, yet beautiful to look at.</p>
</div><div class="col-md-4">
<h3><i class="fa fa-life-ring"></i> Great support</h3>
<p>We've got a great support team standing by in case you need any help.</p>
</div></div>
</div>



<hr>
<div class="text-center">
  <a id="signup"></a><h2>Get started.</h2>
  <p>It's fast and free.</p>


  <form action="signup.php" method="post" id="hash" role="form" class="form-inline">
    <input type="hidden" name="action" id="action" value="add" />
    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
    <div class="form-group">
      <input type="text" name="username" id="username" placeholder="Username"  class="form-control" required />
    </div>
    <div class="form-group">
      <input type="password" name="password" id="password" placeholder="Password"  class="form-control" required />
    </div>
    <div class="form-group">
      <input type="email" name="email" id="email" placeholder="Email" class="form-control" required />
    </div>
    <input type="submit" id="submit" class="btn btn-primary" value="Create an account &rarr;"><br>


  </form> 
</div>

<hr>

<div class="text-center">

  <h2>The stories we tell. The generations we shape.</h2>
  <h3>That's what Pulsir is about.</h3>
  <div class="spotlight">
    <div class="row">
      <div class="col-md-4">
        <div class="spotlight-box">
          <?php include 'spotlight/1.php'; ?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="spotlight-box">
          <?php include 'spotlight/2.php'; ?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="spotlight-box">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
            <path d="M50.001,91.242c0,0,23.864-23.871,36.556-36.562c11.37-11.376,11.121-27.957,0.789-38.235  C77.007,6.159,60.283,6.201,50.001,16.543C39.719,6.201,22.999,6.159,12.656,16.444C2.32,26.723,2.075,43.304,13.444,54.68  C26.14,67.371,50.001,91.242,50.001,91.242z"/>
          </svg>
          <h4>The Pulsir Spotlight</h4>
          <p>We highlight the best Pulsir posts we find. Want to get here? <b><a href="/add">Start posting, tell a story.</a></b>
        </div>
      </div>
    </div>
  </div>

</div>

<hr>

<div class="stories-container">

<div class="row">
<div class="col-md-4">
<div class="stories wow fadeInUp" data-wow-duration="0.5s" data-wow-offset="0.5">
<img src="template/whitey/tas1.png" style="width:420px;">
</div>
</div>
<div class="col-md-4">
<div class="stories stories-text text-center">
<b>Telling a story shouldn't be hard.</b>
<p>And with Pulsir, it's easy. Just let your self go, type away, and you'll have a beautiful story just like that.</p>
</div>
</div>
<div class="col-md-4">
<div class="stories wow fadeInUp" data-wow-duration="1.0s" data-wow-offset="1.5">
<img src="template/whitey/tas2.png" style="width:420px;">
</div>
</div>

<hr>
<div class="text-center">
  <a id="signup"></a><h2>Get started.</h2>
  <p>It's fast and free.</p>


  <form action="signup.php" method="post" id="hash" role="form" class="form-inline">
    <input type="hidden" name="action" id="action" value="add" />
    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
    <div class="form-group">
      <input type="text" name="username" id="username" placeholder="Username"  class="form-control" required />
    </div>
    <div class="form-group">
      <input type="password" name="password" id="password" placeholder="Password"  class="form-control" required />
    </div>
    <div class="form-group">
      <input type="email" name="email" id="email" placeholder="Email" class="form-control" required />
    </div>
    <input type="submit" id="submit" class="btn btn-primary" value="Create an account &rarr;"><br>


  </form> 
</div>



<link rel="stylesheet" href="template/whitey/index.css">