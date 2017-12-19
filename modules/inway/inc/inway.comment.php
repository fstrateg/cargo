<?php
defined('COT_CODE') or die('Wrong URL');

$cls=new InwayComment('inway.comment');

$a=cot_import('a','G','TXT');
if (!$a) $a='button';
if (!in_array($a,['button','form','save'])) $a='button';
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

    function InwayComment($tpl)
    {
        $this->t=new XTemplate(cot_tplfile($tpl));
        $this->value=new TbComment();
        //TODO: Проверка на существование топика
        //TODO: Проверка на кол-во уже добавленых оценок
        //TODO: Проверка на публикацию комментария владельцем
        $this->id=cot_import('id','G','INT');
    }

    public function setAction($a)
    {
        $this->action=strtoupper($a);
    }
    private function prepareForm()
    {
        $this->t->assign([
            'FEDITOR'=>cot_textarea('rnote',$this->value->note,10,70),
            'FDAT'=>cot_inputbox('text','rdat',$this->value->dat,['id'=>'rdat']),
            'FSTARS'=>$this->value->stars,
            'FCANSEL'=>cot_url('inway',['m'=>'comment','a'=>'button','id'=>$this->id],'',true),
            'FSAVE'=>cot_url('inway',['m'=>'comment','a'=>'save','id'=>$this->id],'',true),
            'FPOST'=>cot_inputbox('submit','submit','')
        ]);
    }

    private function prepareButton()
    {
        $this->t->assign('BUT_URL',cot_url('inway',['m'=>'comment','a'=>'form','id'=>$this->id]));
    }

    private function validate()
    {
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

        }
        $this->t->parse($this->action);
        return $this->t->text($this->action);
    }
}