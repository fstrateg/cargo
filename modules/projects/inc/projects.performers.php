<?php
defined('COT_CODE') or die('Wrong URL');

class Performers
{
    var $db;
    var $table;

    function __construct()
    {
        global $db,$db_projects_perform;
        $this->db=$db;
        $this->table=$db_projects_perform;
    }

    /**
     * @param array $item object for import variables
     */

    function import($item)
    {
        $item['item_number'] = cot_import('rnumber', 'P', 'TXT');
        $item['item_fio'] = cot_import('rfio', 'P', 'TXT');
        $item['item_summ'] = cot_import('rsumm', 'P', 'NUM');
        $item['item_note'] = cot_import('rnote', 'P', 'HTM');
        $item['item_db'] = cot_date2stamp(cot_import('rdb', 'P', 'TXT'), 'd.m.Y');
        $item['item_de'] = cot_date2stamp(cot_import('rde', 'P', 'TXT'), 'd.m.Y');
        $item['item_claim'] = cot_import('rclaim', 'P', 'INT');
        $item['item_performer'] = cot_import('rperformer', 'P', 'INT');

        return $item;
    }

    /**
     * @param array $item object for import variables
     */
    function validate($item)
    {
        cot_check(empty($item['item_number']), 'claims_empty_number', 'rnumber');
        cot_check(empty($item['item_fio']), 'claims_empty_fio', 'rfio');
        cot_check(empty($item['item_summ']), 'claims_empty_summ', 'rfio');
    }

    /**
     * @param array $item object for import variables
     */
    function add($item)
    {
        $item['item_status'] = 1;
        $this->db->insert($this->table, $item);
        $this->sendPrivateMessageSet($item);
    }

    function edit($items, $pid)
    {
        $this->db->update($this->table,$items,'item_id = ?', $pid);
    }

    function getclaim($pid)
    {
        return $this->db->query('select item_claim from '.$this->table.' where item_id='.$pid)
            ->fetchColumn();
    }

    function load($pid)
    {
        $items = $this->db->query("Select * from {$this->table} where item_id=$pid")
            ->fetchAll();
        return $items[0];
    }

    function del($pid)
    {
        $this->sendPrivateMessageRefuse($this->getclaim($pid));
        //$this->db->query("delete from {$this->table} where item_id=$pid")
        //    ->execute();

    }

    function generatetags_forid($id)
    {
        $tmp_items=$this->db->query("select * from ".$this->table." where item_claim=$id")->fetchAll();
        $items=[];
        foreach($tmp_items as $i) {
            $items[]=$this->generatetags($i);
        }
        return $items;
    }

    function generatetags($data,$prefix='')
    {
        if (!is_array($data))
        {
            $data=$this->load($data);
        }
        $item['PRF_STATUS']=$data['item_status'];
        $item['PRF_STARS']=$data['item_fstars']*20;
        $item['PRF_FEEDBACK']=$data['item_feedback'];
        $item['PRF_OWNER']=cot_generate_usertags($data['item_performer'],'PRF_');
        $item['PRF_FIO']=$data['item_fio'];
        $item['PRF_NUMBER']=$data['item_number'];
        $item['PRF_DB']=cot_date('d.m.Y',$data['item_db']);
        $item['PRF_DE']=cot_date('d.m.Y',$data['item_de']);
        $item['PRF_SUMM']=number_format($data['item_summ'],0,'.',' ');
        $item['PRF_NOTES']=$data['item_note'];
        $item['PRF_PRFDELURL']=cot_url('projects',"m=setperformer&id=".$data['item_claim']."&a=del&pid=".$data['item_id']);
        $item['PRF_PRFEDURL']=cot_url('projects',"m=setperformer&id=".$data['item_claim']."&a=edit&pid=".$data['item_id']);
        if (!$prefix) return $item;
        $rez=[];
        foreach($item as $key=>$vl)
        {
            $rez[$prefix.$key]=$vl;
        }
        return $rez;
    }

    function sendPrivateMessageSet($perf)
    {
        global $L,$cfg;
        $item=$this->loadClaim($perf['item_claim']);
        $rsubject = cot_rc($L['project_setperformer_header'], array('prtitle' => $item['item_title']));
        die($rsubject);
        $rbody = cot_rc($L['project_setperformer_body'], array(
            'user_name' => $item['user_name'],
            'offeruser_name' => $urr['user_fiofirm']?$urr['user_fiofirm']:$urr['user_name'],
            'prj_name' => $item['item_title'],
            'sitename' => $cfg['maintitle'],
            'link' => COT_ABSOLUTE_URL . cot_url('projects', $urlparams, '', true)
        ));
    }

    function sendPrivateMessageRefuse($cid)
    {
        global $L,$cfg;
        $item=$this->loadClaim($cid);
        $rsubject = cot_rc($L['project_refuse_header'], array('prtitle' => $item['item_title']));
        echo $rsubject;
        exit();
        $rbody = cot_rc($L['project_refuse_body'], array(
            'user_name' => $item['user_name'],
            'offeruser_name' => $urr['user_fiofirm']?$urr['user_fiofirm']:$urr['user_name'],
            'prj_name' => $item['item_title'],
            'sitename' => $cfg['maintitle'],
            'link' => COT_ABSOLUTE_URL . cot_url('projects', $urlparams, '', true)
        ));


    }

    function loadClaim($id)
    {
        global $db_projects;
        $items=$this->db->query("Select * from $db_projects where item_id=:id",["id"=>$id])->fetchAll();
        $item=$items[0];
        return $item;
    }

    // <editor-fold desc="Feedbacks">
    function importFeedback()
    {
        $ritem=[
            'item_fstars'=>cot_import('reviewStars','POST','INT'),
            'item_feedback'=>cot_import('rnotes','POST','HTM'),
            'item_id'=>cot_import('pid','G','INT'),
        ];
        return $ritem;
    }

    function validateFeedback($ritem)
    {
        global $L;
        cot_check(empty($ritem['item_fstars']),$L['claims_rating_emptystars'],'reviewStars');
        if ($ritem['item_fstars']&&((int)$ritem['item_fstars'])<3) {
            cot_check(empty($ritem['item_feedback']), $L['claims_rating_emptynotes'], 'rnotes');
        }
    }

    function saveFeedback($ritem)
    {
        $ritem['item_status']=2;
        $this->db->update($this->table,$ritem,"item_id=".$ritem['item_id']);
    }
    // </editor-fold>
}