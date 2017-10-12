<!-- BEGIN: MAIN -->
{FILE "{PHP.cfg.themes_dir}/{PHP.usr.theme}/warnings.tpl"}
<h2>Избранный список пользователей</h2>
<div class="row">
    <div class="pull-right"><p><a href="{FV_ADDNEWUSER}" class="btn btn-success">Добавить пользователя</a></p></div>
</div>
<!-- BEGIN: USR_ROW -->
<div class="row">
    <div class="span1 pull-right">
        <div class="btn-group">
            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog icon-white"></i><span class="caret"></span></a>
            <ul class="dropdown-menu pull-left">
                <li><a href="{FV_EDIT}"><i class="icon-pencil"></i> {PHP.L.Edit}</a></li>
                <li><a href="{FV_DELETE}"><i class="icon-remove"></i> {PHP.L.Delete}</a></li>
            </ul>
        </div>
    </div>

    <div class="span1">
        {FV_AVATAR}
    </div>
    <div class="span8">
        <strong>{FV_NICKNAME}</strong><!-- IF {FV_ISPRO} --> <span class="label label-important">PRO</span><!-- ENDIF -->
        <span class="label label-info">{FV_USERPOINTS}</span>
        <!-- IF {FV_PHONES} -->
        <p>
            <!-- FOR {PHONE} IN {FV_PHONES} -->
            <span>{PHONE};</span>
            <!-- ENDFOR -->
        </p>
        <!-- ENDIF -->
        <p>{FV_COUNTRY} {FV_REGION} {FV_CITY}</p>
    </div>

</div>
<div class="row">
    <div class="span3">
        Внесен: {FV_DAT}
    </div>
    <div class="span8">
        <i>{FV_NOTE}</i>
    </div>
</div>
<hr/>
<!-- END: USR_ROW -->
<!-- END: MAIN -->