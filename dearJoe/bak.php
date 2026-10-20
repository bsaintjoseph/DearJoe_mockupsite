<!-- 



<?php

// $getvaluequery= "SELECT ProductName FROM MealCategory WHERE Id=14";

// $getvaluecmd = sqlsrv_query($conn, $getvaluequery);
// $value = sqlsrv_fetch_array($getvaluecmd, SQLSRV_FETCH_ASSOC);
// echo'<h2>Press the Button</h2>
// <form method="post" action="#!">
//     <input type="submit" name="submit_button" value="Press Me">
// </form>';







echo'<?php';
$sql = "SELECT ProductName, Price, Id FROM Test WHERE ProdStatus =  'Available' AND Category = 'Beverage'";

$command = sqlsrv_query($conn, $sql);


while($row = sqlsrv_fetch_array($command, SQLSRV_FETCH_ASSOC)){
    echo '
    <div class="col s6 l4">
            <div class="card hoverable">
                <div class="card-image">
                    <img class="materialboxed" src="./img/Meal/'.$row['Id'].'.png" alt="">
                    <span class="card-title hide-on-med-and-down jihyo-text black-text"></span>
                </div>
                <div class="card-content  jihyo-text">
                ' . $row['ProductName']. '
                <br></br>
                Price: ' .$row['Price'].
                '</div>
        <div class="card-action ">
        <form method="post">
        <input type="hidden" name="product_name" value="' .$row['ProductName'].'">
        <input type="hidden" name="price" value=" '. $row['Price']. '">
        <input type="hidden" name="id" value=" '. $row['Id']. '">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" min="1" max="100" placeholder="Input Quantity">
        <button class="btn waves-effect waves-light btn-small" type="submit" name="submit_button">Add To Cart
            <i class="material-icons right">shopping_cart</i>
        </button>
    </form>
    </div>
    </div>
</div>';



}

// $server = "DESKTOP-VD7I3J7\SQLEXPRESS";
// $username = ""; // SQL Server username
// $password = ""; // SQL Server password
// $database = "CoffeeShop";

// // Connection options array
// $connectionOptions = array(
//     "Database" => $database,
//     "UID" => $username,
//     "PWD" => $password
// );

// // Establishing the connection
// $conn = sqlsrv_connect($server, $connectionOptions);
// if (!$conn) {
//     die("Connection failed: " . print_r(sqlsrv_errors(), true));
// }




if(isset($_POST['submit_button'])) {
  // Check if the form is submitted


  $quantity = $_POST['quantity']; // Get the quantity from the form
  $productName = $_POST['product_name']; // Get the product name from the form
  $price = $_POST['price']; // Get the price from the form
  $id = $_POST['id']; // Get the product ID from the form
  $TotalPrice = floatval($quantity) * floatval($price);

  // Echo the product name and price
  echo "Product Name: $productName<br>";
  echo "Price: $TotalPrice<br>";
  echo "Quantity: $quantity<br>";

  // Assuming you've established a database connection $conn earlier in your code

  $isProdExistingquery = "SELECT COUNT(ProductName) AS ProdCount FROM Cart WHERE Id =" . $id ;
  $isProdExistingcmd = sqlsrv_query($conn, $isProdExistingquery);



  if ($isProdExistingcmd === false) {
    print_r(sqlsrv_errors());
  }


  if($row = sqlsrv_fetch_array($isProdExistingcmd, SQLSRV_FETCH_ASSOC)){
    $dataExist = floatval($row['ProdCount']) ;
    if ($dataExist == 0){
      echo "Data does not exist";
    $getvaluequery= "INSERT INTO Cart(Id, ProductName, Price, Quantity) VALUES(?, ?, ? ,?)" ;
    $params = array($id, $productName, $price, $quantity);
    $execute = sqlsrv_query($conn, $getvaluequery, $params);
    }else{

      $UpdateQuery = "UPDATE Cart SET Price = ? , Quantity = ? WHERE Id = ". $id;
      $params = array($TotalPrice, $quantity);
      $execute = sqlsrv_query($conn, $UpdateQuery, $params);
      // if ( $execute === false) {
      //   print_r(sqlsrv_errors());
      // }
      
      echo "Data exist";
    }
  }

}


?> -->
