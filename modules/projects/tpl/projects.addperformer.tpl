<!-- BEGIN: MAIN -->
<div class="breadcrumb">{PRJ_TITLE}</div>
<h1 class="tboxHD">
    {PRJ_SHORTTITLE}
</h1>
<div id="content" class="container">

<div class="row">
    <div class="col-auto">
    {PRJ_OWNER_AVATAR}
    </div>
    <div class=<!-- IF {PHP.env.mobile} -->"col"<!-- ELSE -->"col-4"<!-- ENDIF -->>
    <p>{PRJ_OWNER_NICKNAME}</p>
    <p>
        <!-- IF {PRJ_OWNER_ISPRO} -->
        <span class="label label-important">PRO</span>
        <!-- ENDIF -->
        <span class="label label-info">{PRJ_OWNER_USERPOINTS}</span> {PRJ_OWNER_USERSTARS}
    </p>
    <!-- FOR {PHONE} IN {PRJ_OWNER_PHONES} -->
    <p>{PHONE}</p>
    <!-- ENDFOR -->
</div></div>
<div class="col col-6-sm">
<table class="table details">
    <tr><td><b>№:</b></td><td>#{PRJ_ID}</td></tr>
    <tr><td><b>{PHP.L.projects_dat_created}:</b></td><td>{PRJ_DATE}</td></tr>
    <tr><td><b>{PHP.L.projects_dat_period}:</b></td><td>{PRJ_DATEFROM}-{PRJ_DATETO}</td></tr>
    <!-- IF {PHP.cot_plugins_active.projectviews} -->
    <tr><td><b>{PHP.L.projects_views}:</b></td><td>{PRJ_VIEWS}</td></tr>
    <!-- ENDIF -->
</table>
</div>
<hr/>
<div class="row">
    <div class="col"><div class="note">{PRJ_TEXT}</div></div>
</div>
<div class="row">
    <div class=<!-- IF {PHP.env.mobile} -->"col"<!-- ELSE -->"col col-6-sm"<!-- ENDIF -->>
    <table class="table noborder details">
        <!-- IF {PRJ_COST} > 0 -->
        <tr><td><b>{PHP.L.offers_budget}:</b></td><td>{PRJ_COST} {PHP.cfg.payments.valuta}</td></tr>
        <!-- ENDIF -->
        <tr><td><b>{PHP.L.projects_count}:</b></td><td>{PRJ_COUNT_OST} ({PRJ_COUNT})</td></tr>
        <tr><td><b>{PHP.L.projects_frt}:</b></td><td>{PRJ_FRT}</td></tr>
        <tr><td><b>{PHP.L.projects_massa}:</b></td><td>{PRJ_MASSA} {PHP.L.projects_ton}</td></tr>
        <tr><td><b>{PHP.L.projects_vol}:</b></td><td>{PRJ_VOL} {PHP.L.projects_m3}</td></tr>
        <tr><td><b>{PHP.L.Category}:</b></td><td>{PRJ_TRANSP}</td></tr>
        <tr><td><b>{PHP.L.LocationFrom}:</b></td><td>{PRJ_COUNTRY} {PRJ_REGION} {PRJ_CITY}</td></tr>
        <tr><td><b>{PHP.L.LocationTo}:</b></td><td>{PRJ_COUNTRYTO} {PRJ_REGIONTO} {PRJ_CITYTO}</td></tr>
    </table>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col">
        <b>{PHP.L.claims_idcarrier}</b>

            {PRJ_FINDCARRIER}

            <a class="btn btn-success" onclick="doSearch()">{PHP.L.Search}</a>
        </div>
</div>
<p>&nbsp;</p>
<!--div class="row"-->
    <div id="SearchRezult">
        <!-- BEGIN: SEARCHCAR -->
        <div class="row">
            <div class="col-auto">
            {CAR_AVATAR}
            </div>
            <div class="col-4">
                <p>{CAR_NICKNAME}</p>
                <p>
                    <!-- IF {CAR_ISPRO} -->
                    <span class="badge badge-important">PRO</span>
                    <!-- ENDIF -->
                    <span class="badge badge-info">{CAR_USERPOINTS}</span>
                    <!-- IF {PHP.cot_modules.blacklist} -->
                        {CAR_BLLABEL}
                    <!-- ENDIF -->
                    <!-- IF {PHP.cot_modules.favorites} -->
                        {CAR_FVLABEL}
                    <!-- ENDIF -->
                </p>
                <!-- FOR {PHONE} IN {CAR_PHONES} -->
                <p>{PHONE}</p>
                <!-- ENDFOR -->
            </div>
            <div class="col text-align-right">
                <a href="{CAR_SETURL}" class="btn btn-success">{PHP.L.offers_useroffers_performer}</a>
            </div>
        </div>
        <hr>
        <!-- END: SEARCHCAR -->
    </div>
<!--/div-->
<script type="text/javascript">
    function doSearch()
    {
        var search=$('#idcarrier').val();
        ajaxSend({url: '{PRJ_FIND_URL}&text='+search, divId: 'SearchRezult'});
    }
</script>
<!-- END: MAIN -->