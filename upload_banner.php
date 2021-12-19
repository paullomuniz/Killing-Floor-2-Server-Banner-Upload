<?php

$currentPath = $_SERVER['PHP_SELF']; 

$pathInfo = pathinfo($currentPath); 

$hostName = $_SERVER['HTTP_HOST']; 

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

$siteLink =  $protocol.'://'.$hostName.$pathInfo['dirname']."/"


	
?>

<?php
$recaptcha=$_POST['g-recaptcha-response'];

if($recaptcha!= ''){
	$secret="6LfqSWUdAAAAACtKZwN-Z7gXautN1selLHlDNhpW";
	$ip = $_SERVER['REMOTE_ADDR'];
	$var = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha");
	$array = json_decode($var,true);
	echo "<hr>";
	var_dump($array);
	if($array['success'])
	{
	


	
//Verifica tamanho da imagem
$image_info = getimagesize($_FILES["file"]["tmp_name"]);
$image_width = $image_info[0];
$image_height = $image_info[1];


if ($image_width > 512 || $image_height > 256)
{

header("Location: index.php?error");
}
else if ($image_width < 512 || $image_height < 256)
{

header("Location: index.php?error");
}
else
{
	if ($_FILES['file']['size'] == 0 )
{
    
	header("Location: index.php?error");
}
else
{

 //Gera nome aleatorio para a imagem
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

$newName;
 
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
 
$newName = generate_string($permitted_chars, 7);

$newName = $newName . ".png";

/////////////////////////////////////////////////////////////////////

//Faz o upload da imagem
$allow = array("jpg", "jpeg", "gif", "png");

$todir = 'a/';


if ( !!$_FILES['file']['tmp_name'] ) 
{
    $info = explode('.', strtolower( $_FILES['file']['name']) );

    if ( in_array( end($info), $allow) ) 
    {
        if ( move_uploaded_file( $_FILES['file']['tmp_name'], $todir . basename($newName) ) )
        {
            // o arquivo foi upado corretamente
        }
    }
    else
    {
        // erro, arquivo não aceito
		header("Location: index.php?error");
    }
}


















//Gera link da imagem
$fullURL = $siteLink . 'a/' . $newName;













//Cria cookie com o link da imagem 
$cookie_name = "bannerUrl";
$cookie_value = $fullURL;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

header("Location: result.php");

}
}
	}
	else
	{
		header("Location: index.php?captcha");
	}
}
else{
	header("Location: index.php?captcha");
}
?>

<?php

?>
