<?php
defined('COT_CODE') or die('Wrong URL');
cot_block($usr['isadmin']);

$act=cot_import('act','G','TXT');

$cls=new InwayReqs('inway.admin.reqs');

if (isset($act)){
    if ($act=='remove')
    {
        $cls->remove();
        cot_redirect(cot_url('admin'));
    }
    if ($act=='appr')
    {
        $cls->approval();
        cot_redirect(cot_url('admin'));
    }
}

$adminmain=$cls->createPage();

class InwayReqs extends InwayBase
{   /**
    * @var $item TbInway
    */
    var $value;
    public function addTags()
    {
        global $cfg;
        Resources::addFile("${cfg['themes_dir']}/${cfg['defaulttheme']}/css/stars.css");

        $this->initValue();

        $this->t->assign($this->value->getTags('IN_'));
        $this->t->assign(cot_generate_usertags($this->value->owner,'IN_OWNER_'));
        $this->t->assign(cot_generate_usertags($this->value->req,'IN_REQ_'));

        $this->saveddoc($this->value->owner,'IN_OLD_DOC');
        $this->saveddoc($this->value->req,'IN_NEW_DOC');

        $this->t->assign([
            'IN_OLD_OWNER'=>cot_url('admin',[
                    'm'=>'inway',
                    'a'=>'reqs',
                    'id'=>$this->value->id,
                    'act'=>'remove',
                ],'',true),
            'IN_NEW_OWNER'=>cot_url('admin',[
                    'm'=>'inway',
                    'a'=>'reqs',
                    'id'=>$this->value->id,
                    'act'=>'appr',
                ],'',true),
        ]);

    }
    private function initValue()
    {
        $id=cot_import('id','G','INT');
        $this->value=TbInway::getItem($id);
    }

    public function remove()
    {
        $this->initValue();
        $this->deletedoc($this->value->req);
        $this->value->removerequest();
        cot_message('Новый владелец не одобрен!','warning');
    }

    public function approval()
    {
        $this->initValue();
        $this->deletedoc($this->value->owner);
        $this->value->appr_request();

        cot_message('Новый владелец одобрен!','ok');
    }
    private function deletedoc($uid)
    {
        global $cfg;

        $filename=$cfg['photos_dir']."/inway_{$this->value->id}_{$uid}.jpg";
        if (file_exists($cfg['root_dir']."/".$filename))
            unlink($cfg['root_dir']."/".$filename);
    }

    private function saveddoc($uid,$tag)
    {
        global $cfg;

        $filename=$cfg['photos_dir']."/inway_{$this->value->id}_{$uid}.jpg";

        if (file_exists($cfg['root_dir']."/".$filename))
        {
            $a=cot_rc_link($filename,"<img src='$filename' />",['target'=>'_blank']);
            $this->t->assign($tag,$a);
        }
        else
            $this->t->assign($tag,"<img src='{$cfg['photos_dir']}/fura_no_photo.png'/>");
    }
}