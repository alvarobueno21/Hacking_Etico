<?php
try {
    $db = new SQLite3(dirname(__FILE__) . "/database.db");
    // Configuración adicional si fuera necesaria
} catch (Exception $e) {
    // Manejar el error, por ejemplo, registrando el error sin mostrar detalles específicos al usuario
    error_log($e->getMessage());  // Loguear el mensaje de error para revisión del administrador
    header('Location: error_page.php');  // Redirigir a una página de error amigable
    exit;
}
?>
