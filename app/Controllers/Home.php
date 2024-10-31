<?php

namespace App\Controllers;

class Home extends BaseController {

    public function __construct() {
    }

    public function index() {
        echo view('welcome_message');
    }

    public function header() {
        echo view('ejer/header');
    }

    public function footer() {
        echo view('ejer/footer');
    }

    public function esPrimoCheck($numero, $imprimir = true) {
        // Caso especial para 1, que no es primo
        if ($numero <= 2) {
            if ($imprimir) {
                debug([
                    'numero' => $numero,
                    'esPrimo' => true,
                ]);
            }
            return true;
        }

        // Empezamos en 2 y vamos hasta el anterior al número
        for ($i = 2; $i < $numero; $i++) {
            if ($numero % $i == 0) {
                if ($imprimir) {
                    debug([
                        'numero' => $numero,
                        'esPrimo' => false
                    ]);
                }
                return false;
            }
        }

        if ($imprimir) {
            debug([
                'numero' => $numero,
                'esPrimo' => true
            ]);
        }
        return true;
    }

    // estudiar esta funcion 
    public function esPrimo($numero = null) {
        $vari = []; // Asegúrate de inicializar el array antes de usarlo
        $tiempoTotal = 0;

        for ($i = 2; $i <= $numero; $i++) {
            $start = microtime(true); // Tiempo inicial
            $primo = $this->esPrimoCheck($i, false);
            $end = microtime(true); // Tiempo final

            $tiempo = ($end - $start) * 1000;
            $tiempoTotal += $tiempo;

            if ($primo) {
                $vari[] = [
                    "numero" => $i,
                    "esPrimo" => $primo,
                    "tiempo" => ($tiempo)
                ];
            }
        }

        // $start = microtime(true); // Tiempo inicial
        $this->header();
        echo view('ejer/primos', ['vari' => $vari, 'numero' => $numero]);
        $this->footer();
        // $end = microtime(true); // Tiempo final
        // $tiempovista = ($end - $start) * 1000;
        // debug([
        //     "tiempovista" => $tiempovista,
        //     "tiempoFor" => $tiempoTotal,
        //     "tiempoTotal" => $tiempoTotal + $tiempovista,
        //     "casos" => $vari
        // ]);
    }

    // esta tambien estudiar  (si vas a usar la multiple cambiar a privado la funcion)
    public function piramide($altura = null) {

        // esta linea de abajo solamente (97) va comentada en caso de usar la funcion de multiples piramides

        $altura = $this->request->getGetPost('altura');

        $output = '';

        if ($altura) {
            if (!is_numeric($altura)) {
                $output = 'La altura debe ser un numero';
            } else {
                if ($altura > 0) {
                    // Bucle principal para cada fila de la pirámide
                    for ($fila = 1; $fila <= $altura; $fila++) {
                        // Imprimir asteriscos
                        for ($asterisco = 1; $asterisco <= (2 * $fila - 1); $asterisco++) {
                            $output .= "*"; // Imprime un asterisco
                        }
                        $output .= "<br>";
                    }
                }

                if ($altura < 0) {
                    for ($fila = abs($altura); $fila >= 1; $fila--) {
                        // Imprimir asteriscos
                        for ($asterisco = 1; $asterisco <= (2 * $fila - 1); $asterisco++) {
                            $output .= "*";
                        }
                        $output .= "<br>";
                    }
                }
            }
        }

        // return $output;

        // descomentar el return si vamos a usar la funcion de multiples piramides, mientras solo usar esto de aca abajo estas 3 lineas
        $this->header();
        echo view('ejer/piramides', ['output' => $output]);
        $this->footer();
    }

