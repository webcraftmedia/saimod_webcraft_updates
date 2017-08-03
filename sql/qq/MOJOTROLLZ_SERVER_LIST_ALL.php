<?php
namespace SQL;
class MOJOTROLLZ_SERVER_LIST_ALL extends \SYSTEM\DB\QQ {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT mojotrollz_server.* FROM mojotrollz_server';
    }
}