<!-- BEGIN:FORM -->
{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<form id="cmForm" action="{FSAVE}" method="post" class="ajax post-comments">
<div class="row">
    <div class="col-12 col-sm-4 col-md-3">
        {PHP.L.inway_datvisit}
    </div>
    <div class="col-4">
        {FDAT}
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-4 col-md-3">
        {PHP.L.inway_stars}
    </div>
    <div class="col">
        <div id="reviewStars-input">
            <input id="star-4" type="radio" value="5" name="rstars"<!-- IF {FSTARS} == 5 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_verygood}" for="star-4"></label>

            <input id="star-3" type="radio" value="4" name="rstars"<!-- IF {FSTARS} == 4 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_good}" for="star-3"></label>

            <input id="star-2" type="radio" value="3" name="rstars"<!-- IF {FSTARS} == 3 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_norm}" for="star-2"></label>

            <input id="star-1" type="radio" value="2" name="rstars"<!-- IF {FSTARS} == 2 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_poor}" for="star-1"></label>

            <input id="star-0" type="radio" value="1" name="rstars"<!-- IF {FSTARS} == 1 --> checked<!-- ENDIF --> />
            <label title="{PHP.L.claims_rating_bad}" for="star-0"></label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        {PHP.L.inway_yourcomment}
    </div>
</div>
<div class="row">
    <div class="col">
    {FEDITOR}
    </div>
</div>
<div class="row">
    <div class="col">
            <input type="submit" value="{PHP.L.Save}" class="aslink mt-3"/>
            <a class="ajax ml-3 mt-3"  href="{FCANSEL}" rel="get-comments">{PHP.L.Cancel}</a>

    </div>
</div>
</form>
<script type="text/javascript">
    $(function(){
        $('#rdat').datepicker();
    });
</script>
<!-- END:FORM -->
<!-- BEGIN:BUTTON -->
<a class="ajax" href="{BUT_URL}" rel="get-comments">{PHP.L.inway_addcomment}</a>
<!-- END:BUTTON -->
<!-- BEGIN:SAVED -->
<p>{PHP.L.inway_commentadded}</p>
<script type="text/javascript">
    $(function () {
        window.location="{URL_REFRESH}";
    });
</script>
<!-- END:SAVED -->