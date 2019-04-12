<?php

namespace Entertainment\Src\Tabs;

class CreateTab{
    
    protected $page;
    protected $data;
    
    public function __construct( $page, $data )
    {
        $this->page = $page;
        $this->data = $data;
    }
    public function init()
    {
        try {
            if ( $this->data['tab_menu'] == 'menu' ) {
                add_action( 'admin_menu', array( $this, 'add_tab_menu' ) );
            } elseif ( $this->data['tab_menu'] == 'submenu' ) {
                add_action( 'admin_menu', array( $this, 'add_tab_submenu' ) );
            } else {
                throw new \Exception( 'Error, nothing to show!');
            }
        }
        catch(\Exception $e) {
            var_dump($e->getMessage());
            // file_put_contents('/tmp/tabs.txt', $e->getMessage(), FILE_APPEND);
        }
    }

    public function add_tab_menu()
    {
        foreach ( $this->data as $key => $value ){
            $this->checkVariable( $key, $value );
        }
        add_menu_page( $this->data['page_title'], $this->data['menu_title'], $this->data['capability'], $this->data['menu_slug'], array( $this->page, 'render' ) );
    }

    public function add_tab_submenu()
    {
        foreach ( $this->data as $key => $value ){
            $this->checkVariable( $key, $value );
        }
        add_submenu_page( $this->data['parent_slug'], $this->data['page_title'], $this->data['menu_title'], $this->data['capability'], $this->data['menu_slug'], array( $this->page, 'render' ) );
    }

    protected function checkVariable( $key, $value )
    {
        try {
            if ( is_string( $value ) || is_null( $value ) ){
                if ( $value || $value === null ){
                    return true;
                }
                throw new \Exception( 'Variable ' . $key . ' is empty');
            }
            throw new \Exception( 'Variable ' . $key . ' is not string');
        }
        catch(\Exception $e) {
            var_dump($e->getMessage());
            // file_put_contents('/tmp/tabs.txt', $e->getMessage(), FILE_APPEND);
        }
    }
}