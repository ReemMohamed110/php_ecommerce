<?php
namespace DatabaseManager;
use PDO;
use PDOException;

class DatabaseManager
{
    private static array $config;
    private static ?PDO $conn = null;

    private static function loadConfig()
    {
        if (!isset(self::$config)) {
            self::$config = require __DIR__."/../config/database.php";
        }
    }
    private static function connect($dbconn = null)
    {
        self::loadConfig();
        try {
            $dsn = "mysql:host=" . self::$config['host'];
            if ($dbconn) {
                $dsn .= ";dbname=" . self::$config['dbname'];
            }
            self::$conn = new PDO($dsn, self::$config['username'], self::$config['password']);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database Connection Error: " . $e->getMessage();
            die;
        }
    }
    private static function databaseExists(): bool
    {
        self::connect();
        $sql = self::$conn->prepare("SELECT SCHEMA_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = :dbname");
        $sql->execute([':dbname' => self::$config['dbname']]);
        return $sql->fetchColumn() !== false;
    }

    private static function createDatabase()
    {
        if (!self::databaseExists()) {

            self::$conn->exec("CREATE DATABASE " . self::$config['dbname']);
        }
    }
    public static function initialize()
    {
        self::connect();
        self::createDatabase();
        self::connect(true);
    }
    public static function getConnection(): PDO
    {
        if (!self::$conn) {
            self::initialize();
        }
        return self::$conn;
    }
}
?>
