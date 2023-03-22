import { Notification } from "element-ui";

export const ShowNotification = (title, text, type, url) => {
  Notification({
    title: title,
    message: text,
    type: type,
  });
};
