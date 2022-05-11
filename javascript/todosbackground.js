const changeBackground = document.querySelector(".new-background");
setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/mudarbackground.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          changeBackground.innerHTML = data;     
        }
    }
  }
  xhr.send();
}, 500);