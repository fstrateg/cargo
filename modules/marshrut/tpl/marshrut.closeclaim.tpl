<!-- BEGIN: MAIN -->
<div class="breadcrumb"><h4>{PHP.L.marshrut_closeclaim}</h4></div>
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<b>Информация по рейсу</b>
<div class="row">
    <div class="span1">
        {PRJ_OWNER_AVATAR}
    </div>
    <div class="span2">
        <p>{PRJ_OWNER_NICKNAME}</p>
        <p>
            <!-- IF {PRJ_OWNER_ISPRO} -->
            <span class="label label-important">PRO</span>
            <!-- ENDIF -->
            <span class="label label-info">{PRJ_OWNER_USERPOINTS}</span>
        </p>
        <!-- FOR {PHONE} IN {PRJ_OWNER_PHONES} -->
        <p>{PHONE}</p>
        <!-- ENDFOR -->
    </div>
    <div class="span4 pull-right">
        <table width="100%">
            <tr><td><b>№:</b></td><td>#{PRJ_ID}</td></tr>
            <tr><td><b>{PHP.L.projects_dat_created}:</b></td><td>{PRJ_DATE}</td></tr>
            <tr><td><b>{PHP.L.projects_dat_period}:</b></td><td>{PRJ_DATEFROM}-{PRJ_DATETO}</td></tr>
        </table>
    </div>
</div>
<hr/>
<div class="row">
    <div class="span6">
        <table width="100%">
            <!-- IF {PRJ_COST} > 0 -->
            <tr><td><b>{PHP.L.offers_budget}:</b></td><td>{PRJ_COST} {PHP.cfg.payments.valuta}</td></tr>
            <!-- ENDIF -->
            <tr><td><b>{PHP.L.projects_count}:</b></td><td>{PRJ_COUNT_OST} ({PRJ_COUNT})</td></tr>
            <tr><td><b>{PHP.L.projects_frt}:</b></td><td>{PRJ_FRT}</td></tr>
            <tr><td><b>{PHP.L.projects_massa}:</b></td><td>{PRJ_MASSA} {PHP.L.projects_ton}</td></tr>
            <tr><td><b>{PHP.L.projects_vol}:</b></td><td>{PRJ_VOL} {PHP.L.projects_m3}</td></tr>
            <tr><td><b>{PHP.L.Category}:</b></td><td><a href="{PRJ_CAT|cot_url('projects', 'c='$this)}">{PRJ_CATTITLE}</a></td></tr>
            <tr><td><b>{PHP.L.LocationFrom}:</b></td><td>{PRJ_COUNTRY} {PRJ_REGION} {PRJ_CITY}</td></tr>
            <tr><td><b>{PHP.L.LocationTo}:</b></td><td>{PRJ_COUNTRYTO} {PRJ_REGIONTO} {PRJ_CITYTO}</td></tr>
        </table>
    </div>
    <div class="span6">
        {PRJ_TEXT}
    </div>
</div>
<hr>
<div class="customform">
    <p><b>{PHP.L.marshrut_rating_title}</b></p>
    <form action="{MR_FORM_SEND}" method="post" name="edit" enctype="multipart/form-data">
        <div class="row">
            <div class="span3">
                <div id="reviewStars-input">
                    <input id="star-4" type="radio" value="5" name="reviewStars"<!-- IF {MR_PERFORMED_STARS} == 5 --> checked<!-- ENDIF --> />
                    <label title="{PHP.L.claims_rating_verygood}" for="star-4"></label>

                    <input id="star-3" type="radio" value="4" name="reviewStars"<!-- IF {MR_PERFORMED_STARS} == 4 --> checked<!-- ENDIF --> />
                    <label title="{PHP.L.claims_rating_good}" for="star-3"></label>

                    <input id="star-2" type="radio" value="3" name="reviewStars"<!-- IF {MR_PERFORMED_STARS} == 3 --> checked<!-- ENDIF --> />
                    <label title="{PHP.L.claims_rating_norm}" for="star-2"></label>

                    <input id="star-1" type="radio" value="2" name="reviewStars"<!-- IF {MR_PERFORMED_STARS} == 2 --> checked<!-- ENDIF --> />
                    <label title="{PHP.L.claims_rating_poor}" for="star-1"></label>

                    <input id="star-0" type="radio" value="1" name="reviewStars"<!-- IF {MR_PERFORMED_STARS} == 1 --> checked<!-- ENDIF --> />
                    <label title="{PHP.L.claims_rating_bad}" for="star-0"></label>
                </div>
            </div>
        </div>
        <hr />
        <p><b>{PHP.L.claims_rating_notes}</b></p>
        {MR_PERFORMED_NOTES}
        <p>&nbsp;</p>
        <div class="row">
            <div class="span3">
                <button type="submit" class="btn btn-success">{PHP.L.project_realized}</button>
            </div>
        </div>
    </form>
</div>
<!-- END: MAIN -->