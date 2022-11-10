<?php
namespace App\DAO\impl;

use App\db\orm\DB;
use App\DTO\MovieDTO;
use App\DAO\IMoviesDAO;


class MoviesDBDAO implements IMoviesDAO {
 
    function create(MovieDTO $movie): bool {
        return DB::table('peliculas')->insert(['id' => $movie->id(), 'titulo' => $movie->titulo(), 'anyo' => $movie->anyo(), 'duracion' => $movie->duracion()]);
    }
 
    function read(): array {
        $result = array();
        $db_data = DB::table('peliculas')->select('*')->get();
        foreach ($db_data as $movie) {
            $result[] = new MovieDTO(
                $movie->id, 
                $movie->titulo, 
                $movie->anyo, 
                $movie->duracion
            );            
        }
        return $result;
    }
     
     function findById(int $id): MovieDTO {
        $db_data = DB::table('peliculas')->find($id);
        $result = new MovieDTO(
                $db_data->id, 
                $db_data->titulo, 
                $db_data->anyo, 
                $db_data->duracion
            );            
        return $result; 
    }

    function update(int $id, MovieDTO $movie): int {
        $pelicula = ['id' => $movie->id(), 'titulo' => $movie->titulo(), 'anyo' => $movie->anyo(), 'duracion' => $movie->duracion()];
        $db_data = DB::table('peliculas')->update($id, $pelicula);
                      
        return $db_data; 
    }
  
    function delete(int $id): bool {
        //$db_data = DB::table('peliculas')->find($id);
        $deletedRow =  DB::table('peliculas')->delete($id);
        return ($deletedRow > 0) ? true : false;
        
    }


}