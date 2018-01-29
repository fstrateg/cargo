<!-- BEGIN: MAIN -->
<h1 class="tboxHD">
{PHP.L.marshrut_claim_cargo}
</h1>
<div id="content" class="container">
    <div class="row">
        <div class="col text-right">
            <noindex>
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
    </div>
    <hr>
    <div id="listprojects">
        <!-- BEGIN: MARSH_ROWS -->
        <!-- IF {PHP.env.mobile} -->
        <div class="row">
            <h5 class="col">
            {MR_TITLE}
            </h5>
        </div>
        <div class="row">
            <div class="col">
            {MR_USER_NICKNAME}
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- FOR {PHONE} IN {MR_USER_PHONES} -->
            {PHONE};
                <!-- ENDFOR -->
            </div>
        </div>
        <div class="row">
            <div class="col">
            {MR_DB}-{MR_DE}
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
            {MR_TTYPE}
            </div>
            <div class="col">
            {MR_FRT}
            </div>
        </div>
        <div class="row">
            <h5 class="col text-right">
                <span class="money"></span><!-- IF {MR_COST} > 0 -->{MR_COST} {PHP.cfg.payments.valuta}<!-- ENDIF -->
            </h5>
        </div>
        <!-- ELSE -->
        <div class="row">
            <h4 class="col">
            {MR_TITLE}
            </h4>
            <h5 class="col text-right">
                <span class="money"></span><!-- IF {MR_COST} > 0 -->{MR_COST} {PHP.cfg.payments.valuta}</div><!-- ENDIF -->
            </h5>
        </div>
        <div class="row">
            <div class="col">
            {MR_USER_NICKNAME}
                <!-- FOR {PHONE} IN {MR_USER_PHONES} -->
            {PHONE};
                <!-- ENDFOR -->
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            {MR_DB}-{MR_DE}
            </div>
            <div class="col-4">
            {MR_TTYPE}
            </div>
            <div class="col-4">
            {MR_FRT}
            </div>
        </div>
        <!-- ENDIF -->
        <hr>
        <!-- END: MARSH_ROWS -->
    </div>
</div>
<!-- IF {MARSHRUT_COUNT} > 0 -->
<div class="pagination"><ul>{PAGENAV_PAGES}</ul></div>
<!-- ELSE -->
<div class="alert">{PHP.L.marshrut_empty} {MARSHRUT_COUNT}</div>
{TEST}
<!-- ENDIF -->

<!-- END: MAIN -->