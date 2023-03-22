<template>
  <div>
    <el-table
      :data="categories.filter((data) => !search || data.name_category.toLowerCase().includes(search.toLowerCase()))"
      style="width: 100%"
    >
      <el-table-column label="Id" prop="id"> </el-table-column>
      <el-table-column label="Name Category" prop="name_category"></el-table-column>
      <el-table-column align="right">
        <template slot="header" slot-scope="scope">
          <el-input
            v-model="search"
            size="mini"
            placeholder="Type to search"
          />
        </template>
        <template slot-scope="scope">
          <el-button>
            <NuxtLink :to="`/categories/edit/${scope.row.id}`">Sửa</NuxtLink>
          </el-button>
          <el-button
            type="danger"
            slot="reference"
            @click="handleDelete(scope.row.id)
          ">Xoá</el-button>
        </template>
      </el-table-column>
    </el-table>
    <div class="mt-5"></div>
    <!-- <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <button class="page-link" @click="changePage(1)">&laquo;</button>
        </li>
        <li class="page-item">
          <button class="page-link" @click="changePage(1)">1</button>
        </li>
        <li class="page-item">
          <button class="page-link" @click="changePage(2)">2</button>
        </li>
        <li class="page-item">
          <button class="page-link" @click="changePage(3)">3</button>
        </li>
        <li class="page-item">
          <button class="page-link" @click="changePage(`${Number(pageParam)+1}`)">&raquo;</button>
        </li>
      </ul>
    </nav> -->
  </div>

</template>

<script>
  import { defineComponent, ref, reactive ,useRouter } from '@nuxtjs/composition-api'
  import { categoryApi } from '@/api/categories'
  import { ShowNotification } from '../../global/notification.js';
  export default defineComponent({
    data(){
      return {
        search : '',
      }
    },
    setup() {
      const route = useRouter()
      const { allCategory, deleteCategory } = categoryApi()
      const categories = ref([])
      const pages = ref([])
      const messageParam = ref(route.currentRoute.query.message)
      const pageParam = ref(route.currentRoute.query.page)
      const state = reactive({
        message: messageParam
      })
      const loadCategories = async () => {
        const res = await allCategory()
        categories.value = res.data
        return categories
      }
      // if(pageParam.value !== undefined){
      //   loadCategories('?page='+Number(pageParam.value))
      // }
      // else {
        loadCategories()
      // }
      // const changePage = (page) => {
      //   loadCategories('?page='+page)
      //   route.push('/categories?page='+page)
      // }
      const handleDelete = async (id) =>{
        let text = "Bạn muốn xoá danh mục này ?";
        if(confirm(text) === true){
          await deleteCategory(id)
          ShowNotification('Success', 'Xoá danh mục thành công !', 'success')
          loadCategories()
        }
      }
      if(messageParam.value !== undefined){
        ShowNotification('Success', state.message, 'success')
        setTimeout(() => {route.push('/categories')},1)
      }
      return {
        categories,
        // pages,
        handleDelete,
        // changePage,
        // pageParam
      }
    },

  })
</script>
