<?php

namespace App\Controllers;

class Clases extends BaseController {

    public function header() {
        echo view('ejer/header');
    }

    public function footer() {
        echo view('ejer/footer');
    }

    public function circulo() {
        // Crea una clase Círculo que tenga como propiedades el radio del círculo. 
        // La clase debe incluir métodos para calcular el área y la circunferencia del círculo.

        $pi = 3.1415;


        $this->header();
        echo view('');
        $this->footer();

    }
}
