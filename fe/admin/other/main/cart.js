import { reactive, computed } from "vue";
import { createCart, getCart, updateCartItem, removeCartItem } from "../cart.js";
import axios from "axios";

export default function useCart() {
  const state = reactive({
    items: [],
  });

  const addItem = async(item) => {
    // console.log(item);
    state.items.push(item);
    const res = await createCart(item);
    console.log(res);
  };

  const removeItem = (item) => {
    const index = state.items.findIndex((i) => i.id === item.id);
    if (index !== -1) {
      state.items.splice(index, 1);
    }
  };

  const updateItemQuantity = (item, quantity) => {
    const index = state.items.findIndex((i) => i.id === item.id);
    if (index !== -1) {
      state.items[index].quantity = quantity;
      if(quantity == 0){
        state.items.splice(index, 1);
      }
    }
  };

  const totalPrice = computed(() => {
    return state.items.reduce((total, item) => {
      return total + item.price_product * item.quantity;
    }, 0);
  });

  return {
    state,
    addItem,
    removeItem,
    updateItemQuantity,
    totalPrice,
  };
}
