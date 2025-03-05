<?php
// namespace Sessions;
// class Sessions
// {

//     public static function start()
//     {
//         if (session_status() == PHP_SESSION_NONE) session_start();
//     }
//     public static function set($key, $value)
//     {

//         return  $_SESSION[$key] = $value;
//     }

//     public static function get($key)
//     {

//         return $_SESSION[$key] ?? null;
//     }

//     public static function has($key)
//     {

//         return isset($_SESSION[$key]);
//     }

//     private static function delete($key)
//     {


//         Sessions::has($key);
//         session_unset();
//     }

//     public static function remove_all($key)
//     {
//         Sessions::delete($key);
//         session_destroy();
//     }

//     public static function getAll() {

//         return $_SESSION;
//     }

//     public static function flash($key, $message = null) {

//         if ($message !== null) {
//             $_SESSION['flash'][$key] = $message;
//         } elseif(isset($_SESSION['flash'][$key])) {
//             $msg = $_SESSION['flash'][$key];
//             unset($_SESSION['flash'][$key]);
//             return $msg;
//         }
//         return null;
//     }
// }

// session_start();
class Sessions
{

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        // else {
        //     return "not found";
        // }
    }
    public static function flash($key)
    {
        if (isset($_SESSION[$key])) {
            echo $_SESSION[$key];
            unset($_SESSION[$key]);
        }
        // else {
        //     return "not found";
        // }
    }
    public static function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
        // else {
        //     return "not found";
        // }
    }
    public static function removeAll()
    {
        session_destroy();
    }
    public static function getAll()
    {
        print_r($_SESSION);
    }
    public static function has($key)
    {


        return isset($_SESSION[$key]);

        if (isset($_SESSION[$key])) {
            return 'true';
        } else {
            return 'false';
        }
    }
}
// Session::set("name", "reem");
// Session::set("age", "23");
// $newSession = Session::get("age");
// $newSession=Session::flash("age");
// Session::getAll();
// Session::has("name");
// var_dump($newSession);
?>
<?php
// if($_SERVER['REQUEST_METHOD']=="POST"){

//     $key=$_POST['key'];

//     $value=$_POST['value'];
//     Session::set($key, $value);
//     Session::getAll();

// }

?>



