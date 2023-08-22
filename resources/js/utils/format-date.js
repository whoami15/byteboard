import dayjs from "dayjs";

/**
 * Formats a date with a given format.
 */
export const formatToRelative = (date, format = "") => {
  return dayjs(date).format(format);
};
