function loadLogin() {
  document.getElementById("frmLogin").className = "row";
  document.getElementById("frmCarrito").className = "rendered";
}

function loadCarrito() {
  document.getElementById("frmLogin").className = "rendered";
  document.getElementById("frmCarrito").className = "row";
}

var token = sessionStorage.getItem("token");

//TODO revisar
console.log(token);

if (token != null && token != "null") {
  loadCarrito();
} else {
  loadLogin();
}

document.getElementById("btn_login").onclick = login;
document.getElementById("btn_logout").onclick = logout;

function logout() {
  loadLogin();
  sessionStorage.setItem("token", null);
}

function validaFrm() {
  var a = document.getElementById("frm_user").validity.valid;
  var b = document.getElementById("frm_passwd").validity.valid;

  if (!a) {
    document.getElementById("frm_user").style = 'border-color: red';
  } else {
    document.getElementById("frm_user").style = '';
  }

  if (!b) {
    document.getElementById("frm_passwd").style = 'border-color: red';
  } else {
    document.getElementById("frm_passwd").style = '';
  }

  if (a && b) {
    return true;
  } else {
    return false;
  }
}

function login() {
  if (validaFrm()) {
    var username = document.getElementById("frm_user").value;
    var password = md5(document.getElementById("frm_passwd").value);
    var json = {"username":username, "password":password};
    var data = JSON.stringify(json);
    var request = new XMLHttpRequest();
    request.open('POST', 'http://localhost/services/LoginService.php', true);
    request.setRequestHeader('Content-Type', 'application/json');
    request.onload = function() {
      if (request.status == 200) {
        json = JSON.parse(request.responseText);

        if (json.codigo != 200) {
          alert(json.mensaje);
        } else {
          loadCarrito();
          sessionStorage.setItem("token", json.data);
        }
      }
    };

    request.onerror = function() {
      json = JSON.parse(request.responseText);
      alert(json.mensaje);
    };

    request.send(data);
  }
}
