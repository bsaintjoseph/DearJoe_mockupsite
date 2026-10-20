<div class="container">
    <div class="row">
    <?php
if (isset($_POST['submit_button'])) {
    $id = $_POST['id'];

    // Delete query
    $deleteQuery = "DELETE FROM Cart WHERE Id = ?";
    $deleteParams = array($id);
    $deleteExecute = sqlsrv_query($conn, $deleteQuery, $deleteParams);

    if ($deleteExecute === false) {
        echo "Error deleting data: " . print_r(sqlsrv_errors(), true);
    } else {
        echo 'Deleted';
    }
}

    $sql = "SELECT ProductName, Price, Id, Quantity FROM Cart; DELETE FROM Cart where Quantity < 1";

    $command = sqlsrv_query($conn, $sql);

    while ($row = sqlsrv_fetch_array($command, SQLSRV_FETCH_ASSOC)) {
        echo '
        <div class="col s6 l4 p-text">
            <div class="card hoverable">
                <div class="card-image">
                    <img class="materialboxed" src="./img/Both/' . $row['Id'] . '.png" alt="">
                    <span class="card-title hide-on-med-and-down jihyo-text black-text "></span>
                </div>
                <div class="card-content jihyo-text">
                    ' . $row['ProductName'] . '
                    <br></br>
                    Price: ' . $row['Price'] . '
                    <br></br>
                    <input type="hidden" name="id" value="' . $row['Id'] . '">
                    Quantity: <span class="quantity-display" id="quantity-' . $row['Id'] . '">' . $row['Quantity'] . '</span>
                </div>
                <div class="card-action">
                    <form method="post">
                        <input type="hidden" name="id" value="' . $row['Id'] . '">
                        <button class="btn waves-effect waves-light btn-small" type="submit" name="submit_button">Delete From Cart
                            <i class="material-icons right">shopping_cart</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>';
    }

    
    // Check if the Cart is empty to hide the Purchase button
    $sqlCheckCart = "SELECT COUNT(*) AS TotalItems FROM Cart";
    $commandCheckCart = sqlsrv_query($conn, $sqlCheckCart);
    $rowCheckCart = sqlsrv_fetch_array($commandCheckCart, SQLSRV_FETCH_ASSOC);

    if ($rowCheckCart['TotalItems'] > 0) {
        echo '<div class="container">
        <div class="row">
            <div class="col s12 center">
                <!-- Call JavaScript function on button click -->
          
                <button id="purchaseButton" type="number" class="btn waves-effect waves-light" onclick="promptForEmail()" type="button">Purchase
                <i class="material-icons right">add_shopping_cart</i>
            </button>            
            </div>
        </div>
            </div>';
            
        //     <div class="container">
        //     <div class="row">
        //         <div class="col s12 center">
        //             <form method="post" enctype="multipart/form-data">
        //                 <input type="file" name="photo" accept="image/*" id="photoInput" onchange="toggleAddPhotoButton()">
        //                 <button class="btn waves-effect waves-light" type="submit" name="add_photo_button" id="addPhotoButton" disabled>Add Photo</button>
        //             </form>
        //         </div>
        //     </div>
        // </div>';
    }
// inserting photo

    // if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    //     $photoName = $_FILES['photo']['name']; // Get the name of the uploaded photo
    //     $photoTmp = $_FILES['photo']['tmp_name'];

    //     // Read the contents of the uploaded file
    //     $photoData = file_get_contents($photoTmp);

    //     // Prepare and execute the insert query
    //     $insertPhotoQuery = "INSERT INTO NewPhoto (PhotoName, PhotoData) VALUES (?, ?)";
    //     $params = array(
    //         array($photoName, SQLSRV_PARAM_IN),
    //         array($photoData, SQLSRV_PARAM_IN, SQLSRV_PHPTYPE_STREAM(SQLSRV_ENC_BINARY))
    //     );
    //     $insertPhotoExecute = sqlsrv_query($conn, $insertPhotoQuery, $params);

    //     if ($insertPhotoExecute === false) {
    //         echo "Error inserting photo data: " . print_r(sqlsrv_errors(), true);
    //     } else {
    //         echo "Photo inserted successfully!";
    //     }
    // }

    // 

    // email textbox appear
