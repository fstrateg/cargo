<?php
defined('COT_CODE') or die('Wrong URL');

$cls=new InwayDetails('inway.details');
$cls->init();
$module_body=$cls->createPage();

class InwayDetails extends InwayBase
{
    /**
     * @var TbInway
     */
    var $value;
    public function init()
    {
        $id=cot_import('id','G','INT');
        $this->value=TbInway::getItem($id);
    }

    public function addTags()
    {

    }

}