<?php 
	echo 'je suis le test : ' . $id;
	echo '<br/>';
	echo 'je suis visible ici : ' . Router::url($uri, ['id' => $id]);
?>

<h1>TEST</h1>
<p><?php echo $content; ?></p>