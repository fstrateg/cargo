<!-- BEGIN: MAIN -->
<div class="breadcrumb">{PHP.L.claims_setperformed}</div>
<h1>{PHP.L.claims_setperformed}</h1>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div id="content" class="container">
<div class="row">
    <div class="col-auto">
    {PRJ_PERF_AVATAR}
    </div>
    <div class="col">
        <p>{PRJ_PERF_NICKNAME}</p>
        <p>
            <span class="badge badge-info">{PRJ_PERF_USERPOINTS}</span>
        </p>
        <!-- FOR {PHONE} IN {PRJ_PERF_PHONES} -->
        <p>{PHONE}</p>
        <!-- ENDFOR -->
    </div>
</div>
<div class="row">
    <div class="col col-4-sm">
    {PRF.PRF_CONFIRM}
        <table class="table noborder details table-striped">
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
        </table>
    </div>
</div>
<div class="row">
    <div class="col"><div class="note">
    {PRJ_PRF_NOTES}
    </div></div>
</div>
<hr>
<p><b>{PHP.L.claims_rating_title}</b></p>
<form action="{PRJ_FORM_SEND}" method="post" name="edit" enctype="multipart/form-data">
<div class="row">
    <div class="col">
        <div id="reviewStars-input">
            <input id="star-4" type="radio" value="5" name="reviewStars"<!-- IF {PRJ_PERFORMED_STARS} == 5 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_verygood}" for="star-4"></label>

            <input id="star-3" type="radio" value="4" name="reviewStars"<!-- IF {PRJ_PERFORMED_STARS} == 4 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_good}" for="star-3"></label>

            <input id="star-2" type="radio" value="3" name="reviewStars"<!-- IF {PRJ_PERFORMED_STARS} == 3 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_norm}" for="star-2"></label>

            <input id="star-1" type="radio" value="2" name="reviewStars"<!-- IF {PRJ_PERFORMED_STARS} == 2 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_poor}" for="star-1"></label>

            <input id="star-0" type="radio" value="1" name="reviewStars"<!-- IF {PRJ_PERFORMED_STARS} == 1 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_bad}" for="star-0"></label>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col">
    <p><b>{PHP.L.claims_rating_notes}</b></p>
    {PRJ_PERFORMED_NOTES}
    </div>
 </div>
<div class="row">
    <div class="col">
        <button type="submit" class="btn btn-success mt-3">{PHP.L.project_realized}</button>
    </div>
</div>
</form>
    </div>
<!-- END:MAIN -->