//     <script>
// function promptForEmail() {
//     var email = prompt("Enter Contact number");
//     if (email !== null && email !== "") {
//         // Remove any non-numeric characters
//         // email = email.replace(/\D/g, '');
        
//         // // Limit the input to 11 characters
//         // email = email.slice(0, 11);
        
//         if (email.length !== 11) {
//             alert("Contact number must be exactly 11 digits.");
//         } else {
//             // Send the email address along with the purchase request
//             document.querySelector('[name="email"]').value = email;
//             // Submit the form
//             document.querySelector('[name="purchase_button"]').click();
//         }
//     } else {
//         alert("Number cannot be more than 11 or less than 11");
//     }
// }    

//         function toggleAddPhotoButton() {
//             var photoInput = document.getElementById('photoInput');
//             var addPhotoButton = document.getElementById('addPhotoButton');
//             addPhotoButton.disabled = photoInput.files.length === 0;

//             var purchaseButton = document.getElementById('purchaseButton');
//             purchaseButton.disabled = photoInput.files.length === 0;
//         }
//     </script>
?>
    <form method="post" style="display: none;">
        <!-- Hidden input to identify the action -->
        <input type="hidden" name="action" value="purchase">
        <!-- Hidden input to store the email address -->
        <input type="hidden" name="email">

        <!-- Hidden input to trigger purchase logic -->
        <button type="submit" name="purchase_button"></button>
    </form>

    <?php

    // purchase button logic
  
// if (isset($_POST['purchase_button'])) {
//     // Handle purchase logic
//     // Check if email is provided
//     if (!empty($_POST['email'])) {
//         $email = $_POST['email'];

//         // Check if email already exists in the Username table
//         $checkEmailQuery = "SELECT COUNT(*) AS ContactCount FROM Username WHERE contact = ?";
//         $checkEmailParams = array($email);
//         $checkEmailExecute = sqlsrv_query($conn, $checkEmailQuery, $checkEmailParams);

//         if ($checkEmailExecute === false) {
//             echo "Error checking contact number: " . print_r(sqlsrv_errors(), true);
//             exit; // Exit the script if there's an error checking contact number
//         }

//         $contactCount = sqlsrv_fetch_array($checkEmailExecute, SQLSRV_FETCH_ASSOC)['ContactCount'];

//         if ($contactCount > 0) {
//             echo "Contact number already in use.";
//             exit; // Exit the script if the contact number is already in use
//         }

//         // Insert contact number into Username table if it's not already in use
//         $insertContactQuery = "INSERT INTO Username (contact) VALUES (?)";
//         $insertContactParams = array($email);
//         $insertContactExecute = sqlsrv_query($conn, $insertContactQuery, $insertContactParams);

//         if ($insertContactExecute === false) {
//             echo "Error inserting contact number: " . print_r(sqlsrv_errors(), true);
//             exit; // Exit the script if there's an error inserting contact number
//         }

//         // Insert data from Cart into OnlineOrders table
//         $insertOrdersQuery = "
//             INSERT INTO OnlineOrders (ProductName, Price, Quantity, userId)
//             SELECT ProductName, Price, Quantity, u.userId
//             FROM Cart c
//             JOIN Username u ON u.contact = ?
//         ";
//         $insertOrdersParams = array($email);
//         $insertOrdersExecute = sqlsrv_query($conn, $insertOrdersQuery, $insertOrdersParams);

//         if ($insertOrdersExecute === false) {
//             echo "Error inserting data into OnlineOrders: " . print_r(sqlsrv_errors(), true);
//         } else {
//             // Clear the Cart table after successful purchase
//             $truncateCartQuery = "TRUNCATE TABLE Cart";
//             $truncateCartExecute = sqlsrv_query($conn, $truncateCartQuery);

//             if ($truncateCartExecute === false) {
//                 echo "Error clearing cart: " . print_r(sqlsrv_errors(), true);
//             } else {
//                 echo "Purchase successful!";
//             }
//         }
//     } else {
//         echo "Contact number is required to proceed with the purchase.";
//     }
// }
    ?>
</div>
</div>

<!-- materialize js -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('.parallax').parallax();
        $('.scrollspy').scrollSpy();
        $('.materialboxed').materialbox();
        $('.dropdown-trigger').dropdown({ coverTrigger: false });
    });
</script>
</body>
</html>
