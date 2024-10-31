<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Primos</title>
</head>

<body>
    <p>
        Nivel 3: Estructuras de Control Anidadas y Arreglos <br>
        Números Primos en un Rango: Lista de números primos entre 1 y <?= $numero ?>.
        <br>
        Total de números primos encontrados: <?= count($vari) ?>.
    </p>

    <ul>
        <?php foreach ($vari as $primo): ?>
            <li><?= $primo['numero']; ?> es un número primo.</li>
        <?php endforeach; ?>
    </ul>
</body>

</html>