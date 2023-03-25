<template>
  <nav
    class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl"
    id="navbarBlur"
    data-scroll="false"
    v-loading.fullscreen.lock="fullscreenLoading"
    :element-loading-text="textLoading"
  >
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
          <a class="opacity-5 text-white" href="#">{{ $route.name }}</a>
        </li>
      </ol>
    </nav>
    <div
      class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4"
      id="navbar"
    >
      <div class="ms-md-auto pe-md-3 d-flex align-items-center"></div>
      <ul class="navbar-nav justify-content-end">
        <li class="nav-item d-flex align-items-center">
          <form @submit.prevent="processLogout">
            <button class=" nav-link text-white font-weight-bold px-0" style="background: none; border: none;">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none" @click="submitLogout" type="submit">Đăng xuất</span>
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
  </nav>
</template>
<script>
  import { useRouter,useContext } from '@nuxtjs/composition-api'
  import { adminAuth } from '@/api/auth'
  import { ShowNotification } from '../../../global/notification.js';

  export default {
    data() {
      return {
        fullscreenLoading: false,
        textLoading: 'Đang xử lý ...'
      }
    },
    setup(){
      const router = useRouter()
      const { adminLogout } = adminAuth()
      const { $cookies } = useContext()
      const processLogout = async () => {
        const response = await adminLogout()
        if(response.status == true){
          $cookies.remove('token')
          ShowNotification('Success', 'Đăng xuất thành công !', 'success')
          router.push({path: 'auth/login'})
        }else {
          ShowNotification('Error', 'Lỗi đăng xuất !', 'error')
          router.push({path: '/'})
        }
      }
      return {
        processLogout
      }
    },
    methods: {
      submitLogout() {
        this.fullscreenLoading = true;
      },
    }
  }
</script>
