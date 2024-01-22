<?php
// Lee el contenido del archivo JSON y devuelve un array 
function cargarDiccionario(): array {
    $contenidoJSON = file_get_contents('diccionario.json');
    return json_decode($contenidoJSON, true);
}

// Función de traducción
function traducir(string $clave, string $idioma, array $diccionario): string {
    return $diccionario[$idioma][$clave] ?? $clave;
}

// Obtener el idioma del usuario 
function obtenerIdiomaUsuario(): string {
    return 'es';  // Puedes implementar la lógica para obtener el idioma dinámicamente
}

// Ejecución principal


// Cargar el diccionario una vez al inicio
$diccionario = cargarDiccionario();

// Idioma del usuario
$idiomaUsuario = obtenerIdiomaUsuario();

// Ahora puedes utilizar la función traducir en cualquier parte de tu código
