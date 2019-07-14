<?php

require_once(__DIR__ . '/../Config/app.php');

class DBConnection
{
    /**
     * Connection instance
     *
     * @var
     */
    protected static $conn;

    /**
     * DBConnection constructor.
     *
     */
    protected function __construct()
    {
    }

    /**
     * Init DB connection using PDO
     *
     * @return PDO
     */
    public static function connect()
    {
        global $dbUserName, $dbName, $dbPassword, $dbServerName;

        if (!empty(self::$conn)) {
            return self::$conn;
        }

        try {
            self::$conn = new PDO("mysql:host=$dbServerName;dbname=$dbName;charset=utf8", $dbUserName, $dbPassword);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }

        return self::$conn;
    }

}