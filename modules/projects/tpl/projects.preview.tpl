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
	<div class="span2">
		<p>{PRJ_OWNER_NICKNAME}</p>
		<p>
			<!-- IF {PRJ_OWNER_ISPRO} -->
			<span class="label label-important">PRO</span> 
			<!-- ENDIF -->
			<span class="label label-info">{PRJ_OWNER_USERPOINTS}</span>
		</p>
	</div>
    <div class="span4 pull-right">
        <table width="100%">
            <tr><td><b>ID:</b></td><td>id{PRJ_ID}</td></tr>
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
<p>&nbsp;</p>
<a href="{PRJ_SAVE_URL}" class="btn btn-success"><span>{PHP.L.Publish}</span></a> 
<a href="{PRJ_EDIT_URL}" class="btn btn-info"><span>{PHP.L.Edit}</span></a>

<!-- END: MAIN -->	