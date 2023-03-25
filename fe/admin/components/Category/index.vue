<template>
  <div>
    <el-table
      :data="categories.filter((data) => !search || data.name_category.toLowerCase().includes(search.toLowerCase()))"
      style="width: 100%"
    >
      <el-table-column type="index" width="50"></el-table-column>
      <el-table-column label="Tên danh mục" prop="name_category"></el-table-column>
      <el-table-column label="Trạng thái" prop="status">
        <template slot-scope="scope">
          <el-tag :type="scope.row.status === 0 ? 'success' : 'danger'" size="medium">
            {{ scope.row.status == 0 ? "Active" : "Unactive" }}
          </el-tag>
        </template>
      </el-table-column>
      <el-table-column align="right">
        <!-- <template slot="header" slot-scope="scope">
          <el-input v-model="search" size="mini" placeholder="Tìm danh mục ..."/>
        </template> -->
        <template slot-scope="scope">
          <el-button><NuxtLink class="link" :to="`/categories/edit/${scope.row.id}`">Sửa</NuxtLink></el-button>
          <el-button type="danger" slot="reference" @click="handleDelete(scope.row.id)">Xoá</el-button>
        </template>
      </el-table-column>
    </el-table>
    <div class="mt-5"></div>
    <Pagination :pagination="pagination" :currentPage="currentPage" :changePage="changePage" />
  </div>
</template>

<script>
  import { defineComponent, ref, reactive ,useRouter } from '@nuxtjs/composition-api'
  import { categoryApi } from '@/api/categories'
  import { ShowNotification } from '../../global/notification.js';
  export default defineComponent({
    setup() {
      const route = useRouter()
      const { allCategory, deleteCategory } = categoryApi()

      const search = ref('')
      const categories = ref([])
      const messageParam = ref(route.currentRoute.query.message)

      const pagination = ref('')
      const pageParam = ref(route.currentRoute.query.page)
      const currentPage = ref(null)

      const state = reactive({ message: messageParam })

      const loadCategories = async (page) => {
        const res = await allCategory(page)
        categories.value = res.data
        pagination.value = res.meta
        currentPage.value = Number(res.meta.current_page)
        return categories, pagination, currentPage
      }

      pageParam.value !== undefined ? loadCategories('?page='+Number(pageParam.value)) : loadCategories()




      const changePage = async (page) => {
        await loadCategories('?page='+page)
        route.push('/categories?page='+page)
      }

      const handleDelete = async (id) =>{
        let text = "Bạn muốn xoá danh mục này ?"
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
        handleDelete,
        search,
        pagination,
        currentPage,
        changePage,
      }
    },
  })
</script>



