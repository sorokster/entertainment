<?php

namespace Entertainment\Src\Tabs;
use Entertainment\Src\Pages\PageSettings;

class TabSettings extends CreateTab{
    
    public $page;
    public $data;
    
    public function __construct( PageSettings $page, $data )
    {
        $this->page = $page;
        $this->data = $data;
        $this->init();
    }
}