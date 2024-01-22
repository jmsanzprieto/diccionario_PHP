<?php
if (isset($_POST['idioma'])) {
    $idiomaUsuario = $_POST['idioma'];

    // Lee el contenido del archivo JSON
    $contenidoJSON = file_get_contents('diccionario.json');

    // Decodifica el JSON en un array asociativo
    $diccionario = json_decode($contenidoJSON, true);

    // Función de traducción
    function traducir(string $clave, string $idioma): string {
        global $diccionario;
        return $diccionario[$idioma][$clave] ?? $clave;
    }

    // Contenido actualizado con el nuevo idioma
    ?>
    <h1 class="mb-4"><?php echo traducir('titulo', $idiomaUsuario); ?></h1>
    
    <div class="alert alert-info">
        <?php echo traducir('bienvenido', $idiomaUsuario); ?>
    </div>

    <p><?php echo traducir('saludo', $idiomaUsuario); ?></p>

    <footer class="mt-4">
        <p>
            <strong>Seleccionar Idioma:</strong>
            <a href="#" class="cambiar-idioma" data-idioma="es">Español</a> |
            <a href="#" class="cambiar-idioma" data-idioma="en">English</a> |
            <a href="#" class="cambiar-idioma" data-idioma="fr">Français</a>
        </p>
    </footer>
    <?php
}
?>
