<?php
namespace SAI;
class saimod_webcraft_updates extends \SYSTEM\SAI\SaiModule {    
    public static function sai_mod__SAI_saimod_webcraft_updates($update = null, $project = null){
        $vars = array('updates' => '', 'projects' => '', 'commits' => '', 'error' => '');
        $token = \SYSTEM\CONFIG\config::get(\config_ids::WEBCRAFT_BILLING_TOKEN);
        
        $updates = json_decode(file_get_contents('https://wat.webcraft-media.de/api.php?call=updates&action=updates&token='.$token),true);
        if($updates['status']){
            foreach($updates['result'] as $row){
                $row['time'] = \SYSTEM\time::time_ago_string(strtotime($row['time']));
                $vars['updates'] .= \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates_update.tpl'))->SERVERPATH(),$row);
            }
        } else {
            $vars['error'] .= 'Error: '.$updates['result']['message'].'<br>';}
        
        if($update){
            $projects = json_decode(file_get_contents('https://wat.webcraft-media.de/api.php?call=updates&action=projects'.'&update='.$update.'&token='.$token),true);
            if($projects['status']){
                $vars2 = array('project' => '', 'update' => $update);
                foreach($projects['result'] as $row){
                    $row['time'] = \SYSTEM\time::time_ago_string(strtotime($row['time']));
                    $vars2['project'] .= \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates_project.tpl'))->SERVERPATH(),$row);}
                $vars['projects'] = \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates_projects.tpl'))->SERVERPATH(),$vars2);
            } else {
                $vars['error'] .= 'Error: '.$updates['result']['message'].'<br>';}
        }
        
        if($project){
            $commits = json_decode(file_get_contents('https://wat.webcraft-media.de/api.php?call=updates&action=commits'.'&token='.$token.'&update='.$update.'&project='.$project),true);
            if($commits['status']){
                $vars3 = array('commit' => '', 'project' => $project);
                foreach($commits['result'] as $row){
                    $row['time'] = \SYSTEM\time::time_ago_string(strtotime($row['time']));
                    $vars3['commit'] .= \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates_commit.tpl'))->SERVERPATH(),$row);}
                $vars['commits'] = \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates_commits.tpl'))->SERVERPATH(),$vars3);
            } else {
                $vars['error'] .= 'Error: '.$updates['result']['message'].'<br>';}
        }
        
        $vars = array_merge($vars, \SYSTEM\PAGE\text::tag('time'));
        return \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates.tpl'))->SERVERPATH(),$vars);}
    public static function html_li_menu(){return '<li id="menu_updates"><a data-toggle="tooltip" data-placement="left" title="Vote Servers" href="#!updates"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;&nbsp;Updates</a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    
    public static function js(){
        return array(new \PSAI('saimod_webcraft_updates/js/saimod_webcraft_updates.js'));}
}