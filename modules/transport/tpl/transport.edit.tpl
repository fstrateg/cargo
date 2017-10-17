<!-- BEGIN: MAIN -->
<div class="breadcrumb">{PHP.L.transport_edit_project_title}</div>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div class="customform">
    <form action="{TRNSEDIT_FORM_SEND}" method="post" name="edit" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td width="150">{PHP.L.transport_type}:</td>
                <td>{TRNSEDIT_FORM_TRANSP}</td>
            </tr>
            <tr>
                <td>{PHP.L.transport_location}:</td>
                <td>{TRNSEDIT_FORM_LOCATION}</td>
            </tr>
            <tr>
                <td>{PHP.L.transport_fio_driver}</td>
                <td>{TRNSEDIT_FORM_DRIVER}</td>
            </tr>
            <tr>
                <td>{PHP.L.transport_regnumber}:</td>
                <td>{TRNSEDIT_FORM_REGNUMBER}</td>
            </tr>
            <tr>
                <td>{PHP.L.transport_vol}:</td>
                <td><div class="input-append">{TRNSEDIT_FORM_VOL}<span class="add-on">{PHP.L.projects_m3}</div></td>
            </tr>
            <tr>
                <td>{PHP.L.transport_length}:</td>
                <td><div class="input-append">{TRNSEDIT_FORM_LEN}<span class="add-on">{PHP.L.projects_m}</div></td>
            </tr>
            <tr id="trailer">
                <td>{PHP.L.transport_triler}:</td>
                <td>
                    <div id="trfull">
                        <table class="noborder">
                            <tr><td>{PHP.L.transport_regnumber}</td><td>{TRAILER_NUMBER}</td></tr>
                            <tr><td>{PHP.L.transport_vol}</td><td><div class="input-append">{TRAILER_VOL}<span class="add-on">{PHP.L.projects_m3}</div></td></tr>
                            <tr><td>{PHP.L.transport_length}</td><td><div class="input-append">{TRAILER_LEN}<span class="add-on">{PHP.L.projects_m}</div></td></tr>
                            <tr><td colspan="2"><a class="btn btn-danger" href="javascript:void(0)">{PHP.L.Remove}</a></td></tr>
                        </table>
                    </div>
                    <div id="trempty" style="display: none">
                        <a class="btn btn-success" href="javascript:void(0)">{PHP.L.Add}</a>
                    </div>
                    {TRAILER}
                </td>
            </tr>
            <tr>
                <td>{PHP.L.transport_photo}:</td>
                <td>{TRNSEDIT_FORM_PHOTO}</td>
            </tr>
            <tr>
                <td class="top">{PHP.L.Notes}:</td>
                <td>{TRNSEDIT_FORM_TEXT}</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-success" value="{PHP.L.transport_save}" />
                    <div class="pull-right offers">{TRNSEDIT_FORM_UNPUBLISH} {TRNSEDIT_FORM_DELETE}</div>
                </td>
            </tr>
        </table>
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