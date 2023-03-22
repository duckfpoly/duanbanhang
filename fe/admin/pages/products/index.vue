<template>
  <div>
    <el-pagination
      v-model="currentPage"
      :page-size="pageSize"
      :total="totalItems"
      :prev-text="prevText"
      :next-text="nextText"
      layout="prev, pager, next"
    />
    <div class="d-flex" v-for="page in pageCount" :key="page">
      <nuxt-link
        :to="`/products?page=${page}`"
        :exact="true"
        active-class="active"
      >
        {{ page }}
      </nuxt-link>
    </div>
  </div>
</template>

<script>
export default {
  layout: 'admin',

  data() {
    return {
      currentPage: 1,
      pageSize: 10,
      totalItems: 100,
      prevText: 'Previous',
      nextText: 'Next',
    };
  },
  computed: {
    pageCount() {
      return Math.ceil(this.totalItems / this.pageSize);
    },
  },
};
</script>
