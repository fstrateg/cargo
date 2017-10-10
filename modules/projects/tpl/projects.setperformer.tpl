<!-- BEGIN: MAIN -->
<div class="breadcrumb">{PHP.L.prj_setp_title}</div>
<h1>{PHP.L.prj_setp_title}</h1>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div class="row">
    <div class="span1">
        {PRJ_PERF_AVATAR}
    </div>
    <div class="span2">
        <p>{PRJ_PERF_NICKNAME}</p>
        <p>
            <!-- IF {PRJ_PERF_ISPRO} -->
            <span class="label label-important">PRO</span>
            <!-- ENDIF -->
            <span class="label label-info">{PRJ_PERF_USERPOINTS}</span>
            <!-- IF {PHP.cot_modules.blacklist} -->
                    {PRJ_PERF_BLLABEL}
            <!-- ENDIF -->
        </p>
        <!-- FOR {PHONE} IN {PRJ_PERF_PHONES} -->
        <p>{PHONE}</p>
        <!-- ENDFOR -->
    </div>
</div>
<hr>
<h3>{PHP.L.claims_factdata}</h3>
<form action="{PRJ_FORM_ACTION}" method="post" name="newadv" enctype="multipart/form-data">
<div class="row">
    <div class="span6">
        <table width="100%">
            <tr>
                <td><b>ID:</b></td>
                <td style="line-height: 40px"><div class="span2">#{PRJ_ID}</div></td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_number}:</b></td>
                <td><div class="span2">{PRJ_NUMBER}</div></td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_fio}:</b></td>
                <td><div class="span4">{PRJ_FIO}</div></td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_summa}:</b></td>
                <td><div class="span2">{PRJ_SUMM}</div></td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_dtload}:</b></td>
                <td><div class="span2">{PRJ_DB}</div></td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_dtunload}:</b></td>
                <td><div class="span2">{PRJ_DE}</div></td>
            </tr>
            <tr>
                <td><b>{PHP.L.Notes}:</b></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">{PRJ_TEXT}</td>
            </tr>
        </table>
    </div>
</div>
    {PRJ_PERFORMER}
    {PRJ_CLAIM}
    <div class="well well-small">
        <button type="submit" class="btn btn-success"><i class="icon-ok icon-white"></i> {PHP.L.Save}</button>
        <a href="{PRJ_CANCEL_URL}" class="btn btn-warning"><i class="icon-remove icon-white"></i> {PHP.L.Cancel}</a>
    </div>
</form>
{TEST}
<script type="text/javascript" src="/js/jquery-ui.min.js">
</script>
<script>

    $( function() {
        $('#date_from').datepicker().on( "change", function() {
            $('#date_to').datepicker( "option", "minDate", getDate( this ) );
        });
        $('#date_to').datepicker().on( "change", function() {
            $('#date_from').datepicker( "option", "maxDate", getDate( this ) );
        });
        $('#date_from').trigger("change");
        $('#date_to').trigger("change");
    });
</script>
<!-- END:MAIN -->