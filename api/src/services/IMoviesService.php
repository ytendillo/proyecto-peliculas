<?php
namespace App\services;
use App\DTO\MovieDTO;
 
interface IMoviesService {
    public function all(): array;
    public function find($id): MovieDTO;
    public function insert(MovieDTO $movie): bool;
    public function delete($id): bool;
    public function update($id, $movie);
}