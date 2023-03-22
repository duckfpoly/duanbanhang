<template>
  <div>
    <h1>Upload Image</h1>
    <form @submit.prevent="uploadImage">
      <input type="file" ref="fileInput">
      <button type="submit">Upload</button>
    </form>
  </div>
</template>

<script>
  export default {
    methods: {
      async uploadImage() {
        const file = this.$refs.fileInput.files[0]
        const formData = new FormData()
        formData.append('image', file)
        try {
          const response = await this.$axios.post('http://localhost:8000/global/images', formData)
          console.log(response.data)
        } catch (error) {
          console.log(error)
        }
      }
    }
  }
</script>
