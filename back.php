<?php

// include "dbconnect.php";

// $na= 1;
// $sql="SELECT * FROM `data`";

    $result=mysqli_query($con,$sql);
    $row=mysqli_num_rows($result);

    while($na<=$row){
      $na=$na+1;
    }

    
    if($row>1){
      while($ver=mysqli_fetch_assoc($result)){

        $na=$na+1;

        echo '
        <div class="container my-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="card">
          <h5 class="card-header">'.$ver["time"].'</h5>
          <div class="card-body my-2">
            <h5 class="card-title">Data</h5>
            <p class="card-text">1. Caloried Burnt :-'.$ver["calorie"].' Kcal</p>
            <p class="card-text">2. Average Heart Rate :-'.$ver["rate"].'</p>
            <p class="card-text">3. Total Distance Traveled :- '.$ver["distance"].' Km</p>
            <p class="card-text">4. Average Speed :- '.$ver["speed"].' Km/hr</p>
        
        
          </div>
        </div>
        </div>';
        $na=$na+1;
        
      }

    }

?>