<div class="container mt-5">
    <form action="" method="post">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-3 mb-3 temperatura">
                <label class="form-label" for="temp-conver">Convertidor de Celsius a Fahrenheit</label>
                <input class="form-control" type="number" name="temperatura" id="temp-conver" step="any">
            </div>
        </div>

        <div class="row d-flex justify-content-center text-center">
            <div class="col-auto mb-3">
                <input type="submit" value="Convertir a Fahrenheit" name="convertir_a_fahrenheit" class="btn btn-success">
            </div>

            <div class="col-auto mb-3">
                <input type="submit" value="Convertir a Celsius" name="convertir_a_celsius" class="btn btn-danger">
            </div>
        </div>
    </form>

    <?php if (!empty($output)): ?>
        <div class="mt-4 row d-flex justify-content-center text-center">
            <?php echo $output; ?>
        </div>
    <?php endif; ?>
</div>
