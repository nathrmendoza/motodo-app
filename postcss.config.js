module.exports = {
    plugins: [
      ['autoprefixer', {
        grid: true,
        flexbox: 'no-2009',
        browsers: ['> 1%', 'last 2 versions', 'not ie <= 11']
      }]
    ]
  };