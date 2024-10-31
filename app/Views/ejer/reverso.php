<div class="container mt-5">
    <form action="" method="post">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-6 mb-3 temperatura">
                <label class="form-label" for="palabra-conver">Ingresa tus palabras: (tambien las cuenta)</label>
                <textarea class="form-control" type="text" name="palabra" id="palabra-conver"></textarea>
            </div>
        </div>

        <div class="row d-flex justify-content-center text-center">
            <div class="col-auto mb-3">
                <input type="submit" value="Dar vuelta y contar letras" name="convertir_a_fahrenheit" class="btn btn-success">
            </div>

    </form>

    <?php if (!empty($output)): ?>
        <div class="mt-4 row d-flex justify-content-center text-center">
            <?php echo $output . "<br>"; ?>
            <?php echo $resultado . "<br>"; ?>
            <?php echo $resultado2 . "<br>"; ?>
        </div>
    <?php endif; ?>
</div>
