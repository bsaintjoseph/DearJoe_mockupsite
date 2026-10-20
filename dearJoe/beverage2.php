<?php

echo '<?php';
// $subtractQuantityQuery = "UPDATE Test SET Quantity = Quantity - ? WHERE Id = ?";
// $subtractQuantityParams = array($inputQuantity, $id);
// $subtractQuantityExecute = sqlsrv_query($conn, $subtractQuantityQuery, $subtractQuantityParams);


if (isset($_POST['submit_button'])) {
    $productName = $_POST['product_name'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    $inputQuantity = $_POST['quantity'];

    // Fetch the current quantity for the product from the Test table
    $getTestQuantityQuery = "SELECT Quantity FROM Test WHERE Id = ?";
    $getTestQuantityParams = array($id);
    $getTestQuantityExecute = sqlsrv_query($conn, $getTestQuantityQuery, $getTestQuantityParams);

    if ($getTestQuantityExecute === false) {
        echo "Error fetching quantity from Test table: " . print_r(sqlsrv_errors(), true);
    } else {
        $row = sqlsrv_fetch_array($getTestQuantityExecute, SQLSRV_FETCH_ASSOC);
        $availableQuantity = intval($row['Quantity']);

        // Check if the input quantity is greater than the available quantity
        if ($inputQuantity > $availableQuantity) {
            echo "Insufficient quantity available in stock.";
        } else {
            // Check if the product already exists in the Cart table
            $checkCartQuery = "SELECT * FROM Cart WHERE Id = ?";
            $checkCartParams = array($id);
            $checkCartExecute = sqlsrv_query($conn, $checkCartQuery, $checkCartParams);

            if ($checkCartExecute === false) {
                echo "Error checking Cart table: " . print_r(sqlsrv_errors(), true);
            } else {
                if (sqlsrv_has_rows($checkCartExecute)) {
                    // Product already exists in cart, update the quantity
                    $updateCartQuery = "UPDATE Cart SET Quantity = ? WHERE Id = ?";
                    $updateCartParams = array($inputQuantity, $id);
                    $updateCartExecute = sqlsrv_query($conn, $updateCartQuery, $updateCartParams);

                    if ($updateCartExecute === false) {
                        echo "Error updating quantity in Cart table: " . print_r(sqlsrv_errors(), true);
                    } else {
                        echo "Quantity updated in cart successfully.";
                    }
                } else {
                    // Product does not exist in cart, insert new record
                    $insertCartQuery = "INSERT INTO Cart (Id, ProductName, Price, Quantity) VALUES (?, ?, ?, ?)";
                    $insertCartParams = array($id, $productName, $price, $inputQuantity);
                    $insertCartExecute = sqlsrv_query($conn, $insertCartQuery, $insertCartParams);

                    if ($insertCartExecute === false) {
                        echo "Error inserting into Cart table: " . print_r(sqlsrv_errors(), true);
                    } else {
                        echo "Quantity inserted into cart successfully.";
                    }
                }
            }
        }
    }
}


echo'<?php';
$sql = "SELECT ProductName, Price, Id, Quantity FROM Test WHERE ProdStatus = 'Available' AND Category = 'Beverage' AND Quantity > 0 ";

$command = sqlsrv_query($conn, $sql);

while($row = sqlsrv_fetch_array($command, SQLSRV_FETCH_ASSOC)){
    echo '
    <div class="col s6 l4 p-text">
        <div class="card hoverable">
            <div class="card-image">
                <img class="materialboxed" src="./img/Both/'.$row['Id'].'.png" alt="">
                <span class="card-title hide-on-med-and-down jihyo-text black-text"></span>
            </div>
            <div class="card-content  jihyo-text">
                ' . $row['ProductName']. '
                <br></br>
                Price: ' .$row['Price']. '
                <br>
                Quantity: ' . $row['Quantity'] . '
                <br></br>
            </div>
            <div class="card-action ">
                <form method="post">
                    <input type="hidden" name="product_name" value="' .$row['ProductName'].'">
                    <input type="hidden" name="price" value=" '. $row['Price']. '">
                    <input type="hidden" name="id" value=" '. $row['Id']. '">
                    <input type="number" name="quantity" min="1" max="20" placeholder="Input Quantity" style="color: #333; font-family: inherit;" oninput="this.value = this.value.slice(0, 2)">                         <button class="btn waves-effect waves-light btn-small" type="submit" name="submit_button">Add or Edit Cart
                        <i class="material-icons right">shopping_cart</i>
                    </button>
                </form>
            </div>
        </div>
    </div>';

}

?>