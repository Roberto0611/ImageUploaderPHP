<?php

// Conection to databases for inc section
define( 'DB_HOST', 'localhost' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'Roberto0611#' );
define( 'DB_DATABASE', 'imc' );
define( 'DB_PORT', '3307' );

$app_db = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT );

// Functions for images
function get_all_images() {
    global $app_db;
    $query = mysqli_prepare($app_db, "SELECT * FROM images_tabla");
    mysqli_stmt_execute($query);

    $result = mysqli_stmt_get_result($query);
    if (!$result) {
        die(mysqli_error($app_db));
    }

    return mysqli_fetch_all($result, MYSQLI_ASSOC); // Use fetch_all to get all rows
}