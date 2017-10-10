<!-- BEGIN: MAIN -->
{FILE "{PHP.cfg.themes_dir}/{PHP.usr.theme}/warnings.tpl"}
<h2>Черный список пользователей</h2>
<div class="row">
    <div class="pull-right"><p><a href="{BL_ADDNEWUSER}" class="btn btn-inverse">Добавить пользователя в ЧС</a></p></div>
</div>
<!-- BEGIN: USR_ROW -->
<div class="row">
    <div class="span1 pull-right">
        <div class="btn-group">
            <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog icon-white"></i><span class="caret"></span></a>
            <ul class="dropdown-menu pull-left">
                <li><a href="{BL_EDIT}"><i class="icon-pencil"></i> {PHP.L.Edit}</a></li>
                <li><a href="{BL_DELETE}"><i class="icon-remove"></i> {PHP.L.Delete}</a></li>
            </ul>
        </div>
    </div>

    <div class="span1">
        {BL_AVATAR}
    </div>
    <div class="span8">
        <strong>{BL_NICKNAME}</strong><!-- IF {BL_ISPRO} --> <span class="label label-important">PRO</span><!-- ENDIF -->
        <span class="label label-info">{BL_USERPOINTS}</span>
        <p>
            <!-- FOR {PHONE} IN {BL_PHONES} -->
            <span>{PHONE}; </span>
            <!-- ENDFOR -->
        </p>
        <p>{BL_COUNTRY} {BL_REGION} {BL_CITY}</p>
    </div>

</div>
<div class="row">
    <div class="span3">
        Внесен в ЧС: {BL_DAT}
    </div>
    <div class="span8">
        <i>{BL_NOTE}</i>
    </div>
</div>
<hr/>
<!-- END: USR_ROW -->
<!-- END: MAIN -->