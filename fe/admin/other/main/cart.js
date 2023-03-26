import axios from 'axios'
import { reactive, computed } from '@nuxtjs/composition-api'

const state = reactive({
  items: []
})

const fetchItems = async () => {
  try {
    const response = await axios.get('/api/items')
    state.items = response.data
  } catch (error) {
    console.error(error)
  }
}


const updateItemQuantity = async (itemId, quantity) => {
  try {
    const itemIndex = state.items.findIndex((item) => item.id === itemId)

    if (itemIndex !== -1) {
      const item = state.items[itemIndex]
      const updatedItem = { ...item, quantity }

      const response = await axios.put(`/api/cart/${itemId}`, updatedItem)
      state.items.splice(itemIndex, 1, response.data)
    }
  } catch (error) {
    console.error(error)
  }
}

const addItem = async (product) => {
  try {
    const item = state.items.find((item) => item.id === product.id)

    if (item) {
      item.quantity++
    } else {
      const newItem = {
        id: product.id,
        name: product.name,
        price: product.price,
        quantity: 1
      }

      const response = await axios.post('/api/cart', newItem)
      state.items.push(response.data)
    }
  } catch (error) {
    console.error(error)
  }
}

const removeItem = async (itemId) => {
  try {
    const itemIndex = state.items.findIndex((item) => item.id === itemId)

    if (itemIndex !== -1) {
      const item = state.items[itemIndex]

      if (item.quantity > 1) {
        item.quantity--
        await axios.put(`/api/cart/${itemId}`, item)
      } else {
        await axios.delete(`/api/cart/${itemId}`)
        state.items.splice(itemIndex, 1)
      }
    }
  } catch (error) {
    console.error(error)
  }
}

const totalItems = computed(() => {
  return state.items.reduce((acc, item) => {
    return acc + item.quantity
  }, 0)
})

const totalPrice = computed(() => {
  return state.items.reduce((acc, item) => {
    return acc + (item.price * item.quantity)
  }, 0)
})

const clearCart = async () => {
  try {
    await axios.delete('/api/cart')
    state.items = []
  } catch (error) {
    console.error(error)
  }
}

export default {
  state,
  fetchItems,
  addItem,
  removeItem,
  totalItems,
  totalPrice,
  clearCart
}
