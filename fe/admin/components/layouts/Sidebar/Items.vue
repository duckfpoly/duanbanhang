<template>
  <li class="nav-item">
    <NuxtLink class="nav-link" :to="url">
      <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
        <slot name="icon"></slot>
      </div>
      <span class="nav-link-text ms-1">{{ sidebarText }}</span>
    </NuxtLink>
  </li>
</template>
<script>
import { ref, reactive ,useRouter } from '@nuxtjs/composition-api'

export default {
  name: "sidebar-items",
  props: {
    url:  String,
    sidebarText: String,
  },
  setup(){
    const route = useRouter()
    // console.log(route.currentRoute.name);
  }

}
</script>
<style scoped>
  a.nuxt-link-exact-active {
    font-weight: bold !important;
  }
</style>
