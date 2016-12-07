<!-- BEGIN: MAIN -->
<h4>
    {PHP.L.transport_transport}
    <!-- IF {PHP.usr.id} == {PHP.urr.user_id}--><div class="pull-right"><a href="{PHP|cot_url('transport', 'm=add')}" class="btn btn-success">{PHP.L.transport_add_to_catalog}</a></div><!-- ENDIF -->
</h4>
<hr>
<div id="listtransport">
    {FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
    <!-- BEGIN: TRANS_ROWS -->
    <table class="flat">
        <tr>
            <td class="photo">
                <img src="{TRANSP_ROW_PHOTO}" alt="{TRANSP_ROW_TITLE}"/>
            </td>
            <td>
                <h4>
                    <img src="{TRANSP_ROW_VERIFED}" alt="{TRANSP_ROW_VERNAME}" title="{TRANSP_ROW_VERNAME}"/>
                    <!-- IF {TRANSP_ROW_USER_IS_ADMIN} -->
                        <a href="{TRANSP_ROW_URL}">{TRANSP_ROW_TITLE}</a>
                    <!-- ELSE -->
                    {TRANSP_ROW_TITLE}
                    <!-- ENDIF -->
                    <!-- IF {TRANSP_ROW_USER_IS_ADMIN} -->
                    {TRANSP_ROW_LOCALSTATUS}
                    <div class="pull-right offers"><span class="dover">{TRANSP_ROW_DOVERIFED}</span></div>
                    <!-- ENDIF -->
                </h4>
                <p class="owner small"><span class="date">[{TRANSP_ROW_DATE}]</span>  
                    <span class="region">{TRANSP_ROW_COUNTRY} {TRANSP_ROW_REGION} {TRANSP_ROW_CITY}</span></p>
                <p class="text">{TRANSP_ROW_TEXT}</p>
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <!--td>
                <div class="pull-right offers"><a href="{PRJ_ROW_OFFERS_ADDOFFER_URL}">{PHP.L.offers_add_offer}</a> ({TRANSP_ROW_OFFERS_COUNT})</div>
            </td-->
        </tr>
    </table>
        {TRANSP_ROW_ITEM}
    <hr/>
    <!-- END: TRANS_ROWS -->
</div>
<!-- IF {TRANSPORT_COUNT} > 0 -->
<div class="pagination"><ul>{PAGENAV_PAGES}</ul></div>
<!-- ELSE -->
<div class="alert">{PHP.L.transport_empty}</div>
<!-- ENDIF -->
<!-- END: MAIN -->