<!-- BEGIN: MAIN -->
<div class="row pt-3">
	<div class="col"><h4>{PHP.L.projects_projects}</h4></div>
	<!-- IF {PHP.usr.id} == {PHP.urr.user_id} AND {ADDPRJ_SHOWBUTTON} -->
	<div class="col text-right"><a href="{PHP|cot_url('projects', 'm=add')}" class="btn btn-success">
		{PHP.L.projects_add_to_catalog}</a>
	</div>
	<!-- ENDIF -->
</div>


<ul class="nav nav-under">
  <li class="nav-item">
 	  <a class="nav-link <!--IF {PRJ_ALL_SELECT} -->active<!-- ENDIF -->" href="{PHP.urr.user_id|cot_url('users', 'm=details&id=$this&tab=projects')}">{PHP.L.All}</a>
  </li>
	<li class="nav-item">
		<a class="nav-link <!--IF {USERS_DETAILS_PROJECTS_INWORK_SELECT} -->active<!-- ENDIF -->" href="{USERS_DETAILS_PROJECTS_INWORK_URL}">{PHP.L.Inwork}
			<span class="badge badge-dark">{USERS_DETAILS_PROJECTS_INWORK_COUNT}</span>
		</a>
	</li>
    <!-- BEGIN: STAT_ROW -->
        <li class="nav-item">
            <a class="nav-link <!-- IF {PRJ_STAT_ROW_SELECT} -->active<!-- ENDIF -->" href="{PRJ_STAT_ROW_URL}">
            {PRJ_STAT_ROW_TITLE}
                <span class="badge badge-dark">{PRJ_STAT_ROW_COUNT_PROJECTS}</span>
            </a>
        </li>
    <!-- END: STAT_ROW -->
  	<!-- BEGIN: CAT_ROW -->
  		<li class="nav-item">
  				<a class="nav-link <!-- IF {PRJ_CAT_ROW_SELECT} -->active<!-- ENDIF -->" href="{PRJ_CAT_ROW_URL}">
  						<!-- IF {PRJ_ROW_CAT_ICON} -->
  							<img src="{PRJ_CAT_ROW_ICON}" alt="{PRJ_CAT_ROW_TITLE} ">
  						<!-- ENDIF -->
  						{PRJ_CAT_ROW_TITLE} 
  					<span class="badge badge-dark">{PRJ_CAT_ROW_COUNT_PROJECTS}</span>
  				</a>
  		</li>
  	<!-- END: CAT_ROW -->
</ul>
<hr>
<div id="listprojects">
	<!-- BEGIN: PRJ_ROWS -->
	<div class="row">
		<div class="col">
			<h4>
				<a href="{PRJ_ROW_URL}">{PRJ_ROW_SHORTTITLE}</a>
				<!-- IF {PRJ_ROW_USER_IS_ADMIN} -->
				<!-- IF {PRJ_ROW_STATE} != 1 -->
				<span class="badge badge-<!-- IF {PRJ_ROW_STATE} == 3 -->dark<!-- ELSE -->info<!-- ENDIF -->">{PRJ_ROW_LOCALSTATUS}</span>
				<!-- ENDIF -->
				<!-- IF {PRJ_ROW_ISINWORK} -->
				<span class="badge badge-info">{PHP.L.Inwork}</span>
				<!-- ENDIF -->
				<!-- IF {PRJ_ROW_REALIZED} -->
				<span class="badge badge-info">{PHP.L.projects_isrealized}</span>
				<!-- ENDIF -->
				<!-- ENDIF -->
			</h4>
		</div>
		<!-- IF {PRJ_ROW_COST} > 0 --><div class="col text-right"><h6><span class="money"></span>{PRJ_ROW_COST} {PHP.cfg.payments.valuta}</h6></div><!-- ENDIF -->
	</div>
	<div class="row media<!-- IF {PRJ_ROW_ISBOLD} --> well prjbold<!-- ENDIF --><!-- IF {PRJ_ROW_ISTOP} --> well prjtop<!-- ENDIF -->">
		<div class="col">
		<div class="pull-right textright">
			<!-- IF {PHP.cot_plugins_active.payprjtop} AND {PHP.usr.id} == {PHP.urr.user_id} --><li>{PRJ_ROW_PAYTOP}</li><!-- ENDIF -->
			<!-- IF {PHP.cot_plugins_active.payprjbold} AND {PHP.usr.id} == {PHP.urr.user_id} --><li>{PRJ_ROW_PAYBOLD}</li><!-- ENDIF -->
		</div>

		<span class="date">[#{PRJ_ROW_ID} {PRJ_ROW_DATE}]</span>{PRJ_ROW_EDIT_URL}

		</div>
	</div>
	<div class="row">
		<div class="col"><span class="region">{PRJ_ROW_MARSHRUT}</span></div>
	</div>
	<div class="row">
		<div class="col">
			<i>{PRJ_ROW_SHORTTEXT}</i>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="type"><!-- IF {PRJ_ROW_TYPE} -->{PRJ_ROW_TYPE} / <!-- ENDIF -->{PRJ_ROW_TRANSP}</div>
		</div>
	</div>
	<hr/>
	<!-- END: PRJ_ROWS -->
</div>

<!-- IF {PAGENAV_COUNT} > 0 -->	
<div class="pagination"><ul>{PAGENAV_PAGES}</ul></div>
<!-- ELSE -->
<div class="alert">{PHP.L.projects_empty}</div>
<!-- ENDIF -->

<!-- END: MAIN -->