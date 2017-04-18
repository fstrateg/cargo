<!-- BEGIN: MAIN -->
<div class="breadcrumb">{BREADCRUMBS}</div>
<h1>
<!-- IF {PHP.c} -->
	{CATTITLE}
<!-- ELSE -->
	{PHP.L.projects}
<!-- ENDIF -->
</h1>
<!-- IF {CATDESC} -->
<div class="well">{CATDESC}</div>
<!-- ENDIF -->
<div class="row">
	<div class="span3">
		<!-- IF {CATALOG} --><div class="well well-small">{CATALOG}</div><!-- ENDIF -->
		
		<!-- IF {PHP.cot_plugins_active.tags} AND {PHP.cot_plugins_active.tagslance} AND {PHP.cfg.plugin.tagslance.projects} -->
		<div class="mboxHD">{PHP.L.Tags}</div>
		{PRJ_TAG_CLOUD}
		<!-- ENDIF -->
				
	</div>
	<div class="span9">

		<!-- BEGIN: PTYPES -->
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
		<!-- END: PTYPES -->
		
		<div class="well">			
			<form action="{SEARCH_ACTION_URL}" method="get">
				<input type="hidden" name="e" value="projects" />
				<input type="hidden" name="type" value="{PHP.type}" />
				<input type="hidden" name="l" value="{PHP.lang}" />
				<table width="100%" cellpadding="5" cellspacing="0">
					<tr>
						<td width="100">{PHP.L.Search}:</td>
						<td>{SEARCH_SQ}</td>
					</tr>
					<tr>
						<td></td>
						<td style="padding-bottom: 10px;"><small class="info">{PHP.L.projects_find_info}</small></td>
					</tr>
					<!-- IF {PHP.cot_plugins_active.locationselector} -->
					<tr>
						<td >{PHP.L.LocationFrom}:</td>
						<td>{SEARCH_LOCATION}</td>
					</tr>
                    <tr>
                        <td >{PHP.L.LocationTo}:</td>
                        <td>{SEARCH_LOCATIONTO}</td>
                    </tr>
					<!-- ENDIF -->
					<tr>
						<td >{PHP.L.Category}:</td>
						<td>{SEARCH_CAT}</td>
					</tr>
					<tr>
						<td>{PHP.L.Order}:</td>
						<td>{SEARCH_SORTER}</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="search" class="btn" value="{PHP.L.Search}" /></td>
					</tr>
				</table>		
			</form>
		</div>

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
                    <div class="span8">{PRJ_ROW_SHORTTEXT}</div>
                </div>
                <div class="row">
                <div class="span8">
				<!-- IF {PHP.cot_plugins_active.tags} AND {PHP.cot_plugins_active.tagslance} AND {PHP.cfg.plugin.tagslance.projects} -->
				<p class="small">{PHP.L.Tags}: 
					<!-- BEGIN: PRJ_ROW_TAGS_ROW --><!-- IF {PHP.tag_i} > 0 -->, <!-- ENDIF --><a href="{PRJ_ROW_TAGS_ROW_URL}" title="{PRJ_ROW_TAGS_ROW_TAG}" rel="nofollow">{PRJ_ROW_TAGS_ROW_TAG}</a><!-- END: PRJ_ROW_TAGS_ROW -->
					<!-- BEGIN: PRJ_ROW_NO_TAGS -->{PRJ_ROW_NO_TAGS}<!-- END: PRJ_ROW_NO_TAGS -->
				</p>
				<!-- ENDIF -->
				
				<div class="pull-right offers"><a href="{PRJ_ROW_OFFERS_ADDOFFER_URL}">{PHP.L.offers_add_offer}</a> ({PRJ_ROW_OFFERS_COUNT})</div>
				<div class="type">
                    <!-- IF {PHP.cot_plugins_active.paypro} AND {PRJ_ROW_FORPRO} --><span class="label label-important">{PHP.L.paypro_forpro}</span> <!-- ENDIF -->
                    <!-- IF {PRJ_ROW_TYPE} -->{PRJ_ROW_TYPE} / <!-- ENDIF --><a href="{PRJ_ROW_CATURL}">{PRJ_ROW_CATTITLE}</a>
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

<!-- END: MAIN -->