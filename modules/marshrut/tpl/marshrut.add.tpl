<!-- BEGIN: MAIN -->
<div class="breadcrumb"><h4>{PHP.L.marshrut_add_new}</h4></div>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div class="customform">
    <form action="{MR_FORM_SEND}" method="post" name="edit" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td width="150">{PHP.L.marshrut_db}:</td>
                <td>{MR_FORM_DB}</td>
            </tr>
            <tr>
                <td>{PHP.L.marshrut_de}:</td>
                <td>{MR_FORM_DE}</td>
            </tr>
            <tr>
                <td>{PHP.L.marshrut_from}:</td>
                <td>{PRJADD_FORM_LOCATION}</td>
            </tr>
            <tr>
                <td>{PHP.L.marshrut_to}:</td>
                <td>{PRJADD_FORM_LOCATIONTO}</td>
            </tr>
            <tr>
                <td>{PHP.L.marshrut_price}:</td>
                <td><div class="input-append">{MR_FORM_PRICE}<span class="add-on">{PHP.cfg.payments.valuta}</span></div></td>
            </tr>
            <tr><td></td>
                <td><input type="submit" class="btn btn-info" value="{PHP.L.marshrut_next}" />
            </td></tr>
        </table>
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
    });
</script>
<!-- END: MAIN -->