const form = document.querySelector('.form form');
const submitbtn = form.querySelector('.submit input');
const errortxt = form.querySelector('.error-text');

form.onsubmit = (e) => {
  e.preventDefault(); // stops the default action
}

submitbtn.onclick = () => {
  // start ajax

  let xhr = new XMLHttpRequest(); // create xml object
  xhr.open("POST","./Php/login.php",true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.responseText;
        if (data.trim() === "success") {
          let popup = document.createElement('div');
          popup.textContent = 'Login successful!';
          popup.style.background = 'green';
          popup.style.color = 'white';
          popup.style.padding = '10px';
          popup.style.position = 'fixed';
          popup.style.top = '50%';
          popup.style.left = '50%';
          popup.style.transform = 'translate(-50%, -50%)';
          document.body.appendChild(popup);
          setTimeout(() => {
            popup.remove();
            location.href = "lindex.php";
          }, 3000);
        } else {
          errortxt.textContent = data;
          errortxt.style.display = "block";
        }
      }
    }
  }
  // send data through ajax to php
  let formData = new FormData(form); //creating new object from form data
  xhr.send(formData);  //sending data to php
}
