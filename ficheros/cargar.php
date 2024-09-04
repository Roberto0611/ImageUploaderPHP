<?php
if(isset($_POST["submit"])){
    if(!empty($_FILES["image"]["tmp_name"]) && getimagesize($_FILES["image"]["tmp_name"]) !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        
        // Credenciales MySQL
        $host = "localhost";
        $user = "root";
        $pass = "Roberto0611#";
        $db = "imc";
        $port = "3307";
        
        // Crear conexión con la base de datos
        $db = new mysqli($host, $user, $pass, $db, $port);
        
        // Verificar la conexión
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        // Insertar imagen en la base de datos
        $insertar = $db->query("INSERT into images_tabla (imagenes, creado) VALUES ('$imgContenido', now())");

        // Verificar si la subida fue exitosa
        if($insertar){
            header('Location: ../panel/panel.php?message=success');
        } else {
            header('Location: ../panel/panel.php?message=failure');
        }
    } else {
        // Si no se selecciona una imagen válida
        header('Location: ../panel/panel.php?message=failure');
    }
} else {
    // Si no se envía el formulario correctamente
    header('Location: ../panel/panel.php?message=failure');
}
