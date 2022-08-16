<?php
declare (strict_types = 1);

namespace test_objects\Model;

use mysqli;
use test_objects\View\Messages;
use test_objects\View\View;
use test_objects\View\Header;

class DBConnection {
    
    public static object $mysqli;
    private const DB_HOST = "localhost";
    private const DB_USER = "dbuser";
    private const DB_PASSWORD = "!Skok2020@";
    private const DB_NAME = "valid";

    public function createDBConnection() : object {

        self::$mysqli = new mysqli(self::DB_HOST, self::DB_USER,
                                   self::DB_PASSWORD, self::DB_NAME);
        
        if (self::$mysqli->connect_error) {
            Messages::displayMessage('Error when connecting to database', 'red');
            Header::createContent();
            View::loadPageTemplate();
            exit();
        }
        
        return self::$mysqli;
    }
    
    public function setCharset() : void {
        if (!self::$mysqli->set_charset("utf8")) {
            echo "Błąd w ustawieniu kodowania";
	}
    }
    
    public static function closeDBConnection() : void {
        self::$mysqli->close();
    }
}
