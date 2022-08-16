<?php
declare (strict_types = 1);

namespace test_objects\View;

class FetchFromQuery {
    
    private static string $outputFromDB = ''; // string
    private static $fetchedArray; // array
    private static array $columnNames = array();
    
    public static function getOutputFromDB(): string {
        return self::$outputFromDB;
    }

    public static function setOutputFromDB(string $outputFromDB): void {
        self::$outputFromDB = $outputFromDB;
    }
    
    public static function fetchQuery($queryResult) : void {
        
        if (!empty($queryResult) && $queryResult->num_rows > 0) {
            self::$outputFromDB = '<table><tbody><tr>';
            self::createTableHeader($queryResult->fetch_assoc());
            self::$outputFromDB .= "</tr>\n";
            $queryResult->data_seek(0);

            while (self::$fetchedArray = $queryResult->fetch_assoc()) {   
                self::$outputFromDB .= '<tr>';
                self::fetchQueryResultToTable(self::$columnNames);
                self::$outputFromDB .= "</tr>\n";
            }

            self::$outputFromDB .= "</tbody></table>\n";
            $_SESSION['pageContent'] = self::getOutputFromDB();
        }
    }
    
    private static function fetchQueryResultToTable(array $fetchedColumns) : void {
        foreach ($fetchedColumns as $columnName) {
            self::$outputFromDB .= '<td>' . self::$fetchedArray["$columnName"] . '</td>';
        }       
    }
    
    private static function createTableHeader($queryResult) : void {
        foreach ($queryResult as $key => $value) {
            self::$outputFromDB .= '<th>' . $key . '</th>';
            self::$columnNames[] = $key;
        }
        unset($value);
    }
}