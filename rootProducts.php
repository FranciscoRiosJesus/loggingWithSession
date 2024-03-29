<?php include("database.php") ?>

<?php include("includes/header.php") ?>

<!-- NAVIGATION  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">VR AR </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <form class="form-inline my-2 my-lg-0">
          <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success my-2 my-sm-0 search-btn" type="submit">Search</button>
        </form>
      </li>
      <li class="nav-item  itemSignOut">
        <a class="nav-link form-inline link" href="sign-out.php"><button class="btn-sign-out btn btn-info" type="submit" style="text-decoration: underline #1a1a1a"> root Sign Out</button></a>
      </li>
    </ul>
  </div>
</nav>

<!-- container -->
<div class="container">
  <div class="row p-4">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">

          <!-- FORM TO ADD TASKS -->
          <form id="product-form" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" id="product_name" placeholder="Product Name" class="form-control" required>
            </div>
            <div class="form-group">
              <div class="input-group">
                <input type="number" id="price" placeholder="Price" class="form-control" min="1" step="any">
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <select class="custom-select category form-control" id="category">
                <option value="1">Virtual Reality</option>
                <option value="2">Augmented Reality</option>
              </select>
            </div>

            <div class="form-group">
              <input type="text" id="img_url" placeholder="Img URL" class="form-control" >
            </div>

            <div class="form-group">
              <textarea id="description" cols="30" rows="10" class="form-control" placeholder="Product Description"></textarea>
            </div>
            <input type="hidden" id="product_id">
            <input type="submit" name="submit" class="btn btn-form btn-primary btn-block text-center" value="SAVE PRODUCT" />
          </form>

        </div>
      </div>
    </div>

    <!-- TABLE  -->
    <div class="col-md-9">
      <div class="card my-4" id="product-result">
        <div class="card-body">
          <!-- SEARCH -->
          <ul id="container"></ul>
        </div>
      </div>

      <div class="card">
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <td>Id</td>
              <td>Name</td>
              <td>Category</td>
              <td>Description</td>
              <td>Price</td>
              <td>img-url</td>
              <td>Delete</td>
            </tr>
          </thead>
          <tbody id="products"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>