const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const Dotenv = require('dotenv-webpack');
const { WebpackManifestPlugin } = require('webpack-manifest-plugin');

module.exports = (env, argv) => {
  const isDevelopment = argv.mode === 'development';

  return {
    entry: {
      main: './src/index.js',
    },
    output: {
      path: path.resolve(__dirname, 'public/dist'),
      filename: isDevelopment ? 'js/[name].js' : 'js/[name].[contenthash].js',
      clean: true,
      publicPath: '/dist/'
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env']
            }
          }
        },
        {
          test: /\.(sa|sc|c)ss$/,
          use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
            'postcss-loader',
            'sass-loader',
          ]
        },
        {
          test: /\.(png|svg|jpg|jpeg|gif)$/i,
          type: 'asset/resource',
          generator: {
            filename: 'images/[hash][ext][query]'
          }
        }
      ]
    },
    optimization: {
      minimize: !isDevelopment,
      minimizer: [
        new TerserPlugin(),
        new CssMinimizerPlugin()
      ],
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: isDevelopment ? 'css/[name].css' : 'css/[name].[contenthash].css'
      }),
      new WebpackManifestPlugin({
        publicPath: '/dist/'
      }),
      new BrowserSyncPlugin({
        proxy: 'https://yourproject.ddev.site',
        https: true,
        open: false,
        notify: false,
        files: [
          '**/*.php',
          'public/dist/**/*.js',
          'public/dist/**/*.css'
        ]
      }),
      new Dotenv()
    ],
    devtool: isDevelopment ? 'source-map' : false,
    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'src'),
      }
    }
  };
};