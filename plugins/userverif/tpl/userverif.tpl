<!-- BEGIN:MAIN -->
<h2>{PHP.L.userverif_title}</h2>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<form action="{USRVER_URL}" method="post" enctype="multipart/form-data">
<p>{USRVER_FIZ}</p>
    <hr />
<p>{PHP.L.userverif_getid}</p>
<p>{USRVER_UDOS}</p>
    <hr />
<div id="verur" style="display: none;">
    <p>{PHP.L.userverif_number}</p>
    <p>{USRVER_NUMBER}</p>
    <hr />
    <p>{PHP.L.userverif_svidetel}</p>
    <p>{USRVER_SVIDET}</p>
    <hr />
</div>
    <p>{USRVER_SUBMIT}</p>
</form>
<script type="text/javascript">
    $(function() {
        $('input[name=rfizlico]').on('change',
                function(){
                    var v=$('input[name=rfizlico]:checked').val();
                    if (v=="0")
                        $('#verur').show("fold");
                    else
                        $('#verur').hide("fold");
                });
        if ($('input[name=rfizlico]:checked').val()=="0")
            $('#verur').show("fold");
    });
</script>
<!-- END:MAIN -->