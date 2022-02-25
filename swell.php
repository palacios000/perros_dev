<?php 
// the test product page ("pettorina Easy Play") to get the vars from
//$pettorina = $pages->findOne("template=sc-product, name=pettorina-easy-play");

// vars to send to SwellJs ('site/templates/inc/head.php')
$swellProductId = '621398a1e71f2401326f8289';
$tagliaOK = "EP20";
$coloreOK = "rosso";
$sceltaMinuteria = "acciaio";

?>

<?php include 'inc/head.php'; ?>

  <body>
  <?php // include 'inc/menu.php'; ?>

    <div id="app" class="relative">
      <div class="row">
         <div class="col-3 text-center" v-for="item in items">            
            <h5>{{ item.name }}</h5>
            <h6>{{ item.price }} {{ item.currency }}</h6>
            <p class="text-center"><input v-model="item.qty" type="number" class="form-control" placeholder="Qty" min="1"/></p>							 
               <button @click="addToCart(item)" 
                       class="btn btn-sm btn-info">Add <?= !empty($pettorina->title) ?? 'to Cart' ?></button>
            </p>
         </div>
      </div>

      <?php include 'inc/cart.php' ?>

    </div>
  <style>
    .relative{
      padding-top: 40px;
    }
    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -7.5px;
        margin-left: -7.5px;
    }
    .col-3 {
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%;
    }
    .btn {
        display: inline-block;
        font-weight: 400;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;         
    }
    .btn-info {
        margin-top: 5px;
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
        box-shadow: none;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
    }
  </style>
  </body>
</html>
