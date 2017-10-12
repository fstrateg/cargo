<!-- BEGIN:MAIN -->
<div class="row">
    <div class="span1">
        {BL_AVATAR}
    </div>
    <div class="span6">
        <p>{BL_NICKNAME}</p>
        <p>
            <!-- IF {BL_ISPRO} -->
            <span class="label label-important">PRO</span>
            <!-- ENDIF -->
            <span class="label label-info">{BL_USERPOINTS}</span>
        </p>
        <p>Дата регистрации: {BL_REGDATE}</p>
        <!-- FOR {PHONE} IN {BL_PHONES} -->
        <p>{PHONE}</p>
        <!-- ENDFOR -->
    </div>
</div>
<form action="{BL_SEND}" method="post" name="edit" enctype="multipart/form-data">
<div class="row">
    <div class="span8">
    <p>Добавить комментарий (для себя)</p>

    {BL_NOTE}
    </div>

</div>
    <div class="row">
        <div class="span8">
                {BL_POST}
        </div>
    </div>
{BL_USERID}
</form>
<!-- END:MAIN -->
<!-- BEGIN:EMPTY -->
Пользователь с ID={BL_ID} не найден!
<!-- END:EMPTY -->