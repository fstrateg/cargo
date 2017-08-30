<?php
defined('COT_CODE') or die('Wrong URL');

$act=cot_import('act','G','TXT');

//-----------/ Контроль /-----------
require_once cot_incfile('marshrut','module','lib');
$perf=new MarshrutPerf();

if (!$perf->getAccess()) return;

require_once cot_incfile('projects','module','performers');
$p=new Performers();
if ($act=='conf') $p->confirm($perf->id_perf);
if ($act=='rejt') $p->reject($perf->id_perf);

cot_redirect(cot_url('users',["m"=>'details','id'=>$perf->id_usr,'tab'=>'marshrut','stat'=>'inwork'],'',true));
exit();
   // http://cargo.git/index.php?e=users&m=details&id=26&tab=marshrut&stat=inwork
//$module_body= $id.' test '.$act.' '.$uid;