<!-- BEGIN: MAIN -->
<ul class="nav nav-list">
    <li><a href="{HREF}">{PHP.L.All}</a></li>
    <!-- BEGIN: ROWS -->
    <li<!-- IF {ROW_SELECTED} --> class="active"<!-- ENDIF -->><a href="{ROW_HREF}">{ROW_TITLE} ({ROW_COUNT})</a>
    </li>
    <!-- END: ROWS -->
</ul>
<!-- END: MAIN -->