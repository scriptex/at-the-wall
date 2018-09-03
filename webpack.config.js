const url = require('url');
const path = require('path');
const { argv } = require('yargs');

const magicImporter = require('node-sass-magic-importer');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');

const sourceMap = {
	sourceMap: argv.env.NODE_ENV === 'development'
};

const postcssConfig = {
	plugins: [
		require('postcss-easy-import'),
		require('postcss-url')({
			url: 'rebase'
		}),
		require('postcss-normalize')({
			forceImport: true
		}),
		require('postcss-utilities'),
		require('postcss-flexbugs-fixes'),
		require('autoprefixer')()
	],
	...sourceMap
};

const browserSyncConfig = {
	host: 'localhost',
	port: 3000,
	open: 'external',
	files: [
		'**/*.php',
		'./assets/dist/app.css'
	],
	ghostMode: {
		clicks: false,
		scroll: true,
		forms: {
			submit: true,
			inputs: true,
			toggles: true
		}
	},
	snippetOptions: {
		rule: {
			match: /<\/body>/i,
			fn: (snippet, match) => `${snippet}${match}`
		}
	},
	proxy: 'localhost'
};

const extractTextConfig = {
	filename: 'dist/app.css',
	allChunks: true
};

const cleanConfig = {
	verbose: false
};

module.exports = env => {
	const isDevelopment = env.NODE_ENV === 'development';
	const isProduction = env.NODE_ENV === 'production';

	if (isProduction) {
		postcssConfig.plugins.push(
			require('postcss-merge-rules'),
			require('cssnano')({
				discardComments: {
					removeAll: true
				}
			})
		);
	}

	if (isDevelopment) {
		postcssConfig.plugins.push(
			require('postcss-watch-folder')({
				folder: './assets/styles',
				main: './assets/styles/main.scss'
			})
		);
	}

	const config = {
		mode: env.NODE_ENV,
		entry: ['./assets/styles/main.scss', './assets/scripts/main.js'],
		output: {
			path: path.resolve(__dirname, './assets'),
			filename: 'dist/app.js'
		},
		resolve: {
			modules: ['node_modules']
		},
		module: {
			rules: [
				{
					test: /\.scss$/,
					use: ExtractTextPlugin.extract({
						use: [
							{
								loader: 'css-loader',
								options: sourceMap
							},
							{
								loader: 'postcss-loader',
								options: postcssConfig
							},
							{
								loader: 'sass-loader',
								options: {
									importer: magicImporter(),
									...sourceMap
								}
							}
						]
					})
				}
			]
		},
		plugins: [
			new ExtractTextPlugin(extractTextConfig),
			new CleanWebpackPlugin(['./assets/dist/'], cleanConfig)
		],
		cache: true,
		bail: false,
		devtool: isDevelopment ? 'source-map' : false,
		stats: 'errors-only'
	};

	if (isDevelopment) {
		if (env.url) {
			browserSyncConfig.host = url.parse(env.url).hostname;
			browserSyncConfig.proxy = env.url;
		}

		config.plugins.push(
			new BrowserSyncPlugin(browserSyncConfig, {
				reload: false
			})
		);
	}

	return config;
};
