import { useContext } from "@nuxtjs/composition-api";

export const productApi = () => {
  const { $api } = useContext();

  const all = async (page = "") => {
    return await $api.get("products" + page);
  };

  const show = async (id) => {
    return await $api.get(`products/${id}`);
  };

  const create = async (data) => {
    const config = {
      headers: {
        Authorization: "Bearer " + process.env.TOKEN,
        "Content-Type": "application/json",
        Type: "admin",
      },
    };
    return await $api.post(`products`, data, config);
  };

  const update = async (id, data) => {
    const config = {
      headers: {
        Authorization: "Bearer " + process.env.TOKEN,
        "Content-Type": "application/json",
        Type: "admin",
      },
    };
    return await $api.put(`products/${id}`, data, config);
  };

  const destroy = async (id) => {
    return await $api.delete(`products/${id}`, {
      headers: {
        Authorization: "Bearer " + process.env.TOKEN,
        "Content-Type": "application/json",
        Type: "admin",
      },
    });
  };

  return {
    all,
    show,
    create,
    update,
    destroy,
  };
};
