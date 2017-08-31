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
    <!-- BEGIN: CLAIM_ROWS -->
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
    <!-- END: CLAIM_ROWS -->
    <!-- BEGIN: MARSH_ROWS -->
<div class="row">
    <div class="span9">
        <h4>
            {MR_CLAIM} <!-- IF {MR_CONFIRM} == 1 -->
            <span class="label label-success">{PHP.L.marshrut_confirm}</span>
            <!-- ELSE -->
            <span class="label label-inverse">{PHP.L.marshrut_confirm_not}</span>
            <!-- ENDIF -->
            <!-- IF {MR_SUMM} > 0 --><div class="pull-right span2">{MR_SUMM} {PHP.cfg.payments.valuta}</div><!-- ENDIF -->
        </h4>
    </div>
</div>
<div class="row">
    <div class="span12">
        {MR_NICKNAME}
        <!-- FOR {PHONE} IN {MR_PHONES} -->
        {PHONE};
        <!-- ENDFOR -->
    </div>
</div>
<div class="row">
    <div class="span9">
        {MR_TITLE}
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
<!-- IF {MR_CONFIRM} == 0 -->
<div class="row">
    <div class="span12">
        <div class="well well-small">
            <a class="btn btn-success" href="{MR_URLCONF}">Подтвердить заказ</a>
            <a class="btn btn-danger" href="javascript: void(0)" onclick="reject('{MR_URLREJT}')">Отказаться от заказа</a>
        </div>
    </div>
</div>
<!-- ENDIF -->
<!-- IF {MR_CONFIRM} == 1 -->
    <!-- IF {MR_TRSTARS} == 0 -->
        <a href="javascript: void(0)" onclick="closeClaim('{MR_URLCLOSE}')">{PHP.L.marshrut_close}</a>
    <!-- ELSE -->
        <span class="label">Ожидается отзыв от заказчика</span>
    <!-- ENDIF -->
<!-- ENDIF -->
<hr>
    <!-- END: MARSH_ROWS -->
<script type="text/javascript">
    function reject(url)
    {
        if (window.confirm("Вы действительно хотите отказаться от этого заказа?")) window.location=url;
    }
    function closeClaim(url)
    {
        if (window.confirm('Вы действительно хотите закрыть заявку?')) window.location=url;
    }
</script>
<!-- IF {MARSHRUT_COUNT} > 0 -->
<div class="pagination"><ul>{PAGENAV_PAGES}</ul></div>
<!-- ELSE -->
<div class="alert">{PHP.L.marshrut_empty} {MARSHRUT_COUNT}</div>
{TEST}
<!-- ENDIF -->
<!-- END: MAIN -->