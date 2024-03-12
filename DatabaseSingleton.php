<?php

class DatabaseSingleton
{
    public const SERVER_IP = "193.85.203.188";
    public const USER = "riha";
    public const PASSWORD = "dijram-zygfib";
    public const DATABASE = "User";

    private static $connection = null;

    protected function __construct()
    {
    }

    public static function startConnection()
    {
        if (!self::$connection) 
        {
            self::$connection = mysqli_connect(
                self::SERVER_IP,
                self::USER,
                self::PASSWORD,
                self::DATABASE
            );
            if (!self::$connection) 
            {
                die('Could not connect to Database');
            }
        }
        return self::$connection;
    }

    public static function closeConnection()
    {
        if (self::$connection) 
        {
            mysqli_close(self::$connection);
            self::$connection = null;
        }
    }
}
