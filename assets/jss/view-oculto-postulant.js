//  btnAbrirpup = document.querySelector(".vermas-soli"),
var overly= document.getElementById('overlai'),
    popup=document.getElementById('popup'),
    btnCerrarpup= document.getElementById('btn-cerrar');


$(document).on('click', '.vermas-soli', function(){
    overly.classList.add('active2');
    popup.classList.add('active2');
  

  });




  btnCerrarpup.addEventListener('click', function(){
    overly.classList.remove('active2');
    popup.classList.remove('active2');
});

// btnAbrirpup.addEventListener('click', function(){
//     overly.classList.add('active2');
//     popup.classList.add('active2');

// });

  // $('#denegar-soli').bind('dblclick', function(){
  //  $('#prueba').html("ola");
  //   });
