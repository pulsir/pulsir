<?php
if($_COOKIE['cookieconsent'] != 'allow'){
echo '<h4>Pulsir uses cookies to enhance user experience.</h4>
<p>By using Pulsir, you are agreeing to our use of cookies. To find out more, please visit <a href="http://devwiki.plsr.tk/index.php?title=Cookies">the Pulsir cookie information page</a>.</p>
<p>This message will appear only once on this computer.</p>
<hr>';
setcookie('cookieconsent', 'allow', time()+(31540000));
}
?>