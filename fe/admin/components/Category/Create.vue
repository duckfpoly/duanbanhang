<template>
  <form onsubmit="return false">
    <div class="form-group ">
      <label for="" class="form-label">Tên danh mục</label>
      <input type="text" v-model="name_category" class="form-control">
    </div>
    <div class="mt-5">
      <NuxtLink to="/categories"><span class="btn btn-secondary m-0">Quay lại</span></NuxtLink>
      <button class="btn btn-success m-0" @click="handleCreate" type="submit">Thêm</button>
    </div>
  </form>
</template>
<script>
  import { defineComponent, ref, useRouter } from '@nuxtjs/composition-api'
  import { categoryApi } from '@/api/categories'
  import { ShowNotification } from '../../global/notification.js';

  export default defineComponent({
    setup() {
      const router = useRouter()
      const name_category = ref('')
      const { createCategory } = categoryApi()
      const direct = (path,message) => {
        router.push({
          path: path,
          query: {
            message: message
          }
        })
      }
      const handleCreate = async () =>{
        const res = await createCategory({name_category: name_category.value})
        if(res.status === false){
          var result = res.data
          for (const [key, value] of Object.entries(result)) {
            ShowNotification('Warning', `${value}`, 'warning')
          }
        }else {
          direct('/categories','Thêm danh mục thành công !')
        }
      }
      return {
        name_category,
        handleCreate,
      }
    },
  })
</script>
