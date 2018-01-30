<!-- BEGIN: MAIN -->

<div class="breadcrumb">{PRJ_TITLE}</div>
<h1 class="tboxHD">
	{PRJ_SHORTTITLE}
</h1>
<!-- IF {PRJ_STATE} == 2 -->
<div class="alert alert-warning">{PHP.L.projects_forreview}</div>
<!-- ENDIF -->
<div class="row">
	<div class="span1">
		{PRJ_OWNER_AVATAR}
	</div>
    <div class=<!-- IF {PHP.env.mobile} -->"col"<!-- ELSE -->"col-4"<!-- ENDIF -->>
    <p>{PRJ_OWNER_NICKNAME}</p>
		<p>
			<span class="badge badge-success">{PRJ_OWNER_USERPOINTS}</span> {PRJ_OWNER_USERSTARS}
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
            <tr><td><b>{PHP.L.projects_count}:</b></td><td>{PRJ_COUNT_OST} ({PRJ_COUNT})</td></tr>
            <tr><td><b>{PHP.L.projects_frt}:</b></td><td>{PRJ_FRT}</td></tr>
            <tr><td><b>{PHP.L.projects_massa}:</b></td><td>{PRJ_MASSA} {PHP.L.projects_ton}</td></tr>
            <tr><td><b>{PHP.L.projects_vol}:</b></td><td>{PRJ_VOL} {PHP.L.projects_m3}</td></tr>
            <tr><td><b>{PHP.L.Category}:</b></td><td>{PRJ_TRANSP}</td></tr>
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
<p>&nbsp;</p>
<a href="/" class="btn btn-success"><i class="icon-eye-open icon-white"></i> {PHP.L.Home}</></a>
<a href="{PRJ_EDIT_URL}" class="btn btn-info"><i class="icon-pencil icon-white"></i> {PHP.L.Edit}</a>

<!-- END: MAIN -->	