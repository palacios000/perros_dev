<!DOCTYPE html>
<html lang="it">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Perros Life</title>
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css" /> -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
		<script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
		<!-- <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script> -->

	
		<!-- Alpine + Swell -->
		<script type="module">
		    import swell from 'https://cdn.skypack.dev/swell-js';
		    import Alpine from 'https://cdn.skypack.dev/alpinejs';
		     

		    window.swell = swell;

		    swell.init('perros', 'pk_ZdR0rU8LGHdbvfs80ZZAT9u4RCeGbUE1', {
		      useCamelCase: false,
		      url: 'https://perros.swell.store/',
		    });

		    window.addToSwellCart = function addToSwellCart() {
		    	swell.cart.addItem({
		    	  product_id: '<?= $swellProductId ?>',
		    	  quantity: 1,
		    	  options: {
		    	    taglia: '<?= $tagliaOK ?>',
		    	    colore: '<?= $coloreOK ?>',
		    	    minuteria: '<?= $sceltaMinuteria ?>'
		    	  }
		    	});
		    };

		    const myCart = await swell.cart.get();
		    console.log(myCart);
		    var totale = myCart.sub_total;

		    console.log(myCart.item_quantity);
		    console.log(totale);
		    console.log(myCart.id);

		    window.Alpine = Alpine;
		    
		    window.alpineStore = function alpineStore(){
		      return{
		        myCart,
		        fetchCart(){
		          swell.cart.get().then(cart => {
		            myCart = cart
		          })
		        }
		      }
		    }
		     
		    Alpine.start()
		    //
	  </script>
	</head>