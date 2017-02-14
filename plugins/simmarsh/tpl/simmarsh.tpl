<!-- BEGIN: MAIN -->
<h4>{PHP.L.simmarsh}</h4>
<!-- BEGIN: SIMMR_ROW -->
<div class="media">
	<div class="media-body">
		<h4 class="media-header">{SIMMR_ROW_DB}-{SIMMR_ROW_DE} {SIMMR_ROW_TITLE} <div class="pull-right"> <!-- IF {SIMMR_ROW_COST} > 0 --><p>{SIMMR_ROW_COST} {PHP.cfg.payments.valuta}</p><!-- ENDIF --></div></h4>
		<p class="text">{SIMMR_ROW_OWNER_NICKNAME}
			<!-- FOR {PHONE} IN {SIMMR_ROW_OWNER_PHONES} -->
			{PHONE};
			<!-- ENDFOR -->
		</p>

	</div>
</div>
<!-- END: SIMMR_ROW -->

<!-- END: MAIN -->