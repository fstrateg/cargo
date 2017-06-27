<!-- BEGIN: MAIN -->
<h4>
    {PHP.L.marshrut_claim_cargo}
    <div class="pull-right"><noindex>
            <!-- IF {PHP.usr.maingrp} == 4 -->
            <a rel="nofollow" class="btn btn-success" href="{PHP|cot_url('marshrut', 'm=add')}"
               title="{PHP.L.projects_add_to_catalog}">{PHP.L.projects_add_tr_marshrut}
            </a>
            <!-- ELSE -->
            <a rel="nofollow" class="btn btn-success" href="{PHP|cot_url('projects', 'm=add')}"
               title="{PHP.L.projects_add_to_catalog}">{PHP.L.projects_add_to_catalog}
            </a>
            <!-- ENDIF -->
        </noindex>
    </div>
</h4>
<hr>
<!-- BEGIN: MARSH_ROWS -->
<div class="row">
    <div class="span12">
        <h4>
            {MR_TITLE}
            <!-- IF {MR_COST} > 0 --><div class="pull-right span2">{MR_COST} {PHP.cfg.payments.valuta}</div><!-- ENDIF -->
        </h4>
    </div>
    <div class="span4">
        {MR_DB}-{MR_DE}
    </div>
    <div class="span4">
        {MR_TTYPE}
    </div>
    <div class="span4">
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