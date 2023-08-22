import { useToast } from "vue-toastification";
// import "vue-toastification/dist/index.css";
import "../../css/toastification.scss";

const toast = useToast({
  position: "top-center",
  timeout: 2000,
  draggable: false,
  hideProgressBar: true,
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
