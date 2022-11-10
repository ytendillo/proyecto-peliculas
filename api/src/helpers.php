<?php

use App\DTO\MovieDTO;
define("BASE_DIR", dirname(__DIR__));
 
if (! function_exists('base_path')) {
    /**
     * Devuelve la ruta indicada desde la ruta raiz del 
     * proyecto.
     * En este caso, creamos una función global (base_path()) 
     * en helpers.php que devolverá la ruta base de nuestra 
     * aplicación (app) más la ruta que le pasemos. 
     *
     * @param  string  $path
     * @return string
     */
    function base_path(string $path = ''): string {
        return BASE_DIR . "/" . ltrim($path, "/");
    }


}

function checkIsset($data) {

    try {
        if (isset($data['titulo']) && isset($data['anyo']) && isset($data['duracion'])){
            return new MovieDTO(null, $data['titulo'], $data['anyo'], $data['duracion']);
        } 

        throw new \Exception("El servidor no pudo interpretar la solicitud dada una sintaxis invalida", 400);

    }catch(\Throwable $e){
        throw new \Exception("El servidor no pudo interpretar la solicitud dada una sintaxis invalida", 501);
        
    }

}