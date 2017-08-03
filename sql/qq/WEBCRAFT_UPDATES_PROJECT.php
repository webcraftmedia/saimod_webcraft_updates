<?php
namespace SQL;
class WEBCRAFT_UPDATES_PROJECT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT `time`, `path`, `git`, `commit`, `commit_last` FROM host_wat.webcraft_update_project'.
' WHERE `update` = ? AND `path` LIKE ?'.
' ORDER BY `time` ASC;';
    }
}