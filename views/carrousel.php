<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* Estilos adicionales para ajustar el carrusel */
        .carousel-item {
            height: 100vh; /* Altura completa de la pantalla */
        }
        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: contain; /* Reescala la imagen sin recortar */
        }
         /* Estilo para la marca de agua */
         .watermark {
            position: fixed;
            bottom: 10px;
            right: 10px;
            z-index: 1000; /* Asegura que la marca de agua esté sobre el carrusel */
            opacity: 0.7; /* Transparencia de la marca de agua */
        }
        .watermark img {
            width: 150px; /* Ajusta el tamaño de la marca de agua según sea necesario */
            height: auto;
        }
    </style>
    <?php 
    include("../inc/images.php");
    ?>
</head>
<body>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel"  data-bs-interval="10000">
  <div class="carousel-inner">
    <?php
        $images = get_all_images();
        $isActive = true; // Para marcar la primera imagen como activa

        foreach ($images as $image) {
            $imgSrc = 'data:image/jpeg;base64,' . base64_encode($image['imagenes']); 
            echo '<div class="carousel-item ' . ($isActive ? 'active' : '') . '">';
            echo '<img src="' . $imgSrc . '" class="d-block w-100" alt="...">';
            echo '</div>';
            $isActive = false; // Solo la primera imagen debe ser activa
        }
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Marca de agua -->
<div class="watermark">
    <img src="../LogoMarDeCortes_transparent-453100641.png" alt="Marca de agua">
</div>
</body>
</html>
