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
        return $rez;
    }

    /**
     * @param TbInway $item
     */
    private function getXml($item)
    {
        return sprintf('<lat>%F</lat><long>%F</long><name>%s</name>',$item->lat,$item->long,$item->title);
    }
}