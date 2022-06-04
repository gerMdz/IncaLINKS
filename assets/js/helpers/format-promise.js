/**
 * Formats a price buy adding a dot and normalizing decimals
 *
 * @param {number} promise
 * @returns {string}
 */
export default (promise) => (
    (promise / 1000000)
        .toLocaleString('es-AR', { maximumFractionDigits: 2, minimumIntegerDigits: 2 })
);
