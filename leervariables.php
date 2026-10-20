<?php
// Recrea o continúa la sesión existente
session_start();

// Lee las variables de sesión guardadas previamente
// Datos de salida esperados: 'Bienvenido de nuevo, Ronald Conejo'
echo 'Bienvenido de nuevo, ' . $_SESSION['nombre'] . ' ' . $_SESSION['especie'];
?>
