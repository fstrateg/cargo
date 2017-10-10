<!-- BEGIN: MAIN -->
<div class="breadcrumb">{PRJ_TITLE}</div>
<h1 class="tboxHD">
    {PRJ_SHORTTITLE}
</h1>
<div class="row">
    <div class="span1">
        {PRJ_OWNER_AVATAR}
    </div>
    <div class="span2">
        <p>{PRJ_OWNER_NICKNAME}</p>
        <p>
            <!-- IF {PRJ_OWNER_ISPRO} -->
            <span class="label label-important">PRO</span>
            <!-- ENDIF -->
            <span class="label label-info">{PRJ_OWNER_USERPOINTS}</span>
        </p>
        <!-- FOR {PHONE} IN {PRJ_OWNER_PHONES} -->
        <p>{PHONE}</p>
        <!-- ENDFOR -->
    </div>
    <div class="span4 pull-right">
        <table width="100%">
            <tr><td><b>№:</b></td><td>#{PRJ_ID}</td></tr>
            <tr><td><b>{PHP.L.projects_dat_created}:</b></td><td>{PRJ_DATE}</td></tr>
            <tr><td><b>{PHP.L.projects_dat_period}:</b></td><td>{PRJ_DATEFROM}-{PRJ_DATETO}</td></tr>
            <!-- IF {PHP.cot_plugins_active.projectviews} -->
            <tr><td><b>{PHP.L.projects_views}:</b></td><td>{PRJ_VIEWS}</td></tr>
            <!-- ENDIF -->
        </table>
    </div>
</div>
<hr/>
<div class="row">
    <div class="span6">
        <table width="100%">
            <!-- IF {PRJ_COST} > 0 -->
            <tr><td><b>{PHP.L.offers_budget}:</b></td><td>{PRJ_COST} {PHP.cfg.payments.valuta}</td></tr>
            <!-- ENDIF -->
            <tr><td><b>{PHP.L.projects_count}:</b></td><td>{PRJ_COUNT}</td></tr>
            <tr><td><b>{PHP.L.projects_massa}:</b></td><td>{PRJ_MASSA} {PHP.L.projects_ton}</td></tr>
            <tr><td><b>{PHP.L.projects_vol}:</b></td><td>{PRJ_VOL} {PHP.L.projects_m3}</td></tr>
            <tr><td><b>{PHP.L.Category}:</b></td><td><a href="{PRJ_CAT|cot_url('projects', 'c='$this)}">{PRJ_CATTITLE}</a></td></tr>
            <tr><td><b>{PHP.L.LocationFrom}:</b></td><td>{PRJ_COUNTRY} {PRJ_REGION} {PRJ_CITY}</td></tr>
            <tr><td><b>{PHP.L.LocationTo}:</b></td><td>{PRJ_COUNTRYTO} {PRJ_REGIONTO} {PRJ_CITYTO}</td></tr>
        </table>

    </div>
    <div class="span6">
        {PRJ_TEXT}

        <!-- IF {PHP.cot_plugins_active.mavatars} -->
        <!-- IF {PRJ_MAVATARCOUNT} -->
        <div style="clear:both;"></div>
        <h5>{PHP.L.Files}:</h5>
        <ol class="files">
            <!-- FOR {KEY}, {VALUE} IN {PRJ_MAVATAR} -->
            <li><a href="{VALUE.FILE}">{VALUE.FILENAME}.{VALUE.FILEEXT}</a></li>
            <!-- ENDFOR -->
        </ol>
        <!-- ENDIF -->
        <!-- ENDIF -->

    </div>
</div>
<hr/>
<div class="row">
    <div class="span2">
        <b>{PHP.L.claims_idcarrier}</b>
    </div>
        <div class="span2">
            {PRJ_FINDCARRIER}
        </div>
        <div class="span2">
            <a class="btn btn-success" onclick="doSearch()">{PHP.L.Search}</a>
        </div>
</div>
<p>&nbsp;</p>
<!--div class="row"-->
    <div id="SearchRezult">
        <!-- BEGIN: SEARCHCAR -->
        <div class="row">
            <div class="span1">
            {CAR_AVATAR}
            </div>
            <div class="span2">
                <p>{CAR_NICKNAME}</p>
                <p>
                    <!-- IF {CAR_ISPRO} -->
                    <span class="label label-important">PRO</span>
                    <!-- ENDIF -->
                    <span class="label label-info">{CAR_USERPOINTS}</span>
                    <!-- IF {PHP.cot_modules.blacklist} -->
                        {CAR_BLLABEL}
                    <!-- ENDIF -->
                </p>
                <!-- FOR {PHONE} IN {CAR_PHONES} -->
                <p>{PHONE}</p>
                <!-- ENDFOR -->
            </div>
            <div class="span2 pull-right">
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