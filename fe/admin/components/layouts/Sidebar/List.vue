<template>
  <ClientOnly>
    <ul class="navbar-nav">
      <div v-for="item in listItem">
        <layoutsSidebarItems
          :url  = item.url
          :sidebarText = item.name
        >
        <template v-slot:icon><i :class=" `text-primary text-sm opacity-10 ${item.icon}`"></i></template>
        </layoutsSidebarItems>
      </div>
    </ul>
  </ClientOnly>

</template>
<script>
  export default {
    data() {
      return {
        listItem: [
          {"url" : '/'              , "name"  : 'Trang chủ'   , "icon"  : 'el-icon-s-home'      ,},
          {"url" : '/banner'        , "name"  : 'Banner'      , "icon"  : 'el-icon-film'      ,},
          {"url" : '/categories'    , "name"  : 'Danh mục'    , "icon"  : 'el-icon-burger'      ,},
          {"url" : '/products'      , "name"  : 'Sản phẩm'    , "icon"  : 'el-icon-basketball'  ,},
          {"url" : '/users'         , "name"  : 'Người dùng'  , "icon"  : 'el-icon-user-solid'  ,},
          {"url" : '/orders'        , "name"  : 'Đơn hàng'    , "icon"  : 'el-icon-s-order'     ,},
          {"url" : '/blogs'         , "name"  : 'Tin tức'     , "icon"  : 'el-icon-notebook-2'  ,},
          {"url" : '/contact'       , "name"  : 'Liên hệ'     , "icon"  : 'el-icon-phone'       ,},
          {"url" : '/statistical'   , "name"  : 'Thống kê'    , "icon"  : 'el-icon-s-data' ,},
        ],
      }
    }
  }
</script>
