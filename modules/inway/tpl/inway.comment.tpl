<!-- BEGIN:FORM -->
<div class="row">
    <div class="span2">
        {PHP.L.inway_datvisit}
    </div>
    <div class="span2">
        dat
    </div>
</div>
<div class="row">
    <div class="span2">
        {PHP.L.inway_stars}
    </div>
    <div class="span2">
        inway_stars
    </div>
</div>
<div class="row">
    <div class="span2">
        {PHP.L.inway_yourcomment}
    </div>
</div>
<div class="row">
    <div class="span12">
    {FEDITOR}
    </div>
</div>

<div class="span1">
    <a class="ajax" href="{FSAVE}" rel="get-comments">{PHP.L.Save}</a>
</div>
<div class="span1">
    <a class="ajax" href="{FCANSEL}" rel="get-comments">{PHP.L.Cancel}</a>
</div>
<!-- END:FORM -->
<!-- BEGIN:BUTTON -->
<a class="ajax" href="/index.php?e=inway&m=comment&a=form" rel="get-comments">{PHP.L.inway_addcomment}</a>
<!-- END:BUTTON -->