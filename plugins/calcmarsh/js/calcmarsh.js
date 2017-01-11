var fff={
	cn:2,
	init:function(){
		document.point1=new Place('point1');
		document.point2=new Place('point2');
		document.dd = new google.maps.DirectionsRenderer();

		var mapOptions = {
					zoom: 5,
					center: new google.maps.LatLng(48, 68),
					scrollwheel: false
			};
		document.map = new google.maps.Map(document.getElementById('map-canvas'),
		mapOptions);
		document.dd.setMap(document.map);
	},
	hidden:function(){
		var vl=$('.remove');
		if (vl.length==2)
			vl.addClass('hidden');
		else
			vl.removeClass('hidden');
	},
	addpoint:function(){
		fff.cn++;
		$('tr.addPoint').before('<tr class="id'+fff.cn+'"><td class="point"></td><td><input id="point'+fff.cn+'" name="points[]" size="50"/> <a class="remove btn btn-warning" onclick="fff.remove('+fff.cn+')">x</a></td></tr><tr class="id'+fff.cn+'"><td colspan="2" class="distance">&nbsp;</td></tr>');
		document['point'+fff.cn]=new Place('point'+fff.cn);
		fff.hidden();
	},
	remove:function(id){
		$('tr.id'+id).remove();
		document['point'+id]=null;
		fff.hidden();
	},
	calc:function(){
		var el=document.forms.distance.elements;
		var i,id;
		var waypts=[],vl=[];
		for(var n=0;n<el.length-1;n++)
		{
			id=el[n].id;
			if (!(id&&id.length>5&&id.indexOf("point")==0)) continue;
			vl.push(el[n]);
		}
		for(var n=1;n<vl.length-1;n++)
			{
				id=vl[n].id;
				waypts.push({
					location:vl[n].value,
					stopover:true
				});
			}
		var request = {
			origin: vl[0].value,
			destination: vl[vl.length-1].value,
            waypoints: waypts,
			optimizeWaypoints: true,
			travelMode: google.maps.TravelMode.DRIVING
			};
		var directionsService = new google.maps.DirectionsService();
		directionsService.route(request, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			document.dd.setDirections(response);
			fff.total(response,vl);
			}
		});

	},
	total:function (result,vl) {
		var total = 0;
		var id;
		var myroute = result.routes[0];
		var speed=parseInt($('#speed').val());
		if (!speed)
		{
			alert('Скорость движения фуры не задана!');
			return;
		}
		for (i = 0; i < myroute.legs.length; i++) {
			id=vl[i].id.replace('point','');
			$('tr.id'+id+' td.point').html('<img src="/images/point.png" />');
			$('tr.id'+id+' td.distance').html('<span></span> '+myroute.legs[i].distance.text);
			total += myroute.legs[i].distance.value;
		}
		id=vl[i].id.replace('point','');
			$('tr.id'+id+' td.point').html('<img src="/images/point.png" />');
		total = Math.round(total / 1000);
		var html='<div class="out">Расстояние между пунктами '+'<b>'+vl[0].value+' - '+vl[vl.length-1].value+' ~ '+total + " км</b></br>";
		html+='Среднее время в пути <b>~ '+Math.round(total/speed)+'ч </b></div>';
		document.getElementById("itog").innerHTML = html;
	},
	test:function(){
		alert('test'+fff.cn);
	}
}
