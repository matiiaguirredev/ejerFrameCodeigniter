    <style>
        body {
            background-color: #f8f9fa;
        }
        .calculator-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        .result {
            margin-top: 20px;
            font-size: 1.5em;
            font-weight: bold;
        }
    </style>


<div class="calculator-container">
    <h1 class="text-center">Calculadora Básica</h1>
    <form action="" method="post" class="text-center">

        <div class="mb-3">
            <input type="number" name="num1" class="form-control" placeholder="Número 1" required>
        </div>
        <div class="mb-3">
            <select name="operador" class="form-select" required>
                <option value="+" selected>+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="number" name="num2" class="form-control" placeholder="Número 2" required>
        </div>
        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>

    <div class="row d-flex justify-content-center text-center">
        <div class="result">
            <?= isset($resultado) ?  "El resultado es: $resultado" : 'Ocurrio algun error inesperado'; ?>
        </div>
    </div>
</div>
