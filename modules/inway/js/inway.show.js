function MapWrapper() {
    var _this = this;
    this.map=null;
    this.setMarker=null;

    this.init = function() {
        var lat=$('#rform input[name="rlat"]').val();
        var long=$('#rform input[name="rlong"]').val();
        var name=$('#rform input[name="rname"]').val();
        if (lat==null) lat=43.2173823;
        if (long==null) long=76.6639575;
        if (_this.map == null) {
            var mapOptions = {
                zoom: 10,
                center: new google.maps.LatLng(lat, long),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: true
            };
            _this.map = new google.maps.Map(document.getElementById('formap'),
                mapOptions);
            if (name!=null)
            {
            _this.setMarker = new google.maps.Marker({
                map: _this.map,
                draggable: false,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng(lat, long),
                icon: '/images/green-dot.png'
            });
            _this.addInfo(_this.setMarker,name);
            }
        }
    }

    this.loadData = function(url){
        $.get(url, function(xml){
            $(xml).find("marker").each(function(){
                var name = $(this).find('name').text();
                var lat = $(this).find('lat').text();
                var lng = $(this).find('long').text();
                var point = new google.maps.LatLng(parseFloat(lat),parseFloat(lng));

                var marker = new google.maps.Marker({
                    position: point,
                    map: _this.map,
                    icon: '/images/red-dot.png'
                });

                _this.addInfo(marker,name);
            });
        });
    }

    this.addInfo=function(marker,name)
    {
        var infoWindow = new google.maps.InfoWindow();
        var html='<strong>'+name+'</strong.>';
        google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(_this.map, marker);
        });
    }

}

function ComboWrapper()
{
    var _this=this;
    this.map=null;
    this.geocoder=null;

    this.init=function(map)
    {
        _this.map=map;
        _this.autocomplete = new google.maps.places.Autocomplete(document.getElementById('adress'));
        if (_this.geocoder == null) {
            _this.geocoder = new google.maps.Geocoder();
        }
        $("#city_ok").unbind("click");
        $("#adress").unbind("keypress");
        $("#city_ok").click(function ()
        {
            _this.setMapToCity();
        });
        $("#adress").keypress(function(e)
        {
            if (e.which==13) _this.setMapToCity();
        });
    }
    //Установить карту на город
    this.setMapToCity = function () {
        var address = $("#adress").attr("value");

        _this.geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                _this.map.setCenter(results[0].geometry.location);
                //установить Zoom таким образом, чтобы город был показан весь
                _this.map.setZoom(10);
            } else {
                alert("Пошло что-то не так, потому что: " + status);
            }
        });
    }
}