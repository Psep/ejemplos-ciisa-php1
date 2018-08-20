// carga platos
var request = new XMLHttpRequest();
request.open('GET', 'http://localhost/services/PlatoService.php?action=retrieve', true);

request.onload = function() {
  if (request.status == 200) {
    // Success!
    var jsonList = JSON.parse(request.responseText);
    var div = '';

    for (var i in jsonList) {
      var nombre = jsonList[i].nombre;
      var descripcion = jsonList[i].descripcion;
      var imagen = jsonList[i].imagen;
      var precio = jsonList[i].precio;
      var categoria = jsonList[i].categoria.nombre;

      div += '<div class="card mb-4 box-shadow">';
      div += '<div class="card-header">';
      div += '<h4 class="my-0 font-weight-normal">' + nombre + '</h4>';
      div += '</div>';
      div += '<div class="card-body">';
      div += '<h6 class="card-subtitle mb-2 text-muted">Precio: $' + precio + '</h6>';
      div += '<img class="img-thumbnail" src="data:image/jpeg;base64,' + imagen + '">';
      div += '<p class="card-text">' + descripcion + '</p>';
      div += '<p class="card-text">Categoria: ' + categoria + '</p>';
      div += '</div>';
      div += '<div class="card-footer">';
      div += '<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#compraSinModal">';
      div += 'Comprar';
      div += '</button>';
      div += '</div>';
      div += '</div>';
    }

    document.getElementById("platos").innerHTML = div;

  } else {
    alert('Error al consultar las categorías.');
  }
};

request.onerror = function() {
  alert('Error al consultar las categorías.');
};

request.send();
