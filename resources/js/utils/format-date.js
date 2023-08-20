import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import updateLocale from "dayjs/plugin/updateLocale";

/**
 * Formats a date with a given format.
 */
export const formateDate = (date, format = "") => {
  return dayjs(date).format(format);
};
