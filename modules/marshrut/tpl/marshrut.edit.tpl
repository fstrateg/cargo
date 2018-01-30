<!-- BEGIN: MAIN -->
<div class="bcrups"><h4>{PHP.L.marshrut_edit}</h4></div>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div id="content">
    <form action="{MR_FORM_SEND}" method="post" name="edit" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.marshrut_db}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {MR_FORM_DB}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.marshrut_de}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {MR_FORM_DE}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.marshrut_from}:
            </div>
            <div class="col-12 col-lg-8 col-xl-4">
            {PRJEDIT_FORM_LOCATION}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.marshrut_to}:
            </div>
            <div class="col-12 col-lg-8 col-xl-4">
            {PRJEDIT_FORM_LOCATIONTO}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.marshrut_ttype}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {MR_FORM_TTYPE}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.marshrut_frt}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {MR_FORM_FRT}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.marshrut_price}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
                <div class="input-group">
                {MR_FORM_PRICE}<div class="input-group-append">
                    <span class="input-group-text">{PHP.cfg.payments.valuta}</span>
                </div>
                </div>
            </div>
        </div>
        <div class="form-group row mt3">
            <div class="col">
                <input type="submit" class="btn btn-info" value="{PHP.L.marshrut_save}" />
            </div>
        </div>
        {MR_FORM_ID}
    </form>
</div>
{TEST}
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#mrdb').datepicker().on('change',function(){
            $('#mrde').datepicker('option','minDate',getDate(this));
        });
        $('#mrde').datepicker().on('change',function(){
            var dt=getDate(this);
            $('#mrdb').datepicker('option','maxDate',dt);
        });
        $('#mrdb').trigger("change");
        $('#mrde').trigger("change");
    });
</script>
<!-- END: MAIN -->