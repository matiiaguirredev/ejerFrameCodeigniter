<?php
/* 

Crea un programa en PHP que pida al usuario una letra de la A a la Z, 
valide que la entrada sea una letra válida, y luego imprima esa letra en la consola
usando asteriscos (`*`). Usa estructuras de control 
como `for`, `switch` e `if` para realizar el ejercicio. 

*/
function printLetter($letter) {
    $letter = strtolower($letter);
    $size = 5; // Tamaño del patrón

    // Inicializamos un array vacío para almacenar las filas de la letra
    $pattern = array_fill(0, $size, str_repeat(' ', $size));

    switch ($letter) {
        case 'x':
            for ($i = 0; $i < $size; $i++) {
                $pattern[$i][$i] = '*'; // Diagonal desde la esquina superior izquierda
                $pattern[$i][$size - $i - 1] = '*'; // Diagonal desde la esquina superior derecha
            }
            break;
            // Puedes añadir más letras aquí con su lógica específica
        default:
            echo "Patrón no definido para la letra $letter.\n";
            return;
    }

    foreach ($pattern as $line) {
        echo $line . "\n";
    }
}

$input = '';

while (true) {
    $input = readline("Ingrese una letra de la A-Z o 'Salir' para terminar: ");

    if (strtolower($input) == 'salir') {
        echo "Programa terminado. \n";
        break;
    }

    if (!ctype_alpha($input)) {
        echo "Error, tiene que ser una letra de la A-Z o 'Salir' para terminar. \n";
        continue;
    }

    if (strlen($input) > 1) {
        echo "Debe ingresar solamente una letra de la A-Z. \n";
        continue;
    }

    if (strlen($input) == 1) {
        echo "Ingresaste: $input \n";
        printLetter($input);
    }
}

