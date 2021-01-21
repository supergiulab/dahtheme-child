const path = require('path'),
	  webpack = require('webpack'),
	  settings = require('./settings');

module.exports = {
	entry: settings.themeLocation + "/assets/theme/js/app.js",
	output: {
		path: settings.themeLocation + "/assets/theme",
		filename: "app.min.js"
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
		}
		]
	},
	// plugins: [
	// 	new webpack.ProvidePlugin({
	// 		$: 'jquery',
	// 		jQuery: 'jquery',
	// 		'window.jQuery': 'jquery'
	// 	}),
	// ],
	resolve: {
		modules: ['node_modules'],
		alias: {
			'owl.carousel' : 'owl.carousel/dist/owl.carousel.min.js',
			'waypoints' : 'waypoints/lib/jquery.waypoints.js'
		}
	},
	mode: 'production'
}