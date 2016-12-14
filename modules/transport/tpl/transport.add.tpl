<!-- BEGIN: MAIN -->
<div class="breadcrumb">{PHP.L.transport_add_project_title}</div>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div class="customform">
    <form action="{TRNSADD_FORM_SEND}" method="post" name="edit" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td width="150">{PHP.L.transport_type}:</td>
                <td>{TRNSADD_FORM_CAT}</td>
            </tr>
            <tr>
                <td>{PHP.L.transport_location}:</td>
                <td>{TRNSADD_FORM_LOCATION}</td>
            </tr>
            <tr>
                <td>{PHP.L.transport_regnumber}:</td>
                <td>{TRNSADD_FORM_REGNUMBER}</td>
            </tr>
            <!--tr>
                <td>{PHP.L.transport_photo}:</td>
                <td>{TRNSADD_FORM_PHOTO}</td>
            </tr-->
            <tr>
                <td class="top">{PHP.L.Notes}:</td>
                <td>{TRNSADD_FORM_TEXT}</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-success" value="{PHP.L.transport_save}" />
                </td>
            </tr>
        </table>
    </form>
    {TEST}
</div>
<!-- END: MAIN -->