<!-- BEGIN:MAIN -->
<div id="formap" style="width: 100%; height: 700px;">

    </div>
<form id="rform">
    {FRM_LAT}
    {FRM_LONG}
</form>
<script type="text/javascript">
    $().ready(function () {
        var mapWrapper = new MapWrapper();
        mapWrapper.init();
        mapWrapper.loadData('{FRM_URL_DATA}');
    });
</script>
<!-- END:MAIN -->