<!-- BEGIN: MAIN -->
<h4>
{PHP.L.marshrut_marshruts}
    <!-- IF {PHP.usr.id} == {PHP.urr.user_id}--><div class="pull-right"><a href="{PHP|cot_url('marshrut', 'm=add')}" class="btn btn-success">{PHP.L.marshrut_add_new}</a></div><!-- ENDIF -->
</h4>
<hr>
    <!-- BEGIN: MARSH_ROWS -->
    <table class="flat">
        <tr>
            <td>{MR_DB}-{MR_DE} {MR_TITLE} <div class="pull-right">{MR_COST} {PHP.cfg.payments.valuta}</div></td>
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