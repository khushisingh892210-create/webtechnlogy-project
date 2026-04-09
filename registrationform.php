<?php

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];

$errors = [];

// Name validation
if (empty($name)) {
    $errors[] = "Name is required";
}

// Email validation
if (empty($email)) {
    $errors[] = "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}

// Age validation
if (empty($age)) {
    $errors[] = "Age is required";
} elseif (!is_numeric($age)) {
    $errors[] = "Age must be a number";
}

// Display results
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
} else {
    echo "Form submitted successfully!<br>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Age: $age <br>";
}

?>