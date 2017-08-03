<?php
namespace SQL;
class WEBCRAFT_UPDATES_COMMIT_SELECT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT id FROM host_wat.webcraft_update_commit'.
' WHERE `git` = ? AND `commit` = ?;';
    }
}