<?
require_once(dirname(__FILE__)."/../include/config_base.php");
require_once(dirname(__FILE__)."/../include/inc_typelink.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=$cfg_webname?> - �߼�����</title>
<link href="img/base.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {color: #666666}
-->
</style>
</head>
<body leftmargin="0" topmargin="0">
<center>
  <table width="770" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td height="71"><a href='http://www.dedecms.com'><img src="img/df_dedetitle.gif" width="250" height="53" border="0"></a> 
      </td>
    </tr>
    <tr> 
      <td height="6" valign="bottom" background="img/l_mbg.gif" bgcolor="#AFB95B"></td>
    </tr>
  </table>
  <table width="770" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td height="4"></td>
    </tr>
    <tr> 
      <td valign="top">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr> 
            <td height="23" background="img/df_gbg.gif" bgcolor="#E9ECE1"> &nbsp; 
              <a href='<?=$cfg_indexurl?>'> 
              <?=$cfg_webname?>
              </a> - �߼������� </td>
          </tr>
          <tr> 
            <td height="4"></td>
          </tr>
          <tr> 
            <td height="84">
			<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#C8D9C1">
                <form name="form1" action="search.php" method="get">
                  <tr bgcolor="#FFFFFF"> 
                    <td height="25" align="center" width="20%">��վ��Ŀ��</td>
                    <td> 
                      <?
              $tl = new TypeLink(0);
              $typeOptions = $tl->GetOptionArray(0,0,0);
              echo "<select name='typeid' style='width:200'>\r\n";
              echo "<option value='0' selected>--������Ŀ--</option>\r\n";
              echo $typeOptions;
              echo "</select>";
			  $tl->Close();
            ?>
                    </td>
                  </tr>
                  <tr bgcolor="#FFFFFF"> 
                    <td height="25" align="center">�� �� �֣�</td>
                    <td width="490"><input name="keyword" type="text" id="keyword" style="width:200"></td>
                  </tr>
                  <tr bgcolor="#FFFFFF"> 
                    <td height="25" align="center">����ʱ�䣺</td>
                    <td><select name="starttime" id="starttime" style="width:100">
                        <option value="-1" selected>--����--</option>
                        <option value="7">һ������</option>
                        <option value="30">һ������</option>
                        <option value="90">��������</option>
                        <option value="180">��������</option>
                      </select></td>
                  </tr>
                  <tr bgcolor="#FFFFFF"> 
                    <td height="25" align="center">�������ͣ�</td>
                    <td> <select name="channeltype" id="channeltype" style="width:100">
                        <option value="-1" selected>--����--</option>
                        <?
					 $dsql = new DedeSql(false);
					 $dsql->SetQuery("Select ID,typename From #@__channeltype order by ID desc");
					 $dsql->Execute();
					 while($row = $dsql->GetObject())
					 {
					   echo "<option value='".$row->ID."'>".$row->typename."</option>\r\n";
					 }
					 $dsql->Close();
					 ?>
                      </select> </td>
                  </tr>
                  <tr bgcolor="#FFFFFF"> 
                    <td height="25" align="center">����ʽ��</td>
                    <td> <select name="orderby" id="orderby" style="width:100">
                        <option value="sortrank" selected>--Ĭ��--</option>
                        <option value="senddate">��¼ʱ��</option>
                        <option value="pubdate">����ʱ��</option>
                        <option value="ID">�ĵ�ID</option>
                      </select> </td>
                  </tr>
                  <tr bgcolor="#FFFFFF"> 
                    <td height="25" align="center">��ʾ������</td>
                    <td><input name="pagesize" type="text" id="pagesize" value="10" size="4"></td>
                  </tr>
                  <tr bgcolor="#FFFFFF">
                    <td height="25" align="center">�ؼ���ģʽ��</td>
                    <td><input name="kwtype" type="radio" value="1" checked>
                      �� 
                      <input type="radio" name="kwtype" value="0">
                      ��</td>
                  </tr>
                  <tr bgcolor="#FFFFFF"> 
                    <td height="25" align="center">�������ݣ�</td>
                    <td>
					<select name="searchtype" id="searchtype" style="width:100">
                     <option value="titlekeyword" selected>Ĭ������</option>
                     <option value="title">����������</option>
					 </select>
					 </td>
                  </tr>
                  <tr bgcolor="#F4FCE4"> 
                    <td height="31" colspan="2" align="center"><table width="600" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                          <td width="159" align="center"> <input name="imageField" type="image" src="img/button_search.gif" width="60" height="22" border="0"></td>
                          <td width="441"><img src="img/button_reset.gif" width="60" height="22"></td>
                        </tr>
                      </table></td>
                  </tr>
                </form>
              </table>
			  </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr> 
      <td colspan="3" height="3"></td>
    </tr>
    <tr align="center"> 
      <td height="10" colspan="3" bgcolor="#F5F5F5"></td>
    </tr>
    <tr> 
      <td height="20" colspan="3" align="center">
	  <?=$cfg_powerby?>
	  </td>
    </tr>
  </table>
</center>
</body>
</html>