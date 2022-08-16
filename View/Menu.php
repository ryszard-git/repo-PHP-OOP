<?php
declare(strict_types = 1);

namespace test_objects\View;

class Menu extends View {
    
    private static array $menuOptions = 
            ["Strona główna"       => "index.php?action=mainPage",
             "Wprowadzanie danych" => "index.php?action=addData",
             "Przeglądanie danych" => "index.php?action=viewData"];
    
    private static string $menuContent = '' ;
    
    public static function getMenuOptions(): array {
        return self::$menuOptions;
    }
    
    public static function getContent(): string {
        return self::$menuContent;
    }

    public static function createMenu(array $buttons) : void {
    
        self::$menuContent .= "<ul>\n";
	foreach ($buttons as $name => $url) {
            self::displayButton($name, $url, !self::isCurrentURL($url));
	}
	self::$menuContent .= "</ul>\n";
        
        $_SESSION['menuContent'] = self::getContent();
    }
    
    private static function isCurrentURL(string $url) : bool {
        
	if (strpos($_SERVER['REQUEST_URI'], $url) == false) {
            return false;
	} else {
            return true;
	}
    }

    private static function displayButton(string $optionName, string $url,
                                          bool $isActive = true) : void {
        if ($isActive) {
            self::$menuContent .= '<li><a href="' . $url . '">' . $optionName 
                                . '</a></li>' . "\n";
        } else {
            self::$menuContent .= '<li><span class="inactive-button">' 
                                . $optionName . '</span></li>' . "\n";
        }
    }
    
    public static function setPageTitle(array $menuOptions) : void {
        foreach ($menuOptions as $key => $value) {
            if (self::isCurrentURL($value)) {
                self::$pageTitle = $key;
            }
        }
    }
}
