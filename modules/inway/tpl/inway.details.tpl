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
<div class="row">
    <div class="span12">
        <div class="well well-small">

            <a href="{FRM_IN_RURL}" class="btn btn-success">{FRM_IN_RTITLE}</a>
        </div>
    </div>
</div>
<!-- IF {PHP.usr.id} != {FRM_IN_OWNER} -->
<div class="row">
    <div id="comments" class="span12">
        <a class="ajax" href="{FRM_IN_COMURL}" rel="get-comments">{PHP.L.inway_addcomment}</a>
    </div>
</div>
<hr>
<!-- ENDIF -->
<!-- BEGIN: COMMENT -->
<div class="row">
    <div class="span1 round">
        {FRM_AVATAR}
    </div>
    <div class="span11">
        <div class="row">
            <div class="span3">
                {FRM_NICKNAME}
            </div>
        </div>
        <div class="row">
            <div class="span3">
                <small class="grey">{PHP.L.inway_added} {FRM_CREATED}</small>
            </div>
        </div>
        <div class="row">
            <div class="span3">
                {PHP.L.inway_cm_dat} {FRM_DAT}
            </div>
        </div>
        <div class="row">
            <div class="span3">
                <div class="fstars" style="padding: 10px 0">
                    <span class="stars-view"><span style="width: {FRM_STARS}%"></span></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span6">
                {FRM_NOTE}
            </div>
        </div>
    </div>
</div>
<hr>
<!-- END: COMMENT -->
<script type="text/javascript">
    $().ready(function () {
        var mapWrapper = new MapWrapper();
        mapWrapper.init();
    });
</script>
<!-- END:MAIN -->