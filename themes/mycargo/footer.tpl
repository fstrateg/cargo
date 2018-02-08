<!-- BEGIN: FOOTER -->
    </div>
</div>
<div id="footer">
	<div class="container">
        <div class="row">
            <div class="col">
                &copy; {PHP|cot_date('Y')} {PHP.cfg.maintitle}
            </div>
        </div>
        <div class="row">
            <div id="footerswith" class="col">
                <!-- IF {PHP.env.mobile} -->
                <p><a id="desktop" href="javascript:void(0)">{PHP.L.swith_full}</a></p>
                <!-- ELSE -->
                <p><a id="mobile" href="javascript:void(0)">{PHP.L.swith_mobil}</a></p>
                <!-- ENDIF -->
            </div>
        </div>
    {FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/metriks.tpl"}
	</div>
</div>
<script type="text/javascript">
    $('#footerswith a').on('click',function(e){
        $.ajax('/index.php?swith='+e.target.id);
        window.location=window.location;
    });

</script>
<script type="text/javascript" src="themes/{PHP.theme}/bootstrap/js/bootstrap.min.js"></script>
{FOOTER_RC}
</body>
</html>
<!-- END: FOOTER -->
