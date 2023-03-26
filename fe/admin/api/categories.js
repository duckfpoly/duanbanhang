import { useContext } from "@nuxtjs/composition-api";

export const categoryApi = () => {

  const { $api } = useContext();

  const url = 'admin/categories'
  const url_id = url + '/'

  const allCategory = async (search,page) => {
    // có search || không có phân trang
    if(search != undefined && page == undefined) {
      return await $api.get(`${url}?search=${search}`)
    }
    // có search || có phân trang
    else if(search != undefined && page != undefined){
      return await $api.get(`${url}?search=${search}&page=${page}`)
    }
    // không có search || có phân trang
    else if(search == undefined && page != undefined){
      return await $api.get(`${url}?page=${page}`)
    }
    // không có search || không có phân trang
    else if(search == undefined && page == undefined){
      return await $api.get(url)
    }
    else {
      return await $api.get(url)
    }
  }

  const createCategory = async (data) => {
    return await $api.post(url, data);
  };

  const showCategory = async (cateId) => {
    return await $api.get(url_id+cateId);
  };

  const updateCategory = async (cateId, data) => {
    return await $api.put(url_id+cateId, data);
  };

  const deleteCategory = async (cateId) => {
    await $api.delete(url_id+cateId);
  };

  return {
    allCategory,
    showCategory,
    createCategory,
    updateCategory,
    deleteCategory,
  };
};
