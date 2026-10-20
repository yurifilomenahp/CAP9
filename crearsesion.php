<?php
// Inicia la sesión en el servidor
session_start();

// Registra variables de sesión (se guardan de forma segura en el servidor)
$_SESSION['nombre'] = 'Ronald';
$_SESSION['especie'] = 'Conejo';

echo "Sesión iniciada y variables registradas con éxito.";
?>
