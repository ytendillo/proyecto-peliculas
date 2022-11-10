<?php
namespace App\controllers;
 
use App\DTO\MovieDTO;
use App\response\HTTPResponse;
use App\factories\MoviesFactory;
use App\services\IMoviesService;
use App\services\impl\MoviesService;

 
class MoviesController {
 
    private IMoviesService $service;
 
        function __construct() {
            $this->service = MoviesFactory::getService();
        }
    
        public function all(){
            echo HTTPResponse::json(200, $this->service->all());
        }
    
        public function find($id){

            try {
                echo HTTPResponse::json(200, $this->service->find($id));
            } catch (\Throwable $th) {
                echo HTTPResponse::json(404, $th->getMessage());
            }
            
            
        }

        public function insert() {
            try {
                $data = json_decode(file_get_contents('php://input'), true);
                $movie = checkIsset($data);
                //$movie = new MovieDTO($data['id'], $data['titulo'], $data['anyo'], $data['duracion']);
                MoviesFactory::getService()->insert($movie);
                HTTPResponse::json(201, "Recurso creado");
            } catch (\Exception $e) {
                HTTPResponse::json($e->getCode(), $e->getMessage());
            }
        }

        public function delete($id) {
            try {            
                $resultado = MoviesFactory::getService()->delete($id);
                HTTPResponse::json(201, $resultado);
            } catch (\Exception $e) {
                HTTPResponse::json($e->getCode(), $e->getMessage());
            }
        }

        public function update($id) {
            try {
                $data = json_decode(file_get_contents('php://input'), true);
                $movie = new MovieDTO(null, $data['titulo'], $data['anyo'], $data['duracion']);
                MoviesFactory::getService()->update($id, $movie);
                HTTPResponse::json(201, "Pelicula actualizada");
            } catch (\Exception $e) {
                HTTPResponse::json($e->getCode(), $e->getMessage());
            }
        }

    
}