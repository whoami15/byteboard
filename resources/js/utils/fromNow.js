import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import updateLocale from "dayjs/plugin/updateLocale";

dayjs.extend(relativeTime);
dayjs.extend(updateLocale);

// Customize the relative time format
dayjs.updateLocale("en", {
  relativeTime: {
    future: "in %s",
    past: "%s ago",
    s: "%d secs",
    m: "1 min",
    mm: "%d mins",
    h: "1 hr",
    hh: "%d hours",
    d: "1 day",
    dd: "%d days",
    M: "1 month",
    MM: "%d months",
    y: "1 year",
    yy: "%d years",
  },
});

/**
 * Convert a date to a relative time
 */
export const fromNow = (date) => {
  return dayjs(date).fromNow();
};
