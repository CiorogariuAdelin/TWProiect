document.getElementById("cancelUser").addEventListener("click", function() {
  document.getElementById("usernamechange").style.display = "none";
});
document.getElementById("UserShow").addEventListener("click", function() {
  document.getElementById("usernamechange").style.display = "block";
});
document.getElementById("cancelMail").addEventListener("click", function() {
  document.getElementById("emailchange").style.display = "none";
});
document.getElementById("MailEdit").addEventListener("click", function() {
  document.getElementById("emailchange").style.display = "block";
});
document.getElementById("CancelPass").addEventListener("click", function() {
  document.getElementById("passwordchange").style.display = "none";
});
document.getElementById("ChangePW").addEventListener("click", function() {
  document.getElementById("passwordchange").style.display = "block";
});
document.getElementById("upw").addEventListener("click", function() {
	var inp = document.getElementById('upwlabel');
	var icon = document.getElementById('upw');
   if (inp.type === "password") {
    inp.type = "text";
	icon.className="fa fa-eye-slash";
  } else {
    inp.type = "password";
	icon.className="fa fa-eye";
  }
});
document.getElementById("epw").addEventListener("click", function() {
	var inp = document.getElementById('epwlabel');
	var icon = document.getElementById('epw');
   if (inp.type === "password") {
    inp.type = "text";
	icon.className="fa fa-eye-slash";
  } else {
    inp.type = "password";
	icon.className="fa fa-eye";
  }
});
document.getElementById("ppw1").addEventListener("click", function() {
	var inp = document.getElementById('ppwlabel1');
	var icon = document.getElementById('ppw1');
   if (inp.type === "password") {
    inp.type = "text";
	icon.className="fa fa-eye-slash";
  } else {
    inp.type = "password";
	icon.className="fa fa-eye";
  }
});
document.getElementById("ppw2").addEventListener("click", function() {
	var inp = document.getElementById('ppwlabel2');
	var icon = document.getElementById('ppw2');
   if (inp.type === "password") {
    inp.type = "text";
	icon.className="fa fa-eye-slash";
  } else {
    inp.type = "password";
	icon.className="fa fa-eye";
  }
});