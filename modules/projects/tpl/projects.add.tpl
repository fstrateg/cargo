<!-- BEGIN: MAIN -->

<div class="bcrups">{PHP.L.projects_add_project_title}</div>

{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div id="content">
	<form action="{PRJADD_FORM_SEND}" method="post" name="newadv" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.projects_begin}:
                <p class="small text-muted">{PHP.L.projects_actual}</p>
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {PRJADD_FORM_FROM}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.projects_end}:
                <p class="small text-muted">{PHP.L.projects_actual}</p>
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {PRJADD_FORM_TO}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.Category}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {PRJADD_FORM_TRANSP}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.LocationFrom}:
            </div>
            <div class="col-12 col-sm-8">
            {PRJADD_FORM_LOCATION}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.LocationTo}:
            </div>
            <div class="col-12 col-sm-8">
            {PRJADD_FORM_LOCATIONTO}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.CargoTyp}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {PRJADD_FORM_TITLE}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.projects_frt}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
                <div class="form-check form-check-inline">
                    {PRJADD_FORM_FRT}
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.projects_cnt}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
            {PRJADD_FORM_COUNT}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.projects_vol}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
                <div class="input-group">{PRJADD_FORM_VOL}
                    <div class="input-group-append">
                    <span class="input-group-text">{PHP.L.projects_m3}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.projects_massa}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
                <div class="input-group">{PRJADD_FORM_MASSA}
                    <div class="input-group-append">
                        <span class="input-group-text">{PHP.L.projects_ton}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-4">
            {PHP.L.projects_price}:
            </div>
            <div class="col-12 col-sm-8 col-md-4">
                <div class="input-group">{PRJADD_FORM_COST}
                    <div class="input-group-append">
                        <span class="input-group-text">{PHP.cfg.payments.valuta}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
            {PHP.L.Notes}:
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
            {PRJADD_FORM_TEXT}
            </div>
        </div>
        <div class="form-group row">
            <div class="col">
            <button type="submit" class="btn btn-info"><i class="icon-download icon-white"></i> {PHP.L.projects_next}</button>
            </div>
        </div>
	</form>
</div>
<script type="text/javascript" src="{PHP.cfg.modules_dir}/projects/js/jquery-ui.min.js">
</script>
<script>

    $( function() {
        $('#date_from').datepicker().on( "change", function() {
            $('#date_to').datepicker( "option", "minDate", getDate( this ) );
        });
        $('#date_to').datepicker().on( "change", function() {
            $('#date_from').datepicker( "option", "maxDate", getDate( this ) );
        });
        jQuery(function ($) {
            $.datepicker.regional['ru'] = {
                closeText: 'Закрыть',
                prevText: '&#x3c;Пред',
                nextText: 'След&#x3e;',
                currentText: 'Сегодня',
                monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
                    'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                monthNamesShort: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
                    'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
                dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
                dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
                weekHeader: 'Нед',
                dateFormat: 'dd.mm.yy',
                firstDay: 1,
                isRTL: false,
                changeMonth: true,
                changeYear: true,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['ru']);
            $('#date_from').trigger("change");
            $('#date_to').trigger("change");
        });
        function getDate( element ) {
            var date;
            try {
                date = $.datepicker.parseDate( 'dd.mm.yy', element.value );
            } catch( error ) {
                date = null;
            }

            return date;
        }
    });
</script>
<!-- END: MAIN -->