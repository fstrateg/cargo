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
}