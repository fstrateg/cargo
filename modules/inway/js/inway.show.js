function MapWrapper() {
    var _this = this;
    this.map=null;
    this.setMarker=null;

    this.init = function() {
        var lat=$('#rform input[name="rlat"]').val();
        var long=$('#rform input[name="rlong"]').val();
        if (_this.map == null) {
            var mapOptions = {
                zoom: 10,
                center: new google.maps.LatLng(lat, long),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: true
            };
            _this.map = new google.maps.Map(document.getElementById('formap'),
                mapOptions);
            _this.setMarker = new google.maps.Marker({
                map: _this.map,
                draggable: false,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng(lat, long)
            });
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
                    map: _this.map
                });

                var infoWindow = new google.maps.InfoWindow();
                var html='<strong>'+name+'</strong.>';
                google.maps.event.addListener(marker, 'click', function() {
                    infoWindow.setContent(html);
                    infoWindow.open(_this.map, marker);
                });
            });
        });
    }
}