
    jQuery(document).ready(function(){ 
        jQuery("#map_contact").gMap({ zoom: 16, markers: [ { latitude: '40.724755', longitude: '-74.0107', html: "Altair Travel Agency", popup: true } ], mapTypeControl: false, zoomControl: false, scrollwheel: false, maptype: google.maps.MapTypeId.ROADMAP });
    });