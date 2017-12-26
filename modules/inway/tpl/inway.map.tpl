<!-- BEGIN:MAIN -->
{PHP.L.inway_city}:
<input id="adress" name="address" type="text" value="" size="50"/>
<a id="city_ok" class="btn btn-success" style="margin-bottom: 10px;">OK</a>
<div id="formap" style="width: 100%; height: 700px;">

    </div>
<form id="rform">
    {FRM_LAT}
    {FRM_LONG}
    {FRM_NAME}
</form>
<script type="text/javascript">
    $().ready(function () {
        var mapWrapper = new MapWrapper();
        mapWrapper.init();
        mapWrapper.loadData('{FRM_URL_DATA}');
        var combo=new ComboWrapper();
        combo.init(mapWrapper.map);
    });
</script>
<!-- END:MAIN -->