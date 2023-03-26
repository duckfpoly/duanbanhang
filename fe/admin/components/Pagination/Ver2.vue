<template>
  <el-pagination
    v-model="currentPage"
    :page-size="pageSize"
    :total="totalItems * 10"
    :prev-text="prevText"
    :next-text="nextText"
    layout="prev, pager, next"
    :disabled="disabled"
    :hide-on-single-page="hideOnSinglePage"
    :current-page="currentPage"
    :page-count="pageCount"
    @current-change="handlePageChange"
    v-loading.fullscreen.lock="fullscreenLoading"
  >
  </el-pagination>
</template>
<script>
  import { ref, useRouter } from '@nuxtjs/composition-api'

export default {
  props: {
    totalItems: { type:Number,    required: true },
    url:        { type: String,   required: true },
    fnProcess:  { type: Function, required: true },
    search:     { required: true },
  },
  setup(props){
    const route = useRouter()
    const currentPage       = ref(1)
    const pageSize          = ref(10)
    const prevText          = ref('<')
    const nextText          = ref('>')
    const disabled          = ref(false)
    const hideOnSinglePage  = ref(false)
    const fullscreenLoading =  ref(false)
    const pageCount = ref(Math.ceil(( props.totalItems * 10 ) / pageSize.value))
    const handlePageChange = async (page) => {
      fullscreenLoading.value = true;
      currentPage.value = page
      await props.fnProcess(props.search,page)
      props.search != undefined ? route.push(`${props.url}?search=${props.search}&page=${page}`) : route.push(`${props.url}?page=${page}`)
      fullscreenLoading.value = false;
    }
    return {
      currentPage,
      pageSize,
      prevText,
      nextText,
      disabled,
      hideOnSinglePage,
      pageCount,
      handlePageChange,
      fullscreenLoading
    }
  },

}
</script>
