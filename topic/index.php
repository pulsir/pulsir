<?php
include '../boot.php';

$obj->get_page_header('whitey', 'Viewing topic', '');
$obj->get_page_menu('whitey', $_COOKIE['plluser']);
if(isset($_GET['view'])){
echo '<h3>Viewing topic: <a href="http://pulsir.eu/topic/?view='.$_GET['view'].'">'.$_GET['view'].'</a></h3>';
echo '<p>Here\'s what people are talking about '.htmlentities($_GET['view']).'. <a href="index.php">Try another topic</a><hr>';
$obj->get_tagged_posts($_GET['view']);
echo '</div>';
echo '<h3 style="text-align:center;">That\'s all we\'ve got on '.htmlentities($_GET['view']).'.</h3>';
echo '<p style="text-align:center;">Pulsir is a hosted, beautiful and easy to use blogging platform. We take care of everything, no fees or ads on your content. <a href="../index.php?ref=topicland">Start writing today</a>, for free, forever.</p>';
}
else {
echo '<div class="ac">
<h3>See what people are talking about something.</h3>
<form action="index.php" method="get">
<input type="text" name="view" placeholder="Enter a topic" />
</form>
</div>';

}
$obj->get_page_footer('whitey');
?>
