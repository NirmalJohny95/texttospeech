<?php
if(isset ($_POST['submit'])){
	$text = substr($_POST['text2speech'], 0, 100);
   	$text = urlencode($text);
 
   	$file  = 'text2speech';
   	$file = "audio/" . $file . ".mp3";
 
   	$mp3 = file_get_contents("http://translate.google.com/translate_tts?tl=en&q=$text");
 
   	file_put_contents($file, $mp3);
}
?>

<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css">
<title>Text-to-Speech</title>
</head>
<body>
	<div id="container">
    	<h1>Text-to-Speech Using Google Speech API</h1>
        <div class="text">
            <form action="" method="post">
                <input name="text2speech" id="text2speech">
                <input type="submit" name="submit" value="Translate!" id="translate">
            </form>
	
		<?php if(isset($_POST['submit'])){?>
            <audio id="for_audio" controls="controls" autoplay="autoplay">
                <source src="<?php echo $file ?>">
            </audio>
        <?php } ?>
    	</div>
    </div>
</body>
</html>