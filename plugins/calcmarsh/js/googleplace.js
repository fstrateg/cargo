function Place(id)
{
	 this.id=id;
	 var input=document.getElementById(id);
	 $('#'+id).attr("tmpVl",input.value);

	input.onblur=function()
	{
		setTimeout(function(){input.value=$('#'+id).attr("tmpVl");},1000);
	
	}
	var place=this;
	var complit=new google.maps.places.Autocomplete(
			input, 
			{types: ['(cities)']});
	//,componentRestrictions: {country: 'kz'}
	google.maps.event.addListener(complit, 'place_changed', function(){place.getplace(complit.getPlace());});
	
};

Place.prototype.getplace=function(result)
{
	place=this;
	if(typeof result.address_components == 'undefined') {
        // The user pressed enter in the input 
        autocompleteService = new google.maps.places.AutocompleteService();
		//'componentRestrictions': {'country': 'kz'},
                
        autocompleteService.getPlacePredictions(
            {
                'input': result.name,
                'offset': result.name.length,
                'types': ['(cities)']
            },
            function listentoresult(list, status) {
                if(list == null || list.length == 0) {
                	$('#'+this.id).attr("tmpVl",'');
                } else {
                    placesService = new google.maps.places.PlacesService(document.getElementById('autocomplit'));
                    placesService.getDetails(
                        {'reference': list[0].reference},
                        function detailsresult(detailsResult, placesServiceStatus) {
                        	place.setValue(detailsResult);
                        }
                    );
                }
            }
        );
    } else {
    	place.setValue(result);
    }
};

Place.prototype.setValue=function(result)
{
	var rez="", rz="";
	var types=["locality","administrative_area_level_1","country"];
	for(i=0;i<result.address_components.length;i++)
		if (types.indexOf(result.address_components[i].types[0])>=0)
			if (result.address_components[i].types[0]=="country")
			{rez+=rz+result.address_components[i].short_name;rz=", ";}
			else
			{rez+=rz+result.address_components[i].long_name;rz=", ";}
	$('#'+this.id).attr("tmpVl",rez);
}