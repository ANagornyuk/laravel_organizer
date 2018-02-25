<!DOCTYPE html>
<html>
<head>
	<title>Twitter Bootstrap jQuery Calendar component</title>

	<meta name="description" content="Full view calendar component for twitter bootstrap with year, month, week, day views.">
	<meta name="keywords" content="jQuery,Bootstrap,Calendar,HTML,CSS,JavaScript,responsive,month,week,year,day">
	<meta name="author" content="Serhioromano">
	<meta charset="UTF-8">

	<link rel="stylesheet" href="{{asset('/components/bootstrap2/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('/components/bootstrap2/css/bootstrap-responsive.css')}}">
	<link rel="stylesheet" href="{{asset('css/calendar.css')}}">
	<!--
	<style type="text/css">
		.btn-twitter {
			padding-left: 30px;
			background: rgba(0, 0, 0, 0)
						url(https://platform.twitter.com/widgets/images/btn.27237bab4db188ca749164efd38861b0.png)
						-20px 6px no-repeat;
			background-position: -20px 11px !important;
		}
		.btn-twitter:hover {
			background-position:  -20px -18px !important;
		}
	</style>
	-->
	<style>
		.top-right {
			position: absolute;
			right: 10px;
			top: 18px;
		}
		.links > a {
			color: #636b6f;
			padding: 0 25px;
			font-size: 12px;
			font-weight: 600;
			letter-spacing: .1rem;
			text-decoration: none;
			text-transform: uppercase;
		}
	</style>
</head>
<body>
<div class="container">
	<!--
	<div class="hero-unit">
		<h1>Bootstrap Calendar Demo</h1>

		<p>Bootstrap based full view calendar. Template based.</p>

		<a class="btn btn-inverse" href="https://github.com/Serhioromano/bootstrap-calendar">Fork on GitHub</a>
		<a class="btn" href="../../public/index-bs3.html">Use bootstrap 3</a>
		<a href="https://twitter.com/serhioromano" class="btn btn-twitter" data-show-count="false" data-size="large">Follow @serhioromano</a>
		<script>
			function(d,s,id){
		    var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
		    if(!d.getElementById(id)){
		        js=d.createElement(s);
		        js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
		        fjs.parentNode.insertBefore(js,fjs);}
			}
			(document, 'script', 'twitter-wjs');
		</script>
	</div>
	-->
	<div class="hero-unit" style="position:relative; background-color: #fff">
		@if (Route::has('login'))
			<div class="top-right links">
				@auth
					<a href="{{ url('/home') }}">Home</a>
				@else
					<a href="{{ route('login') }}">Login</a>
					<a href="{{ route('register') }}">Register</a>
				@endauth
			</div>
			<div class="top-left links">
				@auth
					<a href="{{ url('/event') }}">Create new event</a>
				@endauth
			</div>
		@endif
	</div>

	<div class="page-header">

		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
				<button class="btn" data-calendar-nav="today">Today</button>
				<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" data-calendar-view="year">Year</button>
				<button class="btn btn-warning active" data-calendar-view="month">Month</button>
				<button class="btn btn-warning" data-calendar-view="week">Week</button>
				<button class="btn btn-warning" data-calendar-view="day">Day</button>
			</div>
		</div>

		<h3></h3>
	</div>

	<div class="row">
		<div class="span9">
			<div id="calendar"></div>
		</div>
		<div class="span3">
			<div class="row-fluid">
				<select id="first_day" class="span12">
					<option value="" selected="selected">First day of week language-dependant</option>
					<option value="2">First day of week is Sunday</option>
					<option value="1">First day of week is Monday</option>
				</select>
				<select id="language" class="span12">
					<option value="">Select Language (default: en-US)</option>
					<option value="bg-BG">Bulgarian</option>
					<option value="nl-NL">Dutch</option>
					<option value="fr-FR">French</option>
					<option value="de-DE">German</option>
					<option value="el-GR">Greek</option>
					<option value="hu-HU">Hungarian</option>
					<option value="id-ID">Bahasa Indonesia</option>
					<option value="it-IT">Italian</option>
					<option value="pl-PL">Polish</option>
					<option value="pt-BR">Portuguese (Brazil)</option>
					<option value="ro-RO">Romania</option>
					<option value="es-CO">Spanish (Colombia)</option>
					<option value="es-MX">Spanish (Mexico)</option>
					<option value="es-ES">Spanish (Spain)</option>
					<option value="es-CL">Spanish (Chile)</option>
					<option value="es-DO">Spanish (República Dominicana)</option>
					<option value="ru-RU">Russian</option>
					<option value="sk-SR">Slovak</option>
					<option value="sv-SE">Swedish</option>
					<option value="zh-CN">简体中文</option>
					<option value="zh-TW">繁體中文</option>
					<option value="ko-KR">한국어</option>
					<option value="th-TH">Thai (Thailand)</option>
				</select>
				<label class="checkbox">
					<input type="checkbox" value="#events-modal" id="events-in-modal"> Open events in modal window
				</label>
				<label class="checkbox">
					<input type="checkbox" id="format-12-hours"> 12 Hour format
				</label>
				<label class="checkbox">
					<input type="checkbox" id="show_wb" checked> Show week box
				</label>
				<label class="checkbox">
					<input type="checkbox" id="show_wbn" checked> Show week box number
				</label>
			</div>

			<h4>Events</h4>
			<small>This list is populated with events dynamically</small>
			<ul id="eventlist" class="nav nav-list"></ul>
		</div>
	</div>

	<!--
	<div class="clearfix"></div>
	<br><br>
	<a href="https://github.com/Serhioromano/bootstrap-calendar/issues" class="btn btn-block btn-info">
		<center>
			<span class="lead">
				Submit an issue, ask questions or give your ideas here!<br>
			</span>
			<small>Please do not post your "How to ..." questions in comments. use GitHub issue tracker.</small>
		</center>
	</a>
	<br><br>

	<div id="disqus_thread"></div>
	<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

	<div class="modal hide fade" id="events-modal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Event</h3>
		</div>
		<div class="modal-body" style="height: 400px">
		</div>
		<div class="modal-footer">
			<a href="#" data-dismiss="modal" class="btn">Close</a>
		</div>
	</div>
	-->

	<script type="text/javascript" src="{{asset('components/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('components/underscore/underscore-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('components/bootstrap2/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('components/jstimezonedetect/jstz.min.js')}}"></script>
	<script type="text/javascript" src="../../public/js/language/bg-BG.js"></script>
	<script type="text/javascript" src="../../public/js/language/nl-NL.js"></script>
	<script type="text/javascript" src="../../public/js/language/fr-FR.js"></script>
	<script type="text/javascript" src="../../public/js/language/de-DE.js"></script>
	<script type="text/javascript" src="../../public/js/language/el-GR.js"></script>
	<script type="text/javascript" src="../../public/js/language/it-IT.js"></script>
	<script type="text/javascript" src="../../public/js/language/hu-HU.js"></script>
	<script type="text/javascript" src="../../public/js/language/pl-PL.js"></script>
	<script type="text/javascript" src="../../public/js/language/pt-BR.js"></script>
	<script type="text/javascript" src="../../public/js/language/ro-RO.js"></script>
	<script type="text/javascript" src="../../public/js/language/es-CO.js"></script>
	<script type="text/javascript" src="../../public/js/language/es-MX.js"></script>
	<script type="text/javascript" src="../../public/js/language/es-ES.js"></script>
	<script type="text/javascript" src="../../public/js/language/es-CL.js"></script>
	<script type="text/javascript" src="../../public/js/language/es-DO.js"></script>
	<script type="text/javascript" src="../../public/js/language/ru-RU.js"></script>
	<script type="text/javascript" src="../../public/js/language/sk-SR.js"></script>
	<script type="text/javascript" src="../../public/js/language/sv-SE.js"></script>
	<script type="text/javascript" src="../../public/js/language/zh-CN.js"></script>
	<script type="text/javascript" src="../../public/js/language/cs-CZ.js"></script>
	<script type="text/javascript" src="../../public/js/language/ko-KR.js"></script>
	<script type="text/javascript" src="../../public/js/language/zh-TW.js"></script>
	<script type="text/javascript" src="../../public/js/language/id-ID.js"></script>
	<script type="text/javascript" src="../../public/js/language/th-TH.js"></script>
	<script type="text/javascript" src="{{asset('js/calendar.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

	<!--
	<script type="text/javascript">
		var disqus_shortname = 'bootstrapcalendar'; // required: replace example with your forum shortname
		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
	</script>
	-->
</div>
</body>
</html>
