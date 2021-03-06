<!-- BEGIN: MAIN -->
<h2 class="users">{CALC_TITLE}</h2>
<div id="content">
<form name="distance" id="distance">

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
                    <div class="form-group row">
                        <div class="col-12 col-md-4">{PHP.L.calc_fura_speed} </div>
                        <div class="col-12 col-md-4">
                            <div class="input-group">
                                <input type="number" name="speed" value="0" class="form-control"/>
                                <div class="input-group-append">
                                <span class="input-group-text">{PHP.L.calc_speed}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-md-4">{PHP.L.calc_fura_fuel} </div>
                        <div class="col-12 col-md-4">
                            <div class="input-group">
                                <input type="number" id="fuel" name="fuel" value="0" class="form-control"/>
                                <div class="input-group-append">
                                <span class="input-group-text">{PHP.L.calc_fuelex}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-md-4">{PHP.L.calc_fura_fuelcost}</div>
                        <div class="col-12 col-md-4">
                            <div class="input-group">
                            <input type="number" id="cost" name="cost" value="0" class="form-control"/>
                                <div class="input-group-append">
                                <span class="input-group-text">{PHP.L.calc_fuelcost}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"><a class="btn btn-success" style="margin-top: 20px" onclick="fff.calc()" href="javascript: void(0)">{PHP.L.calc_calculate}</a></div>
                    </div>
                </td>
            </tr>
        </table>
</form>
<div class="row"><div class="col"><div id="itog"></div></div></div>
<div class="row"><div class="col">
    <div id="map-canvas" style="height:700px;"></div>
</div></div>
</div>
<script type="text/javascript">
    $('#addPoint').click(fff.addpoint);
    fff.init();
</script>
<!-- END: MAIN -->
