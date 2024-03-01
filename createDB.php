<?php
    
    $hostname = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($hostname, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create the milktea database
    // $sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS milktea";
    // if ($conn->query($sqlCreateDatabase) === TRUE) {
    //     echo "Database created successfully<br>";
    // } else {
    //     echo "Error creating database: " . $conn->error . "<br>";
    // }

    // Switch to the milktea database
    $conn->select_db("milktea");

    // // Create the orders table
    // $sqlCreateTable = "CREATE TABLE IF NOT EXISTS orders (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     product_name VARCHAR(255) NOT NULL,
    //     customer_name VARCHAR(255) NOT NULL,
    //     size VARCHAR(50) NOT NULL,
    //     temperature VARCHAR(50) NOT NULL,
    //     price DECIMAL(10, 2) NOT NULL,
    //     order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    // )";
    // if ($conn->query($sqlCreateTable) === TRUE) {
    //     echo "Table created successfully";
    // } else {
    //     echo "Error creating table: " . $conn->error;
    // }

    // Close connection

    ?>