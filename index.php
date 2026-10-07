<?php
include "header.php";
?>

<div class="formulario">
    <h2>Reserva tu Pase</h2>

    <form action="procesar.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre completo:</label>
            <input type="text" name="nombre" required placeholder="Introduce tu nombre completo">
        </div>

        <div class="form-group">
            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo" required placeholder="tuemail@.com">
        </div>

        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" name="edad" required placeholder="18">
        </div>

        <div class="form-group">
            <label>Tipo de Pase:</label>
            <div class="opciones">
                <label><input type="radio" name="entrada" value="50" required></label>
                    General (50 €)

                <label><input type="radio" name="entrada" value="120"></label>
                    VIP (120 €)

                <label><input type="radio" name="entrada" value="180"></label>
                    Super VIP + Camping (180 €)
            </div>
        </div>

        <div class="form-group">
            <label for="dias">Días de Asistencia (+10 € por día):</label>
            <label><input type="checkbox" name="dias[]" value="Viernes">Viernes</label>
            <label><input type="checkbox" name="dias[]" value="Sábado">Sábado</label>
            <label><input type="checkbox" name="dias[]" value="Domingo">Domingo</label>
        </div>

        <div class="form-group">
            <label for="pago">Método de pago:</label>
            <select name="pago" id="pago" required>
                <option value="">Selecciona un método de pago</option>
                <option value="Tarjeta de crédito">Tarjeta de crédito</option>
                <option value="Bizum">Bizum</option>
                <option value="PayPal">PayPal</option>
            </select>
        </div>

        <div class="form-group">
            <label for="foto">Foto para la Acreditación (JPG / PNG):</label>
            <input type="file" id="foto" name="foto" required>
        </div>

        <div class="form-group">
            <label for="observaciones">Comentarios o peticiones especiales:</label>
            <textarea id="observaciones" name="observaciones" placeholder="Alergias, movilidad reducida, etc."></textarea>
        </div>

        <input type="submit" name="enviar" value="Generar Acreditación">

    </form>

</div>