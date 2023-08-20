import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import updateLocale from "dayjs/plugin/updateLocale";

dayjs.extend(relativeTime);
dayjs.extend(updateLocale);

// Customize the relative time format
dayjs.updateLocale("en", {
  relativeTime: {
    future: "in %s",
    past: "%s",
    s: "%d secs ago",
    m: "1 min ago",
    mm: "%d mins ago",
    h: "1 hr ago",
    hh: "%d hours ago",
    d: "yesterday",
    dd: "%d days ago",
    M: "1 month ago",
    MM: "%d months ago",
    y: "1 year ago",
    yy: "%d years ago",
  },
});

/**
 * Convert a date to a relative time
 */
export const fromNow = (date) => {
  return dayjs(date).fromNow();
};
