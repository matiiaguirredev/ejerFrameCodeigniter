
<form action="" method="post">
    <div class="row d-flex justify-content-center text-center mt-5">
        <div class="col-6 ">

            <div class="form-control my-2">
                <label for="cantPiramides">Que altura de piramide quieres?</label>
                <input type="number" name="altura" id="cantPiramides" require>
            </div>

            <div class="form-control my-2">
                <button type="submit">Imprimir piramide</button>
            </div>
        </div>
    </div>
</form>

<div class="row d-flex justify-content-center text-center">
    <?php echo $output; ?>
</div>
