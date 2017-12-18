<?php
defined('COT_CODE') or die('Wrong URL');

$cls=new InwayComment('inway.comment');

$a=cot_import('a','G','TXT');
if (!$a) $a='button';
if (!in_array($a,['button','form','save'])) $a='button';
$a=strtoupper($a);
$module_body=$cls->createPage($a);


class InwayComment
{
    /**
     * @var XTemplate $t
     */
    var $t;

    function InwayComment($tpl)
    {
        $this->t=new XTemplate(cot_tplfile($tpl));
    }

    private function prepareForm()
    {
        $this->t->assign([
            'FEDITOR'=>cot_textarea('rcomment','',10,70),
            'FCANSEL'=>cot_url('inway',['m'=>'comment','a'=>'button'],'',true),
            'FSAVE'=>cot_url('inway',['m'=>'comment','a'=>'save'],'',true),
        ]);
    }

    private function saveComment()
    {
        $comment=cot_import('romment','P','TXT');
        die($comment);
    }

    public function createPage($part)
    {
        switch($part)
        {
            case 'FORM':
                $this->prepareForm();
                break;
            case 'SAVE':
                $this->saveComment();
                break;
        }
        $this->t->parse($part);
        return $this->t->text($part);
    }
}