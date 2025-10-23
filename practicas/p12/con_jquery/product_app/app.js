// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    // listarProductos();
}

// Conforme se vayan presionando teclas en la búsqueda
$(document).ready(function() {
  // Global Settings
  let edit = false;

  listarProductos();
  $('#product-result').hide();


  // search key type event
  $('#search').keyup(function() {
    if($('#search').val()) {
      let search = $('#search').val();
      $.ajax({
        url: './backend/product-search.php',
        data: {search},
        type: 'GET',
        success: function (response) {
          if(!response.error) {
            let products = JSON.parse(response);
            let template = '';
            let template_bar = '';
            let descripcion = '';
            products.forEach(product => {

                descripcion = '';
                descripcion += '<li>precio: '+product.precio+'</li>';
                descripcion += '<li>unidades: '+product.unidades+'</li>';
                descripcion += '<li>modelo: '+product.modelo+'</li>';
                descripcion += '<li>marca: '+product.marca+'</li>';
                descripcion += '<li>detalles: '+product.detalles+'</li>';
                
                template += `
                    <tr productId="${product.id}">
                        <td>${product.id}</td>
                        <td>${product.nombre}</td>
                        <td><ul>${descripcion}</ul></td>
                        <td>
                            <button class="product-delete btn btn-danger">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                `;
                template_bar += 
                    `
                     <li><a href="#" class="product-item">${product.nombre}</a></li>
                    `
            });
            $('#product-result').show();
            $('#container').html(template_bar);
            $('#products').html(template);
          }
        } 
      })
    }
  });

  $('#product-form').submit(e => {
    e.preventDefault();

    const productoJsonString = $('#description').val();
    const finalJSON = JSON.parse(productoJsonString);
    finalJSON.nombre = $('#name').val();

    const postData = JSON.stringify(finalJSON);

    const url = './backend/product-add.php';

    $.ajax({
      url: url,
      type: 'POST',
      data: postData,
      contentType: 'application/json',
      success: function(response) {

        // Respuesta en JSON
        let res;
        try {
          res = JSON.parse(response);
        } catch (e) {
          res = { status: 'error', message: 'Respuesta inválida del servidor' };
        }

        let template_bar = '';
            template_bar += 
                `
                <li style="list-style: none;">status: ${res.status}</li>
                <li style="list-style: none;">message: ${res.message}</li>
                `;
        console.log(template_bar);
        $('#product-result').show();

        // Se muestra el mensaje
        $('#container').html(template_bar);

        listarProductos();
      }
    });

  });

  // Fetching products
  function listarProductos() {
    $.ajax({
      url: './backend/product-list.php',
      type: 'GET',
      success: function(response) {
        const products = JSON.parse(response);
        let template = '';
        let descripcion = '';
        products.forEach(product => {
            descripcion = '';
            descripcion += '<li>precio: '+product.precio+'</li>';
            descripcion += '<li>unidades: '+product.unidades+'</li>';
            descripcion += '<li>modelo: '+product.modelo+'</li>';
            descripcion += '<li>marca: '+product.marca+'</li>';
            descripcion += '<li>detalles: '+product.detalles+'</li>';

          template += `
                  <tr productId="${product.id}">
                  <td>${product.id}</td>
                  <td>
                  <a href="#" class="product-item">
                    ${product.nombre} 
                  </a>
                  </td>
                  <td>${descripcion}</td>
                  <td>
                    <button class="product-delete btn btn-danger">
                     Delete 
                    </button>
                  </td>
                  </tr>
                `
        });
        $('#products').html(template);
      }
    });
  }

  // Delete a Single product
  $(document).on('click', '.product-delete', (e) => {
    if(confirm('Estás seguro que quieres eliminarlo?')) {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        $.ajax({
            url: './backend/product-delete.php',
            type: 'GET',
            data: {id},
            success: function(response) {

                // Respuesta en JSON
                let res;
                try {
                res = JSON.parse(response);
                } catch (e) {
                res = { status: 'error', message: 'Respuesta inválida del servidor' };
                }

                let template_bar = '';
                    template_bar += 
                        `
                        <li style="list-style: none;">status: ${res.status}</li>
                        <li style="list-style: none;">message: ${res.message}</li>
                        `;
                console.log(template_bar);
                $('#product-result').show();

                // Se muestra el mensaje
                $('#container').html(template_bar);

                listarProductos();
            }
        });
    }
  });
});
