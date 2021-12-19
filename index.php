
<?php

$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

//$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );

$alertMessage = parse_url($url, PHP_URL_QUERY); 

if ($alertMessage == 'error')
{
	echo '<h2><p style="color:#580a05;">Only <font color="red">512x256</font> images are accepted!</p></h2>';
} 
else if ($alertMessage == 'captcha')
{
	echo '<h2><p style="color:#580a05;">The <font color="red">reCaptcha</font> verification are incorret!</p></h2>';
} 
?>

<html>
<head>

<meta name="description" content="Upload now your Killing Floor 2 Server Banner.">
<meta name="keywords" content="Killing Floor 2, Killing Floor 2 Server, KF2, KF2 Server, Dedicated Server,  BannerLink, Killing Floor 2 Banner, Upload, Upload Banner, Server Banner, Killing Floor 2 Banner Upload, KF2 Banner Upload"/>

<title>Killing Floor 2 Server Banner Upload</title>

<style>
.button {
  background-color: #580a05;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>

<center>

<br>
<p><h2>Upload your server banner here to works correctly on your server</h2></b></p>

<br><br>
<form action="upload_banner.php" method="post"
enctype="multipart/form-data">


<input type="file" name="file" accept="image/png" />

<br><br>
<div class="g-recaptcha" data-sitekey="6LfqSWUdAAAAAESUCyHZU55uLyvY5uP5qr1kHCjP"></div>
<br>


<input type="submit" name="submit" value="Upload Banner" class="button">
</form>

<br><br>
<h3>Banner Example</h3>

Size: <b>512x256</b>
<br>
Type: <b>PNG</b>
<br><br>
<img src="https://i.imgur.com/yrT1or3.png">
</center>

</body>
</html>
