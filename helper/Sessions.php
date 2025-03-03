<?php

class Sessions
{


    private static function start()
    {
        if (session_status() == PHP_SESSION_NONE) session_start();
    }
    public static function set($key, $value)
    {
        Sessions::start();
        return  $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        Sessions::start();
        return $_SESSION[$key] ?? null;
    }

    public static function has($key)
    {
        Sessions::start();
        return isset($_SESSION[$key]);
    }

    private static function delete($key)
    {
        Sessions::start();
        Sessions::has($key);
        session_unset();
    }

    public static function remove_all($key)
    {
        Sessions::delete($key);
        session_destroy();
    }

    public static function getAll() {
        Sessions::start();
        return $_SESSION;
    }

    public static function flash($key, $message = null) {
        Sessions::start();
        if ($message !== null) {
            $_SESSION['flash'][$key] = $message;
        } elseif(isset($_SESSION['flash'][$key])) {
            $msg = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $msg;
        }
        return null;
    }
}

