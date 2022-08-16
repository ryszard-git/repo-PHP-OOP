<?php
declare (strict_types = 1);

namespace test_objects\View;

class Messages extends View {
    public static function displayMessage(string $message, string $messageColor) : void {
        $_SESSION['messageContent'] = '<span style="color:' . $messageColor 
                                    . ';">' . $message . '</span>' . "\n";
    }
    
    public static function display404Message() : void {
        $_SESSION['pageContent'] = '<span style="font-size:64px;">'
                . '404 - resource not found !</span>';
    }
}
