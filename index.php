<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Traduccion con diccionarios en PHP</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="   crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5" id="contenido">
     

      <?php
        include_once 'config.php';
      ?>

      <h1 class="mb-4"><?php echo traducir('titulo', $idiomaUsuario, $diccionario); ?></h1>

      <div class="alert alert-info">
        <?php echo traducir('bienvenido', $idiomaUsuario, $diccionario); ?>
      </div>

      <p><?php echo traducir('saludo', $idiomaUsuario, $diccionario); ?></p>

      <footer class="mt-4">
          <p>
              <strong>Seleccionar Idioma:</strong>
              <a href="#" class="cambiar-idioma" data-idioma="es">Español</a> |
              <a href="#" class="cambiar-idioma" data-idioma="en">English</a> |
              <a href="#" class="cambiar-idioma" data-idioma="fr">Français</a>
          </p>
      </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
    
    $(document).on('click', '.cambiar-idioma', function (e) {
        e.preventDefault();
        
        // Obtenemos el idioma desde el atributo data
        var nuevoIdioma = $(this).data('idioma');

        // Hacemos la petición AJAX
        $.ajax({
        url: 'cambiar_idioma.php', 
        type: 'POST',
        data: { idioma: nuevoIdioma },
        success: function(data) {
            // Actualizamos el contenido con la respuesta del servidor
            $('#contenido').html(data);
        }
        });
    });
    </script>

  </body>
</html>
