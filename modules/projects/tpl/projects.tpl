<!-- BEGIN: MAIN -->

<div class="bcrups">{PRJ_TITLE}</div>

<h1 class="tboxHD">
	{PRJ_SHORTTITLE}
</h1>

<!-- IF {PRJ_REALIZED} -->
<div class="pull-right label label-info margintop10">{PHP.L.projects_isrealized}</div>
<!-- ENDIF -->

<div id="content" class="container">


<!-- IF {PRJ_STATE} == 2 -->
<div class="alert alert-warning">{PHP.L.projects_forreview}</div>
<!-- ENDIF -->
<!-- IF {PRJ_ISINWORK} == 1 -->
<div class="alert alert-info">{PHP.L.projects_inwork}</div>
<!-- ENDIF -->

<div class="row">
	<div class="col-auto">
		{PRJ_OWNER_AVATAR}
	</div>
	<div class="col-4">
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
	</div>
	<div class="col-6">
		<table class="table details">
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
        <p>&nbsp;</p>

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
	<div class="span12">
		<!-- IF {PHP.cot_plugins_active.tags} AND {PHP.cot_plugins_active.tagslance} AND {PHP.cfg.plugin.tagslance.projects} -->
		<p class="small">{PHP.L.Tags}:
			<!-- BEGIN: PRJ_TAGS_ROW --><!-- IF {PHP.tag_i} > 0 -->, <!-- ENDIF --><a href="{PRJ_TAGS_ROW_URL}" title="{PRJ_TAGS_ROW_TAG}" rel="nofollow">{PRJ_TAGS_ROW_TAG}</a><!-- END: PRJ_TAGS_ROW -->
			<!-- BEGIN: PRJ_NO_TAGS -->{PRJ_NO_TAGS}<!-- END: PRJ_NO_TAGS -->
		</p>
		<!-- ENDIF -->

		<!-- IF {PRJ_USER_IS_ADMIN} -->
		<div class="well well-small">
			<a href="{PRJ_ADMIN_COPY_URL}" class="btn btn-info"><i class="icon-tags icon-white"></i> {PHP.L.Copy}</a> &nbsp;
            <!-- IF {PRJ_STATE} != 3 -->
				<a href="{PRJ_ADMIN_EDIT_URL}" class="btn btn-info"><i class="icon-tag icon-white"></i> {PHP.L.Edit}</a> &nbsp;
				<!-- IF {PRJ_PERFORMER} == 0 -->
					<a href="{PRJ_ADMIN_DELETE_URL}" class="btn btn-danger"><i class="icon-remove icon-white"></i> {PHP.L.Delete}</a> &nbsp;
				<!-- ENDIF -->
            <!-- ENDIF -->
			<!-- IF {PRJ_STATE} == 0 -->
				<!-- IF {PRJ_PERFORMER} < {PRJ_COUNT} -->
				<a href="{PRJ_ADMIN_ADDPRF_URL}" class="btn btn-success pull-right"><i class="icon-white icon-plus-sign"></i> {PHP.L.claims_setperformer}</a>
				<!-- ENDIF -->
            <!-- ENDIF -->
		</div>
		<!-- ENDIF -->
	</div>
</div>
<hr/>
<!-- BEGIN: PRJ_PERFORM -->
<h4>{PHP.L.claims_performers}</h4>
<!-- FOR {PRF} IN {PRJ_PERFS} -->
<hr style="border-top: 1px solid #eee"/>
<div class="row">
    <div class="span1">
        {PRF.PRF_OWNER.PRF_AVATAR}
    </div>
    <div class="span3">
        <p>{PRF.PRF_OWNER.PRF_NICKNAME}</p>
        <p>
            <span class="label label-info">{PRF.PRF_OWNER.PRF_USERPOINTS}</span>
        </p>
        <!-- FOR {PHONE} IN {PRF.PRF_OWNER.PRF_PHONES} -->
        <p>{PHONE}</p>
        <!-- ENDFOR -->
    </div>
	<div class="span4">
		{PRF.PRF_CONFIRM}
		<table width="100%">
			<tr>
				<td><b>{PHP.L.prj_setp_fio}</b></td>
				<td>{PRF.PRF_FIO}</td>
			</tr>
			<tr>
				<td><b>{PHP.L.prj_setp_number}</b></td>
				<td>{PRF.PRF_NUMBER}</td>
			</tr>
			<tr>
				<td><b>{PHP.L.prj_setp_dtload}</b></td>
				<td>{PRF.PRF_DB}</td>
			</tr>
			<tr>
				<td><b>{PHP.L.prj_setp_dtunload}</b></td>
				<td>{PRF.PRF_DE}</td>
			</tr>
			<tr>
				<td><b>{PHP.L.prj_setp_summa}</b></td>
				<td>{PRF.PRF_SUMM} {PHP.cfg.payments.valuta}</td>
			</tr>
			<tr><td colspan="2"><b>{PHP.L.Notes}</b></tr>
			<tr><td colspan="2" class="small">{PRF.PRF_NOTES}</td></tr>
		</table>
	</div>
	<!-- IF {PRF.PRF_STATUS} >= 2 -->
	<div class="span4">
		<label class="label label-info">{PHP.L.claims_performed}</label>
		<div class="fstars" style="padding: 10px 0">
			<span class="stars-view"><span style="width: {PRF.PRF_STARS}%"></span></span>
		</div>
		{PRF.PRF_FEEDBACK}
		<hr/>
		<div class="fstars" style="padding: 10px 0">
			<span class="stars-view"><span style="width: {PRF.PRF_TRSTARS}%"></span></span>
		</div>
		{PRF.PRF_TRFEEDBACK}
	</div>
	<!-- ELSE -->
	<div class="span2 pull-right">
		<div class="btn-group">
			<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog icon-white"></i><span class="caret"></span></a>
			<ul class="dropdown-menu pull-left">
                <li><a href="{PRF.PRF_PRFDONEURL}"><i class="icon-ok"></i> {PHP.L.claims_performed}</a></li>
				<li><a href="{PRF.PRF_PRFEDURL}"><i class="icon-pencil"></i> {PHP.L.Edit}</a></li>
				<li><a href="{PRF.PRF_PRFDELURL}"><i class="icon-remove"></i> {PHP.L.offers_otkazat}</a></li>
			</ul>
		</div>
	</div>
	<!-- ENDIF -->
</div>

<!-- ENDFOR -->

<!-- END: PRJ_PERFORM -->

<!-- IF {PHP.cot_plugins_active.simmarsh} -->
<hr />
<div class="row">
    <div class="span12">
    {SIMMARSH}
    </div>
</div>
<!-- ENDIF -->
</div>
<!-- END: MAIN -->