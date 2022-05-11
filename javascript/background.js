const form = document.querySelector("form");
const enviarBtn = form.querySelector(".buttonBackground");

form.onsubmit = (e)=>{
  e.preventDefault();
}

enviarBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/enviarbackground.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
          }
        }
      }
    let formData = new FormData(form);
    xhr.send(formData);
}

const setBackground = document.querySelector(".show-background");
setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/mostrarbackground.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          setBackground.innerHTML = data;     
        }
    }
  }
  xhr.send();
}, 500);


