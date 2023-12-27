<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logwanie</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="main">

<div class="form" >
<h1>zaloguj się</h1>
<br>
    <form  method="POST"  action="logowanie.php" >
        <label for="login">login:</label> <br>
        <input type="text" id="login" name="login"><br>
        <label for="password">hasło:</label><br>
        <input type="password"  name="password"><br>
        <input type="submit" value="zaloguj sie" name="sub"><br>
        <a href="rejestr.php">nie masz jescze konta? załóż je</a>

    </form>
<?php
$chatbot="chatbot.php";
   $baza=mysqli_connect('localhost','root',"",'chatbot');
   mysqli_select_db($baza,'chatbot');
   if(isset( $_POST['login']) && isset($_POST['password'])){
    $login=$_POST['login'];
    $password=$_POST['password'];
   if (mysqli_num_rows(mysqli_query($baza,"SELECT login, haslo FROM users WHERE login = '".$login."' AND haslo = '".$password."';")) > 0){
    header("Location: $chatbot");
    exit;
   }
   
   else{ 
    echo "<p> wpisz poprawne dane </p>";
   }
}
else{ 

}

?>
</div>
</div>
   
</body>
</html>