function MapWrapper()
{
    var _this=this;
    this.geocoder=null;
    this.map=null;
    this.latLng=null;
    this.autocomplete=null;

    this.init = function()
    {
        //инициализируем Geocoder
        if (_this.geocoder == null) {
            _this.geocoder = new google.maps.Geocoder();
        }

        if (_this.map==null) {
            var mapOptions = {
                zoom: 5,
                center: new google.maps.LatLng(48, 68),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false
            };
            _this.map = new google.maps.Map(document.getElementById('formap'),
                mapOptions);
            _this.autocomplete = new google.maps.places.Autocomplete(document.getElementById('adress'));
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
    };

    this.addMarker = function () {
        if (_this.setMarker != null) {
            _this.setMarker.setMap(_this.map);
            _this.setMarker.setPosition(_this.map.getCenter());
        } else {
            _this.setMarker = new google.maps.Marker({
                map: _this.map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: _this.map.getCenter()
            });
            //при окончании перемещения маркера установить функцию
            google.maps.event.addListener(_this.setMarker, 'dragend', _this.markerPositionChanged);
        }
    }


    //Установить карту на город
    this.setMapToCity = function () {
        var address = $("#adress").attr("value");

        _this.geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                _this.map.setCenter(results[0].geometry.location);
                //установить Zoom таким образом, чтобы город был показан весь
                _this.map.setZoom(10);
                //и поставить маркет для отметки адреса
                _this.addMarker();
                $(".info-put-marker").show();
            } else {
                alert("Пошло что-то не так, потому что: " + status);
            }
        });
    }

    //получить координаты и информацию о местоположении
    this.markerPositionChanged = function () {
        var latlng = _this.setMarker.getPosition();
        _this.GetInfo(latlng);
    }

    //получение данных по
    this.GetInfo = function (latlng)
    {
        _this.geocoder.geocode({ 'latLng': latlng, 'language' : 'ru' }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                _this.map.setCenter(results[0].geometry.location);
                _this.SetAddresses(results);
            } else {
                alert("Пошло что-то не так, потому что: " + status);
            }
        });
    }

    this.SetAddresses= function(results)
    {
        var lat=results[0].geometry.location.lat();
        var lng=results[0].geometry.location.lng();
    }
}

function FormWrapper()
{
    var _this=this;
    var others=null;

    this.init=function()
    {
        if (_this.others==null)
        {
            var st=$('#list_other').val();
            if (st!=null) {
                _this.others = st.split(',');
                var i=$('form select[name=rtype]');
                i.change(_this.typechanged);
            }
        }
        $('#save').unbind('click');
        $('#save').click(_this.save);
    }
    this.save=function()
    {
        alert('save');
    }
    this.typechanged=function()
    {
        if (_this.others.indexOf(this.value)>=0)
            $("#val_other").show('blind');
        else
            $("#val_other").hide('blind');
    }
}