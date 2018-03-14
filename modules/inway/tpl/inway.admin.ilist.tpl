<!-- BEGIN:MAIN -->
<h3>Список сервисов</h3>
<div class="row">
    <div class="span2">&nbsp;</div>
    <div class="span3">
        <ul class="nav nav-pills">
            <li<!-- IF {IN_PAGE_ALL} --> class="active"<!-- ENDIF -->>
                <a href="{IN_URL_ALL}">Все ({IN_ALL_COUNT})</a>
            </li>
            <li<!-- IF {IN_PAGE_MOD} --> class="active"<!-- ENDIF -->>
                <a href="{IN_URL_MOD}">Модерация ({IN_MOD_COUNT})</a>
            </li>
            </ul>
    </div>
</div>
<!-- BEGIN: SRV -->
<div class="row">
    <div class="span2" style="text-align: center">
        <p>{IN_USR_AVATAR}</p><p>{IN_USR_NICKNAME}</p>
        <p><span class="badge badge-info">{IN_USR_USERPOINTS}</span> {IN_USR_USERSTARS}</p>
    </div>
    <div class="span3">
        <p><a href="{IN_ONMAP}"><img src="/images/view.png" title="{PHP.L.inway_showonmap}"/></a> <a href="{IN_DETAILS}">{IN_TITLE}</a></p>
        <div class="fstars" style="padding: 10px 0">
            <span class="stars-view"><span style="width: {IN_STARS}%"></span></span> ({IN_CNT} {PHP.L.inway_reviews})
        </div>
        <p><b>{IN_CAT_NAME}</b></p>
        <p><small class="grey">{PHP.L.Adds}: {IN_DAT}</small></p>
    </div>
    <div class="span5">
        {IN_DSC}
    </div>
    <div class="span2">
        <a class="btn btn-danger" style="margin-top:10px" onclick="delete_srv({IN_ID},'{IN_TITLE}')">{PHP.L.Delete}</a>
        <!-- IF {IN_ISNEW} -->
        <a class="btn btn-info" style="margin-top:10px" onclick="validate_srv({IN_ID},'{IN_TITLE}')">{PHP.L.Validate}</a>
        <!-- ENDIF -->
    </div>
</div>
<hr>
<!-- END: SRV -->
<script type="application/javascript">
    function delete_srv(id,title)
    {
        if (confirm('Вы действительно хотите удалить сервис: <'+title+'> вместе со всеми коментариями?'))
            window.location='{DEL_URL}&id='+id;
    }

    function validate_srv(id,title)
    {
        if (confirm('Вы действительно хотите утвердить сервис: <'+title+'>?'))
            window.location='{MOD_URL}&id='+id;
    }
</script>
<!-- END:MAIN -->

