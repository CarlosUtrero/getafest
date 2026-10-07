<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit;
}

include "header.php";

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$edad = $_POST["edad"];
$entrada = $_POST["entrada"];

if (isset($_POST["dias"])) {
    $dias = $_POST["dias"];
} else {
    $dias = "";
}

$pago = $_POST["pago"];
$observaciones = $_POST["observaciones"];


if ($edad < 18) {
    echo "<h2>Acceso no permitido</h2>";
    echo "<p>El evento es exclusivo para mayores de edad.</p>";
    echo "<p><a href='index.php'>Volver al formulario</a></p>";

} else {
    $foto = $_FILES["foto"];

    if ($foto["error"] == 0) {
        $nombreFoto = $foto["name"];
        $rutaFoto = "images/" . $nombreFoto;

        move_uploaded_file($foto["tmp_name"], $rutaFoto);


        if ($entrada == 50) {
            $tipoEntrada = "General";
            $precioBase = 50;

        } elseif ($entrada == 120) {
            $tipoEntrada = "VIP";
            $precioBase = 120;

        } else {
            $tipoEntrada = "Super VIP";
            $precioBase = 180;
        }


        if ($dias != "") {
            $suplemento = count($dias) * 10;

        } else {
            $suplemento = 0;
        }


        $precioTotal = $precioBase + $suplemento;
        ?>

        <div class="acreditacion">
            <img src="<?php echo $rutaFoto; ?>" class="foto-acreditacion">
            <h2><?php echo $nombre; ?></h2>

            <p>
                <strong>Email:</strong>
                <?php echo $correo; ?>
            </p>

            <p>
                <strong>Tipo de Entrada:</strong>
                <?php echo $tipoEntrada; ?>
            </p>

            <p>
                <strong>Días de asistencia:</strong>

                <?php

                if ($dias != "") {
                    foreach ($dias as $dia) {
                        echo $dia . " ";
                    }

                } else {
                    echo "Ningún día seleccionado";

                }

                ?>

            </p>

            <p>
                <strong>Método de pago:</strong>
                <?php echo $pago; ?>
            </p>

            <?php

            if ($observaciones != "") {
                echo "<p>\"$observaciones\"</p>";
            }

            ?>

            <h2 class="total">
                Total pagado: <?php echo $precioTotal; ?> €
            </h2>

        </div>

        <div class="otra-reserva">
            <a href="index.php">← Realizar otra reserva</a>
        </div>

        <?php

    } else {
        echo "<h2>Error</h2>";
        echo "<p>La fotografía no se ha subido correctamente.</p>";
        echo "<p><a href='index.php'>Volver al formulario</a></p>";

    }
}

?>

</div>
</body>
</html>