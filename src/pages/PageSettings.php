<?php

namespace Entertainment\Src\Pages;

Class PageSettings implements Page
{
    
    public function render()
    {
        require_once( PLUGIN_PATH . '/templates/tabs.php' );
    }

}