<?php
/**
 * 投票模块
 *
 * @version   $Id: vote_add.php 1 23:54 2010年7月20日 $
 * @package   DedeCMS.Administrator
 * @founder   IT柏拉图, https://weibo.com/itprato
 * @author    DedeCMS团队
 * @copyright Copyright (c) 2007 - 2021, 上海卓卓网络科技有限公司 (DesDev, Inc.)
 * @license   http://help.dedecms.com/usersguide/license.html
 * @link      http://www.dedecms.com
 */
require dirname(__FILE__) . "/config.php";
require_once DEDEINC . "/dedevote.class.php";
require_once DEDEINC . "/helpers/filter.helper.php";
CheckPurview('plus_投票模块');
if (empty($dopost)) {
    $dopost = "";
}

if (empty($isarc)) {
    $isarc = 0;
}




if ($dopost == "save") {
    $starttime = strtotime($starttime);
    $endtime = strtotime($endtime);
    $voteitems = "";
    foreach ($vitem as $key => $value) {
        $voteitems .= "<v:note id=\\'$key\\' count=\\'0\\'>" . $value . "</v:note>\r\n";
    }

    $inQuery = "INSERT INTO #@__vote(votename,starttime,endtime,totalcount,ismore,votenote,isallow,view,spec,isenable)
    VALUES('$votename','$starttime','$endtime','0','$ismore','$voteitems','$isallow','$view','$spec','$isenable'); ";
    if (!$dsql->ExecuteNoneQuery($inQuery)) {
        ShowMsg("增加投票失败，请检查数据是否非法！", "-1");
        exit();
    }
    $aid = $dsql->GetLastID();
    $vt = new DedeVote($aid);
    $vote_content = $vt->GetVoteForm();
    $vote_content = preg_replace(array("#/#", "#([\r\n])[\s]+#"), array("\/", " "), $vote_content); //取出内容中的空白字符并进行转义
    $vote_content = 'document.write("' . $vote_content . '");';

    $vote_file = DEDEDATA . "/vote/vote_" . $aid . ".js";
    file_put_contents($vote_file, $vote_content);
    ShowMsg("成功增加一组投票！", "vote_main.php");
    exit();
} 
$startDay = time();
$endDay = AddDay($startDay, 30);
$startDay = GetDateTimeMk($startDay);
$endDay = GetDateTimeMk($endDay);
DedeInclude('templets/vote_add.htm');
