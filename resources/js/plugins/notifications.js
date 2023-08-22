import { useToast } from "vue-toastification";
import "vue-toastification/dist/index.css";

const toast = useToast({
  position: "top-center",
  timeout: 3000,
  draggable: false,
  hideProgressBar: true,
  closeButton: false,
  icon: false,
  transition: "none",
});

export const notifications = () => {
  router.on("finish", () => {
    const notification = usePage().props.notification;

    if (notification) {
      toast(notification.body, { type: notification.type });
    }
  });
};