    public function multiplesPiramides() {
        $cantidad = $this->request->getGetPost('cantidad');
        $output = '';

        if ($cantidad) {
            // Iterar sobre la cantidad de pirámides
            for ($i = 1; $i <= $cantidad; $i++) {
                // Obtener la altura para cada pirámide
                $altura = $this->request->getGetPost("altura_$i");

                if (!is_numeric($altura)) {
                    $output .= "<h3>Error en la Pirámide $i</h3>";
                    $output .= "La altura de la pirámide $i debe ser un número.<br>";
                } else {
                    $output .= "<h3>Pirámide $i</h3>";
                    $output .= $this->piramide($altura);
                }
            }
        } else {

            $altura = $this->request->getGetPost("altura");
            // debug ($altura);
            if ($altura) {
                foreach ($altura as $key => $value) {
                    $value = intval($value);
                    if (!is_numeric($value)) {
                        $output .= "<h3>Error en la Pirámide " . ($key + 1) . "</h3>";
                        $output .= "La altura de la pkeyrámide " . ($key + 1) . " debe ser un número.<br>";
                    } else {
                        $output .= "<h3>Pirámide " . ($key + 1) . "</h3>";
                        $output .= $this->piramide($value);
                    }
                }
            }
        }

        $this->header();
        echo view('ejer/multiples_piramides', ['output' => $output]);
        $this->footer();
    }

    // estudiar esta
    public function imprimirPiramide($altura = null) {
        echo '<div style="text-align: center;">'; // Comenzar un contenedor centrado
        for ($i = 1; $i <= $altura; $i++) {
            // Imprimir asteriscos en la i actual
            for ($j = 1; $j <= (2 * $i - 1); $j++) {
                echo "*"; // Imprime un asterisco
            }

            // Nueva línea después de cada fila
            echo "<br>";
        }
        echo '</div>'; // Cerrar el contenedor

        return;
    }


    // estudiar esta
    public function temperatura() {
        //  Conversión de Temperaturas:
        //  Crea una función que convierta grados Celsius a Fahrenheit y otra función que convierta de
        //  Fahrenheit a Celsius. El programa debe permitir al usuario elegir la conversión que desea realizar.
        $temperatura = $this->request->getGetPost('temperatura');
        $output = "";

        function gradosCelc($fahrenheit) {
            return ($fahrenheit - 32) * 5 / 9;
        }

        function gradosFahrenheit($grados) {
            return ($grados * 9 / 5) + 32;
        }

        if (is_numeric($temperatura)) {
            if ($this->request->getGetPost('convertir_a_fahrenheit')) {
                $resultado = gradosFahrenheit($temperatura);
                $output = "{$temperatura} grados Celsius son {$resultado} grados Fahrenheit.";
            } elseif ($this->request->getGetPost('convertir_a_celsius')) {
                $resultado = gradosCelc($temperatura);
                $output = "{$temperatura} grados Fahrenheit son {$resultado} grados Celsius.";
            }
        } else {
            $output = "Por favor, ingrese una temperatura válida.";
        }

        $this->header();
        echo view('ejer/temperatura', ['output' => $output]);
        $this->footer();
    }

    // estas 3 funciones me sirven para practicar

    public function reverso() {
        // Reverso de una Cadena:
        // Escribe una función que tome una cadena como entrada y devuelva la cadena en reverso. 
        // Por ejemplo, si la entrada es "Hola", la salida debe ser "aloH".

        $palabra = $this->request->getGetPost('palabra');
        $output = strrev($palabra); // esto da vuelta las palabras

        $resultado = "Hay " . $this->contadorPalabras($palabra) . " palabras en total"; // esto cuenta las palabras

        $resultado2 = $this->palindromo($palabra);

        $this->header();
        echo view('ejer/reverso', ['output' => $output, 'resultado' => $resultado, 'resultado2' => $resultado2]);
        $this->footer();
    }

    private function contadorPalabras() {
        // Contador de Palabras:
        // Escribe un programa que cuente el número de palabras en una cadena ingresada por el usuario.

        $palabra = $this->request->getGetPost('palabra');
        $resultado = str_word_count($palabra);

        return $resultado;
    }

    private function palindromo() {
        // Palíndromo:
        // Escribe una función que determine si una cadena es un palíndromo 
        // (es decir, si se lee igual de adelante hacia atrás). Por ejemplo, "radar" es un palíndromo.

        $palabra = $this->request->getGetPost('palabra');
        $resultado1 = strtolower(str_replace(' ', '', $palabra));
        $resultado2 = strrev($resultado1);

        if ($resultado2 === $resultado1) {
            return "La palabra es palindromada";
        } else {
            return "La palabra NO es palindromada";
        }

        return $resultado2;
    }

