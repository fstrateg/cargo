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
        $this->db->query("delete from {$this->table} where item_id=$pid")
            ->execute();
    }

    function generatetags($data)
    {
        if (!is_array($data))
        {
            $data=$this->load($data);
        }
        $item['PRF_OWNER']=cot_generate_usertags($data['item_performer'],'PRF_');
        $item['PRF_FIO']=$data['item_fio'];
        $item['PRF_NUMBER']=$data['item_number'];
        $item['PRF_DB']=cot_date('d.m.Y',$data['item_db']);
        $item['PRF_DE']=cot_date('d.m.Y',$data['item_de']);
        $item['PRF_SUMM']=number_format($data['item_summ'],0,'.',' ');
        $item['PRF_NOTES']=$data['item_note'];
        $item['PRF_PRFDELURL']=cot_url('projects',"m=setperformer&id=".$data['item_claim']."&a=del&pid=".$data['item_id']);
        $item['PRF_PRFEDURL']=cot_url('projects',"m=setperformer&id=".$data['item_claim']."&a=edit&pid=".$data['item_id']);
        return $item;
    }
}