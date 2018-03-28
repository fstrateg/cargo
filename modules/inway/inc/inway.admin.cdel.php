<?php
defined('COT_CODE') or die('Wrong URL');
cot_block($usr['isadmin']);

$id=cot_import('id','G','INT');
TbComment::delete($id);
exit();
