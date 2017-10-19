/**
 * Components are lazy-loaded - See "Grouping Components in the Same Chunk"
 * http://router.vuejs.org/en/advanced/lazy-loading.html
 */
/* eslint-disable global-require */
export const VisualBuilder = r => require.ensure([], () => r(require('./main')), 'plugin-builder-bundle');