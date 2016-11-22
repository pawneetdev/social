<html>
<head>
<link rel = "stylesheet" href = "css/style.css">
</head>
<?php
  $bg = array('../img/social1.jpg', '../img/social2.jpg', '../img/social3.jpg', '../img/social4.jpg','../img/social6.jpg'); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>
<style type="text/css">

body{
background: url(images/<?php echo $selectedBg; ?>) no-repeat;

 background-size: 100% 100%;
}

</style>
<body>


<form action = "index.php" method = "POST">

<input type = "text" Placeholder = "First Name" name = "fname" class = "reg_input" value = "<?php @session_start(); if (isset($_SESSION['fname']) && !empty ($_SESSION['fname'])) echo $_SESSION['fname'];?>" style = "width:200px; height:45px; font-size: 20px" required>
<input type = "text" Placeholder = "Last Name" name = "lname" class = "reg_input" value = "<?php if (isset($_SESSION['lname']) && !empty ($_SESSION['lname'])) echo $_SESSION['lname'];?>" style = "width:200px; height:45px; font-size: 20px" required><br><br>
<input type = "email" Placeholder  = "Email" class = "reg_input" name = "email" value = "<?php if (isset($_SESSION['email']) && !empty ($_SESSION['email'])) echo $_SESSION['email'];?>" style = "width:405px; height:45px; font-size: 20px" required><br><br>
<input type = "password" Placeholder = "Password" name = "pass" class = "reg_input" style = "width:405px; height:45px; font-size: 20px" required><br><br>
<input type = "password" Placeholder = "Re-enter Password" name = "pass_again" class = "reg_input" style = "width:405px; height:45px; font-size: 20px" required><br><br>
<label for = "dob" style = "font-size: 20px">Date of Birth</label><br><br>
<input type = "date" id = "dob" name = "dob" min = "1940-12-31" max = "<?php echo date("Y-m-d") ?>" class = "reg_input" value = "<?php if (isset($_SESSION['dob']) && !empty ($_SESSION['dob'])) echo $_SESSION['dob'];?>" style = "width:200px; height:45px; font-size: 20px" required><br><br>
<input type = "radio" value = "female" name = "sex" id = "f" required><label for = "f" style = "font-size: 20px">Female</label>
<input type = "radio" value = "male" name = "sex" id = "m" required><label for = "m" style = "font-size: 20px">Male</label><br><br>
<input type = "submit" value = "Sign Up" class = "button_register">
</form>

</body>
</html>

<?php
session_destroy();
?>