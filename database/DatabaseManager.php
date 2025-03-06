<?php
// namespace DatabaseManager;
// use PDO;
// use PDOException;

// class DatabaseManager
// {
//     private static array $config;
//     private static ?PDO $conn = null;

//     private static function loadConfig()
//     {
//         if (!isset(self::$config)) {
//             self::$config = require __DIR__."/../config/database.php";
//         }
//     }
//     private static function connect($dbconn = null)
//     {
//         self::loadConfig();
//         try {
//             $dsn = "mysql:host=" . self::$config['host'];
//             if ($dbconn) {
//                 $dsn .= ";dbname=" . self::$config['dbname'];
//             }
//             self::$conn = new PDO($dsn, self::$config['username'], self::$config['password']);
//             self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         } catch (PDOException $e) {
//             echo "Database Connection Error: " . $e->getMessage();
//             die;
//         }
//     }
//     private static function databaseExists(): bool
//     {
//         self::connect();
//         $sql = self::$conn->prepare("SELECT SCHEMA_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = :dbname");
//         $sql->execute([':dbname' => self::$config['dbname']]);
//         return $sql->fetchColumn() !== false;
//     }

//     private static function createDatabase()
//     {
//         if (!self::databaseExists()) {

//             self::$conn->exec("CREATE DATABASE " . self::$config['dbname']);
//         }
//     }
//     public static function initialize()
//     {
//         self::connect();
//         self::createDatabase();
//         self::connect(true);
//     }
//     public static function getConnection(): PDO
//     {
//         if (!self::$conn) {
//             self::initialize();
//         }
//         return self::$conn;
//     }
// }


namespace DatabaseManager;

class DatabaseManager
{
    private static array $config;
    private static ?\mysqli $conn = null;

    private static function loadConfig()
    {
        if (!isset(self::$config)) {
            self::$config = require __DIR__ . "/../config/database.php";
        }
    }

    private static function connect($selectDB = false)
    {
        self::loadConfig();
        self::$conn = new \mysqli(
            self::$config['host'],
            self::$config['username'],
            self::$config['password'],
            $selectDB ? self::$config['dbname'] : null
        );

        if (self::$conn->connect_error) {
            die("Database Connection Error: " . self::$conn->connect_error);
        }
    }

    private static function databaseExists(): bool
    {
        self::connect();
        $dbName = self::$config['dbname'];
        $query = "SELECT SCHEMA_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = ?";
        $stmt = self::$conn->prepare($query);
        $stmt->bind_param("s", $dbName);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $exists = $result->num_rows > 0; 
        
        $stmt->close();
        self::$conn->close(); 
        return $exists;
    }

    private static function createDatabase()
    {
        if (!self::databaseExists()) {
            self::connect(); 
            $query = "CREATE DATABASE " . self::$config['dbname'];
            if (self::$conn->query($query)) {
                echo "Database Created Successfully!";
            } else {
                die("Database Creation Failed: " . self::$conn->error);
            }
            self::$conn->close(); 
        }
    }

    public static function initialize()
    {
        echo " initialize DB...";
        self::connect();
        self::createDatabase();
        self::connect(true); 
    }

    public static function getConnection(): \mysqli
    {
        if (!self::$conn) {
            self::initialize();
        }
        return self::$conn;
    }
}

?>
