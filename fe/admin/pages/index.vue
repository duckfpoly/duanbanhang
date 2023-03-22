<template>
  <div>
    <Dashboard/>
  </div>
</template>

<script>
  export default {
    layout: 'admin',

  name: "IndexPage",
  head() {
    return {
      title: 'Dashboard',
      meta: [
        {
          hid: 'description',
          name: 'description',
          content: 'Category Page Create'
        }
      ]
    }
  },
  mounted(){
    // sessionStorage.setItem('user','halloooooo')
    // var user = sessionStorage.getItem('user')
    // console.log(user)
    // if(typeof user == undefined){
    //   console.log(false);
    // }
  },
  methods: {
    showImage(id_div,value){
      document.querySelector(`#${id_div}`).innerHTML = value
    }
  }
}
</script>



