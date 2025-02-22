<?php
header("Content-Type: application/json");

if (isset($_GET['name']) && !empty($_GET['name'])) {
    $name = urlencode($_GET['name']); 

    $api_url = "https://rickandmortyapi.com/api/character/?name=" . $name;

    $response = file_get_contents($api_url);

    if ($response) {
        echo $response; 
    } else {
        echo json_encode(["error" => "No se pudieron obtener los datos."]);
    }
} else {
    echo json_encode(["error" => "Parámetro 'name' no proporcionado"]);
}
