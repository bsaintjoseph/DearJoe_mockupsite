<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dear Joe Main</title>
    <!-- materialize cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
<link rel="icon" href=".\assets\logo dear joe white.png">
</head>
<style>
    .brand-logo img {
            max-height: 64px; /* Adjust the max-height as needed */
            padding: 10px; /* Optional: Add padding for spacing */
            
        }
    .logo-text{
        margin-left: 60px;
        font-weight: 500;
      letter-spacing: 1px;
      font-family: "Kanit", sans-serif;
        }
    div .p-text{
        color:  ;
      font-weight: 500;
      letter-spacing: 1px;
      font-family: "Karla", sans-serif;
    }
    .image-container {
    width: 1000px; /* Adjust width as needed */
    height: 700px; /* Adjust height as needed */
    overflow: hidden; /* Hide any overflow if the image exceeds container size */
}

.image-container img {
    width: 100%;
    height: auto;
    display: block; /* Ensures proper alignment and spacing */
}
.gcash{
        max-height: 400px; 
        padding: 10px; 
    }
</style>
<body>
<?php
include 'connection.php'
?>
<?php require './partials/navbar.php' ?>
<!-- <div class="container">
    <div class="row ">
        <div class="col s6 l4">
                <div class="card hoverable">
                    <div class="card-image">
                        <img class="materialboxed" src="./img/Beverages/1.png" alt="">
                        <span class="card-title hide-on-med-and-down jihyo-text "></span>
                    </div>
                    <div class="card-content  jihyo-text">
                    BEVERAGE
                    </div>
                    <div class="card-action ">
                    <form action="beverage.php" method="post">
                        <button type="submit">VIEW MENU</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col s6 l4">
                <div class="card hoverable">
                <div class="card-image">
                    <img class="materialboxed" src="./img/Meal/1.png" alt="">
                    <span class="card-title hide-on-med-and-down jihyo-text "></span>
                </div>
                <div class="card-content  jihyo-text">
                MEAL
                </div>
                <div class="card-action ">
                    <form action="meal.php" method="post">
                        <button type="submit">VIEW MENU</button>
                    </form>
                </div>
                </div>
            </div>
    </div>
</div> -->

<!-- modal div -->


<!-- <div class="row">
    <div class="col l3">
    <?php include('meal2.php'); ?>
    </div>
</div>
<div class="row">
    <div class="col l3">
    <?php include('beverage2.php'); ?>
    </div>
</div> -->
<div class="container">
    <div class="row">
        <div class="col pota">
        <?php
            if(isset($_GET['contact'])){
                include('contact.php');
            }
            ?>   
        </div>
    </div>
</div>     

<div class="">
    <?php
    if(isset($_GET['test'])){
        include('all.php');
    }
    if(isset($_GET['beverage2'])){
        include('drink.php');
    }
    if(isset($_GET['meal2'])){
        include('food.php');
    }
    ?>
</div>

    <div class="row ">
        <div class="col s6 l4 p-text">
            <?php
            if(isset($_GET['meal2'])){
                include('meal2.php');
            }
            if(isset($_GET['beverage2'])){
                include('beverage2.php');
            }
            if(isset($_GET['test'])){
                include('test.php');
            }
            if(isset($_GET['bak'])){
                include('bak.php');
            }
            
            ?>
        </div>
    </div>
</div> 

<div class="row">
    <?php
     if(isset($_GET['cart'])){
        include('cart.php');
    }
    ?>
</div>

<div id="modal1" class="modal">
    <div class="modal-content p-text">
      <h3>Steps on How to Order:</h3>
      <h5>
        Step 1: Add Quantity and Edit it at the same time when adding to Cart.
        Step 2: Rename your photo as proof of payment using your username.
        Step 3: Purchase and add your username.
</h5>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">UNDERSTOOD</a>
    </div>
</div>

    
<!-- <div class="container">
    <div class="row ">
        <div class="col s6 l4">
            
        </div>
    </div>
</div>
<div class="container">
    <div class="row ">
        <div class="col s6 l4">
            
        </div>
    </div>
</div> -->



<?php require './partials/footer.php' ?>

<!-- materialize js -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.parallax').parallax()
      $('.scrollspy').scrollSpy()
      $('.materialboxed').materialbox();
      $('.dropdown-trigger').dropdown({ coverTrigger: false });
      $('.modal').modal();
      $('.tooltipped').tooltip();
      
    });
  </script>
</body>
</html>