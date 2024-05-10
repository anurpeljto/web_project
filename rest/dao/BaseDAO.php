<?php

require_once 'DB_connector.php';

class BaseDAO {
    protected static $connector;

    public static function initializeConnector(){
        if (!isset(self::$connector)) {
            self::$connector = new Connector();
        }
    }

    public function __construct(){
        self::initializeConnector();
    }
}
