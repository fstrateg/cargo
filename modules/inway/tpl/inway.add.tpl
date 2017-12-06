<!-- BEGIN:MAIN -->
<h1>{PHP.L.inway_addservise}</h1>
<form id="sform">
<div class="row">
    <div class="span5">
        <div class="row">
            <div class="span2">
                {PHP.L.inway_title}:
            </div>
            <div class="span3">
                {ADD_TITLE}
            </div>
        </div>
        <div class="row">
            <div class="span2">
                {PHP.L.inway_cat}:
            </div>
            <div class="span3">
                {ADD_CAT}
                {ADD_OTHERS}
            </div>
        </div>
        <div class="row">
            <div class="span2">
                {PHP.L.inway_dsc}:
            </div>
            <div class="span3">
                {ADD_DSC}
            </div>
        </div>
        </div>
    <div class="span7">
        <div class="row">

            <div class="span2">
                {PHP.L.inway_city}:</div>
            <div class="control">
                <input id="adress" class="address" name="address" type="text" value="" size="50"/>
                <a id="city_ok" class="btn btn-success" style="margin-bottom: 10px;">Ok</a>
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