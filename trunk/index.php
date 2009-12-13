<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="SHORTCUT ICON" href="favicon.ico" type="image/x-icon" />

<meta name="description" content="jqLastFM is easy-to-use jQuery plugin for displaying your LastFM data." />
<meta name="keywords" content="jquery plugin,lastFM,jquery LastFM" />

<script type="text/javascript" src="jquery-1.3.2.js"></script>
<script type="text/javascript" src="jqImageRotator.js"></script>
<link rel="stylesheet" href="styles.css" type="text/css" />

<title>jqFancyTransitions: jQuery Image Rotator Plugin</title>
</head>
<body> 

<div id="head">
	<h1><i>jqFancyTransitions</i><br />
	<small>slideshow with strip effects</small></h1>
	
	<p class="headText">
	<strong>jqFancyTransitions</strong> is easy-to-use <a href="http://www.jquery.com" target="_blank">jQuery</a> 
	plugin for displaying your gallery with fancy transition effects.
	</p>
	
	<p class="headText">
	<strong>jqFancyTransitions</strong> is compatible and fully tested with Safari 2+, Internet Explorer 6+, Firefox 2+, Google Chrome 3+, Opera 9+.
	</p>
	<br />
	<h2>Download</h2>
	<p class="download headText">
	<a href="http://code.google.com/p/jqbargraph/downloads/list">unpacked version (8.9kb)</a>
	<a href="http://code.google.com/p/jqbargraph/downloads/list">minified version (4.8kb)</a>
	<a href="http://code.google.com/p/jqbargraph/downloads/list">packed version (3.6kb)</a>
	</p>
</div>


<div id="ftHolder">

	<div id="ft">
		<img src="photo-1.jpg" alt="Marko Manojlovic" />
		<img src="http://farm3.static.flickr.com/2735/4133306402_575e142984.jpg" 
			 alt="Blue Window <i><a href='http://www.igorsrdanovic.com'>by Igor Srdanovic</a></i>" />
		<img src="http://lh5.ggpht.com/_mCj40vYK9_0/Rr4g6wM_JlI/AAAAAAAAAjA/EgC61Pvy6-w/s640/Picture-002.jpg" 
			 alt="NBG# 1 <i><a href='http://picasaweb.google.com/azzazel'>by Goran Jovanovic</a></i>" />
	</div>
	
</div>


<br clear="all" />


<script>

	$('#ft').jqimagerotator();

</script>

<br clear="all" />
<div id = "doc">

<h1>Documentation</h1>

<p>

This plugin is really easy to use. After you download plugin and include on your page, all you have to do is to create placeholder with some ID on you page and put next code bellow that:<br />
<br />
<code>
	$("#placeHolderID").jqFancyTransitions();
</code><br />

Of course, there are set of options that you can use to tune presentation of yout LastFM data.<br /><br />
<code>
	<strong>username:</strong> 'kopipejst' <span class="comment">// your LastFM username</span><br />
	<strong>api:</strong> '' <span class="comment">// by default this plugin use API key from LastFM documentation. you can put your LastFM API key here</span><br />
	<strong>limit:</strong> 10 <span class="comment">// number of records that you want to show</span><br />
	<strong>loading:</strong> '' <span class="comment">// text for placeholder while loading of data is in progress.</span>
</code>
</p>

</div>

<div id="examples">
	<h1>Examples</h1><br />
<code>
$("#simpleLastFM").jqLastFM({
	user: 'kopipejst',

});
</code>
</div>

<div id="note">
	
	<h1>Notes</h1>
	
	<ul>
		<li>jqFancyTransitions is jQuery plugin, so you'll need <a href="http://www.jquery.com" target="_blank">jQuery</a> if you want this to work.</li>
		<li>You can use and share this plugin absolutly free.</li>
		<li>Plugin is tested with jQuery 1.2.3. and jQuery 1.3.2. versions</li>
		<li>This graph will work without any additional CSS, but it can easily be styled via CSS.</li>
		<li>If you find a bug, have any comments, questions or just want to show me where you use this plugin you can <a href="mailto:devet.sest@gmail.com">email me</a>.</li> 
	</ul>
	
	</div>
	
	<div id="spread">
	<h1>Spread the word</h1>
	
	<ul>
		<li><a href="http://delicious.com/post?url=http://www.workshop.rs/jqbargraph&title=jqBarGraph: jQuery Bar Graph Plugin">Delicious</a></li> 
		<li><a href="http://www.stumbleupon.com/submit?url=http://www.workshop.rs/jqbargraph&title=jqBarGraph: jQuery Bar Graph Plugin">StumbleUpon</a></li>
		<li><a href="http://twitter.com/home?status=just%20found%20great%20jQuery%20plugin%20http://www.workshop.rs/jqbargraph">Tweeter</a></li>
		<li><a href="http://www.facebook.com/sharer.php?u=http://www.workshop.rs/jqbargraph">Facebook</a></li>  
		<li><a href="http://digg.com/submit?phase=2&url=http://www.workshop.rs/jqbargraph&title=jqBarGraph: jQuery Bar Graph Plugin">Digg</a></li> 
		<li><a href="http://reddit.com/submit?url=http://www.workshop.rs/jqbargraph&title=jqBarGraph: jQuery Bar Graph Plugin">Reddit</a></li> 
		<li><a href="http://technorati.com/faves?add=http://www.workshop.rs/jqbargraph">Technorati</a></li>
	
	</ul>
</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-11860629-1");
pageTracker._trackPageview();
} catch(err) {}
</script>

</body>
</html>