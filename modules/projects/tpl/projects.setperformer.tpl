<!-- BEGIN: MAIN -->
<div class="breadcrumb">{PHP.L.prj_setp_title}</div>
<h1>{PHP.L.prj_setp_title}</h1>
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
</div>
<hr>
<div class="row">
    <div class="span6">
        <table width="100%">
            <tr>
                <td><b>ID:</b></td>
                <td>#{PRJ_ID}</td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_number}:</b></td>
                <td>{PRJ_NUMBER}</td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_fio}:</b></td>
                <td></td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_summa}:</b></td>
                <td></td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_dtload}:</b></td>
                <td></td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_dtunload}:</b></td>
                <td></td>
            </tr>
        </table>
    </div>
</div>
<!-- END:MAIN -->