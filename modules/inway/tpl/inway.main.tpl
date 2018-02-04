<!-- BEGIN:MAIN -->
<h1>{PHP.L.inway_usefull}</h1>
<div id="content" class="row">
    <div class="col-3 d-none d-md-block col-md-2">
        <!-- BEGIN:ITYPES -->
        <div class="well well-small">
        <ul class="nav flex-column">
            <li class="nav-item<!-- IF {ITYPE_ALL_ACT} --> active<!-- ENDIF -->"><a class="nav-link" href="{ITYPE_ALL_URL}">{PHP.L.All}</a></li>
            <!-- BEGIN:ITYPES_ROWS -->
            <li class="nav-item<!-- IF {ITYPE_ROW_ACT} --> active<!-- ENDIF -->"><a class="nav-link" href="{ITYPE_ROW_URL}">{ITYPE_ROW_TITLE}</a></li>
            <!-- END:ITYPES_ROWS -->
        </ul>
        </div>
        <!-- END:ITYPES -->
    </div>
    <div class="col col-md-col-9">
        <div class="row">
        <div class="col-12 col-sm text-right" style="text-align: right"><a href="{ADD_URL}" class="btn btn-success">{PHP.L.Add}</a></div>
        </div>

        {FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
        <div class="row">
            <div class="col-12 col-sm-4">
                <h3>{PHP.L.inway_dsc}</h3>
                <!-- BEGIN:ROW_INWAY -->
                <p><a href="{IN_ONMAP}"><img src="/images/view.png" title="{PHP.L.inway_showonmap}"/></a> <a href="{IN_DETAILS}">{IN_TITLE}</a></p>
                <div class="fstars" style="padding: 10px 0">
                    <span class="stars-view"><span style="width: {IN_STARS}%"></span></span> ({IN_CNT} {PHP.L.inway_reviews})
                </div>
                <p><b>{IN_CAT_NAME}</b></p>
                <p><small class="grey">{PHP.L.Adds}: {IN_DAT}</small></p>
                <hr>
                <!-- END:ROW_INWAY -->
            </div>
            <div class="col-12 col-sm-8">
                <h3>{PHP.L.inway_lastreview}</h3>
                <!-- BEGIN:ROW_COMMENT -->
                <div class="row">
                    <div class="col-auto round">
                        {IN_AVATAR}
                    </div>
                    <div class="col">
                         <div class="row">
                            <div class="col">
                                {IN_NICKNAME}
                            </div>
                         </div>
                        <div class="row">
                            <div class="col">
                                <small class="grey">{PHP.L.inway_added} {IN_CREATED}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                {PHP.L.inway_cm_dat} {IN_DAT}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="fstars" style="padding: 10px 0">
                                    <span class="stars-view"><span style="width: {IN_STARS}%"></span></span>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
                <div class="row">
                    <div class="col">
                        {IN_NOTE}
                    </div>
                </div>
                <hr>
                <!-- END:ROW_COMMENT -->
            </div>
        </div>
    </div>
</div>
<!-- END:MAIN -->