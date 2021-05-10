// @ts-nocheck

const url = require('url');
const path = require('path');
const { argv } = require('yargs');

const magicImporter = require('node-sass-magic-importer');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const { mode } = argv;

const sourceMap = {
	sourceMap: mode === 'development'
};

const postcssOptions = {
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
	files: ['**/*.php', './assets/dist/app.css'],
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
	filename: 'dist/app.css'
};

const cleanConfig = {
	verbose: false,
	exclude: ['sprite.svg'],
	allowExternal: true
};

module.exports = () => {
	const isDevelopment = mode === 'development';
	const isProduction = mode === 'production';

	if (isProduction) {
		postcssOptions.plugins.push(require('postcss-merge-rules'), require('cssnano')());
	}

	if (isDevelopment) {
		postcssOptions.plugins.push(
			require('postcss-watch-folder')({
				folder: './assets/styles',
				main: './assets/styles/main.scss'
			})
		);
	}

	const config = {
		mode,
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
					test: /\.(sa|sc|c)ss$/,
					use: [
						{
							loader: MiniCssExtractPlugin.loader
						},
						{
							loader: 'css-loader',
							options: sourceMap
						},
						{
							loader: 'postcss-loader',
							options: { postcssOptions }
						},
						{
							loader: 'sass-loader',
							options: {
								sassOptions: {
									importer: magicImporter()
								},
								...sourceMap
							}
						}
					]
				}
			]
		},
		plugins: [
			new MiniCssExtractPlugin(extractTextConfig),
			new CleanWebpackPlugin(['../assets/dist/'], cleanConfig)
		],
		cache: true,
		bail: false,
		devtool: isDevelopment ? 'source-map' : false,
		stats: 'errors-only'
	};

	if (isDevelopment) {
		if (argv.url) {
			browserSyncConfig.host = url.parse(argv.url).hostname;
			browserSyncConfig.proxy = argv.url;
		}

		config.plugins.push(
			new BrowserSyncPlugin(browserSyncConfig, {
				reload: false
			})
		);
	}

	return config;
};
