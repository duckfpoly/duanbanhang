<template>
  <div>
  <div class="card-header border-bottom">
    <div class="d-flex justify-content-between align-items-center">
      <h6>Thêm danh mục</h6>
    </div>
  </div>
  <div class="card-body px-0 pt-0 pb-2">
    <div class="p-3">
      <CategoryCreate/>
    </div>
  </div>
  </div>
</template>

<script>
  export default {
    layout: 'admin',

    head() {
      return {
        title: 'Create Categories',
        meta: [
          {
            hid: 'description',
            name: 'description',
            content: 'Category Page Create'
          }
        ]
      }
    }
  }
</script>
