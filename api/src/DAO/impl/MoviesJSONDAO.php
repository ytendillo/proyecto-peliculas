<?php

namespace App\DAO\impl;
 
use App\DTO\MovieDTO;
use App\DAO\IMoviesDAO;
 
class MoviesJSONDAO implements IMoviesDAO {
 
    private $movies;

    function __construct(){
        $data = file_get_contents(base_path("src/data/peliculas.json"));
        $this->movies = json_decode($data, true);

    }
 
 
    /**
     *
     * @param MovieDTO $movie
     *
     * @return bool
     */
    function create(MovieDTO $movie): bool {
        return false;
    }
     
    /**
     *
     * @return array
     */
    function read(): array {
        $result = array();
        
        foreach ($this->movies as $movie) {
            array_push($result, new MovieDTO(
                                        $movie['id'], 
                                        $movie['titulo'], 
                                        $movie['anyo'], 
                                        $movie['duracion']
                                )
            );
        }
 
        return $result;
    }
     
    /**
     *
     * @param int $id
     *
     * @return MovieDTO
     */
    function findById(int $id): MovieDTO {
        $pelicula = null;
        foreach ($this->movies as $movie) {
            if ($id ==  $movie['id']) {
                    $pelicula = new MovieDTO(
                        $movie['id'], 
                        $movie['titulo'], 
                        $movie['anyo'], 
                        $movie['duracion']
                      
                    );
                    return $pelicula;
            
             
            }           
               
        }
            throw new \Exception("No existe una pelicula con id " . $id);

    }
     
    /**
     *
     * @param int $id
     * @param MovieDTO $movie
     *
     * @return bool
     */
    function update(int $id, MovieDTO $movie): bool {
        return false;
    }
     
    /**
     *
     * @param int $id
     *
     * @return bool
     */
    function delete(int $id): bool {
        return false;
    }
}