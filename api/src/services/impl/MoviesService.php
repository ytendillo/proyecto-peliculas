<?php
namespace App\services\impl;
 
use App\services\IMoviesService;
use App\DAO\IMoviesDAO;
use App\DTO\MovieDTO;
use App\DAO\impl\MoviesStaticDAO;
use App\DAO\impl\MoviesJSONDAO;
use App\factories\MoviesFactory;
 
class MoviesService implements IMoviesService {
    private IMoviesDAO $DAO;
    function __construct() {
    
    }
 
    public function all(): array {
        return MoviesFactory::getDAO()->read();
    }
    
 
    /**
     *
     * @param mixed $id
     *
     * @return \App\DTO\MovieDTO
    */
    function find($id): MovieDTO {  
        return MoviesFactory::getDAO()->findById($id);
    }

    function insert(MovieDTO $movie): bool{
        return MoviesFactory::getDAO()->create($movie);
    }

    function delete($id): bool{
        return MoviesFactory::getDAO()->delete($id);
    }

    function update($id, $movie){
        return MoviesFactory::getDAO()->update($id, $movie);
    }
    
}
