<?php
namespace SAI;
class saimod_webcraft_updates extends \SYSTEM\SAI\SaiModule {    
    public static function sai_mod__SAI_saimod_webcraft_updates($update = null, $project = null){
        $vars = array('updates' => '', 'projects' => '', 'commits' => '');
        
        $res = \SQL\WEBCRAFT_UPDATES_UPDATE::QQ(array('test/mojotrollz/%'));
        while($row = $res->next()){
            $row['time'] = \SYSTEM\time::time_ago_string(strtotime($row['time']));
            $vars['updates'] .= \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates_update.tpl'))->SERVERPATH(),$row);}
        
        $project_row = null;
        if($update){
            $vars2 = array('project' => '', 'update' => $update);
            $res = \SQL\WEBCRAFT_UPDATES_PROJECT::QQ(array($update, 'test/mojotrollz/%'));
            while($row = $res->next()){
                if($project && $row['path'] == $project){
                    $project_row = $row;}
                $row['time'] = \SYSTEM\time::time_ago_string(strtotime($row['time']));
                $vars2['project'] .= \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates_project.tpl'))->SERVERPATH(),$row);}
            $vars['projects'] = \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates_projects.tpl'))->SERVERPATH(),$vars2);
        }
        
        if($project){
            $vars3 = array('commit' => '', 'project' => $project);
            $min = \SQL\WEBCRAFT_UPDATES_COMMIT_SELECT::Q1(array($project_row['git'],$project_row['commit_last']))['id']+1;
            $max = \SQL\WEBCRAFT_UPDATES_COMMIT_SELECT::Q1(array($project_row['git'],$project_row['commit']))['id'];
            $res = \SQL\WEBCRAFT_UPDATES_COMMIT::QQ(array($project_row['git'],$min,$max));
            while($row = $res->next()){
                $row['time'] = \SYSTEM\time::time_ago_string(strtotime($row['time']));
                $vars3['commit'] .= \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates_commit.tpl'))->SERVERPATH(),$row);}
            $vars['commits'] = \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates_commits.tpl'))->SERVERPATH(),$vars3);
        }
        
        $vars = array_merge($vars, \SYSTEM\PAGE\text::tag('time'));
        return \SYSTEM\PAGE\replace::replaceFile((new \PSAI('saimod_webcraft_updates/tpl/saimod_webcraft_updates.tpl'))->SERVERPATH(),$vars);}
    public static function html_li_menu(){return '<li id="menu_updates"><a data-toggle="tooltip" data-placement="left" title="Vote Servers" href="#!updates"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;&nbsp;Updates</a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    
    public static function js(){
        return array(new \PSAI('saimod_webcraft_updates/js/saimod_webcraft_updates.js'));}
}