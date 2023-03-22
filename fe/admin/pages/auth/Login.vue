<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
            <form @submit.prevent="submitLogin">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" v-model="email" id="floatingInput" placeholder="Email">
                <label for="floatingInput">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" v-model="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold p-3" type="submit">Sign in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import { defineComponent, ref ,useRouter, useContext  } from '@nuxtjs/composition-api'
  import { adminAuth } from '@/api/auth'
  import { ShowNotification } from '../../global/notification.js';
  export default defineComponent({
    layout: 'empty',
    setup(){
      const router = useRouter()

      const { adminLogin } = adminAuth()
      const email = ref('admin@gmail.com')
      const password = ref('123')

      const { $cookies } = useContext()

      const submitLogin = async () => {
        var user = {
          email: email.value,
          password: password.value
        }
        const response = await adminLogin(user)
        if(response.status == 'success'){
          $cookies.set('token', response.access_token)
          $cookies.set('user',  JSON.stringify(response.profile))
          // sessionStorage.setItem("token", response.access_token);
          // sessionStorage.setItem("user",  JSON.stringify(response.profile));
          router.push({path: '/'})
        }
        else {
          ShowNotification('Error', 'Đăng nhập thất bại !', 'error')
        }
      }
      return {
        submitLogin,
        email,
        password
      }
    }
  })
</script>
