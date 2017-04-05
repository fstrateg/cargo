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
                <td>{PRJ_PRF_FIO}</td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_number}</b></td>
                <td>{PRJ_PRF_NUMBER}</td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_dtload}</b></td>
                <td>{PRJ_PRF_DB}</td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_dtunload}</b></td>
                <td>{PRJ_PRF_DE}</td>
            </tr>
            <tr>
                <td><b>{PHP.L.prj_setp_summa}</b></td>
                <td>{PRJ_PRF_SUMM} {PHP.cfg.payments.valuta}</td>
            </tr>
            <tr><td colspan="2"><b>{PHP.L.Notes}</b></tr>
            <tr><td colspan="2" class="small">{PRJ_PRF_NOTES}</td></tr>
        </table>
    </div>
</div>
<hr>
<p><b>{PHP.L.claims_rating_title}</b></p>
<form action="{PRJ_FORM_SEND}" method="post" name="edit" enctype="multipart/form-data">
<div class="row">
    <div class="span3">
        <div id="reviewStars-input">
            <input id="star-4" type="radio" name="reviewStars"<!-- IF {PRJ_PERFORMED_STARS} == 5 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_verygood}" for="star-4"></label>

            <input id="star-3" type="radio" name="reviewStars"<!-- IF {PRJ_PERFORMED_STARS} == 4 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_good}" for="star-3"></label>

            <input id="star-2" type="radio" name="reviewStars"<!-- IF {PRJ_PERFORMED_STARS} == 3 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_norm}" for="star-2"></label>

            <input id="star-1" type="radio" name="reviewStars"<!-- IF {PRJ_PERFORMED_STARS} == 2 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_poor}" for="star-1"></label>

            <input id="star-0" type="radio" name="reviewStars"<!-- IF {PRJ_PERFORMED_STARS} == 1 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_bad}" for="star-0"></label>
        </div>
    </div>
</div>
<hr />
<p><b>{PHP.L.claims_rating_notes}</b></p>
{PRJ_PERFORMED_NOTES}
<p>&nbsp;</p>
<div class="row">
    <div class="span3">
        <button type="submit" class="btn btn-success">{PHP.L.project_realized}</button>
    </div>
</div>
</form>
<!-- END:MAIN -->