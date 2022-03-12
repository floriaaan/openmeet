
/**
 * 
 * @param  {(string | boolean | null | undefined)[]} arr 
 * @returns {string} className
 */
export function classes(...arr) {
    return arr.filter(Boolean).join(" ");
  }