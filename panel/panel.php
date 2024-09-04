<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Imágenes - Instituto Mar de Cortés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/styles.css" rel="stylesheet">
    <?php 
    include("../inc/images.php");
    ?>
</head>

<!-- ALERTAS -->
<?php
if(isset($_GET['message'])):
    if($_GET['message'] == 'success'): ?>

    <div class="alert alert-success" role="alert">
        Se subió el archivo correctamente
    </div>

<?php
    elseif ($_GET['message'] == 'failure') : ?>
     <div class="alert alert-danger" role="alert">
        Error al subir o eliminar el archivo
    </div>
    <?php
    elseif  ($_GET['message'] == 'successDelete') : ?>;
    <div class="alert alert-success" role="alert">
        Se Elimino el archivo correctamente
    </div>
    <?php
    endif;
endif;
?>
<!------------>

<body class="upload-page">
<div class="container mt-5">
    <h1 class="text-center mb-4">Cargar Imágenes</h1>
    
    <form name="MiForm" id="MiForm" method="post" action="../ficheros/cargar.php" enctype="multipart/form-data">
        <h4 class="text-center mb-4">Seleccione imagen a cargar</h4>
        <div class="form-group row justify-content-center">
            <label for="image" class="col-sm-2 col-form-label">Archivos</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="image" name="image" multiple>
            </div>
        </div>
        <div class="text-center mt-4">
            <button name="submit" class="btn btn-upload">Cargar Imagen</button>
        </div>
    </form>

    <!-- Tabla de resultados -->
    <?php
        $images = get_all_images(); // Suponiendo que esta función devuelve un array con los resultados.
        if ($images && count($images) > 0): // Comprobar si hay imágenes.
    ?>
    <div class="mt-5">
        <h3 class="text-center mb-4">Imágenes Cargadas</h3>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Fecha de Subida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $image): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($image['id']); ?></td>
                        <td><img src="data:image/jpeg;base64,<?php echo base64_encode($image['imagenes']); ?>" class="img-thumbnail" width="100" height="100" /></td>
                        <td><?php echo htmlspecialchars($image['creado']); ?></td>
                        <td><a type="button" href="../ficheros/eliminar.php?id=<?php echo $image['id'];?>" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <p class="text-center mt-5">No hay imágenes cargadas aún.</p>
    <?php endif; ?>
    <!-- Fin de la tabla de resultados -->
</div>
</body>
</html>
