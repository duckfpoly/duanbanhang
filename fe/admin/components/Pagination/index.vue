<template>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <button v-if="pagination.current_page > 1" class="page-link" @click="changePage(pagination.current_page - 1)">&laquo;</button>
      </li>
      <li class="page-item" v-for="page in pagination.last_page" :key="page">
        <button class="page-link" :class="{ page_active: currentPage === page }" @click="changePage(page)">{{ page }}</button>
      </li>
      <li class="page-item">
        <button v-if="pagination.current_page < pagination.last_page" class="page-link" @click="changePage(pagination.current_page + 1)">&raquo;</button>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: {
    pagination: {
      required: true
    },
    currentPage: {
      required: true
    },
    changePage: {
      required: true
    }
  }
}
</script>

<style scoped>
  .page_active {
    background-color: cadetblue;
    color: #fff;
  }
</style>
