var WPSL_SearchHistoryMap=function(o,e){var n=this,t=jQuery;return n.locations=o,n.container=e,n.bindEvents=function(){t("[data-wpsl-history-per-page]").on("change",function(){t(this).parents("form").submit()})},n.loadmap=function(){var o,e,t=wpsl_locator_searchhistory.mapstyles,a=wpsl_locator_searchhistory.mappin?wpsl_locator_searchhistory.mappin:"",r=new google.maps.LatLngBounds,s=n.locations,i={mapTypeId:"roadmap",mapTypeControl:!1,zoom:8,styles:t,panControl:!1},p=new google.maps.InfoWindow,c=new google.maps.Map(document.getElementById(n.container),i);for(e=0;e<s.length;e++){var l=new google.maps.LatLng(s[e].latitude,s[e].longitude);r.extend(l);var o=new google.maps.Marker({position:l,map:c,title:s[e].search_term,icon:a});s[e].infowindow="<h4>"+s[e].date+"</h4>",s[e].infowindow+="<p>",s[e].infowindow+=wpsl_locator_searchhistory.searchTerm+": "+s[e].search_term,s[e].infowindow+="<br>"+wpsl_locator_searchhistory.searchTermFormatted+": "+s[e].search_term_formatted,s[e].infowindow+="<br>"+wpsl_locator_searchhistory.userIp+": "+s[e].user_ip,s[e].infowindow+="<br>"+wpsl_locator_searchhistory.distance+": "+s[e].distance,s[e].infowindow+="</p>",google.maps.event.addListener(o,"click",function(o,e){return function(){p.setContent(s[e].infowindow),p.open(c,o)}}(o,e)),c.fitBounds(r);var d=google.maps.event.addListener(c,"idle",function(){s.length<2&&c.setZoom(13),google.maps.event.removeListener(d)})}var m=google.maps.event.addListener(c,"bounds_changed",function(o){google.maps.event.removeListener(m)})},n.bindEvents()};