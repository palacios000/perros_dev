<!DOCTYPE html>
<html lang="it">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Perros Life</title>
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css" /> -->
		<link rel="stylesheet" type="text/css" href="http://perros.carburo.net/site/templates/styles/main.css" />		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">		
		<script src="https://unpkg.com/vue@2.6.14/dist/vue.min.js"></script>

		<!-- Vue + Swell -->
		<script type="module">			
		    import swell from 'https://cdn.skypack.dev/swell-js';

		    window.swell = swell;

		    swell.init('perros', 'pk_ZdR0rU8LGHdbvfs80ZZAT9u4RCeGbUE1', {
		      useCamelCase: false,
		      url: 'https://perros.swell.store/',
		    });
		    
			let products = await swell.products.get();
			vm.items	 = products.results;		    

		    let myCart	 = await swell.cart.get();
		    vm.cartItems = myCart.items;
	  </script>
	</head>