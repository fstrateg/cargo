<!-- BEGIN: MAIN -->
<div class="bcrups"><h4>{PHP.L.transport_edit_project_title}</h4></div>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div id="content">
    <form action="{TRNSEDIT_FORM_SEND}" method="post" name="edit" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.transport_type}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {TRNSEDIT_FORM_TRANSP}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.transport_location}:
            </div>
            <div class="col-12 col-sm-8">
            {TRNSEDIT_FORM_LOCATION}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.transport_fio_driver}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {TRNSEDIT_FORM_DRIVER}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.transport_regnumber}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {TRNSEDIT_FORM_REGNUMBER}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.transport_vol}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
                <div class="input-group">
                {TRNSEDIT_FORM_VOL}
                    <div class="input-group-append">
                        <span class="input-group-text">{PHP.L.projects_m3}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.transport_length}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
                <div class="input-group">
                {TRNSEDIT_FORM_LEN}
                    <div class="input-group-append">
                        <span class="input-group-text">{PHP.L.projects_m}</span>
                    </div>
                </div>
            </div>
        </div>
        <div id="trailer" class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.transport_triler}:
            </div>
            <div id="trfull" class="col-12 col-sm-12 col-md-8">
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {PHP.L.transport_regnumber}:
                    </div>
                    <div class="col-12 col-sm-8 col-md-4">
                    {TRAILER_NUMBER}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {PHP.L.transport_vol}:
                    </div>
                    <div class="col-12 col-sm-8 col-md-4">
                        <div class="input-group">
                        {TRAILER_VOL}
                            <div class="input-group-append">
                                <span class="input-group-text">{PHP.L.projects_m3}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                    {PHP.L.transport_length}:
                    </div>
                    <div class="col-12 col-sm-8 col-md-4">
                        <div class="input-group">
                        {TRAILER_LEN}
                            <div class="input-group-append">
                                <span class="input-group-text">{PHP.L.projects_m}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-4">
                        <a class="btn btn-danger" href="javascript:void(0)">{PHP.L.Remove}</a>
                    </div>
                </div>
            </div>
            <div id="trempty" class="col-12 col-sm-8 col-md-4" style="display: none">
                <a class="btn btn-success" href="javascript:void(0)">{PHP.L.Add}</a>
            </div>
        {TRAILER}
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.transport_photo}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {TRNSEDIT_FORM_PHOTO}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.Notes}:
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
            {TRNSEDIT_FORM_TEXT}
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
                <input type="submit" class="btn btn-success" value="{PHP.L.transport_save}" />
            </div>
            <div class="col text-right">{TRNSEDIT_FORM_UNPUBLISH} {TRNSEDIT_FORM_DELETE}</div>
        </div>
    </form>
</div>
<script type="text/javascript" charset="utf-8">
    $('#del').click(function(){
        if (confirm('{PHP.L.transport_delconfirm}'))
            window.location='{TRNSEDIT_FORM_DELURL}';
    });
    $('#trempty a').click(function(){
            $('#trempty').hide(400,function() {
                $('#trfull').show(400);
            });
        $('#trailer input[name="trailer"]').val(1);
        $('#trailer td:first').css('font-weight','bold');
    });
    $('#trfull a').click(function(){
        $('#trfull').hide(400,function() {
            $('#trempty').show(400);
        });
        $('#trailer input[name="trailer"]').val(0);
        $('#trailer td:first').css('font-weight','normal');
    });

    function fload()
    {
        var vl=$('#trailer input[name="trailer"]').val();
        if (vl=="1") $('#trempty a').click();
        else $('#trfull a').click();

    }
    fload();
</script>
<!-- END: MAIN -->