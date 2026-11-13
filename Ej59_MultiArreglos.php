<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de productos</title>
</head>
<body>

    <h2>REGISTRO DE TRES PRODUCTOS</h2>

    <!-- Formulario de captura -->
    <form method="POST" action="">

<?php
// Ciclo para mostrar tres renglones de captura
for ($i = 0; $i < 3; $i++) {
    echo "Producto:";
    echo "<input type='text' name='productos[]'>" . " ";
    
    echo "Precio:";
    echo "<input type='number' name='precios[]'>" . " ";
    
    echo "Cantidad:";
    echo "<input type='number' name='cantidades[]'>" . " ";
    echo "<br><br>";
}
?>

    <!-- Botón para guardar y calcular -->
    <button type="submit" name="guardar" value="guardar">
    Guardar y calcular </button>
    <?php

    // Verificar si se presionó el botón Guardar
    if (isset($_POST['guardar'])) {

        // Guardar los datos en tres arreglos
        $productos = $_POST['productos'];
        $precios = $_POST['precios'];
        $cantidades = $_POST['cantidades'];

        // Declarar los arreglos de resultados
        $subtotales = array();
        $iva = array();
        $totales = array();

        // Ciclo para realizar los cálculos
        for ($i = 0; $i < 3; $i++) {

            // Calcular subtotal
            $subtotales[$i] = $precios[$i] * $cantidades[$i];

            // Calcular IVA del 16%
            $iva[$i] = $subtotales[$i] * 0.16;

            // Calcular total
            $totales[$i] = $subtotales[$i] + $iva[$i];

        }

        // Imprimir el arreglo de productos
        echo "<h3>ARREGLO DE PRODUCTOS</h3>";

        for ($i = 0; $i < 3; $i++) {
            echo $productos[$i] . "<br>";
        }

        // Imprimir el arreglo de precios
        echo "<h3>ARREGLO DE PRECIOS</h3>";

        for ($i = 0; $i < 3; $i++) {
            echo "$" . number_format($precios[$i], 2) . "<br>";
        }

        // Imprimir el arreglo de subtotales
        echo "<h3>ARREGLO DE SUBTOTALES</h3>";

        for ($i = 0; $i < 3; $i++) {
            echo "$" . number_format($subtotales[$i], 2) . "<br>";
        }

        // Imprimir el arreglo de IVA
        echo "<h3>ARREGLO DE IVA</h3>";

        for ($i = 0; $i < 3; $i++) {
            echo "$" . number_format($iva[$i], 2) . "<br>";
        }

        // Imprimir el arreglo de totales
        echo "<h3>ARREGLO DE TOTALES</h3>";

        for ($i = 0; $i < 3; $i++) {
            echo "$" . number_format($totales[$i], 2) . "<br>";
        }

    }

    ?>

</body>
</html>