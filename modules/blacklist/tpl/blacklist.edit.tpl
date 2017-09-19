<!-- BEGIN:MAIN -->
<h3>{BL_TITLE}</h3>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div class="customform">
    <form action="{MR_FORM_SEND}" method="post" name="edit" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td width="150">{PHP.L.marshrut_db}:</td>
                <td>{MR_FORM_DB}</td>
            </tr>
        </table>
    </form>
</div>
<!-- END:MAIN -->