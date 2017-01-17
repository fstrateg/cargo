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
        </table>
    </form>
</div>
<!-- END: MAIN -->