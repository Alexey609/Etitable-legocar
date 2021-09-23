<?php
// try {
//     $db = new PDO("mysql:host=localhost;dbname=teh_fact", "root", "");
//     $statement = $db->query("SELECT * FROM table_1");
//     $posts = $statement->fetchAll(PDO::FETCH_OBJ);
// } catch (PDOException  $e) {
//     throw new Exception("Can't execute query: " . $e);
// }
$connect = mysqli_connect("localhost", "root", "", "lego_car");
$query = "SELECT * FROM data_car";
$result = mysqli_query($connect, $query);
