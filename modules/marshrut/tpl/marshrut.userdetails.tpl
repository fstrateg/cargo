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
    <div class="row">
        <div class="span9">
        <h4>
            {MR_TITLE}
            <!-- IF {MR_COST} > 0 --><div class="pull-right span2">{MR_COST} {PHP.cfg.payments.valuta}</div><!-- ENDIF -->
        </h4>
        </div>
        <div class="span3">
            {MR_DB}-{MR_DE}
        </div>
        <div class="span2">
            {MR_TTYPE}
        </div>
        <div class="span3">
           {MR_FRT}
        </div>
    </div>
    <hr>
    <!-- END: MARSH_ROWS -->
<!-- IF {MARSHRUT_COUNT} > 0 -->
<div class="pagination"><ul>{PAGENAV_PAGES}</ul></div>
<!-- ELSE -->
<div class="alert">{PHP.L.marshrut_empty} {MARSHRUT_COUNT}</div>
{TEST}
<!-- ENDIF -->
<!-- END: MAIN -->