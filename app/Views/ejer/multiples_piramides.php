<div class="container mt-5">
    <!-- Formulario para la cantidad de pirámides -->
    <form action="" method="post">
        <!-- <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad de pirámides</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" required>
        </div> -->

        <div class="row d-flex justify-content-center text-center">
            <div class="col-6 mb-3">
                <label for="" class="form-label">Agregar piramides</label>
                <button class="form-control btn btn-success" type="button" name="btn" id="btn">+</button>
            </div>

            <div class="col-6 mb-3 d-none">
                <label for="" class="form-label">Eliminar piramides</label>
                <button class="form-control btn btn-danger" type="button" name="btnRemove" id="btnRemove">-</button>
            </div>
        </div>

        <div id="alturas-container"></div>

        <div class="mb-3 d-none" id="btnsubmit">
            <input type="submit" value="Generar pirámides" class="btn btn-primary">
        </div>
</div>

</form>

<!-- Muestra el resultado de las pirámides generadas -->
<?php if (!empty($output)): ?>
    <div class="mt-4 row d-flex justify-content-center text-center">
        <?php echo $output; ?>
    </div>
<?php endif; ?>
</div>