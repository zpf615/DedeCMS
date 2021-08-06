<?php
/**
 * @version   $Id: index.php 1 9:23 2010-11-11  $
 * @package   DedeCMS.Site
 * @founder   IT柏拉图, https://weibo.com/itprato
 * @author    DedeCMS团队
 * @copyright Copyright (c) 2007 - 2021, 上海卓卓网络科技有限公司 (DesDev, Inc.)
 * @license   http://help.dedecms.com/usersguide/license.html
 * @link      http://www.dedecms.com
 */
if (!file_exists(dirname(__FILE__) . '/data/common.inc.php')) {
    header('Location:install/index.php');
    exit();
}
//自动生成HTML版
if (isset($_GET['upcache']) || !file_exists('index.html')) {
    include_once dirname(__FILE__) . "/include/common1.inc.php";
    include_once DEDEINC . "/arc.partview.class.php";
    $GLOBALS['_arclistEnv'] = 'index';
    $row = $dsql->GetOne("Select * From `#@__homepageset`");
    $row['templet'] = MfTemplet($row['templet']);
    $pv = new PartView();

    $pv->SetTemplet($cfg_basedir . $cfg_templets_dir . "/" . $row['templet']);
    $row['showmod'] = isset($row['showmod']) ? $row['showmod'] : 0;
    if ($row['showmod'] == 1) {
        $pv->SaveToHtml(dirname(__FILE__) . '/index.html');
        include dirname(__FILE__) . '/index.html';
        exit();
    } else {
        $pv->Display();
        exit();
    }
} else {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location:index.html');
}
