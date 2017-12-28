<!-- BEGIN:MAIN -->
<h4>{FRM_IN_TITLE}</h4>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div class="row">
    <div class="span5">
        <div class="row">
            <div class="span5">
                <p><b>{FRM_IN_CAT_NAME}</b></p>
            </div>
        </div>
        <div class="row">
            <div class="span5">
                <p><b>{PHP.L.inway_info}:</b></p>
            </div>
        </div>
        <div class="row">
            <div class="span5">
                {FRM_IN_DSC}
                <form id="rform">
                    {FRM_IN_LAT}
                    {FRM_IN_LONG}
                    {FRM_IN_NAME}
                </form>
            </div>

        </div>
    </div>
    <div class="span7">
        <p><b>{PHP.L.inway_onmap}</b></p>
        <div id="formap" style="width:100%;height:400px;">

        </div>
    </div>
</div>
<script type="text/javascript">
    $().ready(function () {
        var mapWrapper = new MapWrapper();
        mapWrapper.init();
    });
</script>
<hr>
<div class="row">
    <div class="span12">
        {FRM_IN_DESC}
    </div>
</div>
<form action="{FRM_IN_SEND}" method="post" name="edit" enctype="multipart/form-data">
    <div class="row">
        <div class="span3">
            <input type="file" name="rphoto" />
        </div>
    </div>
    <div class="row">
        <div class="span3">
            <div>
                <input type="submit" value="{PHP.L.Submit}" class="btn btn-success"/>
            </div>
        </div>
    </div>
</form>
<!-- END:MAIN -->