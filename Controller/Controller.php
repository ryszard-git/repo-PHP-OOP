<?php
declare(strict_types = 1);

namespace test_objects\Controller;

use test_objects\View\Menu;
use test_objects\Model\DBConnection;
use test_objects\Model\DBQueries;
use test_objects\View\Footer;
use test_objects\View\Header;
use test_objects\View\FetchFromQuery;
use test_objects\View\Content;
use test_objects\View\View;
use test_objects\View\Forms;
use test_objects\View\Messages;

class Controller {
    
    public static function launchMainPage() : void {
        
        Header::createContent();
        Menu::createMenu(Menu::getMenuOptions());        
        Content::createContent();       
        Footer::createContent();
        Menu::setPageTitle(Menu::getMenuOptions());
        View::getPageTitle();
        View::loadPageTemplate();
    }
    
    public static function launchAddData() : void {
        
        Header::createContent();
        Menu::createMenu(Menu::getMenuOptions());       
        Forms::createContent();       
        Footer::createContent();
        Menu::setPageTitle(Menu::getMenuOptions());
        View::getPageTitle();
        View::loadPageTemplate();
    }
    
    public static function submitFormData() : void {
            
        $dbConnection = new DBConnection();
        $dbQueries = new DBQueries();
        $dbConnection->createDBConnection();
        $dbConnection->setCharset();
            
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
            
        $dbQueries->setSql('INSERT INTO tab (imie, nazwisko, email) VALUES '
                            . "(\"$name\", \"$surname\", \"$email\")");
            
        if ($dbQueries->launchQuery($dbQueries->getSql())) {
            Messages::displayMessage('Dane zostały zapisane do bazy.', 'white');
        } else {
            Messages::displayMessage("Wystąpił błąd podczas zapisu danych do bazy.", "red");
        }
            
        $dbConnection->closeDBConnection();
        
        Header::createContent();
        Menu::createMenu(Menu::getMenuOptions());
        Forms::createContent();
        Footer::createContent();
        View::loadPageTemplate();
    }
    
    public static function launchViewData() : void {
        
        $dbConnection = new DBConnection();
        $dbQueries = new DBQueries();

        $dbConnection->createDBConnection();
        $dbConnection->setCharset();

        $dbQueries->setSql("SELECT * FROM tab ORDER BY id");
        
        if (!$dbQueries->launchQuery($dbQueries->getSql())) {
            Messages::displayMessage("Wystąpił błąd podczas odczytu danych z bazy.", "red");
        }

        if ($dbQueries->getQueryResult()) {
            FetchFromQuery::fetchQuery($dbQueries->getQueryResult());
        }
        
        $dbConnection->closeDBConnection();
        
        Header::createContent();
        Menu::createMenu(Menu::getMenuOptions());             
        Footer::createContent();
        Menu::setPageTitle(Menu::getMenuOptions());
        View::getPageTitle();        
        View::loadPageTemplate();        
    }
    
    public static function launch404Message() : void {
        Messages::display404Message();
        View::load404PageTemplate();
        exit();
    }
}