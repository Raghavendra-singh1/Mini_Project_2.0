const firebaseConfig = {
    apiKey: "AIzaSyC2XgwcS6KWmkl9RPvl89E5CC_vHmKCwWM",
    authDomain: "form-data-315e3.firebaseapp.com",
    databaseURL: "https://form-data-315e3-default-rtdb.firebaseio.com",
    projectId: "form-data-315e3",
    storageBucket: "form-data-315e3.appspot.com",
    messagingSenderId: "874417207699",
    appId: "1:874417207699:web:627a39e93475cfd35ad066"
  };

  // initialize firebase
firebase.initializeApp(firebaseConfig);

// reference your database
var contactFormDB = firebase.database().ref("contactForm");

document.getElementById("contactForm").addEventListener("submit", submitForm);

function submitForm(e) {
    e.preventDefault();
    var name = getElementVal("name");
  var emailid = getElementVal("emailid");
  var msgContent = getElementVal("msgContent");
  var subject=getElementVal("subject");

  saveMessages(name, emailid, msgContent,subject);

  //   enable alert
  document.querySelector(".alert").style.display = "block";

  //   remove the alert
  setTimeout(() => {
    document.querySelector(".alert").style.display = "none";
  }, 3000);

  //   reset the form
  document.getElementById("contactForm").reset();
}

const saveMessages = (name, emailid, msgContent,subject) => {
  var newContactForm = contactFormDB.push();

  newContactForm.set({
    name: name,
    emailid: emailid,
    msgContent: msgContent,
    subject:subject,
  });
};

const getElementVal = (id) => {
  return document.getElementById(id).value;
};
