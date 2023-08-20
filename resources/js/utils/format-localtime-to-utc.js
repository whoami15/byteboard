import dayjs from "dayjs";
import utc from "dayjs/plugin/utc";
import timezone from "dayjs/plugin/timezone";

dayjs.extend(utc);
dayjs.extend(timezone);

/**
 * Formats a local timestamp to UTC format with 'Z' at the end to indicate UTC.
 */
export const formatLocalTimestampToUtcWithZ = (timestamp) => {
  return dayjs(timestamp)
    .tz("Asia/Manila")
    .utc()
    .format("YYYY-MM-DD HH:mm:ss[Z]");
};
