<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerID = $_POST['customer_id'];
    $customerName = $_POST['customer_name'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $businessType = $_POST['business_type'];
    $preferredDays = implode(",", $_POST['preferred_days']);

    $sqlUpdate = "UPDATE customers 
                  SET customer_name = '$customerName',
                      address1 = '$address1',
                      address2 = '$address2',
                      city = '$city',
                      state = '$state',
                      zip = '$zip',
                      phone = '$phone',
                      email = '$email',
                      business_type = '$businessType',
                      preferred_days = '$preferredDays'
                  WHERE id = $customerID";

    if ($conn->query($sqlUpdate) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating customer: " . $conn->error;
    }
}

$conn->close();
?>