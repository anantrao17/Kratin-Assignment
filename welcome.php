<?php

session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
  session_start();
session_unset();
session_destroy();
header('location: index.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Welcome</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Welcome   <?php echo $_SESSION['username']; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
      <form class="d-flex" method="post">
        
        <button class="btn btn-outline-success" type="submit" name="logout">Logout</button>
      </form>
    </div>
  </div>
</nav>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner" style="height: 600px;">
    <div class="carousel-item active">
      <img src="1.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class=" shadow-lg p-3 mb-5 my-4 bg-body rounded" >
        <h1 style="display:flex; justify-content:center; align-items:center;" class="my-5">Data</h1>
        </div>
<?php

// include "dbconnect.php";

// $na= 1;
// $sql="SELECT * FROM `data`";

$api_url = 'https://api.thingspeak.com/channels/1400664/fields/1,2.json?api_key=X7WMQHTVYEGIHNGR&results=9';
$json_data = file_get_contents($api_url);

$response_data = json_decode($json_data);
static $val=0;

    
      while($val<9){

        echo '
        <div class="container my-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="card">
          <h5 class="card-header">'.($response_data->feeds[$val]-> created_at).'</h5>
          <div class="card-body my-2">
            <h5 class="card-title">Data</h5>
            <p class="card-text">1. Heart Rate :-'.($response_data->feeds[$val]-> field1).' Bpm</p>
            <p class="card-text">2. SpO2 :-'.($response_data->feeds[$val]-> field2).'</p>
            <p class="card-text">3. Total Distance Traveled :- 60 Km</p>
            <p class="card-text">4. Average Speed :- 25 Km/hr</p>
        
        
          </div>
        </div>
        </div>';
        $val=$val+1;;
        
      }

    

?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>