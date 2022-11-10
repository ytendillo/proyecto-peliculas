<?php
/*Creamos nuestra clase App, que será
 la clase principal que cargaremos cuando llegue una 
 petición.*/
namespace App;
 
class App
{
 
    public function run(): void
    {
        require_once(base_path("routes/api.php"));
    }
 
}