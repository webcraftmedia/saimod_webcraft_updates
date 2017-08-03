<?php
namespace SQL;
class WEBCRAFT_UPDATES_UPDATE extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
'SELECT u.`time`, u.`commit`, u.`commit_last`, u.`complete` FROM host_wat.`webcraft_update` as u'.
' RIGHT JOIN host_wat.`webcraft_update_project` as p ON u.`commit` = p.`update`'.
' WHERE `path` LIKE ?'.
' GROUP BY u.`commit`'.
' ORDER BY u.`time` DESC;';
    }
}