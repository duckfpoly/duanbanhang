<template>
  <div>
    <div>
      <h1>Product List</h1>
      <input type="number"  v-model="id_user"       placeholder="id user">
      <input type="number"  v-model="id_product"    placeholder="id product">
      <input type="text"    v-model="image_product" placeholder="id user">
      <input type="number"  v-model="price_product" placeholder="price product">
      <input type="number"  v-model="quantity"      placeholder="quantity">
      <input type="number"  v-model="toping"        placeholder="toping">
      <button @click="addToCart">Add</button>
    </div>
    <h1>Shopping Cart</h1>
    <ul>
      <li v-for="item in cart.state.items" :key="item.id">
        {{ item.id_product }} - {{ item.price_product }} - Quantity: {{ item.quantity }}
        <button @click="cart.updateItemQuantity(item, item.quantity + 1)">+</button>
        <button @click="cart.updateItemQuantity(item, item.quantity - 1)">-</button>
        <button @click="cart.removeItem(item)">Remove</button>
      </li>
    </ul>
    <p>Total Price: {{ cart.totalPrice.value }}</p>
  </div>
</template>

<script>
import useCart from '../main/cart.js'
import { ref } from 'vue'
import axios from "axios";
export default {
  layout: "empty",
  setup() {
    const cart = useCart()

    const id_user       = ref(1)
    const id_product    = ref(110)
    const image_product = ref("image.jpg")
    const price_product = ref(1000)
    const quantity      = ref(1)
    const toping        = ref(0)

    const product = ref({
      id_user:        id_user,
      id_product:     id_product,
      image_product:  image_product,
      price_product:  price_product,
      quantity:       quantity,
      toping:         toping
    });
    const addToCart = async () => {
      const itemIndex = cart.state.items.findIndex(item => item.id === product.id)
      if (itemIndex !== -1) {
        cart.state.items[itemIndex].quantity++
      } else {
        cart.addItem(product.value)
      }
    }

    return {
      cart,
      addToCart,

      id_user,
      id_product,
      image_product,
      price_product,
      quantity,
      toping
    }
  }
}
</script>


<!-- <script>
import { useCart } from '~/composables/cart'

export default {
  name: 'Cart',
  setup() {
    const { state: cartState, addItem, removeItem, totalItems, totalPrice, clearCart } = useCart()

    return { cartState, addItem, removeItem, totalItems, totalPrice, clearCart }
  }
}
</script> -->
