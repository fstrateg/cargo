<!-- BEGIN:MAIN -->
<div class="row">
    <div class="span3"></div>
    <div class="span9">
        <div class="span2 pull-right" style="text-align: right"><a href="{ADD_URL}" class="btn btn-success">{PHP.L.Add}</a></div>
        <h1>{PHP.L.inway_usefull}</h1>
        <div class="row">
            <div class="span3">
                <h3>{PHP.L.inway_dsc}</h3>
                <!-- BEGIN:ROW_INWAY -->
                <p><a href="{IN_DETAILS}">{IN_TITLE}</a></p>
                <div class="fstars" style="padding: 10px 0">
                    <span class="stars-view"><span style="width: {IN_STARS}%"></span></span> ({IN_CNT} {PHP.L.inway_reviews})
                </div>
                <p><b>{IN_CAT_NAME}</b></p>
                <p><small class="grey">{PHP.L.Adds}: {IN_DAT}</small></p>
                <hr>
                <!-- END:ROW_INWAY -->
            </div>
            <div class="span6">
                <h3>{PHP.L.inway_lastreview}</h3>
                <!-- BEGIN:ROW_COMMENT -->
                <div class="row">
                    <div class="span1 round">
                        {IN_AVATAR}
                    </div>
                    <div class="span5">
                         <div class="row">
                            <div class="span3">
                                {IN_NICKNAME}
                            </div>
                         </div>
                        <div class="row">
                            <div class="span3">
                                <small class="grey">{PHP.L.inway_added} {IN_CREATED}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span3">
                                {PHP.L.inway_cm_dat} {IN_DAT}
                            </div>
                        </div>
                        <div class="row">
                            <div class="span3">
                                <div class="fstars" style="padding: 10px 0">
                                    <span class="stars-view"><span style="width: {IN_STARS}%"></span></span>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
                <div class="row">
                    <div class="span6">
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