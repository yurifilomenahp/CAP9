<?php
// Si el formulario ya ha sido enviado, escribe las cookies con la configuración
if(isset($_POST['submit'])) {
    $ret1 = (isset($_POST['nombre'])) ? setcookie('nombre', $_POST['nombre'], time() + 36400, '/') : null;
    $ret2 = (isset($_POST['asiento'])) ? setcookie('asiento', $_POST['asiento'], time() + 36400, '/') : null;
    $ret3 = (isset($_POST['comida'])) ? setcookie('comida', $_POST['comida'], time() + 36400, '/') : null;
    $ret4 = (isset($_POST['ofertas'])) ? setcookie('ofertas', implode(',', $_POST['ofertas']), time() + 36400, '/') : null;
}

// Lee las cookies y asigna sus valores a variables PHP para rellenar el formulario
$nombre = isset($_COOKIE['nombre']) ? $_COOKIE['nombre'] : '';
$asiento = isset($_COOKIE['asiento']) ? $_COOKIE['asiento'] : '';
$comida = isset($_COOKIE['comida']) ? $_COOKIE['comida'] : '';
$ofertas = isset($_COOKIE['ofertas']) ? explode(',', $_COOKIE['ofertas']) : array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://w3.org">
<html xmlns="http://w3.org" xml:lang="es" lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Proyecto 9-1: Guardar y restaurar preferencias del usuario</title>
</head>
<body>
    <h2>Proyecto 9-1: Guardar y restaurar preferencias del usuario</h2>
    <h3>Seleccione sus Preferencias de Vuelo</h3>

    <?php
    // Si el formulario fue enviado en esta petición, despliega mensaje de éxito
    if (isset($_POST['submit'])) {
    ?>
        <p><strong>Gracias por su selección. Las preferencias han sido guardadas.</strong></p>
        <p><a href="vuelo.php">Volver al formulario para comprobar las cookies</a></p>
    <?php
    // Si el formulario no ha sido enviado, muestra el formulario con los datos recuperados
    } else {
    ?>
        <form method="post" action="vuelo.php">
            Nombre: <br />
            <input type="text" size="20" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" />
            <p></p>
            
            Selección de asiento: <br />
            <input type="radio" name="asiento" value="pasillo" <?php echo ($asiento == 'pasillo') ? 'checked="checked"' : ''; ?>>Pasillo</input>
            <input type="radio" name="asiento" value="ventana" <?php echo ($asiento == 'ventana') ? 'checked="checked"' : ''; ?>>Ventana</input>
            <input type="radio" name="asiento" value="centro" <?php echo ($asiento == 'centro') ? 'checked="checked"' : ''; ?>>Centro</input>
            <p></p>
            
            Selección de comida: <br />
            <input type="radio" name="comida" value="normal-veg" <?php echo ($comida == 'normal-veg') ? 'checked="checked"' : ''; ?>>Vegetariana</input>
            <input type="radio" name="comida" value="normal-nveg" <?php echo ($comida == 'normal-nveg') ? 'checked="checked"' : ''; ?>>No Vegetariana</input>
            <input type="radio" name="comida" value="diabética" <?php echo ($comida == 'diabética') ? 'checked="checked"' : ''; ?>>Diabética</input>
            <input type="radio" name="comida" value="niño" <?php echo ($comida == 'niño') ? 'checked="checked"' : ''; ?>>Niño</input>
            <p></p>
            
            Estoy interesado en ofertas especiales de los vuelos a: <br />
            <input type="checkbox" name="ofertas[]" value="LHR" <?php echo in_array('LHR', $ofertas) ? 'checked="checked"' : ''; ?>>Londres (Heathrow)</input>
            <input type="checkbox" name="ofertas[]" value="CDG" <?php echo in_array('CDG', $ofertas) ? 'checked="checked"' : ''; ?>>París</input>
            <input type="checkbox" name="ofertas[]" value="CIA" <?php echo in_array('CIA', $ofertas) ? 'checked="checked"' : ''; ?>>Roma (Ciampino)</input>
            <input type="checkbox" name="ofertas[]" value="IBZ" <?php echo in_array('IBZ', $ofertas) ? 'checked="checked"' : ''; ?>>Ibiza</input>
            <input type="checkbox" name="ofertas[]" value="SIN" <?php echo in_array('SIN', $ofertas) ? 'checked="checked"' : ''; ?>>Singapur</input>
            <input type="checkbox" name="ofertas[]" value="HKG" <?php echo in_array('HKG', $ofertas) ? 'checked="checked"' : ''; ?>>Hong Kong</input>
            <input type="checkbox" name="ofertas[]" value="MLA" <?php echo in_array('MLA', $ofertas) ? 'checked="checked"' : ''; ?>>Malta</input>
            <input type="checkbox" name="ofertas[]" value="BOM" <?php echo in_array('BOM', $ofertas) ? 'checked="checked"' : ''; ?>>Bombay</input>
            <p></p>
            
            <input type="submit" name="submit" value="Enviar" />
        </form>
    <?php
    }
    ?>
</body>
</html>
