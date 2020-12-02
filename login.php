<?php session_start(); /* Starts the session */
	
	// Open the file
	$filename = "Passwords_Common-Credentials_10-million-password-list-top-100.txt"
	$fp = @fopen($filename, 'r'); 

	// Add each line to an array
	if ($fp) {
   		$array = explode("\n", fread($fp, filesize($filename)));
	}
	/* Check Login form submitted */	
	if(isset($_POST['Submit'])){
		/* Define username and associated password array */
		
		/* Check and assign submitted Username and Password to new variable */
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		
		/* Check Username and Password existence in defined array */		
		if (!in_array($Password, $array)){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION["admin"]="admin";
			header("location:index.php");
			exit;
		} else {
			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Invalid Login Details</span>";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Login Script Without Using Database</title>
<link href="./css/style.css" rel="stylesheet">
</head>
<body>
<div id="Frame0">
  <h1>Login</h1>
</div>
<br>
<form action="<?php $_PHP_SELF ?>" method="POST" name="Login_Form">
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="2" align="left" valign="top"><h3>Login</h3></td>
    </tr>
    <tr>
      <td align="right">Password</td>
      <td><input name="Password" id="psw" type="password" class="Input" pattern=".{8,}" title="Must contain at least 8 or more characters" required></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
    </tr>
  </table>
</form>
</body>
</html>