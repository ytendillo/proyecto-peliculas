<?php

namespace App\factories;
use App\DAO\IMoviesDAO;
use App\DAO\impl\MoviesDBDAO;
use App\DAO\impl\MoviesJSONDAO;
use App\services\IMoviesService;
use App\DAO\impl\MoviesStaticDAO;
use App\services\impl\MoviesService;

class MoviesFactory {

    public static function getService(): IMoviesService {
        return new MoviesService();
    }

    public static function getDAO(): IMoviesDAO{
        return new MoviesDBDAO();
    }

}