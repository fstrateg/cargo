<!-- BEGIN: MAIN -->
<div class="row pt-3">
    <div class="col">
        <h4>
        {PHP.L.marshrut_marshruts}
        </h4>
    </div>
    <div class="col text-right">
        <!-- IF {PHP.usr.id} == {PHP.urr.user_id}--><a href="{PHP|cot_url('marshrut', 'm=add')}" class="btn btn-success">{PHP.L.marshrut_add_new}</a><!-- ENDIF -->
    </div>
</div>
<!-- IF {MR_SHOW_STATUS} -->
<ul class="nav nav-pills">
    <!-- BEGIN: ST_ROWS -->
    <li class="nav-item <!-- IF {MR_CAT_ROW_SELECT} -->active<!-- ENDIF -->"><a href="{MR_CAT_ROW_URL}" class="nav-link">
    {MR_CAT_ROW_TITLE} <span class="badge badge-success">{MR_CAT_ROW_COUNT}</span></a></li>
    <!-- END: ST_ROWS -->
</ul>
<!-- ENDIF -->
    <!-- BEGIN: CLAIM_ROWS -->
    <div class="row">
        <div class="col">
        <h5>
            {MR_TITLE}
        </h5>
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
    <div class="row">
        <div class="col text-right">
            <h5><!-- IF {MR_COST} > 0 --><span class="money"></span> {MR_COST} {PHP.cfg.payments.valuta}<!-- ENDIF --></h5>
        </div>
    </div>
    <hr>
    <!-- END: CLAIM_ROWS -->
    <!-- BEGIN: MARSH_ROWS -->
<div class="row">
            <div class="col"><h5>
            {MR_CLAIM} <!-- IF {MR_CONFIRM} == 1 -->
            <span class="badge badge-success">{PHP.L.marshrut_confirm}</span>
            <!-- ELSE -->
            <span class="badge badge-dark">{PHP.L.marshrut_confirm_not}</span>
            <!-- ENDIF -->
            </h5>
            </div>
    <!-- IF {MR_SUMM} > 0 --><div class="col-12 col-md-6 text-md-right"><h5><span class="money"></span> {MR_SUMM} {PHP.cfg.payments.valuta}</h5></div><!-- ENDIF -->
</div>
<div class="row">
    <div class="col">
    {MR_NICKNAME}
    </div>
</div>
<div class="row"><div class="col">
    <!-- FOR {PHONE} IN {MR_PHONES} -->
{PHONE};
    <!-- ENDFOR --></div>
</div>
<div class="row">
    <div class="col">
        {MR_TITLE}
    </div>
    </div>
<div class="row">
    <div class="col">
        {MR_DB}-{MR_DE}
    </div>
    <div class="col">
        {MR_TTYPE}
    </div>
    <div class="col">
        {MR_FRT}
    </div>
</div>
<!-- IF {MR_CONFIRM} == 0 -->
<div class="row">
    <div class="col">
        <div class="well well-small">
            <a class="btn btn-success" href="{MR_URLCONF}">Подтвердить заказ</a>
            <a class="btn btn-danger" href="javascript: void(0)" onclick="reject('{MR_URLREJT}')">Отказаться от заказа</a>
        </div>
    </div>
</div>
<!-- ENDIF -->
<!-- IF {MR_CONFIRM} == 1 -->
    <div class="row"><div class="col">
    <!-- IF {MR_TRSTARS} == 0 -->
        <a href="javascript: void(0)" onclick="closeClaim('{MR_URLCLOSE}')">{PHP.L.marshrut_close}</a>
    <!-- ELSE -->
        <span class="badge badge-info">Ожидается отзыв от заказчика</span>
    <!-- ENDIF -->
    </div></div>
<!-- ENDIF -->
<hr>
    <!-- END: MARSH_ROWS -->
<!-- BEGIN: CLOSED_ROWS -->
<div class="row">
    <div class="col">
        <h5>
        {MR_CLAIM}</h5>
    </div>
            <!-- IF {MR_SUMM} > 0 --><div class="col-12 col-md-6 text-md-right"><h5><span class="money"></span> {MR_SUMM} {PHP.cfg.payments.valuta}</h5></div><!-- ENDIF -->
</div>
<div class="row">
    <div class="col">
    {MR_NICKNAME}
    </div>
</div>
<div class="row">
    <div class="col">
        <!-- FOR {PHONE} IN {MR_PHONES} -->
    {PHONE};
        <!-- ENDFOR -->
    </div>
</div>
<div class="row">
    <div class="col">
    {MR_TITLE}
    </div>
</div>
<div class="row">
    <div class="col">
    <p>{MR_DB}-{MR_DE}</p>
    </div>
    <div class="col">
    {MR_TTYPE}
    </div>
    <div class="col">
    {MR_FRT}
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <b>Мой отзыв</b>
        <div class="fstars" style="padding: 10px 0">
            <span class="stars-view"><span style="width: {MR_TRSTARS}%"></span></span>
        </div>
        <div>
            {MR_TRFEEDBACK}
        </div>
    </div>
    <div class="col-12 col-md-6">
        <b>Отзыв работодателя</b>
        <div class="fstars" style="padding: 10px 0">
            <span class="stars-view"><span style="width: {MR_FSTARS}%"></span></span>
        </div>
        <div>
            {MR_FEEDBACK}
        </div>
    </div>
</div>
<hr>
<!-- END: CLOSED_ROWS -->

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