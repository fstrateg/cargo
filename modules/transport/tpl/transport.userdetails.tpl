<!-- BEGIN: MAIN -->
<div class="row pt-3">
    <div class="col">
        <h4>
            {PHP.L.transport_transport}
        </h4>
    </div>
    <!-- IF {PHP.usr.id} == {PHP.urr.user_id}--><div class="col text-right"><a href="{PHP|cot_url('transport', 'm=add')}" class="btn btn-success">{PHP.L.transport_add_to_catalog}</a></div><!-- ENDIF -->
</div>



<hr>
<div id="listtransport">
    {FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
    <!-- BEGIN: TRANS_ROWS -->
    <div class="row">
        <div class="col-auto">
            <img src="{TRANSP_ROW_PHOTO}" alt="{TRANSP_ROW_TITLE}"/>
        </div>
        <div class="col">
            <h4>
                <img src="{TRANSP_ROW_VERIFED}" alt="{TRANSP_ROW_VERNAME}" title="{TRANSP_ROW_VERNAME}"/>
                <!-- IF {TRANSP_ROW_USER_IS_ADMIN} -->
                <a href="{TRANSP_ROW_URL}">{TRANSP_ROW_TITLE}</a>
                <!-- ELSE -->
            {TRANSP_ROW_TITLE}
                <!-- ENDIF -->
            </h4>
                <!-- IF {TRANSP_ROW_USER_IS_ADMIN} -->
            {TRANSP_ROW_LOCALSTATUS}
                <div class="pull-right offers"><span class="dover">{TRANSP_ROW_DOVERIFED}</span></div>
                <!-- ENDIF -->

            <p class="owner small"><span class="date">[{TRANSP_ROW_DATE}]</span>  
                <span class="region">{TRANSP_ROW_COUNTRY} {TRANSP_ROW_REGION} {TRANSP_ROW_CITY}</span></p>
            <p>{TRANSP_ROW_TRANSP}</p>
            <p class="text">{TRANSP_ROW_TEXT}</p>
        </div>
    </div>
    <table class="flat">
        <tr>
            <td class="photo">

            </td>
            <td>

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