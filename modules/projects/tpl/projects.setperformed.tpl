<!-- BEGIN: MAIN -->
<div class="breadcrumb">{PHP.L.claims_setperformed}</div>
<h1>{PHP.L.claims_setperformed}</h1>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div class="row">
    <div class="span1">
        {PRJ_PERF_AVATAR}
    </div>
    <div class="span2">
        <p>{PRJ_PERF_NICKNAME}</p>
        <p>
            <!-- IF {PRJ_PERF_ISPRO} -->
            <span class="label label-important">PRO</span>
            <!-- ENDIF -->
            <span class="label label-info">{PRJ_PERF_USERPOINTS}</span>
        </p>
        <!-- FOR {PHONE} IN {PRJ_PERF_PHONES} -->
        <p>{PHONE}</p>
        <!-- ENDFOR -->
    </div>
    <div class="span4">
        <table width="100%">
            <tr>
                <td><b>{PHP.L.prj_setp_fio}</b></td>
                <td>{PRF.PRF_FIO}</td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_number}</b></td>
                <td>{PRF.PRF_NUMBER}</td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_dtload}</b></td>
                <td>{PRF.PRF_DB}</td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_dtunload}</b></td>
                <td>{PRF.PRF_DE}</td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_summa}</b></td>
                <td>{PRF.PRF_SUMM} {PHP.cfg.payments.valuta}</td>
            </tr>
            <tr><td colspan="2"><b>{PHP.L.Notes}</b></tr>
            <tr><td colspan="2" class="small">{PRF.PRF_NOTES}</td></tr>
        </table>
    </div>
</div>
<hr>
<!-- END:MAIN -->