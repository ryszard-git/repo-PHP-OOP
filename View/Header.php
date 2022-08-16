<?php
declare (strict_types = 1);

namespace test_objects\View;

class Header extends View {
    
    private static string $content = '';
    
    public static function getContent(): string {
        return self::$content;
    }

    public static function setContent(string $content): void {
        self::$content .= $content;
    }

    public static function createContent() : void {
        self::setContent(self::addLink("index.php", self::addImg("View/templates/images/star.png")));
        $_SESSION['headerContent'] = self::getContent();
    }
}
