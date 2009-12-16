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
	plugin for displaying your photos as slideshow with fancy transition effects.
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
		<img src="terrace_view_marko_manojlovic.jpg" 
			 alt="<i>Terrace View <a href='http://sniperyu.deviantart.com/'>by Marko Manojlovic</a></i>" />
		<img src="nbg1_goran_jovanovic.jpg" 
			 alt="NBG #1 <i><a href='http://picasaweb.google.com/azzazel'>by Goran Jovanovic</a></i>" />
		<img src="zakynthos_ivan_jekic.jpg" 
			 alt="Navagio beach Zakynthos <i><a href='http://ivframes.com/'>by Ivan Jekic</a></i>" />			 
		<img src="blue_window_igor_srdanovic.jpg" 
			 alt="Blue Window <i><a href='http://www.igorsrdanovic.com'>by Igor Srdanovic</a></i>" />
	</div>
	
</div>


<br clear="all" />

<script>

	$('#ft').jqFancyTransitions();

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

You have three predifined effects that you can use:
<ul>
	<li>Wave</li>
	<li>Curtain</li>
	<li>Zipper</li>
</ul>
Of course, you can made custom effect with set of options that you can use to set speed, number of strips, direction, type of effect, etc.<br /><br />
<code>

	<strong>effect:</strong> '' <span class="comment">// wave, zipper, curtain</span><br />
	<strong>width:</strong> 500 <span class="comment">// width of panel</span><br />
	<strong>height:</strong> 332 <span class="comment">// height of panel</span><br />
	<strong>strips:</strong> 20 <span class="comment">// number of strips</span><br />
	<strong>delay:</strong> 5000 <span class="comment">// delay between images in ms</span><br />
	<strong>stripDelay:</strong> 50 <span class="comment">// delay beetwen strips in ms</span><br />
	<strong>titleOpacity:</strong> 0.7 <span class="comment">// opacity of title</span><br />
	<strong>titleSpeed:</strong> 1000 <span class="comment">// speed of title appereance in ms</span><br />
	<strong>position:</strong> 'alternate' <span class="comment">// top, bottom, alternate, curtain</span><br />
	<strong>direction:</strong> 'fountainAlternate' <span class="comment">// left, right, alternate, random, fountain, fountainAlternate</span>

</code>
</p>

</div>

<br clear="all" />

<div id="examples">
	<h1>Examples</h1><br />
<br />

	<div class="exampleMenu">
	    <a href="javascript:void(0);" id="effWave" class="eEff">wave</a>
	    <a href="javascript:void(0);" id="effZipper" class="eEff">zipper</a>	
	    <a href="javascript:void(0);" id="effCurtain" class="eEff">curtain</a>	        
		<a href="javascript:void(0);" id="effFountainTop" class="eComb">fountain top</a> 
		<a href="javascript:void(0);" id="effRandomTop" class="eComb">random top</a>
		<a href="javascript:void(0);" id="effCurtainAlternate" class="eComb exampleActive">curtain alternate</a>
		<a href="javascript:void(0);" id="effLeftTop" class="eComb">left top</a>
		<a href="javascript:void(0);" id="effRightBottom" class="eComb">right bottom</a>		
	</div>

	<div id="example">
		<img src="terrace_view_marko_manojlovic.jpg" 
			 alt="<i>Terrace View <a href='http://sniperyu.deviantart.com/'>by Marko Manojlovic</a></i>" />
		<img src="nbg1_goran_jovanovic.jpg" 
			 alt="NBG #1 <i><a href='http://picasaweb.google.com/azzazel'>by Goran Jovanovic</a></i>" />
		<img src="zakynthos_ivan_jekic.jpg" 
			 alt="Navagio beach Zakynthos <i><a href='http://ivframes.com/'>by Ivan Jekic</a></i>" />			 
		<img src="blue_window_igor_srdanovic.jpg" 
			 alt="Blue Window <i><a href='http://www.igorsrdanovic.com'>by Igor Srdanovic</a></i>" />
	</div>
	
	<script>
		$('#example').jqFancyTransitions({ position: 'curtain' });

		$('#effCurtainAlternate').click( function(){
			$('#example').jqFancyTransitions({ position: 'curtain', direction: 'alternate' });
			$('#positionDyn').html('curtain');
			$('#directionDyn').html('alternate');
		});

		$('#effFountainTop').click( function(){
			$('#ft-title-example, .ft-example').remove();
			$('#example').jqFancyTransitions({ position: 'top', direction: 'fountain' });
			$('#positionDyn').html('top');
			$('#directionDyn').html('fountain');
		});	

		$('#effRandomTop').click( function(){
			$('#ft-title-example, .ft-example').remove();
			$('#example').jqFancyTransitions({ position: 'top', direction: 'random' });
			$('#positionDyn').html('random');
			$('#directionDyn').html('top');
		});	

		$('#effLeftTop').click( function(){
			$('#ft-title-example, .ft-example').remove();
			$('#example').jqFancyTransitions({ position: 'top', direction: 'left' });
			$('#positionDyn').html('left');
			$('#directionDyn').html('top');
		});	

		$('#effRightBottom').click( function(){
			$('#ft-title-example, .ft-example').remove();
			$('#example').jqFancyTransitions({ position: 'bottom', direction: 'right' });
			$('#positionDyn').html('right');
			$('#directionDyn').html('bottom');
		});			

		$('.eComb').click( function(){
			$('#eComb').show();
			$('#eEff').hide();
			$('.eComb').removeClass('exampleActive');
			$('.eEff').removeClass('exampleActive');			
			$(this).addClass('exampleActive');
		});	

		$('.eEff').click( function(){
			$('#eComb').hide();
			$('#eEff').show();
			$('.eEff').removeClass('exampleActive');
			$('.eComb').removeClass('exampleActive');			
			$(this).addClass('exampleActive');			
		});	

		$('#effWave').click( function(){
			$('#ft-title-example, .ft-example').remove();
			$('#example').jqFancyTransitions({ effect: 'wave' });
			$('#effDyn').html('wave');
		});		

		$('#effZipper').click( function(){
			$('#ft-title-example, .ft-example').remove();
			$('#example').jqFancyTransitions({ effect: 'zipper' });
			$('#effDyn').html('zipper');
		});		

		$('#effCurtain').click( function(){
			$('#ft-title-example, .ft-example').remove();
			$('#example').jqFancyTransitions({ effect: 'curtain' });
			$('#effDyn').html('curtain');
		});	
		
	</script>
	
	<code>
	$("#example").jqFancyTransitions({<br />
	<span id="eComb">
	&nbsp;&nbsp;&nbsp;position: '<span id="positionDyn" class="dyn">curtain</span>',<br />
	&nbsp;&nbsp;&nbsp;direction: '<span id="directionDyn" class="dyn">alternate</span>'<br />	
	</span>
	<span id="eEff" style="display: none;">&nbsp;&nbsp;&nbsp;effect: '<span id="effDyn" class="dyn"></span>'<br /></span>
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
		<li>If you find a bug, have any comments, questions or just want to show me where you use this plugin you can <a href="mailto:devet.sest@gmail.com">leave a message on workshop blog</a>.</li> 
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