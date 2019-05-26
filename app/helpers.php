<?php

function get_db_config()
{
    if (getenv('IS_IN_HEROKU')) {
        $url = parse_url(getenv("DATABASE_URL"));
        return $db_config = [
            'host' => $url["host"],
            'connection' => 'pgsql',
            'username'  => $url["user"],
            'password'  => $url["pass"],
            'database'  => substr($url["path"], 1),
        ];
    } else {
        return $db_config = [
            'host' => env('DB_HOST', 'localhost'),
            'password'  => env('DB_PASSWORD', ''),
            'database'  => env('DB_DATABASE', 'forge'),
            'username'  => env('DB_USERNAME', 'forge'),
            'connection' => env('DB_CONNECTION', 'mysql'),
        ];
    }
}
