<template>
  <div>
    <div class="card-header border-bottom">
      <div class="d-flex justify-content-between align-items-center">
        <h6>Danh sách danh mục</h6>
        <div class="d-flex justify-content-between align-items-center">
          <form action="/categories" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Tìm danh mục ..." :value="searchValue">
            &emsp;
            <div v-if="searchValue == ''">
              <button type="submit" class="btn btn-primary mb-0">Tìm</button>
            </div>
            <div v-else>
              <a class="btn btn-secondary m-0" href="/categories">X</a>
            </div>
          </form>&emsp;|&emsp;
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
import { ref, useRouter } from '@nuxtjs/composition-api'
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
  },
  setup(){
    const route = useRouter()
    const searchParam = ref(route.currentRoute.query.search)
    const searchValue = ref(null)
    searchValue.value = searchParam.value != null ? searchParam.value : ''
    return {
      searchValue
    }
  }
}
</script>
