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
	<div class="col-3">
		<!-- IF {CATALOG} --><div class="well well-small">{CATALOG}</div><!-- ENDIF -->

		<!-- IF {PHP.cot_plugins_active.tags} AND {PHP.cot_plugins_active.tagslance} AND {PHP.cfg.plugin.tagslance.projects} -->
		<div class="mboxHD">{PHP.L.Tags}</div>
		{PRJ_TAG_CLOUD}
		<!-- ENDIF -->

	</div>
	<div class="col-9">

		<!-- BEGIN: PTYPES1 -->
		<ul class="nav nav-tabs">
			<li<!-- IF {PTYPE_ALL_ACT} --> class="active"<!-- ENDIF -->><a href="{PTYPE_ALL_URL}">{PHP.L.All}</a></li>
			<!-- BEGIN: PTYPES_ROWS -->
			<li<!-- IF {PTYPE_ROW_ACT} --> class="active"<!-- ENDIF -->><a href="{PTYPE_ROW_URL}">{PTYPE_ROW_TITLE}</a></li>
			<!-- END: PTYPES_ROWS -->
			<!-- IF {PHP.cot_plugins_active.paypro} -->
			<li<!-- IF {PHP.forpro} --> class="active"<!-- ENDIF -->><a href="{FORPRO_URL}"><span class="label label-important">{PHP.L.paypro_forpro}</span></a></li>
			<!-- ENDIF -->
			<!-- IF {PHP.usr.auth_write} -->
			<li class="pull-right"><noindex>
					<!-- IF {PHP.usr.maingrp} == 4 -->
					<a rel="nofollow" class="btn btn-success" href="{PHP|cot_url('marshrut', 'm=add')}"
					   title="{PHP.L.projects_add_to_catalog}">{PHP.L.projects_add_tr_marshrut}
					</a>
					<!-- ELSE -->
					<a rel="nofollow" class="btn btn-success" href="{PHP|cot_url('projects', 'm=add')}"
					   title="{PHP.L.projects_add_to_catalog}">{PHP.L.projects_add_to_catalog}
					</a>
					<!-- ENDIF -->
				</noindex>
			</li><!-- ENDIF -->
		</ul>
		<!-- END: PTYPES1-->
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

		<!-- IF {PHP.cot_plugins_active.paypro} -->
			<!-- IF !{PHP|cot_getuserpro()} AND {PHP.cfg.plugin.paypro.projectslimit} > 0 AND {PHP.cfg.plugin.paypro.projectslimit} <= {PHP.usr.id|cot_getcountprjofuser($this)} -->
			<div class="alert alert-warning">{PHP.L.paypro_warning_projectslimit_empty}</div>
			<!-- ENDIF -->
			<!-- IF !{PHP|cot_getuserpro()} AND {PHP.cfg.plugin.paypro.offerslimit} > 0 AND {PHP.cfg.plugin.paypro.offerslimit} <= {PHP.usr.id|cot_getcountoffersofuser($this)} -->
			<div class="alert alert-warning">{PHP.L.paypro_warning_offerslimit_empty}</div>
			<!-- ENDIF -->
		<!-- ENDIF -->
		
		<div id="listprojects">
			<!-- BEGIN: PRJ_ROWS -->
            <div class="claims">
			<div class="media<!-- IF {PRJ_ROW_ISBOLD} --> well prjbold<!-- ENDIF -->
			<!-- IF {PRJ_ROW_ISTOP} --> well prjtop<!-- ENDIF -->">
				<h4>
					<!-- IF {PRJ_ROW_COST} > 0 --><div class="pull-right">{PRJ_ROW_COST} {PHP.cfg.payments.valuta}</div><!-- ENDIF -->
					<a href="{PRJ_ROW_URL}">{PRJ_ROW_SHORTTITLE}</a>
				</h4>
                <div class="row">
                    <div class="span8">{PRJ_ROW_OWNER_NICKNAME}
                        <!-- FOR {PHONE} IN {PRJ_ROW_OWNER_PHONES} -->
                    {PHONE};
                        <!-- ENDFOR -->
                    </div>
                </div>
                <div class="row">
                    <div class="span6">
                        <span class="date"> [#{PRJ_ROW_ID} {PRJ_ROW_DATE}]</span> <span class="region">{PRJ_ROW_MARSHRUT}</span></div>
                    <div class="span1">{PRJ_ROW_MASSA}{PHP.L.projects_t}</div>
                    <div class="span1">{PRJ_ROW_VOL}{PHP.L.projects_m3}</div>
                </div>
                <div class="row">
                    <div class="span6">{PRJ_ROW_SHORTTEXT}</div>
					<div class="span2">{PRJ_ROW_FRT}</div>
                </div>
                <div class="row">
                <div class="span8">
				<!-- IF {PHP.cot_plugins_active.tags} AND {PHP.cot_plugins_active.tagslance} AND {PHP.cfg.plugin.tagslance.projects} -->
				<p class="small">{PHP.L.Tags}: 
					<!-- BEGIN: PRJ_ROW_TAGS_ROW --><!-- IF {PHP.tag_i} > 0 -->, <!-- ENDIF --><a href="{PRJ_ROW_TAGS_ROW_URL}" title="{PRJ_ROW_TAGS_ROW_TAG}" rel="nofollow">{PRJ_ROW_TAGS_ROW_TAG}</a><!-- END: PRJ_ROW_TAGS_ROW -->
					<!-- BEGIN: PRJ_ROW_NO_TAGS -->{PRJ_ROW_NO_TAGS}<!-- END: PRJ_ROW_NO_TAGS -->
				</p>
				<!-- ENDIF -->
				
				<div class="type">
                    <!-- IF {PHP.cot_plugins_active.paypro} AND {PRJ_ROW_FORPRO} --><span class="label label-important">{PHP.L.paypro_forpro}</span> <!-- ENDIF -->
                    <!-- IF {PRJ_ROW_TYPE} -->{PRJ_ROW_TYPE} / <!-- ENDIF -->{PRJ_ROW_TRANSP}
                </div>
                </div>
                </div>
			</div>
            </div>
			<hr/>
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