<!-- BEGIN: MAIN -->
<h2 class="users">{CALC_TITLE}</h2>
<form name="distance" id="distance">
    <div id="distance">
        <table>
            <tr class="id1">
                <td class="point"></td>
                <td><input id='point1' size="50" name="points[]"/> <a class="remove btn btn-warning hidden" onclick="fff.remove(1)">x</a></td>
            </tr>
            <tr class="id1">
                <td colspan="2" class="distance">&nbsp;</td>
            </tr>
            <tr class="id2">
                <td class="point"></td>
                <td><input id='point2' size="50" name="points[]"/> <a class="remove btn btn-warning hidden" onclick="fff.remove(2)">x</a></td>
            </tr>
            <tr class="id2">
                <td colspan="2" class="distance">&nbsp;</td>
            </tr>
            <tr class="point addPoint">
                <td></td>
                <td><a id="addPoint" class="btn btn-success" href="javascript: void(0)">{PHP.L.calc_addpunct}</a></td>
            </tr>
            <tr class="calc">
                <td></td>
                <td class="calc">
                    <span style="float:left">{PHP.L.calc_fura_speed}</span> <input id="speed" size="5" name="speed" value="20"/>
                    <a class="btn btn-success" onclick="fff.calc()">{PHP.L.calc_calculate}</a>
                </td>
            </tr>
        </table>
    </div>
</form>
<div id="itog"></div>
<div id="map-canvas" style="height:700px;"></div>
<script type="text/javascript">
    $('#addPoint').click(fff.addpoint);
    fff.init();
</script>
<!-- END: MAIN -->
