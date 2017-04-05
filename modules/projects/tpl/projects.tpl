<!-- BEGIN: MAIN -->

<div class="breadcrumb">{PRJ_TITLE}</div>

<!-- IF {PRJ_REALIZED} -->
<div class="pull-right label label-info margintop10">{PHP.L.projects_isrealized}</div>
<!-- ENDIF -->

<!-- IF {PHP.cot_plugins_active.paypro} AND {PRJ_FORPRO} -->
<div class="pull-right margintop10"><span class="label label-important">{PHP.L.paypro_forpro}</span></div>
<!-- ENDIF -->

<h1 class="tboxHD">
	{PRJ_SHORTTITLE}
</h1>
<!-- IF {PRJ_STATE} == 2 -->
<div class="alert alert-warning">{PHP.L.projects_forreview}</div>
<!-- ENDIF -->
<!-- IF {PRJ_STATE} == 1 -->
<div class="alert alert-warning">{PHP.L.projects_hidden}</div>
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
            <!-- IF {PRJ_STATE} != 3 -->
			<a href="{PRJ_ADMIN_EDIT_URL}" class="btn btn-info"><i class="icon-tag icon-white"></i> {PHP.L.Edit}</a> &nbsp;
            <!-- ENDIF -->
			<a href="{PRJ_ADMIN_COPY_URL}" class="btn btn-info"><i class="icon-tags icon-white"></i> {PHP.L.Copy}</a> &nbsp;
			<!-- IF {PRJ_STATE} == 0 -->
			<a href="{PRJ_HIDEPROJECT_URL}" class="btn btn-warning"><i class="icon-eye-close icon-white"></i> {PRJ_HIDEPROJECT_TITLE}</a>	&nbsp;
            <a href="{PRJ_ARCHPROJECT_URL}" class="btn btn-danger"><i class="icon-inbox icon-white"></i> {PRJ_ARCHPROJECT_TITLE}</a>	&nbsp;
            <!-- ENDIF -->
            <!-- IF {PRJ_STATE} == 1 -->
            <a href="{PRJ_PUBLPROJECT_URL}" class="btn btn-warning"><i class="icon-eye-open icon-white"></i> {PRJ_PUBLPROJECT_TITLE}</a>	&nbsp;
            <a href="{PRJ_ARCHPROJECT_URL}" class="btn btn-danger"><i class="icon-inbox icon-white"></i> {PRJ_ARCHPROJECT_TITLE}</a>	&nbsp;
            <!-- ENDIF -->
            <!-- IF {PRJ_PERFORMER} -->
            <a href="{PRJ_REALIZEDPROJECT_URL}" class="btn btn-warning">{PRJ_REALIZEDPROJECT_TITLE}</a>
            <!-- ENDIF -->
			<a href="{PRJ_ADMIN_ADDPRF_URL}" class="btn btn-success pull-right"><i class="icon-white icon-plus-sign"></i> {PHP.L.claims_setperformer}</a>
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

            <span class="label label-info">{PRJ_OWNER_USERPOINTS}</span>
        </p>
        <!-- FOR {PHONE} IN {PRF.PRF_OWNER.PRF_PHONES} -->
        <p>{PHONE}</p>
        <!-- ENDFOR -->
    </div>
	<div class="span4">
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
</div>

<!-- ENDFOR -->
<hr>
<!-- BEGIN: PRJ_PERFORM_ROW -->
<!-- END: PRJ_PERFORM_ROW -->

<!-- END: PRJ_PERFORM -->

<div class="row">
	<div class="span12">
		{OFFERS}
	</div>
</div>
<!-- IF {PHP.cot_plugins_active.simmarsh} -->
<hr />
<div class="row">
    <div class="span12">
    {SIMMARSH}
    </div>
</div>
<!-- ENDIF -->

<!-- END: MAIN -->