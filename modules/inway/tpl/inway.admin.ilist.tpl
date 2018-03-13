<!-- BEGIN:MAIN -->
<h3>Список сервисов</h3>
<!-- BEGIN: SRV -->
<div class="row">
    <div class="span5">
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
        <a class="btn btn-danger" onclick="delete_srv({IN_ID},'{IN_TITLE}')">{PHP.L.Delete}</a>
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
</script>
<!-- END:MAIN -->

