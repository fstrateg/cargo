<!-- BEGIN: MAIN -->
<div class="breadcrumb">
    {PHP.L.transport_doverifed} <b>{TRANSP_ITEM_TITLE}</b>
    <img src="{TRANSP_VERIFED}" alt="{TRANSP_VERNAME}" title="{TRANSP_VERNAME}"/>
</div>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<p>{PHP.L.transport_verif_text}</p>
<form enctype="multipart/form-data" action="{TRANSP_ACTION_URL}" method="POST">
    <p>{PHP.L.transport_verif_scan}</p>
    {TRANSP_FILESIZE_LIMIT}
    <p>{TRANSP_PHOTO1}</p>
    <p>{TRANSP_PHOTO2}</p>
    <hr/>
    <input type="submit" class="btn btn-success" value="{PHP.L.transport_verif_send}" />
</form>
<!-- END: MAIN -->