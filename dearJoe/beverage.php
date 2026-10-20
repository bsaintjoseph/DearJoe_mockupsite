<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dear Joe Beverage</title>
    <!-- bootstrap cdn -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <!-- materialize cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
include 'connection.php'
?>
<?php require './partials/navbar.php' ?>

<div class="container">
<?php
$sql = "SELECT ProductName, Price, Id FROM BeveragesCategory WHERE ProdStatus =  'Available' ";

$command = sqlsrv_query($conn, $sql);

echo '<div class="row">';
while($row = sqlsrv_fetch_array($command, SQLSRV_FETCH_ASSOC)){
    echo '<div class="col s6 l4">
    <div class="card hoverable">
    <div class="card-image">
        <img class="materialboxed" src="./img/Beverages/'.$row['Id'].'.png" alt="">
        <span class="card-title hide-on-med-and-down jihyo-text black-text">' . $row['ProductName']. '</span>
    </div>
    <div class="card-content  jihyo-text">
        Price:' .$row['Price'].
    '</div>
    <div class="card-action ">
        <button>ADD TO CART</button>
    </div>
    </div>
</div>';
}
echo '</div>';



?>
</div>


 
<?php require './partials/footer.php' ?>
  <!-- bootstrap js -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
  <!-- materialize js -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.parallax').parallax()
      $('.scrollspy').scrollSpy()
      $('.materialboxed').materialbox();
      
      
    });
  </script>
</body>
</html>


