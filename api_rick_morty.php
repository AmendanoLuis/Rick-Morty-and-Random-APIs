<?php
/**
 * Archivo: api_rick_morty.php
 * Descripción: Script PHP que actúa como intermediario para obtener datos de personajes de la API de Rick and Morty.
 * Devuelve una respuesta en formato JSON con la información obtenida de la API externa.
 *
 * @author Luis Augusto Procel Amendaño
 * @version 1.0
 */

header("Content-Type: application/json");

/**
 * Obtiene la información de un personaje de la API de Rick and Morty.
 *
 * @param string $name Nombre del personaje a buscar.
 * @return string JSON con la información del personaje o un mensaje de error.
 */
function obtenerPersonaje($name) {
    /**
     * @var string $api_url URL de la API con el parámetro de búsqueda
     */
    $api_url = "https://rickandmortyapi.com/api/character/?name=" . urlencode($name);

    /**
     * @var string|false $response Respuesta JSON obtenida de la API
     */
    $response = file_get_contents($api_url);

    return $response ?: json_encode(["error" => "No se pudieron obtener los datos."]);
}

/**
 * Verifica si se ha proporcionado un parámetro 'name' en la URL y devuelve la información del personaje.
 *
 * @return void
 */
function mostrarPersonaje() {
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        echo obtenerPersonaje($_GET['name']);
    } else {
        echo json_encode(["error" => "Parámetro 'name' no proporcionado"]);
    }
}

mostrarPersonaje();
