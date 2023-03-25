<template>
  <div>
    <div class="card-header border-bottom">
    <div class="d-flex justify-content-between align-items-center">
      <h6>Danh sách danh mục</h6>
      <div class="d-flex justify-content-between align-items-center">
        <form action="/categories"><input type="text" name="search" class="form-control" placeholder="Tìm danh mục ..."></form>&emsp;
        <NuxtLink to="/categories/create"><span class="btn btn-success m-0">Thêm</span></NuxtLink>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive p-3">
    <Category/>
    </div>
  </div>
  </div>
</template>
<script>
export default {
  layout: 'admin',

  name: "CategoryIndex",
  head() {
    return {
      title: 'List Categories',
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: 'Category Page Index'
        }
      ]
    }
  }
}
</script>
