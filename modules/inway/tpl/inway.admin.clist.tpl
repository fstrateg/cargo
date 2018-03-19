<!-- BEGIN:MAIN -->
<h3>Список коментариев</h3>
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
<!-- BEGIN:COMMENT -->
<div class="row">
    <div class="span2" style="text-align: center">
        <p>{IN_USR_AVATAR}</p><p>{IN_USR_NICKNAME}</p>
        <p><span class="badge badge-info">{IN_USR_USERPOINTS}</span> {IN_USR_USERSTARS}</p>
    </div>
    <div class="span8">
        <p>{IN_CREATED}</p>
        <!-- IF {IN_REPLY} == 0 -->
        <div class="fstars" style="padding: 10px 0">
            <span class="stars-view"><span style="width: {IN_STARS}%"></span></span>
        </div>
        <!-- ENDIF -->
        <p>{IN_NOTE}</p>
    </div>
    <div class="span2">
        <a class="btn btn-danger" style="margin-top:10px" onclick="delete_comment({IN_ID})">{PHP.L.Delete}</a>
        <!-- IF {IN_ISNEW} -->
        <a class="btn btn-info" style="margin-top:10px" onclick="validate_comment({IN_ID})">{PHP.L.Validate}</a>
        <!-- ENDIF -->
    </div>
</div>
<hr>
<!-- END:COMMENT -->
<!-- END:MAIN -->