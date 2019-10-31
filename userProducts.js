$(document).ready(function() {
  // Global Settings
  let edit = false;

  // Testing Jquery
  fetchproducts();
  $("#product-result").hide();

  // search key type event
  $("#search").keyup(function() {
    if ($("#search").val()) {
      let search = $("#search").val();
      console.log(search);
      $.ajax({
        url: "product-search.php",
        data: { search },
        type: "POST",
        success: function(response) {
          if (!response.error) {
            console.log(response);
            let products = JSON.parse(response);
            console.log(products);
            let template = "";
            products.forEach(product => {
              template += `
                     <li><a href="#" class="product-item-search">${product.product_name}</a></li>
                    `;
            });
            $("#product-result").show();
            $("#container").html(template);
          }
        }
      });
    }
  });

  // Fetching products
  function fetchproducts() {
    $.ajax({
      url: "products-list.php",
      type: "GET",
      success: function(response) {
        console.log(response);
        let products = JSON.parse(response);
        let template = "";
        products.forEach(product => {
          template += `
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">                    
                    <a href="#"><img class="card-img-top" src="${product.img_url}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">${product.product_name}</a>
                        </h4>
                        <h5>$${product.price}</h5>
                        <p class="card-text">${product.description}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div>
                </div>
            </div>

                `;
        });
        $("#products").html(template);
      }
    });
  }
});