    // ejercicios para prueba tecnica, practicamos absolutamente de todo.
    public function resultado($numero = -51) {
        //Crea un script que pida un número al usuario y le indique si es positivo, negativo o cero.
        if ($numero > 0) {
            echo "El número es positivo";
        } else if ($numero < 0) {
            echo "El número es negativo";
        } else {
            echo "El número es cero";
        }
    }

    public function edad($edad = 125) {
        // Escribe un programa que tome la edad de una persona y muestre un mensaje 
        // indicando si es menor de edad, joven adulto (entre 18 y 35 años), adulto (entre 36 y 65 años) 
        // o adulto mayor (más de 65 años).

        if (!is_numeric($edad)) {
            echo "La edad tiene que ser un numero valido.";
            return;
        }

        if ($edad < 18) {
            echo "Es menor de edad";
        } elseif ($edad >= 18 && $edad <= 35) {
            echo "Es joven adulto";
        } elseif ($edad >= 36 && $edad <= 65) {
            echo "Adulto";
        } elseif ($edad > 65 && $edad < 125) {
            echo "Es adulto mayor";
        } elseif ($edad < 0) {
            echo "Edad no válida";
        } else {
            echo "Edad no válida";
        }
    }

    public function calcular() {
        // Obtén los valores del formulario
        $num1 = $this->request->getGetPost('num1');
        $operador = $this->request->getGetPost('operador');
        $num2 = $this->request->getGetPost('num2');

        // Llama a la función calculadoraBasica
        $resultado = $this->calculadoraBasica($num1, $operador, $num2);

        // Muestra el resultado
        $this->header();
        echo view('ejer/calculadora', ['num1' => $num1, 'operador' => $operador, 'num2' => $num2, 'resultado' => $resultado]);
        $this->footer();
    }

    private function calculadoraBasica($num1, $caso, $num2) {
        // Haz un script que simule una calculadora básica. 
        // El usuario debe ingresar dos números y una operación (+, -, *, /). 
        // Utiliza switch para devolver el resultado de la operación.

        $resultado = null;

        switch ($caso) {
            case '+':
                $resultado = $num1 + $num2;
                break;
            case '-':
                $resultado = $num1 - $num2;
                break;
            case '*':
                $resultado = $num1 * $num2;
                break;
            case '/':
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                } else {
                    return "Error: División por cero no permitida.";
                }
                break;
            default:
                return "Operación no válida.";
        }

        return $resultado;
    }

    public function fibonacci() {
        //Escribe un programa que muestre los primeros 10 números de la serie de Fibonacci.
        $var1 = 0;
        $var2 = 1;

        echo $var1 . "<br/>";

        for ($i = 0; $i < 10; $i++) {  // esto solamente hace la vuelta 10 veces, no tiene nada que ver con el metodo para sacar la serie fibonacci
            // Muestra y asigna el valor de $temp
            $temp = $var1;
            echo "Valor de temporal: " . $temp . "<br/>";

            // Asigna el valor de $var1 a $var2 y muestra
            $var1 = $var2;
            echo "Valor de var1: " . $var1 . "<br/>";

            // Asigna el valor de $var2 sumando $temp y $var2, y muestra
            $var2 = $temp + $var2;
            echo "Valor de var2: " . $var2 . "<br/>" . "<br/>";
        }
    }

    public function rangoNumero() {
        // esta no funciona en este modo, se tiene que hacer desde un archivo php con consola readline (es solo para ejercitar)
        $numero = readline("Ingrese un numero entre 1-10: ");

        while ($numero < 0 || $numero > 10) {
            $numero = readline("El numero tiene que ser entre 1 y 10. Ingrese un numero correcto.");
        }
    }

    public function sumasNumeros(){
        // Escribe un programa que sume los números ingresados por 
        // el usuario hasta que introduzca el número cero, momento 
        // en que el programa muestra la suma total de los números.


    }
}
