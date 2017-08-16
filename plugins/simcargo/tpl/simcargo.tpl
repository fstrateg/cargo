<!-- BEGIN: MAIN -->
<h4>{PHP.L.simcargo}</h4>
<!-- BEGIN: SIMMR_ROW -->
<div class="media">
	<div class="media-body">
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
	</div>
</div>
<hr/>
<!-- END: SIMMR_ROW -->

<!-- END: MAIN -->