<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chatbot</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="main">
        <div class="menu">
        </div>
        <div class="chatbot">
            <div class="chat">
                <div class="msg">
            

       
          
  
               
                  <div class='row'>
          <img src="bot.png" alt="bot" id="bot">
        
            <?php
         $tab=array( );
         $oTab = array_splice($tablica, 0, 5);
    $baza = mysqli_connect('localhost', 'root', '', 'chatbot');
    mysqli_select_db($baza, 'chatbot');
    
    if(isset($_POST['wiad'])){
        $wiad = mysqli_real_escape_string($baza, $_POST['wiad']);
        
        if(!empty($wiad)&& trim($wiad, " ")){
      
        
        

        $zap = mysqli_query($baza, "SELECT * FROM zapytania WHERE  zapytanie LIKE '$wiad%'");

        if(mysqli_num_rows($zap)>0){
        while($row = mysqli_fetch_array($zap)){
            if($wiad == "jaka jest dzisiejsza data?"){
                $dzsiaj = getdate();
                echo "<p class='abc'>" . $row[1] . $dzsiaj['mday'] . "." . $dzsiaj['mon'] . "." . $dzsiaj['year'] . "</p>";
            }  

            else  {
                echo "<p class='abc'>" . $row[1] . "</p>";
            }
            
            
        }
    }
        else{
            echo "<p>nie wiem</p>";
          }
    }
      }
      
        
    
   echo "</div>";
    mysqli_close($baza);
?>
       <?php
                    if(isset( $_POST['wiad'])){
                        $wiad=$_POST['wiad'];
                          if(!empty($wiad)&& trim($wiad, " ")){
                        echo "<p class='user_msg' > $wiad </p>";
                          }
                    }
                ?>  
 
</div>
            <form action="chatbot.php" method='post'>
             <input type="text" name=wiad>
                    <button>
                          <img src="img.png" alt="strzłka"> 
                    </button> 
             </form>
        <?php
        
        ?>
            </div>
        </div> 

    </div>
</body>
</html>