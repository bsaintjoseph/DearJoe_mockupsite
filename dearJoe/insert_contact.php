<?php
// Database connection
include 'connection.php';

// Check if the contactNumber parameter is set
if (isset($_POST['contactNumber'])) {
    // Sanitize and retrieve the contact number from the POST data
    $contactNumber = filter_var($_POST['contactNumber'], FILTER_SANITIZE_NUMBER_INT);
    
    // Prepare the SQL statement
    $insertQuery = "INSERT INTO ContactTable (contact_number) VALUES (?)";
    $insertParams = array($contactNumber);

    // Execute the query
    $insertExecute = sqlsrv_query($conn, $insertQuery, $insertParams);

    // Check if the query executed successfully
    if ($insertExecute === false) {
        echo "Error inserting contact number: " . print_r(sqlsrv_errors(), true);
    } else {
        echo "Contact number added successfully.";
    }
} else {
    // If contactNumber parameter is not set, display an error message
    echo "Error: Contact number not provided.";
}
?>
