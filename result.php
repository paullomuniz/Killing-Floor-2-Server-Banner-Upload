<?php
$cookie_name = "bannerUrl";

$bannerUrl;

if(!isset($_COOKIE[$cookie_name])) 
{
  header("Location: index.php");
} else {
  
  $bannerUrl = $_COOKIE[$cookie_name];
  
  setcookie($cookie_name, null, -1, '/'); 
}
?>




<html>
<head>

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

	  input[type=text] {
  width: 600;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #580a05;
  color: white;
}
</style>
</head>
<body>

<center>

<br><br>
<p>Your banner link is ready, copy and paste on <b>Horzine Dedicated Server</b></p>


<br><br>
<input type="text" value="<?php echo $bannerUrl ?>" class="w3-input w3-border" width="500" readonly>

<br><br>
<h3>Preview</h3>

<br>

<img src="<?php echo $bannerUrl ?>">

</center>

</body>
</html>

