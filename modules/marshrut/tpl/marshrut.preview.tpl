<!-- BEGIN: MAIN -->
<div class="row">
    <div class="span1">
    {MR_OWNER_AVATAR}
    </div>
    <div class="span2">
        <p>{MR_OWNER_NICKNAME}</p>
        <p>
            <!-- IF {MR_OWNER_ISPRO} -->
            <span class="label label-important">PRO</span>
            <!-- ENDIF -->
            <span class="label label-info">{MR_OWNER_USERPOINTS}</span>
        </p>
    </div>
</div>
<hr/>
<div class="row">
    <div class="span6">
        <table width="100%">
            <!-- IF {MR_COST} > 0 -->
            <tr><td><b>{PHP.L.offers_budget}:</b></td><td>{MR_COST} {PHP.cfg.payments.valuta}</td></tr>
            <!-- ENDIF -->
            <tr><td><b>{PHP.L.marshrut_marshrut}:</b></td><td>{MR_COUNTRY} {MR_REGION} {MR_CITY} - {MR_COUNTRYTO} {MR_REGIONTO} {MR_CITYTO}</td></tr>
            <tr><td><b>{PHP.L.marshrut_period}:</b></td><td>{MR_DB}-{MR_DE}</td></tr>
            <!-- IF {MR_SHOW_STATUS} -->
            <tr><td><b>{PHP.L.marshrut_status}</b></td><td>{MR_STATUS}</td></tr>
            <!-- ENDIF -->
        </table>
    </div>
</div>
<hr/>
<a href="{MR_EDIT_URL}" class="btn btn-info"><span>{PHP.L.Edit}</span></a>
<!--IF {MR_STATE} != 1 -->
<a href="{MR_PUBLISH_URL}" class="btn btn-success"><span>{PHP.L.Publish}</span></a>
<!-- ENDIF -->
<!--IF {MR_STATE} != 2 -->
<a href="{MR_HIDE_URL}" class="btn btn-warning"><span>{PHP.L.Hide}</span></a>
<!-- ENDIF -->
<!--IF {MR_STATE} != 3 -->
<a href="{MR_ARCHIVE_URL}" class="btn btn-inverse"><span>{PHP.L.Inarchive}</span></a>
<!-- ENDIF -->
<div class="pull-right"><span id="del" href="" class="btn btn-danger">{PHP.L.Delete}</span> </div>
<hr/>
<script type="text/javascript">
    $('#del').click(function(){
        if (window.confirm('{PHP.L.marshrut_delquery}')) window.location='{MR_DELETE_URL}';
    });
</script>
{TEST}
<!-- END: MAIN -->