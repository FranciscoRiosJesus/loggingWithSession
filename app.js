$(document).ready(function() {
  // Global Settings
  let edit = false;

  // Testing Jquery
  fetchproducts();
  $('#product-result').hide();

  //load img
  let form = document.getElementById('product-form');
  form.addEventListener('submit', function(event) {
    console.log('submit img ');
    event.preventDefault();
    let peticion = new XMLHttpRequest();
    peticion.open('post', 'img_save.php');
    console.log(new FormData(form));
    peticion.send(new FormData(form));
  });

  // search key type event
  $('#search').keyup(function() {
    if($('#search').val()) {
      let search = $('#search').val();
      console.log(search);
      $.ajax({
        url: 'product-search.php',
        data: {search},
        type: 'POST',
        success: function (response) {
          if(!response.error) {
            console.log(response);
            let products = JSON.parse(response);
            console.log(products);
            let template = '';
            products.forEach(product => {
              template += `
                     <li><a href="#" class="product-item-search">${product.product_name}</a></li>
                    ` 
            });
            $('#product-result').show();
            $('#container').html(template);
          }
        } 
      })
    }
  });

  // add product
  $('#product-form').submit(e => {
    e.preventDefault();
    const postData = {
      product_name: $('#product_name').val(),
      description: $('#description').val(),
      product_id: $('#product_id').val(),
      category: $('#category').val(),
      price: $('#price').val()
    };
    const url = edit === false ? 'product-add.php' : 'product-edit.php';
    console.log(postData);
    $.post(url, postData, (response) => {
      console.log(response);
      $('#product-form').trigger('reset');
      fetchproducts();  
    });
  });

  // Fetching products
  function fetchproducts() {
    $.ajax({
      url: 'products-list.php',
      type: 'GET',
      success: function(response) {
        console.log(response);
        let products = JSON.parse(response);
        let template = '';
        products.forEach(product => {
          template += `
                  <tr productproduct_id="${product.product_id}">
                    <td>${product.product_id}</td>
                    <td>
                      <a href="#" class="product-item">
                        ${product.product_name} 
                      </a>
                    </td>
                    <td>${product.category_id}</td>
                    <td>${product.description}</td>
                    <td>${product.price}</td>
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

  // Get a Single product by product_id 
  $(document).on('click', '.product-item', (e) => {
    const element = $(this)[0].activeElement.parentElement.parentElement;
    const product_id = $(element).attr('productproduct_id');
    console.log(product_id);
    $.post('product-single.php', {product_id}, (response) => {
      console.log(response);
      const product = JSON.parse(response);
      $('#product_name').val(product.product_name);
      $('#description').val(product.description);
      $('#product_id').val(product.product_id);
      $('#price').val(product.price);
      $('#category').val(product.category_id);
      edit = true;
    });
    e.preventDefault();
  });

  // Delete a Single product
  $(document).on('click', '.product-delete', (e) => {
    if(confirm('Are you sure you want to delete it?')) {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const product_id = $(element).attr('productproduct_id');
      $.post('product-delete.php', {product_id}, (response) => {
        fetchproducts();
      });
    }
  });
});
