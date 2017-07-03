<!-- BEGIN: MAIN -->
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<form method="post" >
    <style>
        table {width:60%}
            .tab{width:55%}
        .name{width:80%}
        .name input{width:98%}
        .hot{width:15%}
        .del{text-align:right}
        select{width: 70%}
        input{margin:0px 0 0 0;}
        td{margin:0 0 0 0}
        th{text-align:left}
    </style>
<table>
    <th>Наименование</th><th>Hot</th><th>V</th>
    {TAG_ADMIN}
    <tr>
    <td><button type="submit" name="upd_spisok">&nbsp;Обновить&nbsp; </button></td>
        <td colspan="2" class="del"><button type="submit" name="del_check">&nbsp; Удалить&nbsp; </button></td></tr>
</table>
</form>
<br><br><br><br>
<form method="post">

    <table>
        <th>Введите наименование</th><th>Hot</th>
        <tr>
            <td class="name"><input class="name" type="text" name="add_name"></td>
            <td class="hot"><select name='add_hot'>
                    <option value='0' $ch>0</option><option value='1' $ch>1</option>
                </select></td><td></td>
        </tr><tr><td colspan="2"><button type="submit" name="add_spisok">&nbsp;Добавить элемент&nbsp; </button></td></tr>
    </table>
</form>



<!-- END: MAIN -->