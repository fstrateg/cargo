<!-- BEGIN: MAIN -->
<div class="breadcrumb">{PHP.L.transport_edit_project_title}</div>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div class="customform">
    <form action="{TRNSEDIT_FORM_SEND}" method="post" name="edit" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td width="150">{PHP.L.transport_type}:</td>
                <td>{TRNSEDIT_FORM_CAT}</td>
            </tr>
            <tr>
                <td>{PHP.L.transport_location}:</td>
                <td>{TRNSEDIT_FORM_LOCATION}</td>
            </tr>
            <tr>
                <td>{PHP.L.transport_regnumber}:</td>
                <td>{TRNSEDIT_FORM_REGNUMBER}</td>
            </tr>
            <tr>
                <td>{PHP.L.transport_photo}:</td>
                <td>{TRNSEDIT_FORM_PHOTO}</td>
            </tr>
            <tr>
                <td class="top">{PHP.L.Text}:</td>
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
</script>
<!-- END: MAIN -->