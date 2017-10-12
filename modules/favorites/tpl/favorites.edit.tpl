<!-- BEGIN:MAIN -->
<h3>{FV_TITLE}</h3>
<div class="row">
    <div class="span1">
        {FV_AVATAR}
    </div>
    <div class="span6">
        <p>{FV_NICKNAME}</p>
        <p>
            <!-- IF {FV_ISPRO} -->
            <span class="label label-important">PRO</span>
            <!-- ENDIF -->
            <span class="label label-info">{FV_USERPOINTS}</span>
        </p>
        <p>Дата регистрации: {FV_REGDATE}</p>
        <!-- FOR {PHONE} IN {FV_PHONES} -->
        <p>{PHONE}</p>
        <!-- ENDFOR -->
    </div>
</div>
<form action="{FV_SEND}" method="post" name="edit" enctype="multipart/form-data">
    <div class="row">
        <div class="span8">
            <p>Добавить комментарий (для себя)</p>

            {FV_NOTE}
        </div>

    </div>
    <div class="row">
        <div class="span8">
            {FV_POST}
        </div>
    </div>
    {FV_ITEMID}
</form>
<!-- END:MAIN -->