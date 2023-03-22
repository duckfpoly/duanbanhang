<template>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i
        class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true"
        id="iconSidenav"
      ></i>
      <nuxt-link to="/" class="navbar-brand m-0">
        <img
          src="https://static.vecteezy.com/system/resources/thumbnails/009/658/784/small/letter-at-logo-design-free-file-free-vector.jpg"
          class="navbar-brand-img h-100"
          alt=""
          width="50px"
          height="50px"
        />
        <span class="ms-1 font-weight-bold">ND Manager</span>
      </nuxt-link>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <layoutsSidebarList/>
    </div>
  </aside>
</template>
<style scoped>
  aside::-webkit-scrollbar {
    width: 0px;
  }
.navbar-vertical.navbar-expand-xs .navbar-collapse {
  height: auto;
}
</style>
