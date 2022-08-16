<?php
declare(strict_types = 1);

namespace test_objects\Model;

class DBQueries {
    
    private string $sql;
    private static $queryResult; // object
    
    public function getSql(): string {
        return $this->sql;
    }

    public function setSql(string $sql): void {
        $this->sql = $sql;
    }
    
    public static function getQueryResult() {
        return self::$queryResult;
    }

    public static function setQueryResult(object $queryResult): void {
        self::$queryResult = $queryResult;
    }
          
    public function launchQuery(string $sql) : bool {
        if (!(self::$queryResult = DBConnection::$mysqli->query($sql))) {
            return false;
        } else {
            return true;
        }
    }
}