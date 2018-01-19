<!-- BEGIN: MAIN -->
<!-- IF {PHP.env.mobile} -->
<h2>
	{PHP.L.projects_projects}
</h2>
<!-- ELSE -->
<div class="bcrups">{PHP.L.Home}</div>
<h1>
	{PHP.L.projects_projects}
</h1>
<!-- ENDIF -->
<div id="content" class="container">
<div class="row">
	<!-- IF !{PHP.env.mobile} -->
	<div class="col-3">
		<!-- IF {CATALOG} --><div class="well well-small">{CATALOG}</div><!-- ENDIF -->

		<!-- IF {PHP.cot_plugins_active.tags} AND {PHP.cot_plugins_active.tagslance} AND {PHP.cfg.plugin.tagslance.projects} -->
		<div class="mboxHD">{PHP.L.Tags}</div>
		{PRJ_TAG_CLOUD}
		<!-- ENDIF -->

	</div>
	<!-- ENDIF -->
	<div class=<!-- IF {PHP.env.mobile} -->"col"<!-- ELSE -->"col-9"<!-- ENDIF -->>
		<div class="justify-content-end">
			<div class="col text-right">
				<!-- IF {PHP.usr.auth_write} -->
				<noindex>
					<!-- IF {PHP.usr.maingrp} == 4 -->
					<a rel="nofollow" class="btn btn-success" href="{PHP|cot_url('marshrut', 'm=add')}"
					   title="{PHP.L.projects_add_to_catalog}">{PHP.L.projects_add_tr_marshrut}
					</a>
					<!-- ELSE -->
					<a rel="nofollow" class="btn btn-success" href="{PHP|cot_url('projects', 'm=add')}"
					   title="{PHP.L.projects_add_to_catalog}"><span class="icon icon-plus"></span>{PHP.L.projects_add_to_catalog}
					</a>
					<!-- ENDIF -->
				</noindex>
				<!-- ENDIF -->
			</div>
		</div>
		<form action="{SEARCH_ACTION_URL}" method="get">
			<input type="hidden" name="e" value="projects" />
			<!-- IF {PHP.env.mobile} -->
			<div class="panel">
				<div class="form-group row">
					<div class="col-form-label">
						{PHP.L.Search}:
					</div>
					{SEARCH_SQ}
					<small class="text-muted">{PHP.L.projects_find_info}</small>
				</div>
				<div class="form-group row">
					<div class="col-form-label">
						{PHP.L.LocationFrom}:
					</div>
					{SEARCH_LOCATION}
				</div>
				<div class="form-group row">
					<div class="col-form-label">
						{PHP.L.LocationTo}:
					</div>
					{SEARCH_LOCATIONTO}
				</div>
				<div class="form-group row">
					<div class="col-form-label">
						{PHP.L.Category}:
					</div>
					{SEARCH_TRANSP}
				</div>
				<div class="form-group row">
					<div class="col-form-label">
						{PHP.L.Order}:
					</div>
					{SEARCH_SORTER}
				</div>
				<div class="form-group row">
					<button type="submit" class="btn btn-warning"><span class="icon icon-search"></span>{PHP.L.Search}</button>
				</div>
			</div>
			<!-- ELSE -->
			<div class="panel">
				<div class="form-group row">
					<div class="col-2 col-form-label">
						{PHP.L.Search}:
					</div>
					<div class="col-10">
						{SEARCH_SQ}
						<small class="text-muted">{PHP.L.projects_find_info}</small>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-2 col-form-label">
						{PHP.L.LocationFrom}:
					</div>
					<div class="col-10">
						{SEARCH_LOCATION}
					</div>
				</div>
				<div class="form-group row">
					<div class="col-2 col-form-label">
						{PHP.L.LocationTo}:
					</div>
					<div class="col-10">
						{SEARCH_LOCATIONTO}
					</div>
				</div>
				<div class="form-group row">
					<div class="col-2 col-form-label">
						{PHP.L.Category}:
					</div>
					<div class="col-10">
						{SEARCH_TRANSP}
					</div>
				</div>
				<div class="form-group row">
					<div class="col-2 col-form-label">
						{PHP.L.Order}:
					</div>
					<div class="col-10">
						{SEARCH_SORTER}
					</div>
				</div>
				<div class="form-group row">
					<div class="col-2 col-form-label">
					</div>
					<div class="col-10">
						<button type="submit" class="btn btn-warning"><span class="icon icon-search"></span>{PHP.L.Search}</button>
					</div>
				</div>
			</div>
			<!-- ENDIF -->
		</form>

		<div id="listprojects">
			<!-- BEGIN: PRJ_ROWS -->
			<!-- IF !{PHP.env.mobile} -->
			<div class="claims">
				<div class="row">
					<div class="col">
						<h4><a href="{PRJ_ROW_URL}">{PRJ_ROW_SHORTTITLE}</a></h4>
					</div>
					<h5 class="col text-right">
						<!-- IF {PRJ_ROW_COST} > 0 --><span class="money"></span> {PRJ_ROW_COST} {PHP.cfg.payments.valuta}<!-- ENDIF -->
					</h5>
				</div>
				<div class="row"><div class="col">
						<table class="table">
							<tr class="row">
								<td class="col-7">
									<div class="row-fluid">{PRJ_ROW_OWNER_NICKNAME}
										<!-- FOR {PHONE} IN {PRJ_ROW_OWNER_PHONES} -->
										{PHONE};
										<!-- ENDFOR -->
									</div>
									<div class="row-fluid">[#{PRJ_ROW_ID} {PRJ_ROW_DATE}]</div>
									<div class="row-fluid">{PRJ_ROW_MARSHRUT}</div>
									<div class="row-fluid">{PRJ_ROW_SHORTTEXT}</div>
								</td>
								<td class="col-3 text-center align-middle">
									<b>{PRJ_ROW_MASSA}{PHP.L.projects_t}<br/>
										{PRJ_ROW_FRT}</b>
								</td>
								<td class="col-2 text-center align-middle">
									<b>{PRJ_ROW_VOL}{PHP.L.projects_m3}<br/>{PRJ_ROW_TRANSP}</b>
								</td>
							</tr>

						</table>
					</div></div>
			</div>
			<!-- ENDIF -->
			<!-- IF {PHP.env.mobile} -->
			<div class="claims">
				<div class="row">
					<div class="col"><h4><a href="{PRJ_ROW_URL}">{PRJ_ROW_SHORTTITLE}</a></h4></div>
				</div>
				<div class="row">
					<div class="col">{PRJ_ROW_OWNER_NICKNAME}</div>
				</div>
				<div class="row">
					<div class="col">
						<!-- FOR {PHONE} IN {PRJ_ROW_OWNER_PHONES} -->
						{PHONE};
						<!-- ENDFOR -->
					</div>
				</div>
				<div class="row">
					<div class="col">
						[#{PRJ_ROW_ID} {PRJ_ROW_DATE}]
					</div>
				</div>
				<div class="row">
					<div class="col">
						{PRJ_ROW_MARSHRUT}
					</div>
				</div>
				<div class="row">
					<div class="col">
						{PRJ_ROW_SHORTTEXT}
					</div>
				</div>
				<div class="row text-center">
					<div class="col">
						<b>{PRJ_ROW_MASSA}{PHP.L.projects_t}<br/>
							{PRJ_ROW_FRT}</b>
					</div>
					<div class="col">
						<b>{PRJ_ROW_VOL}{PHP.L.projects_m3}<br/>
							{PRJ_ROW_TRANSP}</b>
					</div>
				</div>
				<div class="row text-right">
					<div class="col"><!-- IF {PRJ_ROW_COST} > 0 --><h5><span class="money"></span>{PRJ_ROW_COST} {PHP.cfg.payments.valuta}</h5><!-- ENDIF --></div>
				</div>
			</div>
			<!-- ENDIF -->
			<!-- END: PRJ_ROWS -->
		</div>
		<!-- IF {PAGENAV_COUNT} > 0 -->
		<div class="pagination"><ul>{PAGENAV_PAGES}</ul></div>
		<!-- ELSE -->
		<div class="alert">{PHP.L.projects_notfound}</div>
		<!-- ENDIF -->


	</div>
</div>
</div>
<!-- END: MAIN -->