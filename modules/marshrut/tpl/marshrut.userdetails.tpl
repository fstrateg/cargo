<!-- BEGIN: MAIN -->
<h4>
{PHP.L.marshrut_marshruts}
    <!-- IF {PHP.usr.id} == {PHP.urr.user_id}--><div class="pull-right"><a href="{PHP|cot_url('marshrut', 'm=add')}" class="btn btn-success">{PHP.L.marshrut_add_new}</a></div><!-- ENDIF -->
</h4>
<!-- IF {MR_SHOW_STATUS} -->
<ul class="nav nav-pills">
    <!-- BEGIN: ST_ROWS -->
    <li class="centerall <!-- IF {MR_CAT_ROW_SELECT} -->active<!-- ENDIF -->"><a href="{MR_CAT_ROW_URL}">
    {MR_CAT_ROW_TITLE} <span class="badge badge-inverse">{MR_CAT_ROW_COUNT}</span></a></li>
    <!-- END: ST_ROWS -->
</ul>
<!-- ENDIF -->
<hr>
    <!-- BEGIN: MARSH_ROWS -->
    <table class="flat">
        <tr>
            <td>{MR_DB}-{MR_DE} {MR_TITLE} <!-- IF {MR_SHOW_STATUS} -->{MR_STATUS}<!-- ENDIF -->
                <div class="pull-right">{MR_COST} {PHP.cfg.payments.valuta}</div></td>
        </tr>
    </table>
    <!-- END: MARSH_ROWS -->
<!-- IF {MARSHRUT_COUNT} > 0 -->
<div class="pagination"><ul>{PAGENAV_PAGES}</ul></div>
<!-- ELSE -->
<div class="alert">{PHP.L.marshrut_empty} {MARSHRUT_COUNT}</div>
{TEST}
<!-- ENDIF -->
<!-- END: MAIN -->