<!-- BEGIN: MAIN -->
<h4>{PAGE_ROW_CATPATH}</h4>
<!-- BEGIN: PAGE_ROW -->
	<h5><!-- IF {PHP.usr.isadmin} -->[ {PAGE_ROW_ADMIN_EDIT} ] &nbsp; <!-- ENDIF --><a href="{PAGE_ROW_URL}" title="{PAGE_ROW_SHORTTITLE}">{PAGE_ROW_SHORTTITLE}</a></h5>
	<!-- IF {PAGE_ROW_DESC} --><p class="small">{PAGE_ROW_DESC}</p><!-- ENDIF -->
    <div class="textbox">
		{PAGE_ROW_TEXT_CUT}
		<!-- IF {PAGE_ROW_TEXT_IS_CUT} -->{PAGE_ROW_MORE}<!-- ENDIF -->
	</div>

	<hr class="clear divider" />
<!-- END: PAGE_ROW -->

	<p class="paging">{PAGE_PAGEPREV}{PAGE_PAGENAV}{PAGE_PAGENEXT}</p>
<!-- END: MAIN -->