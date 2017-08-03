<?php
namespace SQL;
class SAIMOD_MOJOTROLLZ_VISIBLE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return 
'UPDATE mojotrollz_server SET visible = ? WHERE `id` = ?;';
    }
}
