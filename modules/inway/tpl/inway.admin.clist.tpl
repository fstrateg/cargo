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
    <div class="span2">

    </div>
    <div class="span8">
        <p>{IN_CREATED}</p>
        <div class="fstars" style="padding: 10px 0">
            <span class="stars-view"><span style="width: {IN_STARS}%"></span></span>
        </div>
        <p>{IN_NOTE}</p>
    </div>
</div>
<hr>
<!-- END:COMMENT -->
<!-- END:MAIN -->