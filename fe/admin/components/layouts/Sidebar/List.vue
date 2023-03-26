<template>
  <ul class="navbar-nav">
    <div v-for="item in listItem">
      <layoutsSidebarItems :url = item.url :sidebarText = item.name >
      <template v-slot:icon><i :class=" `text-primary text-sm opacity-10 ${item.icon}`"></i></template>
      </layoutsSidebarItems>
    </div>
  </ul>
</template>
<script>
  import { MenuSidebar } from '@/src/listMenu'
  export default {
    setup(){
      const { list } = MenuSidebar()
      const listItem = list()
      return {
        listItem
      }
    }
  }
</script>
