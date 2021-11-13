<?php

namespace BANK_DB;

use PDO;

class database{
    public static function init($host = "localhost", $dbname = "bank") : PDO
    {
        return new PDO("mysql:host=".$host.";dbname=".$dbname,"root","");
    }
}

?>