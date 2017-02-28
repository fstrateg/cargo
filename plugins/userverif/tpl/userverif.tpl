<!-- BEGIN:MAIN -->
<h2>{PHP.L.userverif_title}</h2>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<form action="{USRVER_URL}" method="post" enctype="multipart/form-data">
<p>{USRVER_FIZ}</p>
    <hr />
    {USRVER_UDOS}
    <hr />
<div id="verur" style="display: none;">
    {USRVER_SVIDET}
    <hr />
</div>
    <p>{USRVER_SUBMIT}</p>
</form>
<script type="text/javascript">
    $(function() {
        $('input[name=rfizlico]').on('change',
                function(){
                    var i=$('input[name=rfizlico]:checked');
                    var v=i.val();
                    if (v=="0")
                        $('#verur').show("fold");
                    else
                        $('#verur').hide("fold");
                });
        if ($('input[name=rfizlico]:checked').val()=="0"||$('input[name=hfizlico]').val()=="0")
            $('#verur').show("fold");
    })
</script>
<!-- END:MAIN -->