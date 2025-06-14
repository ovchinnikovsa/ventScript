<?php

namespace Module\Connector;

class Connector
{
    private $host;
    private $username;
    private $password;
    private static $instance = null;

    /**
     * Singleton instance
     * @return void
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Summary of __construct
     * @param string $host
     * @param string $username
     * @param string $password
     */
    public function __construct(string $host, string $username, string $password)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }
}