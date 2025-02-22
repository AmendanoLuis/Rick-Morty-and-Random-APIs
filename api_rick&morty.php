<?php
/**
 * Archivo: api_rick&morty.php
 * Descripción: Script PHP que actúa como intermediario para obtener datos de personajes de la API de Rick and Morty.
 * Devuelve una respuesta en formato JSON con la información obtenida de la API externa.
 * 
 * @author Luis Augusto Procel Amendaño
 * @version 1.0
 */

header("Content-Type: application/json");

/**
 * Verifica si se ha proporcionado un parámetro 'name' en la URL y realiza una solicitud a la API de Rick and Morty.
 * 
 * @return void
 */
if (isset($_GET['name']) && !empty($_GET['name'])) {
    /** 
     * @var string $name Nombre del personaje codificado para URL
     */
    $name = urlencode($_GET['name']); 

    /** 
     * @var string $api_url URL de la API con el parámetro de búsqueda 
     */
    $api_url = "https://rickandmortyapi.com/api/character/?name=" . $name;

    /** 
     * @var string|false $response Respuesta JSON obtenida de la API 
     */
    $response = file_get_contents($api_url);

    if ($response) {
        echo $response; 
    } else {
        echo json_encode(["error" => "No se pudieron obtener los datos."]);
    }
} else {
    echo json_encode(["error" => "Parámetro 'name' no proporcionado"]);
}
