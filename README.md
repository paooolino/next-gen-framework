# next-gen-framework

Built-in php server
====================
npm start

Tests
====================
npm test

References
===========
https://github.com/jimmiw/php-mvc-base

Documentation
==============
vendor/bin/phpdoc -d ./lib -t ./docs/api

Schema
=======


									executes					Data
									|										|
Request -> Router -> Controller -> View -> Response
				|		^										|		|		|								
				|		|										|		|		Render()
				|		routes							|		Template
				|												new View
				|
				Router.execute(Request)