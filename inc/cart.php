<!-- 
	@ Mikita: I've copied this cart from a template found on Vue + Nuxt,
	that's why you still see some tags from Vue.
	It's the first time I deal with Vue, so I don't know what a BaseIcon
	or BaseButton is.

	At the bottom of this file you see the scripts copied from the Nuxt template, they are probably useful for the interaction with SwellJS
	 -->
<div>  
  <div v-if="cartReady" >
    <div class="fixed inset-0 z-50">
      <!-- Overlay -->
      <div class="overlay absolute hidden h-full w-full bg-neutral-500 opacity-90 md:block">
        <!-- Panel -->
        <div class="panel absolute right-0 h-full w-full max-w-md">
          <button @click="cartReady = !cartReady">Close X</button>
          <div class="h-full w-full overflow-y-scroll bg-white">
            <shopping-cart inline-template :items="cartItems">
              <div>
                  <table class="table table-cart">
                    <tr v-for="(item, index) in items">
                        <td>{{ item.product.name }}</td>
                        <td><img class="img-responsive" :src="item.product.images[0].file.url" alt=""></td>
                        <td>QTY:
                          <input v-model="item.quantity" type="number" min="1">
                        </td>
                        <td class="text-right">{{ item.price }} {{ currency }}</td>
                        <td>
                          <button @click="removeItem(index)"><span class="glyphicon glyphicon-trash">X</span></button>
                        </td>
                    </tr>
                    <tr v-show="items.length === 0">
                        <td colspan="5" class="text-center">Cart is empty</td>
                    </tr>
                    <tr v-show="items.length > 0">
                        <td colspan="2"></td>
                        <td >Total: {{ Total | formatCurrency }} {{ currency }}</td>                        
                    </tr>
                  </table>
              </div>              
            </shopping-cart>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
// The shopping cart component
Vue.component('shopping-cart', {
  props: ['items'],

  computed: {
    Total() {      
      let total = 0;
      this.items.forEach(item => {
        total += item.price * item.quantity;
      });
      return total;
    } 
  },
  
  methods: {
    // Remove item by its index
    removeItem(index) {
      this.items.splice(index, 1);
    } 
  } 

});


const vm = new Vue({
  el: '#app',
  data: {
    cartItems: [],
    items: [],
    cartReady: false, 
    quantity: 0,
    currency: '$',
  }, 

  methods: {
    // Add Items to cart
    addToCart(itemToAdd={}) {       
      
      let xx = this;      
      window.swell.cart.addItem({
        product_id: '<?= $swellProductId ?>',
        quantity: 1,
        options: {
          taglia: '<?= $tagliaOK ?>',
          colore: '<?= $coloreOK ?>',
          minuteria: '<?= $sceltaMinuteria ?>'
        }
      }).then( res => {
        debugger
        xx.cartItems = res.items;
        xx.currency  = res.currency;
      });      
           
      this.cartReady = true;
    } 
  },  
  computed: {
    quantity: function(e){      
    }
  }
});
</script>