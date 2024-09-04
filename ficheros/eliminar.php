<?php
$id = $_GET['id'];
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
$eliminar = $db->query("DELETE FROM images_tabla WHERE `images_tabla`.`id` = $id");

// Verificar si la subida fue exitosa
header('Location: ../panel/panel.php?message=successDelete');
