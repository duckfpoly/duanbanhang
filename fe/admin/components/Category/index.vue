<template>
  <div v-loading="loading">
    <el-table :data="categories" style="width: 100%">
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
        <template slot-scope="scope">
          <el-button><NuxtLink class="link" :to="`/categories/edit/${scope.row.id}`">Sửa</NuxtLink></el-button>
          <el-button type="danger" slot="reference" @click="handleDelete(scope.row.id)">Xoá</el-button>
        </template>
      </el-table-column>
    </el-table>
    <div class="mt-5"></div>
    <PaginationVer2 v-if="categories != ''" :totalItems="totalPage" url="categories" :fnProcess="loadCategories" :search="searchParam"/>
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

      const search        = ref('')
      const pagination    = ref('')
      const categories    = ref([])
      const totalPage     = ref(null)
      const loading       = ref(true)
      const query         = ref(route.currentRoute.query)
      const messageParam  = ref(query.value.message)
      const pageParam     = ref(query.value.page)
      const searchParam   = ref(query.value.search)
      const state         = reactive({ message: messageParam })

      searchParam.value == null && route.push('/categories')

      const loadCategories = async (search,page) => {
        const res = await allCategory(search,page)
        categories.value  = res.data
        pagination.value  = res.meta
        totalPage.value   = Number(res.meta.total)
        loading.value     = false
        return categories, pagination, totalPage,loading
      }
      loadCategories(searchParam.value,pageParam.value)

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
        totalPage,
        loadCategories,
        searchParam,
        loading
      }
    },
  })
</script>



