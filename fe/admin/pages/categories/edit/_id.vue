<template>
  <div>
  <div class="card-header border-bottom">
    <div class="d-flex justify-content-between align-items-center">
      <h6>Sửa danh mục</h6>
    </div>
  </div>
  <div class="card-body px-0 pt-0 pb-2">
    <div class="p-3">
      <CategoryEdit/>
    </div>
  </div>
  </div>
</template>

<script>
  export default {
    layout: 'admin',

    name: "Category Edit",
    head() {
      return {
        title: 'Edit Categories',
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
