<?php
defined('COT_CODE') or die('Wrong URL');

$cls=new InwayData();

echo $cls->createPage();
exit();

class InwayData
{
    public function createPage()
    {
        $data=TbInway::getList();
        $rez='';
        foreach($data as $item)
            $rez.=$this->getXml($item);
        return '<markers>'.$rez.'</markers>';
    }

    /**
     * @param TbInway $item
     */
    private function getXml($item)
    {
        return sprintf('<marker><lat>%F</lat><long>%F</long><name>%s</name></marker>',$item->lat,$item->long,$item->title);
    }
}