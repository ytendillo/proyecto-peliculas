<?php
namespace App\DAO;
use App\DTO\MovieDTO;
 
interface IMoviesDAO {
 
    public function create(MovieDTO $movie): bool;
    public function read(): array;
    public function findById(int $id): MovieDTO;
    public function update(int $id, MovieDTO $movie): int;
    public function delete(int $id): bool;
}