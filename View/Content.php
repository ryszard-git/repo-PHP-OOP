<?php
declare (strict_types = 1);

namespace test_objects\View;

class Content extends View {
    private static string $content = '';
    
    public static function getContent(): string {
        return self::$content;
    }

    public static function setContent(string $content): void {
        self::$content = $content;
    }

    public static function createContent() : void {
        self::$content .= self::addParagraph("Witaj na eksperymentalnej stronie internetowej.");
        self::$content .= self::addParagraph("Serwis implementuje zapis i odczyt danych z bazy.");
        $_SESSION['pageContent'] = self::addContainerDIV([self::getContent()], "main-page-content");
    }
}
