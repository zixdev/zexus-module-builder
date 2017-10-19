// https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Operators/Spread_operator
// Thus a new array is created, containing all objects that match the routes.
import VisualBuilder from './visual-builder';

const routes = [
    ...VisualBuilder
];

routes.map(route => {
    Zexus.routes.push(route);
});
console.info('me first')