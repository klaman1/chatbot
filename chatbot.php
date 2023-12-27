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
        <div class="botm">
            <?php
             
           session_start();
           $tab = isset($_SESSION['mojaTablica']) ? $_SESSION['mojaTablica'] : array();
           $n=3;
           $i=0;  
          

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
                array_unshift($tab,"<p class='a'>" . $row[1] . $dzsiaj['mday'] . "." . $dzsiaj['mon'] . "." . $dzsiaj['year'] . "</p>");
           
            }  

            else  {
                array_unshift($tab,"<p class='b'>" . $row[1] . "</p>");
            }
            
            
        }
    }
        else{
            array_unshift($tab,"<p class='c'>nie wiem</p>");
          }
         
    }
      }
      if(!empty($tab)){
          
        for ($i = min(count($tab) - 1, $n - 1); $i >= 0; $i--) {
            echo $tab[$i];
        }
        }
      
      else{
        echo "<p> w czym ci pomóc</p>";
      }
      $_SESSION['mojaTablica'] = $tab;
        
    echo "</div>";  
   echo "</div>";
    mysqli_close($baza);
 
?>
  <div class="userm">
       <?php
        $n=3;
        $i=0;  
        $tab2=array();
            $tab2 = isset($_SESSION['mojaTablica2']) ? $_SESSION['mojaTablica2'] : array();
                    if(isset( $_POST['wiad'])){
                        $wiad=$_POST['wiad'];
                          if(!empty($wiad)&& trim($wiad, " ")){
                        array_unshift($tab2,"<p> $wiad </p>");
                          }
                    }
                    if(!empty($tab2)){
          
                        for ($i = min(count($tab2) - 1, $n - 1); $i >= 0; $i--) {
                            echo $tab2[$i];
                        };
                        }
                        echo "</div>";
                    $_SESSION['mojaTablica2'] = $tab2;
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