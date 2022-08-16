<?php
declare(strict_types = 1);

namespace test_objects\View;

class View {
    protected static $pageTitle = '';
    
    public static function getPageTitle() {
        $_SESSION['pageTitle'] = self::$pageTitle;
    }

    public static function loadPageTemplate() : void {
        require_once 'View/templates/mainPageTemplate.php';
    }
    
    public static function load404PageTemplate() : void {
        require_once 'View/templates/404PageTemplate.php';
    }
       
    protected static function addInput(string $type, 
                                    string $name, 
                                    string $value = '', 
                                    string $placeholder = '',
                                    string $required = '') : string {
        return '<input type="' . $type . '" name ="' . $name . '" value="' 
                . $value . '" placeholder="' . $placeholder . '" required="' 
                . $required . '" >' . "\n";
    }
    
    protected static function addLink(string $href, string $label) : string {
        return '<a href="' . $href . '" >' . $label . '</a>' . "\n";
    }
    
    protected static function addParagraph(string $content) : string {
        return '<p>' . $content . '</p>' . "\n";
    }
    
    protected static function addImg(string $imgName) : string {
        return '<img src="' . $imgName . '" alt="Image" >';
    }
    
    protected static function addContainerDIV(array $tagsArray, string $cssClass = '') : string {
        $content = '';
        
        foreach ($tagsArray as $tags) {
            $content .= $tags;
        }
        
        return '<div class="' . $cssClass . '">' . $content . '</div>' . "\n";
    }
    
    protected static function addForm(string $name, string $action, string $inside) : string {
        return '<form name="' . $name . '" action="' . $action . '" method="post"'
                . ' >' . $inside . '</form>' . "\n";
    }
}