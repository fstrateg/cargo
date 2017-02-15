<!-- BEGIN: MAIN -->

<div class="breadcrumb">{PHP.L.projects_edit_project_title}</div>

{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
<div class="customform">
	<form action="{PRJEDIT_FORM_SEND}" method="post" name="edit" enctype="multipart/form-data">
		<table class="table">
			<!-- IF {PHP.projects_types} -->
			<tr>
				<td>{PHP.L.Type}:</td>
				<td>{PRJEDIT_FORM_TYPE}</td>
			</tr>
			<!-- ENDIF -->
            <tr>
                <td width="150">{PHP.L.projects_begin}
                    <p class="small">{PHP.L.projects_actual}</p>
                </td>
                <td>{PRJEDIT_FORM_FROM}</td>
            </tr>
            <tr>
                <td>{PHP.L.projects_end}<p class="small">{PHP.L.projects_actual}{TEST}</p></td>
                <td>{PRJEDIT_FORM_TO}</td>
            </tr>
			<tr>
				<td width="150">{PHP.L.Category}:</td>
				<td>{PRJEDIT_FORM_CAT}</td>
			</tr>		
			<tr>
				<td>{PHP.L.LocationFrom}:</td>
				<td>{PRJEDIT_FORM_LOCATION}</td>
			</tr>
			<tr>
				<td>{PHP.L.LocationTo}:</td>
				<td>{PRJEDIT_FORM_LOCATIONTO}</td>
			</tr>
			<tr>
				<td>{PHP.L.CargoTyp}:</td>
				<td>{PRJEDIT_FORM_TITLE}</td>
			</tr>
			<tr>
				<td>{PHP.L.projects_cnt}</td>
				<td>{PRJEDIT_FORM_COUNT}</td>
			</tr>
			<tr>
				<td>{PHP.L.projects_vol}</td>
				<td><div class="input-append">{PRJEDIT_FORM_VOL}<span class="add-on">{PHP.L.projects_m3}</span></div></td>
			</tr>
			<tr>
				<td>{PHP.L.projects_massa}</td>
				<td><div class="input-append">{PRJEDIT_FORM_MASSA}<span class="add-on">{PHP.L.projects_ton}</span></div></td>
			</tr>
			<tr<!-- IF !{PHP.usr.isadmin} --> class="hidden"<!-- ENDIF -->>
				<td>{PHP.L.Alias}:</td>
				<td>{PRJEDIT_FORM_ALIAS}</td>
			</tr>
			<tr<!-- IF !{PHP.usr.isadmin} --> class="hidden"<!-- ENDIF -->>
				<td align="right">{PHP.L.Parser}:</td>
				<td>{PRJEDIT_FORM_PARSER}</td>
			</tr>
			<!-- BEGIN: TAGS -->
			<tr>
				<td>{PRJEDIT_FORM_TAGS_TITLE}:</td>
				<td>{PRJEDIT_FORM_TAGS} ({PRJEDIT_FORM_TAGS_HINT})</td>
			</tr>
			<!-- END: TAGS -->
			<tr>
				<td>{PHP.L.projects_price}:</td>
				<td><div class="input-append">{PRJEDIT_FORM_COST}<span class="add-on">{PHP.cfg.payments.valuta}</span></div></td>
			</tr>
			<!-- IF {PHP.cot_plugins_active.mavatars} -->
			<tr>
				<td>{PHP.L.Files}:</td>
				<td>{PRJEDIT_FORM_MAVATAR}</td>
			</tr>
			<!-- ENDIF -->
			<!-- IF {PHP.cot_plugins_active.paypro} -->
			<tr>
				<td>{PHP.L.paypro_forpro}:</td>
				<td>
					{PRJEDIT_FORM_FORPRO}
				</td>
			</tr>
			<!-- ENDIF -->
			<!-- IF {PHP.usr.isadmin} -->
			<tr>
				<td>{PHP.L.Delete}</td>
				<td>{PRJEDIT_FORM_DELETE}</td>
			</tr>
			<!-- ENDIF -->
			<tr>
				<td class="top">{PHP.L.Notes}:</td>
				<td>{PRJEDIT_FORM_TEXT}</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button type="submit" class="btn btn-info"><i class="icon-download icon-white"></i> {PHP.L.projects_next}</button>
				</td>
			</tr>
		</table>
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