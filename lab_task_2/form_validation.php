<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$kk = 0;
$nameErr = $emailErr = $birthErr = $genderErr = $degreeErr = $bloodErr = "";
$name = $email = $birth = $gender = $degree = $blood = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["name"])) 
  {
    $nameErr = "Name is required";
  } 
  else 
  {
    if(str_word_count($_POST["name"])<2)
	{
		$nameErr = "Atleast two word needed";
	}
	else
	{
		$name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
	{
      $nameErr = "Only letters and white space allowed";
    }
	}
  }
  
  if (empty($_POST["email"])) 
  {
    $emailErr = "Email is required";
  } 
  else 
  {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["birth"])) 
  {
    $birthErr = " Is empty!";
  } 
  else 
  {
    $birthErr = "";
	$birth = $_POST["birth"];
  }


  if (empty($_POST["gender"])) 
  {
    $genderErr = "Gender is required";
  } else 
  {
    $gender = $_POST["gender"];
  }
  
  
  
}


?>


<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	<fieldset style = "width:30%;">
		<legend><b>NAME</b></legend>
			<input type="text" name="name">
			<span class="error">* <?php echo $nameErr;?></span>
	</fieldset><br><br>
  
	
	<fieldset style = "width:30%;">
		<legend><b>EMAIL</b></legend>
			<input type="text" name="email">
			<span class="error">* <?php echo $emailErr;?></span>
	</fieldset><br><br>
  
	
	<fieldset style = "width:30%;">
		<legend><b>DATE OF BIRTH</b></legend>
			<input type="date" name="birth">
			<span class="error">* <?php echo $birthErr;?></span>
	</fieldset><br><br>
  
	<fieldset style = "width:30%;">
		<legend><b>GENDER</b><span class="error">* <?php echo $genderErr;?></legend>
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other 
	</fieldset><br><br>
		<input type="submit" name="submit" value="Submit"> 
		
		
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $birth;
echo "<br>";
echo $gender;
?>

</body>
</html>