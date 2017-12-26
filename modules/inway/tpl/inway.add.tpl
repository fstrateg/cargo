<!-- BEGIN:MAIN -->
<div class="breadcrumb"><h4>{PHP.L.inway_addservise}</h4></div>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<form id="rform" action="{FRM_ADDURL}" method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="span5">
        <div class="row">
            <div class="span2">
                {PHP.L.inway_title}:
            </div>
            <div class="span3">
                {FRM_TITLE}
            </div>
        </div>
        <div class="row">
            <div class="span2">
                {PHP.L.inway_cat}:
            </div>
            <div class="span3">
                {FRM_CAT}
                {FRM_OTHERS}
            </div>
        </div>
        <div class="row">
            <div class="span2">
                {PHP.L.inway_dsc}:
            </div>
            <div class="span3">
                {FRM_DSC}
            </div>
        </div>
        </div>
    <div class="span7">
        <div class="row">

            <div class="span2">
                {PHP.L.inway_city}:</div>
            <div class="control">
                <input id="adress" class="address" name="address" type="text" value="" size="50"/>
                <a id="city_ok" class="btn btn-success" style="margin-bottom: 10px;">OK</a>
            </div>
        </div>
        <p>{PHP.L.inway_map}</p>
        <div id="formap" style="width:100%;height:400px;">

        </div>
    </div>
</div>
<div class="row">
    <div class="span2">
        <a class="btn btn-success" id="save">{PHP.L.Save}</a>
    </div>
</div>
    {FRM_LAT}{FRM_LONG}{FRM_ID}
</form>
<script type="text/javascript">
    $("#val_other").hide();
    $().ready(function () {
        var mapWrapper = new MapWrapper();
        mapWrapper.init();
        var formWrapper=new FormWrapper();
        formWrapper.init();
    });
</script>
<!-- END:MAIN -->