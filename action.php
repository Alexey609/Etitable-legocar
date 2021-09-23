<?php 
$connect = mysqli_connect("localhost", "root", "", "lego_car");

$input = filter_input_array(INPUT_POST);

$login = mysqli_real_excape_string($connect, $input ["$login"]);
$car = mysqli_real_excape_string($connect, $input ["$car"]);


if ($input["action"] === 'edit')
{
    $query = " 
      UPDATE data_car 
      SET login = '".$login."',
      car = '".$car."'
      WHERE id '".$input["id"]."'
    ";

    mysqli_query = ($connect, $query); 
}

if ($input["action"] === 'delete') 
{
    $query = "
   DELETE FROM data_car
   WHERE id = '".$input["id"]."'
    ";
    mysqli_query = ($connect, $query);
}

echo json_encode($input);
