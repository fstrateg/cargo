<?php
defined('COT_CODE') or die('Wrong URL');

$cls=new InwayClaim('inway.claim');
if ($a=='add')
    $cls->post();
else
    $module_body=$cls->createPage();

class InwayClaim extends InwayBase
{
    /**
     * @var TbInway
     */
    var $value;

    function __construct($tmpl)
    {
        $id=cot_import('id','G','INT');
        $this->value=TbInway::getItem($id);
        parent::__construct($tmpl);
    }

    function prepare()
    {
        global $cfg;
        cot_rc_add_file($cfg['modules_dir'].'/inway/js/inway.show.js');
        cot_rc_add_file("${cfg['themes_dir']}/${cfg['defaulttheme']}/css/stars.css");
        cot_rc_add_file('js/jquery-ui.min.js');
        cot_rc_add_file('js/jquery-ui.min.css');
        cot_rc_add_file('http://maps.googleapis.com/maps/api/js?key=AIzaSyCwrTqZZepbfT_JwP5GJKaZH1MfR2afYR0&amp;libraries=places');
        cot_display_messages($this->t);
        parent::prepare();
    }

    function post()
    {
        if ($this->upload())
            cot_redirect(cot_url('inway'));
        else
            cot_redirect(cot_url('inway',['m'=>'claim','id'=>$this->value->id],'',true));
    }

    function upload()
    {
        global $usr,$cfg;
        if (isset($_FILES['rphoto'])&&$_FILES['rphoto']['error']==0)
        {
            $file=$_FILES['rphoto'];
            if (getimagesize($file['tmp_name']))
            {
                $id=$this->value->id;
                $ritem['item_photo']=$cfg['photos_dir']."/inway_${id}_${usr['id']}.jpg";
                include_once $cfg['system_dir'].'/uploads.php';
                cot_uploadImage($file['tmp_name'],$cfg['root_dir'].DS.$ritem['item_photo'],1024);
                $this->value->newrequest();
                cot_message('inway_filesend');
                return true;
            }
            else
            {
                cot_error('inway_error_fileformat');
            }
        }
        else
        {
            cot_error('inway_empty_file');
        }
        return false;
    }

    function addTags()
    {
        global $cfg;
        $this->t->assign(
            [
                'FRM_IN_DESC'=>$cfg['inway']['inway_desc'],
                'FRM_IN_SEND'=>cot_url('inway',['m'=>'claim','a'=>'add','id'=>$this->value->id]),
            ]);
        $this->t->assign($this->value->getTags('FRM_IN_'));
    }
}