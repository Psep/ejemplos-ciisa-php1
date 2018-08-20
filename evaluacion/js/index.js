// carga categorias
var request = new XMLHttpRequest();
request.open('GET', 'http://localhost/services/CategoriaService.php?action=retrieve', true);

request.onload = function() {
  if (request.status == 200) {
    // Success!
    var jsonList = JSON.parse(request.responseText);
    var div = '';
    var olIndicadores = '';

    for (var i in jsonList) {
      var nombre = jsonList[i].nombre;
      var descripcion = jsonList[i].descripcion;
      var imagen = jsonList[i].imagen;
      var url = jsonList[i].url;

      if (i == 0) {
        div += '<div class="carousel-item active">';
        olIndicadores += '<li data-target="#carouselExampleIndicators" data-slide-to="' + i + '" class="active"></li>';
      } else {
        div += '<div class="carousel-item">';
        olIndicadores += '<li data-target="#carouselExampleIndicators" data-slide-to="' + i + '"></li>';
      }

      div += '<img class="d-block w-100 carousel-img" src="data:image/jpeg;base64,' + imagen + '" alt="First slide">';
      div += '<div class="carousel-caption">';
      div += '<h5>' + nombre + '</h5>';
      div += '<p>' + descripcion + '</p>';
      //div += '<a href="nuestrosplatos.html#' + url +'" class="btn btn-outline-light btn-sm">';
      div += '<a href="nuestrosplatos.html" class="btn btn-outline-light btn-sm">';
      div += 'Ver nuestros platos';
      div += '</a>';
      div += '</div>';
      div += '</div>';
    }

    document.getElementById("categorias").innerHTML = div;
    document.getElementById("categorias-indicadores").innerHTML = olIndicadores;

  } else {
    alert('Error al consultar las categorías.');
  }
};

request.onerror = function() {
  alert('Error al consultar las categorías.');
};

request.send();
