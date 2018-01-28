<!-- BEGIN: MAIN -->
<!-- IF !{PHP.env.mobile} -->
<div class="bcrups">{PRJ_TITLE}</div>
<!-- ENDIF -->
<h1 class="tboxHD">
	{PRJ_SHORTTITLE}
</h1>

<!-- IF {PRJ_REALIZED} -->
<div class="pull-right badge badge-info mt1">{PHP.L.projects_isrealized}</div>
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
	</div>
	<div class="col col-4-sm">
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
		<div class="col"><div class="note">{PRJ_TEXT}</div></div>
	</div>
	<div class="row">
        <div class="col col-4-sm">
            <table class="table noborder details table-striped">
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
    </div>
	<div class="row">
		<div class="col">
		<!-- IF {PRJ_USER_IS_ADMIN} -->
			<!-- IF {PHP.env.mobile} -->
			<button class="navbar-toggler navbar-toggler-right navbar-dark btn btn-success" type="button" data-toggle="collapse" data-target="#buttons" aria-controls="buttons" aria-expanded="false"
					aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="buttons">
				<div class="row">
					<div class="col"><a href="{PRJ_ADMIN_COPY_URL}" class="nav-link btn btn-info"><i class="icon-tags icon-white"></i> {PHP.L.Copy}</a></div>
					<!-- IF {PRJ_STATE} != 3 -->
					<div class="col"><a href="{PRJ_ADMIN_EDIT_URL}" class="nav-link btn btn-info"><i class="icon-tag icon-white"></i> {PHP.L.Edit}</a></div>
					<!-- IF {PRJ_PERFORMER} == 0 -->
					<div class="col"><a href="{PRJ_ADMIN_DELETE_URL}" class="nav-link btn btn-danger"><i class="icon-remove icon-white"></i> {PHP.L.Delete}</a></div>
					<!-- ENDIF -->
					<!-- ENDIF -->
					<!-- IF {PRJ_STATE} == 0 -->
					<!-- IF {PRJ_PERFORMER} < {PRJ_COUNT} -->
					<div class="col"><a href="{PRJ_ADMIN_ADDPRF_URL}" class="nav-link btn btn-success"><i class="icon-white icon-plus-sign"></i> {PHP.L.claims_setperformer}</a></div>
					<!-- ENDIF -->
					<!-- ENDIF -->
				</div>
			</div>
			<!-- ELSE -->
			<div id="buttons">
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
		<!-- ENDIF -->
		</div>
	</div>
<hr/>
<!-- BEGIN: PRJ_PERFORM -->
<h4>{PHP.L.claims_performers}</h4>
<!-- FOR {PRF} IN {PRJ_PERFS} -->
<hr style="border-top: 1px solid #eee"/>
<div class="row justify-content-between">
    <div class="col-auto">
        {PRF.PRF_OWNER.PRF_AVATAR}
    </div>
    <div class="col-6">
        <p>{PRF.PRF_OWNER.PRF_NICKNAME}</p>
        <p>
            <span class="badge badge-info">{PRF.PRF_OWNER.PRF_USERPOINTS}</span>
        </p>
        <!-- FOR {PHONE} IN {PRF.PRF_OWNER.PRF_PHONES} -->
        <p>{PHONE}</p>
        <!-- ENDFOR -->
    </div>
    <div class="col-auto">
        <!-- IF {PRF.PRF_STATUS} < 2 -->
            <div class="btn-group">
                <a class="btn btn-info dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-cog icon-white"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{PRF.PRF_PRFDONEURL}"><i class="dark icon-ok"></i> {PHP.L.claims_performed}</a>
                    <a class="dropdown-item" href="{PRF.PRF_PRFEDURL}"><i class="dark icon-pencil"></i> {PHP.L.Edit}</a>
                    <a class="dropdown-item" href="{PRF.PRF_PRFDELURL}"><i class="dark icon-remove"></i> {PHP.L.offers_otkazat}</a>
                </div>
            </div>
        <!-- ENDIF -->
    </div>
</div>
<div class="row">
	<div class="col col-4-sm mt-2">
		<p>{PRF.PRF_CONFIRM}</p>
		<table class="table noborder details table-striped">
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
		</table>
	</div>
    </div>
<div class="row">
    <div class="col"><div class="note">
    {PRF.PRF_NOTES}
        </div></div>
</div>
	<!-- IF {PRF.PRF_STATUS} >= 2 -->
	<div class="row">
        <div class="col">
		<label class="badge badge-info mt-2">{PHP.L.claims_performed}</label>
		<div class="fstars" style="padding: 10px 0">
			<span class="stars-view"><span style="width: {PRF.PRF_STARS}%"></span></span>
		</div>
		{PRF.PRF_FEEDBACK}

		</div>

        <div class="col align-self-end">
		<div class="fstars" style="padding: 10px 0">
			<span class="stars-view"><span style="width: {PRF.PRF_TRSTARS}%"></span></span>
		</div>
		{PRF.PRF_TRFEEDBACK}
        </div>
	</div>
<hr>

	<!-- ENDIF -->
</div>

<!-- ENDFOR -->

<!-- END: PRJ_PERFORM -->

<!-- IF {PHP.cot_plugins_active.simmarsh} AND {SIMMARSH} -->
<hr />
<div class="row">
    <div class="col">
    {SIMMARSH}
    </div>
</div>
<!-- ENDIF -->
</div>
<!-- END: MAIN -->