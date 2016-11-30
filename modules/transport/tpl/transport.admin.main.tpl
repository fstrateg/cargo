<!-- BEGIN: MAIN -->
<h2>{PHP.L.transport_moderate}</h2>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<!-- BEGIN: TRANS_ROWS -->
<table class="flat">
    <tr>
        <td class="photo">
            <img src="{TRANSP_ROW_PHOTO}" alt="{TRANSP_ROW_TITLE}"/>
        </td>
        <td>
            <h4>
                <img src="{TRANSP_ROW_VERIFED}" alt="{TRANSP_ROW_VERNAME}" title="{TRANSP_ROW_VERNAME}"/> <a href="{TRANSP_ROW_URL}">{TRANSP_ROW_TITLE}</a>
                <!-- IF {TRANSP_ROW_USER_IS_ADMIN} --> {TRANSP_ROW_LOCALSTATUS}<!-- ENDIF -->
                <div class="pull-right offers"><span class="dover">{TRNSP_ROWS_MODERATE}</span></div>
            </h4>
            <p class="owner small"><span class="date">[{TRANSP_ROW_DATE}]</span>  
                <span class="region">{TRANSP_ROW_COUNTRY} {TRANSP_ROW_REGION} {TRANSP_ROW_CITY}</span></p>
            <p class="text">{TRANSP_ROW_TEXT}</p>
        </td>
    </tr>
</table>
<hr/>
<!-- END: TRANS_ROWS -->
{TRNSP_LIST}
<!-- END: MAIN -->