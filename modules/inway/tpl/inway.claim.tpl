<!-- BEGIN:MAIN -->
<h4>{FRM_IN_TITLE}</h4>
<div id="content">
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
    <div class="row">
        <div class="col-12 col-md-5">
            <div class="row">
                <div class="col">
                    <p><b>{FRM_IN_CAT_NAME}</b></p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p><b>{PHP.L.inway_info}:</b></p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    {FRM_IN_DSC}
                    <form id="rform">
                        {FRM_IN_LAT}
                        {FRM_IN_LONG}
                        {FRM_IN_NAME}
                    </form>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-7">
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
    <div class="row mt-3">
        <div class="col">
            {FRM_IN_DESC}
        </div>
    </div>
    <form action="{FRM_IN_SEND}" method="post" name="edit" enctype="multipart/form-data">
        <div class="row mt-3">
            <div class="col">
                <input type="file" name="rphoto" />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div>
                    <input type="submit" value="{PHP.L.Submit}" class="btn btn-success"/>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- END:MAIN -->