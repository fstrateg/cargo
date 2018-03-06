<?php
defined('COT_CODE') or die('Wrong URL');

$cls=new InwayComment('inway.commentadd');

$a=cot_import('a','G','TXT');
if (!$a) $a='button';
if (!in_array($a,['button','form','save','reply','reply_cansel','reply_save'])) $a='button';
$cls->setAction($a);
$module_body=$cls->createPage();


class InwayComment
{
    /**
     * @var XTemplate $t
     */
    var $t;
    /** @var  TbComment $value */
    var $value;
    /** @var  string $action */
    var $action;

    var $id;
    /** @var int $repid */
    var $repid;

    function InwayComment($tpl)
    {
        $this->t=new XTemplate(cot_tplfile($tpl));
        $this->value=new TbComment();
        $this->id=cot_import('id','G','INT');
        $this->repid=cot_import('rep','G','INT');
    }

    public function setAction($a)
    {
        $this->action=strtoupper($a);
    }
    private function prepareForm()
    {
        $this->t->assign([
            'FEDITOR'=>cot_textarea('rnote',$this->value->note,10,70,['class'=>'form-control']),
            'FDAT'=>cot_inputbox('text','rdat',$this->value->dat,['id'=>'rdat','class'=>'form-control']),
            'FSTARS'=>$this->value->stars,
            'FCANSEL'=>cot_url('inway',['m'=>'comment','a'=>'button','id'=>$this->id],'',true),
            'FSAVE'=>cot_url('inway',['m'=>'comment','a'=>'save','id'=>$this->id],'',true),
            'FPOST'=>cot_inputbox('submit','submit','')
        ]);
    }

    private function prepareReplyForm()
    {
        $rep=cot_import('rep','G','INT');
        $this->t->assign([
            'FID'=>$rep,
            'FEDITOR'=>cot_textarea('rnote',$this->value->note,10,70,['class'=>'form-control']),
            'FCANSEL'=>cot_url('inway',['m'=>'comment','a'=>'reply_cansel','id'=>$this->id,'rep'=>$this->repid],'',true),
            'FSAVE'=>cot_url('inway',['m'=>'comment','a'=>'reply_save','id'=>$this->id,'rep'=>$this->repid],'',true),
            'FPOST'=>cot_inputbox('submit','submit','')
        ]);
    }

    private function prepareReplyButton()
    {
        $this->t->assign([
                'BUT_URL'=>cot_url('inway',['m'=>'comment','a'=>'reply','id'=>$this->id,'rep'=>$this->repid]),
                'BUT_NUM'=>$this->repid,
            ]);
    }

    private function prepareReplySave()
    {

    }

    private function prepareButton()
    {
        $this->t->assign('BUT_URL',cot_url('inway',['m'=>'comment','a'=>'form','id'=>$this->id]));
    }

    private function validate()
    {
        global $usr;
        cot_check(empty($this->value->dat),'inway_empty_dat');
        cot_check(empty($this->value->stars),'inway_empty_dat');
        cot_check(empty($this->value->note),'inway_empty_note');
        // Проверка что такой топик у нас есть
        $rz=TbInway::getItem($this->value->inway_id);
        cot_check($rz->owner==$usr['id'],'inway_nocommowner');
        return !cot_error_found();
    }

    public function createPage()
    {
        switch($this->action)
        {
            case 'FORM':
                $this->prepareForm();
                break;
            case 'SAVE':
                $this->value->loadFromPost();
                $this->value->inway_id=$this->id;
                if ($this->validate()) {
                    $this->value->add();
                    $this->setAction('SAVED');
                    return $this->createPage();
                }
                else {
                    $this->setAction('FORM');
                    return $this->createPage();
                }
                break;
            case 'SAVED':
                $this->t->assign('URL_REFRESH',cot_url('inway',['m'=>'details','id'=>$this->id],"",true));
                break;
            case 'BUTTON':
                $this->prepareButton();
                break;
            case 'REPLY':
                $this->prepareReplyForm();
                break;
            case 'REPLY_CANSEL':
                $this->prepareReplyButton();
                break;
            case 'REPLY_SAVE':
                $this->value->loadFromPost();
                $this->value->inway_id=$this->id;
                {
                    $this->setAction('SAVED');
                    return $this->createPage();
                }
                break;

        }
        cot_display_messages($this->t,$this->action);
        $this->t->parse($this->action);
        return $this->t->text($this->action);
    }
}