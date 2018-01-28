<!-- BEGIN: MAIN -->
<div class="breadcrumb">{PHP.L.prj_setp_title}</div>
<h1>{PHP.L.prj_setp_title}</h1>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div id="content" class="container">
<div class="row">
    <div class="col-auto">
        {PRJ_PERF_AVATAR}
    </div>
    <div class="col">
        <p>{PRJ_PERF_NICKNAME}</p>
        <p>
            <!-- IF {PRJ_PERF_ISPRO} -->
            <span class="badge badge-important">PRO</span>
            <!-- ENDIF -->
            <span class="badge badge-info">{PRJ_PERF_USERPOINTS}</span>
            <!-- IF {PHP.cot_modules.blacklist} -->
                    {PRJ_PERF_BLLABEL}
            <!-- ENDIF -->
            <!-- IF {PHP.cot_modules.favorites} -->
                {PRJ_PERF_FVLABEL}
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
    <div class="form-group row">
        <div class="col-12 col-sm-4">
            <b>ID:</b>
        </div>
        <div class="col-12 col-sm-8 col-md-4">
            #{PRJ_ID}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12 col-sm-4">
            <b>{PHP.L.prj_setp_number}:</b>
        </div>
        <div class="col-12 col-sm-8 col-md-4">
        {PRJ_NUMBER}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12 col-sm-4">
            <b>{PHP.L.prj_setp_fio}:</b>
        </div>
        <div class="col-12 col-sm-8 col-md-4">
        {PRJ_FIO}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12 col-sm-4">
            <b>{PHP.L.prj_setp_summa}:</b>
        </div>
        <div class="col-12 col-sm-8 col-md-4">
        {PRJ_SUMM}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12 col-sm-4">
            <b>{PHP.L.prj_setp_dtload}:</b>
        </div>
        <div class="col-12 col-sm-8 col-md-4">
        {PRJ_DB}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12 col-sm-4">
            <b>{PHP.L.prj_setp_dtunload}:</b>
        </div>
        <div class="col-12 col-sm-8 col-md-4">
        {PRJ_DE}
        </div>
    </div>
    <div class="form-group row">
        <div class="col">
            <b>{PHP.L.Notes}:</b>
        </div>
    </div>
    <div class="row">
        <div class="col">
        {PRJ_TEXT}
        </div>
    </div>
    {PRJ_PERFORMER}
    {PRJ_CLAIM}
    <div class="well well-small mt-2">
        <button type="submit" class="btn btn-success"><i class="icon-ok icon-white"></i> {PHP.L.Save}</button>
        <a href="{PRJ_CANCEL_URL}" class="btn btn-warning"><i class="icon-remove icon-white"></i> {PHP.L.Cancel}</a>
    </div>
</form>
    </div>
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