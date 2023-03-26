<template>
  <div>
    <div class="min-height-300 bg-secondary position-absolute w-100"></div>
    <layoutsSidebar/>
    <main class="main-content position-relative border-radius-lg ">
      <layoutsNavbar/>
      <section class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <Nuxt />
            </div>
          </div>
        </div>
      </section>
      <!-- <layoutsFooter/> -->
    </main>
  </div>
</template>
<script>

export default {
  middleware: 'checklogin',
  name: 'LayoutAdmin',

  // mounted() {
  //   if (process.client) {
  //     window.addEventListener('keydown', event => {
  //       // if (event.keyCode === 123) { // F12 keycode
  //       //   event.preventDefault();
  //       //   return false;
  //       // }
  //     })
  //   }
  //   document.addEventListener('contextmenu', this.disableRightClick)
  // },

  // beforeDestroy() {
  //   document.removeEventListener('contextmenu', this.disableRightClick)
  // },

  // methods: {
  //   disableRightClick(event) {
  //     event.preventDefault()
  //   },

  // }
}
</script>
