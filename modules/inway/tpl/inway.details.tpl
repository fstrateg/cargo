<!-- BEGIN:MAIN -->
<h4>{FRM_TITLE}</h4>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div class="row">
    <div class="span5">
        <div class="row">
            <div class="span5">
                <p><b>{FRM_CAT_NAME}</b></p>
            </div>
        </div>
        <div class="row">
            <div class="span5">
                <p><b>{PHP.L.inway_info}:</b></p>
            </div>
        </div>
        <div class="row">
            <div class="span5">
                {FRM_DSC}
                <form id="rform">
                {FRM_LAT}
                {FRM_LONG}
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
<div class="row">
    <div class="span12">
        <div class="well well-small">

            <a href="{FRM_RURL}" class="btn btn-success">{FRM_RTITLE}</a>
        </div>
    </div>
</div>
<div class="row">
    <div id="comments" class="span12">
        <a class="ajax" href="{FRM_COMURL}" rel="get-comments">{PHP.L.inway_addcomment}</a>
    </div>
</div>
<!-- BEGIN: COMMENT -->
<div class="row">
    <div class="span3">
        {COM_STARS}
    </div>
</div>
<!-- END: COMMENT -->
<script type="text/javascript">
    $().ready(function () {
        var mapWrapper = new MapWrapper();
        mapWrapper.init();
    });
</script>
<!-- END:MAIN -->