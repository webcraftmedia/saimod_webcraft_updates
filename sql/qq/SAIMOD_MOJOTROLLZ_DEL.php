<?php
namespace SQL;
class SAIMOD_MOJOTROLLZ_DEL extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return 
'DELETE FROM mojotrollz_server WHERE id = ?;';
    }
}