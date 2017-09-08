<?php
defined('COT_CODE') or die('Wrong URL');

class Performers
{
    var $db;
    var $table;
    var $tableclaim;
    var $L;

    function __construct()
    {
        global $L,$db,$db_projects_perform,$db_projects;
        $this->db=$db;
        $this->table=$db_projects_perform;
        $this->tableclaim=$db_projects;
        $this->L=$L;
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
        $claim=$item['item_claim'];
        $this->db->insert($this->table, $item);
        $this->db
            ->query("update ".$this->tableclaim.
                " set item_performer=item_performer+1,
                 item_inwork=case when item_performer>0 and item_realized<item_performer
                    then 1 else 0 end where item_id=$claim");
        $this->db
            ->query("update ".$this->tableclaim." set item_state=1 where item_id=$claim and item_performer=item_count");
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

        $this->sendPrivateMessageRefuse($this->load($pid));
        $this->delete($pid);
    }

    function delete($pid)
    {
        $claim=$this->getclaim($pid);
        $this->db
            ->query("update ".$this->tableclaim." set item_performer=item_performer-1,
                    item_inwork=case when item_performer>0 and item_realized<item_performer
                    then 1 else 0 end where item_id=".$claim);
        $this->db
            ->query("update ".$this->tableclaim." set item_state=0 where item_id=$claim and item_performer<item_count and item_state=1");
        $this->db->query("delete from {$this->table} where item_id=$pid")
            ->execute();
    }

    function reject($pid)
    {
        $this->sendPrivateMessageReject($this->load($pid));
        $this->delete($pid);
    }

    function confirm($pid)
    {
        $this->db->query("update {$this->table} set item_confirm=1 where item_id=$pid")
            ->execute();
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
        $item['PRF_TRSTARS']=$data['item_trstars']*20;
        $item['PRF_TRFEEDBACK']=$data['item_trfeedback'];
        $item['PRF_FEEDBACK']=$data['item_feedback'];
        $item['PRF_OWNER']=cot_generate_usertags($data['item_performer'],'PRF_');
        $item['PRF_FIO']=$data['item_fio'];
        $item['PRF_NUMBER']=$data['item_number'];
        $item['PRF_DB']=cot_date('d.m.Y',$data['item_db']);
        $item['PRF_DE']=cot_date('d.m.Y',$data['item_de']);
        $item['PRF_SUMM']=number_format($data['item_summ'],0,'.',' ');
        $item['PRF_NOTES']=$data['item_note'];
        $item['PRF_PRFDONEURL']=cot_url('projects',"m=setperformed&id=".$data['item_claim']."&pid=".$data['item_id']);
        $item['PRF_PRFDELURL']=cot_url('projects',"m=setperformer&id=".$data['item_claim']."&a=del&pid=".$data['item_id']);
        $item['PRF_PRFEDURL']=cot_url('projects',"m=setperformer&id=".$data['item_claim']."&a=edit&pid=".$data['item_id']);
        $name=$this->L[$data['item_confirm']==0?'claims_not_confirm':'claims_confirm'];
        $cls=$data['item_confirm']==0?'important':'info';
        $item['PRF_CONFIRM']="<span class='label label-$cls'>$name</span>";
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
        $item=$this->loadClaimDetails($perf['item_claim']);
        $urr=$this->loadUserDetails($perf['item_performer']);
        $urlparams="id=".$perf['item_claim'];

        $rsubject = cot_rc($L['project_setperformer_header'], array('prtitle' => $item['item_title']));
        $rbody = cot_rc($L['project_setperformer_body'], array(
            'user_name' => $item['user_name'],
            'offeruser_name' => $urr['user_fiofirm']?$urr['user_fiofirm']:$urr['user_name'],
            'prj_name' => $item['item_title'],
            'sitename' => $cfg['maintitle'],
            'link' => COT_ABSOLUTE_URL . cot_url('projects', $urlparams, '', true)
        ));

        include_once cot_incfile('pm','module');
        cot_sendpm_fromadmin($perf['item_performer'],$rsubject,$rbody);
    }

    /**
    * @param array $perf
    */

    function sendPrivateMessageRefuse($perf)
    {
        global $L,$cfg;
        $item=$this->loadClaimDetails($perf['item_claim']);
        $urr=$this->loadUserDetails($perf['item_performer']);
        $urlparams="id=".$perf['item_claim'];

        $rsubject = cot_rc($L['project_refuse_header'], array('prtitle' => $item['item_title']));
                $rbody = cot_rc($L['project_refuse_body'], array(
            'user_name' => $item['user_name'],
            'offeruser_name' => $urr['user_fiofirm']?$urr['user_fiofirm']:$urr['user_name'],
            'prj_name' => $item['item_title'],
            'sitename' => $cfg['maintitle'],
            'link' => COT_ABSOLUTE_URL . cot_url('projects', $urlparams, '', true)
        ));

        include_once cot_incfile('pm','module');
        cot_sendpm_fromadmin($perf['item_performer'],$rsubject,$rbody);

    }

    /**
     * @param $perf
     */
    function sendPrivateMessageReject($perf)
    {
        global $L,$cfg;
        $item=$this->loadClaimDetails($perf['item_claim']);
        $urr=$this->loadUserDetails($perf['item_performer']);
        $u=$this->loadUserDetails($item['item_userid']);
        $urlparams="id=".$perf['item_claim'];

        $rsubject = cot_rc($L['project_reject_header'], array('prtitle' => $item['item_title']));
        $rbody = cot_rc($L['project_reject_body'], array(
            'user_name' => $u['user_name'],
            'offeruser_name' => $urr['user_fiofirm']?$urr['user_fiofirm']:$urr['user_name'],
            'prj_name' => $item['item_title'],
            'sitename' => $cfg['maintitle'],
            'link' => COT_ABSOLUTE_URL . cot_url('projects', $urlparams, '', true)
        ));

        include_once cot_incfile('pm','module');
        cot_sendpm_fromadmin($item['item_userid'],$rsubject,$rbody);

    }

    function loadClaimDetails($id)
    {
        global $db_projects;
        $item=$this->db->query("Select * from $db_projects where item_id=:id",['id'=>$id])->fetch();
        return $item;
    }

    function loadUserDetails($id)
    {
        global $db_users;
        $item=$this->db->query("Select * from $db_users where user_id=:id",['id'=>$id])->fetch();
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
        $claim=$this->getclaim($ritem['item_id']);
        $this->db
            ->query("update ".$this->tableclaim." set item_realized=item_realized+1,
                    item_inwork=case when item_performer>0 and item_realized<item_performer
                    then 1 else 0 end where item_id=".$claim);
        $this->db
            ->query("update ".$this->tableclaim." set item_state=3 where item_id=$claim and item_realized=item_count");
        $this->db->update($this->table,$ritem,"item_id=".$ritem['item_id']);
        $this->db->query("update {$this->table} set item_done=1 where item_id={$ritem['item_id']} and item_trstars>0");

        /* === Hook === */
        foreach (cot_getextplugins('projects.feedback.save') as $pl)
        {
            include $pl;
        }
        /* ===== */
    }
    // </editor-fold>
}