<!-- BEGIN:MAIN -->
<h3>{BL_TITLE}</h3>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div class="row">
    <div class="span2">
        <b>{PHP.L.bl_find_carrier}</b>
    </div>
    <div class="span2">
        {BL_FIND}
    </div>
    <div class="span2">
        <a class="btn btn-success" onclick="doSearch()">{PHP.L.Search}</a>
    </div>
</div>

<div id="SearchRezult">
</div>
<script type="text/javascript">
    function doSearch()
    {
        var search=$('#idfind').val();
        ajaxSend({url: '{BL_FIND_URL}&text='+search, divId: 'SearchRezult'});
    }
</script>
<!-- END:MAIN -->