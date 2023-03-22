import { useContext } from "@nuxtjs/composition-api";

export const categoryApi = () => {
  const { $api } = useContext();
  const url = 'admin/categories'

  const allCategory = async (page = '') => {
    return await $api.get(url);
  };

  const showCategory = async (cateId) => {
    return await $api.get(`categories/${cateId}`);
  };

  const createCategory = async (name_category) => {
    const data = {
      name_category: name_category
    };
    return await $api.post(`categories`, data);
  };

  const updateCategory = async (cateId, name_category) => {
    const data = {
      name_category: name_category,
    };
    return await $api.put(`categories/${cateId}`, data);
  };

  const deleteCategory = async (cateId) => {
    await $api.delete(`categories/${cateId}`, {
      headers: {
          Authorization: "Bearer " + process.env.TOKEN,
          "Content-Type": "application/json",
          Type: "admin",
      },
    });
  };

  return {
    allCategory,
    showCategory,
    createCategory,
    updateCategory,
    deleteCategory,
  };
};
