import { useContext } from "@nuxtjs/composition-api";

export const categoryApi = () => {

  const { $api } = useContext();

  const url = 'admin/categories'
  const url_id = url + '/'

  const allCategory = async (page) => {
    return page !== undefined ? await $api.get(url + page) : await $api.get(url)
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
