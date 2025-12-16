<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$sqlFile = 'vagas.sql';

//create a new pdo connection

echo "Connecting to the database server...\n";



try {
    //create connection not specifying the database name
    $pdo = new PDO('mysql:host=', $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    echo "Connected successfully.\n";
    echo "Do you wnat to create the database ande tables? ( digite: 1):\n";

    echo "Do you wnat to insert data in the your database? (digite: 2):\n";
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    if (trim($line) === '1') {
        //READ SQL FILE
        $sql = file_get_contents($sqlFile);
        echo "Creating database and tables...";
        //execute the sql file
        $pdo->exec($sql);
        echo "database and table created sucessfully.";
        exit;
    } elseif (trim($line) === '2') {
        //READ SQL FILE
        $sql = file_get_contents('valores.sql');
        echo "Inserting data into database...";
        //execute the sql file
        $pdo->exec($sql);
        echo "Data inserted successfully.";
        exit;
    } else {
        echo "Operation cancelled.\n";
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
