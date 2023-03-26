import axios from "axios";

const baseUrl = 'http://localhost:8000/api/';

export const getCart = async () => {
  const response = await axios.get(baseUrl+"cart");
  return response.data.data;
};

export const createCart = async (object) => {
  const config = {
    headers: {
      Authorization:
        "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTc2YWE3ZjBlMzg2OTQzM2VhYTM0MDkzZmU5ZjMxOGIwMmQ2NmQxMjkxZTBmZTRkMDhmMWRmMzhhODYzZDJjMDJmNTVhN2MyOGUwYjM1ZTAiLCJpYXQiOjE2Nzc2NjQzNDQuODMzOTQsIm5iZiI6MTY3NzY2NDM0NC44MzM5NDMsImV4cCI6MTcwOTI4Njc0NC44MjE5MjYsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.yGQwZL2XWESsLVhYhZ9b-sdxcnaoiN1n3OSdZRZ6lHeMeIN9K54pZELSSsYe4KwEi3p-KBZ2fYjT1PkQBOL1_KCjg5pX9T5XexlZ7vkvRGiiT4-sWAgTDWlMLMcyFCjuder6iy9IaoA_XpYjpakTUDUtVvhCpjtW67DR97WzXYPylmooSitM-CNzqUmiJ88r6afzJFyvOss-tXHefM_83Ms07lpxO8UelFKENx7PsyDLneFk8m4HDteItCiT5fNBCpGHFUCjXTe51Ka-buwHtZxK5Qznf6hxHlCJ5HYzjkTgth4XKf5R9aZ7ZcVM1wvE2Rg-cUS_5-mkN4N0ejtrzL5PgN890Tl_bbzi_NpWDB1iFTR0fIijRQzM7KZC8F09D941HXp65ifgCRR-XktMebT5uaKQpOzhXaHLhos1j4afez82kD0iQPID6TyWM0Kzi4xf62nXaeA1KUeDIkNC_7_NDlXDT3M0rZGjjOjIRQnY5TkzaNeQkpmNTbssALvv0HARY7IXbvCExRPrEiUcaAu6PlhY3t11A5Haq5OIEN6L7qZR29jkZZqP5--X1UbGgQ4xYCYn1XTW7iCjB9jllU6n1leSJu4tTPjCTbzmbSmRHfH1xrmLwWUGW5_ixjgXP12zSPh-6FuWHT5Y_V4tTbWbE8pytZ8DgvP46TUQX3w",
      "Content-Type": "application/json",
      Type: "admin",
    },
  };
  const response = await axios.post(baseUrl + "cart", object, config);
  return response.data;
};

export const updateCartItem = async (item) => {
  const response = await axios.put(`cart/${item.id}`, {
    quantity: item.quantity,
  });
  return response.data;
};

export const removeCartItem = async (item) => {
  const response = await axios.delete(`cart/${item.id}`);
  return response.data;
};
