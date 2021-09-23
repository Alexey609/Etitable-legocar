<?php

$data = $_POST;
$errors = [];
$inputs = [
    'name' => 'Логин',
    'car' => 'Машина',
//    'pic' => 'Фото',
];

foreach ($data as $key => $datum) {
    if (empty($datum)) {
        $errors[] = 'Заполните ' . $inputs[$key];
    }
}

if (!empty($errors)) {
    echo json_encode([
        'status' => false,
         'errors' => $errors
    ]);die;
}

$db = new PDO('mysql:host=127.0.0.1;dbname=lego_car',
    'root',
    '');


$stmt = $db->prepare(
    "INSERT INTO data_car (name, car) VALUES (?, ?)"
);

$stmt->execute([
    $data['name'],
    $data['car'],
//    $data['pic'],
]);

echo json_encode([
    'status' => true,
    'message' => 'Вы зарегистрированы'
]);die;
