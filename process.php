<?php
include 'config.php';

$errors = [];

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Front-end validation for phone number
     $phoneRegex = "/^\d{10}$/";
     if (!preg_match($phoneRegex, $_POST['phone'])) {
         $errors[] = "Invalid phone number format. Please enter a 10-digit number without dashes.";
     }
 
     // Check if there are no validation errors
     if (empty($errors)) {
        // Retrieve form data
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

        // Insert data into the database
        $sql = "INSERT INTO customers (customer_name, address1, address2, city, state, zip, phone, email, business_type, preferred_days)
                VALUES ('$customerName', '$address1', '$address2', '$city', '$state', '$zip', '$phone', '$email', '$businessType', '$preferredDays')";

        if ($conn->query($sql) === TRUE) {
            // Retrieve the auto-incremented id (account number) for the new customer
            $accountNumber = $conn->insert_id;

            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }
    }
}

$conn->close();
?>


