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
            <div class="col">
                <!-- IF {PHP.env.mobile} -->
                <p>{PHP.L.swith_full}</p>
                <!-- ELSE -->
                <p>{PHP.L.swith_mobil}</p>
                <!-- ENDIF -->
            </div>
        </div>
    {FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/metriks.tpl"}
	</div>
</div>

<script type="text/javascript" src="themes/{PHP.theme}/bootstrap/js/bootstrap.min.js"></script>
{FOOTER_RC}
</body>
</html>
<!-- END: FOOTER -->
