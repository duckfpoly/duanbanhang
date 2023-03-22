import { useContext } from "@nuxtjs/composition-api";

export const adminAuth = () => {
  const { $api } = useContext();

  const adminLogin = async (datas) => {
    return await $api.post(`auth/admin/login`, datas);
  };

  const adminLogout = async () => {
    // return await $api.delete('admin/logout');
    return await $api.get('admin/categories');
  };

  return {
    adminLogin,
    adminLogout,
  };
};
