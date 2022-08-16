<?php
declare(strict_types = 1);

namespace test_objects\View;

class Footer extends View {
    private static string $content = '';
    
    public static function getContent(): string {
        return self::$content;
    }

    public static function setContent(string $content): void {
        self::$content = $content;
    }

    public static function createContent() : void {
        
        self::$content .= self::addLink("mailto:jan@example.pl", "send mail to admin");
        self::$content .= self::addParagraph("&copy; Copyright 2022");
        $_SESSION['footerContent'] = self::$content;
    }
}
