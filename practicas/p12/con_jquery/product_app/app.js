// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

// function init() {
//     /**
//      * Convierte el JSON a string para poder mostrarlo
//      * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
//      */
//     var JsonString = JSON.stringify(baseJSON,null,2);
//     document.getElementById("description").value = JsonString;

//     // SE LISTAN TODOS LOS PRODUCTOS
//     // listarProductos();
// }

// En cuanto cargue la página
$(document).ready(function() {
  // Global Settings
  let edit = false;

  // Testing Jquery
  console.log('jquery is working!');
  listarProductos();
  $('#product-result').hide();


  // search key type event
  $('#search').keyup(function() {
    if($('#search').val()) {
      let search = $('#search').val();
      $.ajax({
        url: './backend/product-search.php',
        data: {search},
        type: 'POST',
        success: function (response) {
          if(!response.error) {
            let products = JSON.parse(response);
            let template = '';
            products.forEach(product => {
              template += `
                     <li><a href="#" class="product-item">${product.name}</a></li>
                    ` 
            });
            $('#product-result').show();
            $('#container').html(template);
          }
        } 
      })
    }
  });

  $('#product-form').submit(e => {
    e.preventDefault();
    const postData = {
      name: $('#name').val(),
      description: $('#description').val(),
      id: $('#taskId').val()
    };
    const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
    console.log(postData, url);
    $.post(url, postData, (response) => {
      console.log(response);
      $('#product-form').trigger('reset');
      listarProductos();
    });
  });

  // Fetching products
  function listarProductos() {
    $.ajax({
      url: './backend/product-list.php',
      type: 'GET',
      success: function(response) {
        const products = JSON.parse(response);
        console.log(products);
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

  // Get a Single product by Id 
  $(document).on('click', '.product-item', (e) => {
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const id = $(element).attr('taskId');
    $.post('./backend/product-single.php', {id}, (response) => {
      const product = JSON.parse(response);
      $('#name').val(product.name);
      $('#description').val(product.description);
      $('#taskId').val(product.id);
      edit = true;
    });
    e.preventDefault();
  });

  // Delete a Single product
  $(document).on('click', '.product-delete', (e) => {
    if(confirm('Are you sure you want to delete it?')) {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(element).attr('taskId');
      $.post('product-delete.php', {id}, (response) => {
        listarProductos();
      });
    }
  });
});
