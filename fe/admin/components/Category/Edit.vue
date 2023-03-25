<template>
  <form onsubmit="return false">
    <div class="form-group ">
      <label for="" class="form-label">Tên danh mục</label>
      <input type="text" class="form-control" v-model="name_category">
      <div class="form-message text-danger mt-1"></div>
    </div>
    <div class="mt-5">
      <NuxtLink to="/categories">
        <span class="btn btn-secondary m-0">Quay lại</span>
      </NuxtLink>
      <button class="btn btn-success m-0" @click="handleEdit" type="submit">Cập nhật</button>
    </div>
  </form>
</template>

<script>
import { computed, defineComponent, ref ,useRouter } from '@nuxtjs/composition-api'
import { categoryApi } from '@/api/categories'
import { ShowNotification } from '../../global/notification.js';

export default defineComponent({
  name: 'category-edit-id',
    data(){
      return {
        search : '',
      }
    },
    setup() {
      const route = useRouter()
      const { showCategory, updateCategory } = categoryApi()
      const name_category      = ref('')
      const direct = (path,message) => {
        route.push({
          path: path,
          query: {
            message: message
          }
        })
      }
      const categoryId = route.currentRoute.params.id;
      const loadDetailCategories = async () => {
        const res = await showCategory(categoryId)
        name_category.value = res.data.name_category
        return name_category
      }
      loadDetailCategories()
      const handleEdit = async () => {
        var obj = {
          name_category: name_category.value,
          status: 0
        }
        const res = await updateCategory(categoryId,obj)
        if(res.status === false){
          var result = res.data
          for (const [key, value] of Object.entries(result)) {
            ShowNotification('Warning', `${value}`, 'warning')
          }
        }else {
          direct('/categories','Sửa danh mục thành công !')
        }
      }
      return {
        name_category,
        handleEdit,
      }
    },
  })
</script>
