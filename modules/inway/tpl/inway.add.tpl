<!-- BEGIN:MAIN -->
<div class="brcrups"><h4>{PHP.L.inway_addservise}</h4></div>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div id="content">
<form id="rform" action="{FRM_ADDURL}" method="POST" enctype="multipart/form-data">
<div class="row form-group">
    <div class="col-12 col-md-5">
        <div class="form-group row">
            <div class="col-12 col-sm-4">
                {PHP.L.inway_title}:
            </div>
            <div class="col-12 col-sm-8">
                {FRM_TITLE}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
                {PHP.L.inway_cat}:
            </div>
            <div class="col-12 col-sm-8">
                {FRM_CAT}
                {FRM_OTHERS}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
                {PHP.L.inway_dsc}:
            </div>
            <div class="col-12 col-sm-8">
                {FRM_DSC}
            </div>
        </div>
        </div>
    <div class="col-12 col-md-7">
        <div class="row">

            <div class="col-12">
                {PHP.L.inway_city}:</div>
            <div class="col-12 input-group">
                <input id="adress" type="text" class="form-control">
                <span class="input-group-btn">
                    <a id="city_ok" class="btn btn-success" href="javascript:void(0)">OK</a>
                    </span>
            </div>
        </div>
        <p>{PHP.L.inway_map}</p>
        <div id="formap" style="width:100%;height:400px;">

        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <a class="btn btn-success" id="save" href="javascript:void(0)">{PHP.L.Save}</a>
    </div>
</div>
    {FRM_LAT}{FRM_LONG}{FRM_ID}
</form>
</div>
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