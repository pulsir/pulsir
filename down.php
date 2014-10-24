<?php
    if (!function_exists('http_response_code')) {
        function http_response_code($code = NULL) {

            if ($code !== NULL) {

                switch ($code) {
                    case 100: $text = 'Continue'; break;
                    case 101: $text = 'Switching Protocols'; break;
                    case 200: $text = 'OK'; break;
                    case 201: $text = 'Created'; break;
                    case 202: $text = 'Accepted'; break;
                    case 203: $text = 'Non-Authoritative Information'; break;
                    case 204: $text = 'No Content'; break;
                    case 205: $text = 'Reset Content'; break;
                    case 206: $text = 'Partial Content'; break;
                    case 300: $text = 'Multiple Choices'; break;
                    case 301: $text = 'Moved Permanently'; break;
                    case 302: $text = 'Moved Temporarily'; break;
                    case 303: $text = 'See Other'; break;
                    case 304: $text = 'Not Modified'; break;
                    case 305: $text = 'Use Proxy'; break;
                    case 400: $text = 'Bad Request'; break;
                    case 401: $text = 'Unauthorized'; break;
                    case 402: $text = 'Payment Required'; break;
                    case 403: $text = 'Forbidden'; break;
                    case 404: $text = 'Not Found'; break;
                    case 405: $text = 'Method Not Allowed'; break;
                    case 406: $text = 'Not Acceptable'; break;
                    case 407: $text = 'Proxy Authentication Required'; break;
                    case 408: $text = 'Request Time-out'; break;
                    case 409: $text = 'Conflict'; break;
                    case 410: $text = 'Gone'; break;
                    case 411: $text = 'Length Required'; break;
                    case 412: $text = 'Precondition Failed'; break;
                    case 413: $text = 'Request Entity Too Large'; break;
                    case 414: $text = 'Request-URI Too Large'; break;
                    case 415: $text = 'Unsupported Media Type'; break;
                    case 500: $text = 'Internal Server Error'; break;
                    case 501: $text = 'Not Implemented'; break;
                    case 502: $text = 'Bad Gateway'; break;
                    case 503: $text = 'Service Unavailable'; break;
                    case 504: $text = 'Gateway Time-out'; break;
                    case 505: $text = 'HTTP Version not supported'; break;
                    default:
                        exit('Unknown http status code "' . htmlentities($code) . '"');
                    break;
                }

                $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');

                header($protocol . ' ' . $code . ' ' . $text);

                $GLOBALS['http_response_code'] = $code;

            } else {

                $code = (isset($GLOBALS['http_response_code']) ? $GLOBALS['http_response_code'] : 200);

            }

            return $code;

        }
    } http_response_code(503); ?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
	<title>pulsir is down</title>
	<!-- based on the reddit downtime page -->
	<style>

		html { overflow:hidden; }
		body { font: 60px 'Helvetica', Arial, sans-serif; letter-spacing:0; margin:0; overflow:hidden; background:#25d; color:#fff; }
		html, body, #container {
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
		}
		.message{
			background-color: #fff;
		}

		/* Thanks, http://www.colorzilla.com/gradient-editor/ */
		#container {
			background: rgb(105,181,113); /* Old browsers */
			background: -moz-linear-gradient(-45deg,  rgba(105,181,113,1) 0%, rgba(121,209,182,1) 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,rgba(105,181,113,1)), color-stop(100%,rgba(121,209,182,1))); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(-45deg,  rgba(105,181,113,1) 0%,rgba(121,209,182,1) 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(-45deg,  rgba(105,181,113,1) 0%,rgba(121,209,182,1) 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(-45deg,  rgba(105,181,113,1) 0%,rgba(121,209,182,1) 100%); /* IE10+ */
			background: linear-gradient(135deg,  rgba(105,181,113,1) 0%,rgba(121,209,182,1) 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#69b571', endColorstr='#79d1b6',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

		}

	h1, h2 { margin:0; /** text-shadow:0 5px 0px rgba(0,0,0,.2); **/ }
	h1 { font-size:1em; }
	h2 { font-size:.5em; }
	a { color:#fff; }
	h3 { font-size:.25em; margin:1em 50px; }
	h3, h3 a { color:#fff; }
	h3 img { margin:0 3px; }
	#title { position:absolute; top:50%; width:100%; height:322px; margin-top:-180px; text-align:center; z-index:10; }
	.cloud { position:absolute; display:block; }
	.puff { position:absolute; display:block; width:15px; height:15px; background:white; opacity:.05; filter:alpha(opacity=5); }
</style>
<script>
	function randomInt(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min
	}

	function randomChoice(items) {
		return items[randomInt(0, items.length-1)]
	}

	var PIXEL_SIZE = 7

	function makeCloud() {
		var w = 8,
		h = 5,
		maxr = Math.sqrt(w*w + h*h),
		density = .4
		
		var cloud = document.createElement('div')
		cloud.className = 'cloud'
		for (var x=-w; x<=w; x++) {
			for (var y=-h; y<=h; y++) {
				r = Math.sqrt(x*x + y*y)
				if (r/maxr < Math.pow(Math.random(), density)) {
					var puff = document.createElement('div')
					puff.className = 'puff'
					puff.style.left = (x + w) * PIXEL_SIZE + 'px'
					puff.style.top = (y + h) * PIXEL_SIZE + 'px'
					cloud.appendChild(puff)
				}
			}
		}
		return cloud
	}

	clouds = []

	function randomPosition(max) {
		return Math.round(randomInt(-400, max)/PIXEL_SIZE)*PIXEL_SIZE
	}

	function addCloud(randomLeft) {
		var cloudiness = 0.3

		if (Math.random() < cloudiness) {
			newCloud = {
				x: randomLeft ? randomPosition(document.documentElement.clientWidth) : -400,
				el: makeCloud()
			}

			newCloud.el.style.top = randomPosition(document.documentElement.clientHeight) + 'px'
			newCloud.el.style.left = newCloud.x + 'px'
			document.body.appendChild(newCloud.el)
			clouds.push(newCloud)
		}
	}

	function animateClouds() {
		var speed = 25

		addCloud()

		var newClouds = []
		for (var i=0; i<clouds.length; i++) {
			var cloud = clouds[i]
			cloud.x += speed

			if (cloud.x > document.documentElement.clientWidth) {
				document.body.removeChild(cloud.el)
			} else {
				cloud.el.style.left = cloud.x + 'px'
				newClouds.push(cloud)
			}
		}
		
		clouds = newClouds
	}

	function changeMessage(msg) {
		var msgEl = document.getElementById('message')
		msgEl.innerHTML = msg || randomChoice(messages)
	}

	function startMessages() {
		try {
			if (window.sessionStorage) {
				var times
				if (sessionStorage.times) {
					times = ++sessionStorage.times
				} else {
					times = sessionStorage.times = 0
				}
				var msg = 'you have refreshed this page '+times+' time'+(times != 1 ? 's' : '')+'.'
				messages.push(msg)
			}
		} catch (e) {}

		setInterval(function() { changeMessage() }, 10*1000)
	}

	messages = [
	'f5... f5... f5... f5... f5... F5F5F5F5F5F5F5',
	'go outside',
	'so, this weather...',
	'go look at reddit or something',
	'go ahead, click refresh again.',
	'maybe there\'s something new on <a href="https://twitter.com/pulsir">@pulsir</a>',
	'go look at our source and <a href="http://github.com/pulsir">see if you can find the bug</a>.',
	'go watch sherlock or something',
	'hodor!',
	'it\'s not you, it\'s us.',
	'maybe I\'ll go write a blog po... ah, right.',
	'maybe we\'ll finally update it.',
	'nooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo!',
	'well, there goes our uptime.', 
	'GSOD: green screen of downtime',
	'wat',
	'SHUT DOWN EVERYTHING'
	]

	function start() {
		if (arguments.callee.ran) { return; }
		arguments.callee.ran = true

		startMessages()
		setInterval(animateClouds, 2*1000)

		for (n=0; n<50; n++) {
			addCloud(true)
		}
	}

	if (document.addEventListener) {
		document.addEventListener('DOMContentLoaded', start, false)
	}
	window.onload = start
</script>
</head>
<body>
	<div id="container">
		<div id="title">
			<h1>pulsir is down</h1>
			<h2>ask M.B.M. why</h2>
			<h3 id="message"></h3>
		</div>
	</div>
</body>
</html>
