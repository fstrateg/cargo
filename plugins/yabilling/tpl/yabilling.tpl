<!-- BEGIN: MAIN -->

<div class="breadcrumb">{PHP.L.yabilling_title}</div>

<!-- BEGIN: BILLINGFORM -->
	<!-- IF !{PHP.cfg.plugin.yabilling.typechoise} -->
	<div class="alert alert-info">{PHP.L.yabilling_formtext}</div>
	<script>
		$(document).ready(function(){
			setTimeout(function() {
				$("#yandexform").submit();
			}, 3000);
		});
	</script>
	<!-- ELSE -->
	<div class="alert alert-info">{PHP.L.yabilling_formtext1}</div>
	<!-- ENDIF -->
	{BILLING_FORM}
<!-- END: BILLINGFORM -->

<!-- BEGIN: ERROR -->
	<h4>{BILLING_TITLE}</h4>
	{BILLING_ERROR}
	
	<!-- IF {BILLING_REDIRECT_URL} -->
	<br/>
	<p class="small">{BILLING_REDIRECT_TEXT}</p>
	<script>
		$(function(){
			setTimeout(function () {
				location.href='{BILLING_REDIRECT_URL}';
			}, 5000);
		});
	</script>
	<!-- ENDIF -->
	
<!-- END: ERROR -->


<!-- END: MAIN -->