<?php
namespace SAI;
class saimod_webcraft_updates extends \SYSTEM\SAI\SaiModule {    
    public static function sai_mod__SAI_saimod_webcraft_updates(){
        $vars = array();
        return \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates.tpl'))->SERVERPATH(),$vars);}
    public static function html_li_menu(){return '<li id="menu_updates"><a data-toggle="tooltip" data-placement="left" title="Vote Servers" href="#!updates"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;&nbsp;Updates</a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    
    /*public static function css(){
        return array((new \SYSTEM\PSAI('modules/saistart_sys_sai/css/saistart_sys_sai.css'));}*/
    public static function js(){
        return array(new \PSAI('saimod_webcraft_updates/js/saimod_webcraft_updates.js'));}
}