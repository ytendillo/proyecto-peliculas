<?php
namespace App\db\orm;
use PDO;
use App\db\orm\QueryBuilder;
use App\factories\DBFactory;


class DB {

    private static function execute(string $sql, ?array $params = null):array {
        $pdo = DBFactory::getConnection()::connect();
        $ps = $pdo->prepare($sql);
        $ps->execute($params);
        return $ps->fetchAll(\PDO::FETCH_ASSOC); 
    }

    public static function select(string $sql, ?array $params = null):array {
        $result = array();
        $data = self::execute($sql, $params);
        foreach ($data as $record) {
            $result[] = ((object) $record);
        }
        return $result;
    }

    public static function selectOne(string $sql, ?array $params = null): \stdClass {
        $data = self::execute($sql, $params);
        if(count($data) > 0) {
            return (object) $data[0];
        }
     
        throw new \Exception("Recurso no encontrado", 404);        
    }

    public static function table(string $table):QueryBuilder {
        return new QueryBuilder($table);
    }

    public static function insert(string $sql, array $params): int {
        try {
            return self::executeNoResult($sql, $params);
        } catch (\Throwable $th){
            //throw $th;
            throw new \Exception("Error en la insercion.", 400);
        }
    }
         
    private static function executeNoResult(string $sql, array $params):int {
        $pdo = DBFactory::getConnection()::connect();
        try {
            $ps = $pdo->prepare($sql);
            $ps->execute($params);         
            return $ps->rowCount();
        } catch (\Throwable $th){
            //throw $th;
            throw new \Exception("Error", 400);
        }
    }    

    public static function delete($sql, $params): bool {
        try {
            return self::executeNoResult($sql, $params);
        } catch (\Throwable $th){
            //throw $th;
            throw new \Exception("Error al borrar.", 400);
        }
    }

    public static function update($sql, $params): int {
        try {
            return self::executeNoResult($sql, $params);
        } catch (\Throwable $th){
            //throw $th;
            throw new \Exception("Error actualizar.", 400);
        }
    }
}