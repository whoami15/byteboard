/**
 * Pluralize a word based on a count.
 */
export const pluralize = (count, word, suffix = "s") => {
  return `${word}${count !== 1 ? suffix : ""}`;
};
