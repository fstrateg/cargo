<!-- BEGIN: MAIN -->
<div class="row">
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
</div>
<div class="row">
    <div class="span6">
        <b>Текущий пользователь</b>
        <div class="usr">
            <p>{IN_OWNER_AVATAR}</p><p>{IN_OWNER_NICKNAME}</p>
            <p><span class="badge badge-info">{IN_OWNER_USERPOINTS}</span> {IN_OWNER_USERSTARS}</p>
        </div>
        <div class="photo">
            <p>{IN_OLD_DOC}</p>
        </div>
        <a class="btn btn-success" href="{IN_OLD_OWNER}">Оставить владельца</a>
    </div>
    <div class="span6">
        <b>Новый пользователь</b>
        <div class="usr">
            <p>{IN_REQ_AVATAR}</p><p>{IN_REQ_NICKNAME}</p>
            <p><span class="badge badge-info">{IN_REQ_USERPOINTS}</span> {IN_REQ_USERSTARS}</p>
        </div>
        <div class="photo">
            <p>{IN_NEW_DOC}</p>
        </div>
        <a class="btn btn-success" href="{IN_NEW_OWNER}">Назначить владельца</a>
    </div>
</div>
<!-- END:MAIN -->