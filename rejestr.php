<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rejestracja</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="main">

    <div class="form">
    <h1>zajerestruj się</h1>
        <form method="POST" action="rejestr.php"> 
    <label for="nazwa">nazwa:</label><br>
        <input type="text" id="nazwa " name="nazwa"><br>
    <label for="login">login:</label><br>
        <input type="text" id="login" name="login"><br>
        <label for="password">haslo:</label>
        <input type="password" id="password" name="password">
        <input type="submit" value="zajerestuj sie" name="sub">
</form>
    </div>
    <?php
    $chatbot="chatbot.php";
   
    $baza=mysqli_connect('localhost','root',"",'chatbot');
    mysqli_select_db($baza,'chatbot');
 
if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['nazwa'])){
    $nazwa=$_POST['nazwa'];
    $login=$_POST['login'];
    $password=$_POST['password'];
    $czy_istnieje_n=mysqli_query($baza,"SELECT * FROM users WHERE nazwa='$nazwa'");
    $czy_istnieje_l=mysqli_query($baza,"SELECT * FROM users WHERE login='$login'");
    if (mysqli_num_rows( $czy_istnieje_n)>0) {
        echo "Podana nazwa jest zajeta";
      }
      if (mysqli_num_rows( $czy_istnieje_n)==0) {
        if (mysqli_num_rows( $czy_istnieje_l)>0) {
            echo "Podany login jest zajęty";
          }
          if (mysqli_num_rows($czy_istnieje_l)==0) {
        mysqli_query($baza,"INSERT INTO users (nazwa,login,haslo) VALUES ('$nazwa','$login','$password');");
      header("Location: $chatbot");
      exit;
        
          }
      }
}
   mysqli_close($baza);
    ?>
    </div>
</body>
</html>