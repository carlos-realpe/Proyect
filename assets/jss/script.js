/* SCRIPT DEWL MAPA*/

function iniciarMap(){
 
//var coords = {lat: -33.61 ,lng: -63.61};

//if (navigator.geolocation){
  //  navigator.geolocation.getCurrentPosition((position)=>{

// const coords = {lat: position.coords.latitude, lng:position.coords.longitude, };
 

 var map = new google.maps.Map(document.getElementById('map'),{
    zoom:12,
    center: new google.maps.LatLng(-2.188832002,-79.8936902),
});

var marker = new google.maps.Marker({
    map: map,
    draggable: true,
    position: new google.maps.LatLng(-2.188832002,-79.8936902),
});


marker.addListener('dragend',function(event){
    document.getElementById("latitud").value = this.getPosition().lat();
    document.getElementById("longitud").value = this.getPosition().lng();
map.panTo(event.latLng);
});
map.setCenter(marker.position);
marker.setMap(map);

  //},() =>{
    //alert("Hubo un error interno al obtener los datos");
  //  })
   
//}else{ alert("Su navegador no dispone de geolocalizacion, porfavor actualizarlo");}


}



function mapaConsulta(){
    
  
    latitud=document.getElementById("latitud").value;
    longitud=document.getElementById("longitud").value;
    
 

  //  if (navigator.geolocation){
   //   navigator.geolocation.getCurrentPosition((position)=>{
      //const coords = {lat:  position.coords.latitude, lng:position.coords.longitude };
//console.log(latitud);
    
     var map = new google.maps.Map(document.getElementById('map'),{
        zoom:15,
        center: new google.maps.LatLng(latitud,longitud),
    });
    
    var marker = new google.maps.Marker({
        map: map,   
        draggable: false,
        position:  new google.maps.LatLng(latitud,longitud),
    });
    
    
   
    // },() =>{
   //     alert("Hubo un error interno al obtener los datos");
   //     })
       
  //}else{ alert("Su navegador no dispone de geolocalizacion, porfavor actualizarlo");}
    
    
    }
    

function mapaConsultaEditar() {


  latitud = document.getElementById("latitud").value;
  longitud = document.getElementById("longitud").value;



  //  if (navigator.geolocation){
  //   navigator.geolocation.getCurrentPosition((position)=>{
  //const coords = {lat:  position.coords.latitude, lng:position.coords.longitude };
  //console.log(latitud);

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: new google.maps.LatLng(latitud, longitud),
  });

  var marker = new google.maps.Marker({
    map: map,
    draggable: true,
    position: new google.maps.LatLng(latitud, longitud),
  });

  marker.addListener('dragend', function (event) {
    document.getElementById("latitud").value = this.getPosition().lat();
    document.getElementById("longitud").value = this.getPosition().lng();
    map.panTo(event.latLng);
  });
  map.setCenter(marker.position);
  marker.setMap(map);


  // },() =>{
  //     alert("Hubo un error interno al obtener los datos");
  //     })

  //}else{ alert("Su navegador no dispone de geolocalizacion, porfavor actualizarlo");}


}
    
    