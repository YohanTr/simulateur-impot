/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './assets/**/*.js',       // Les fichiers Vue et JS dans le dossier assets
    './assets/**/*.vue',       // Les fichiers Vue et JS dans le dossier assets
    './templates/**/*.html.twig', // Les fichiers Twig
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
