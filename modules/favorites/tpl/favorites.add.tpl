<!-- BEGIN:MAIN -->
<h3>{FV_TITLE}</h3>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div class="row">
    <div class="span2">
        <b>{PHP.L.fv_find_carrier}</b>
    </div>
    <div class="span2">
        {FV_FIND}
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
        ajaxSend({url: '{FV_FIND_URL}&text='+search, divId: 'SearchRezult'});
    }
</script>
<!-- END:MAIN -->