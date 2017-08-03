<?php
namespace SQL;
class WEBCRAFT_UPDATES_COMMIT extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT `time`, `email`, `author`, `log`, `commit` FROM host_wat.webcraft_update_commit'.
' WHERE `git` = ? AND (id BETWEEN ? AND ?)'.
' ORDER BY `time` DESC;';
    }
}