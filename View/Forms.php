<?php
declare (strict_types = 1);

namespace test_objects\View;

class Forms extends View {
    
    private static string $content = '';
    
    public static function getContent(): string {
        return self::$content;
    }

    public static function setContent(string $content): void {
        self::$content .= $content;
    }

    public static function createContent() : void {
        self::setContent(self::addParagraph("Wprowadź dane"));
        self::setContent(self::addInput("text", "name", "", "Imię", "required"));
        self::setContent(self::addInput("text", "surname", "", "Nazwisko", "required"));
        self::setContent(self::addInput("email", "email", "", "E-mail", "required"));
        self::setContent(self::addInput("submit", "submit", "Wyślij"));
        $_SESSION['pageContent'] = 
          self::addForm("form", "index.php?action=submitData", self::getContent());
    }
}
