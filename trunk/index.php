<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="SHORTCUT ICON" href="favicon.ico" type="image/x-icon" />

<meta name="description" content="jqLastFM is easy-to-use jQuery plugin for displaying your LastFM data." />
<meta name="keywords" content="jquery plugin,lastFM,jquery LastFM" />

<script type="text/javascript" src="jquery-1.3.2.js"></script>
<script type="text/javascript" src="jqImageRotator.js"></script>
<link rel="stylesheet" href="styles.css" type="text/css" />

<title>jqImageRotator: jQuery Image Rotator Plugin</title>
</head>
<body> 

<div id="head">
<h1>jqImageRotator<br />
<small>strip curtains</small></h1>

<p class="headText">
<strong>jqImageRotator</strong> is easy-to-use <a href="http://www.jquery.com" target="_blank">jQuery</a> 
plugin for displaying your gallery with fancy transition effects.
</p>

<p class="headText">
<strong>jqImageRotator</strong> is compatible and fully tested with Safari 2+, Internet Explorer 6+, Firefox 2+, Google Chrome 3+, Opera 9+.
</p>
<br />
<h2>Download jqLastFM</h2>
<p class="download headText">
<a href="http://code.google.com/p/jqbargraph/downloads/list">unpacked version (8.9kb)</a><br />
<a href="http://code.google.com/p/jqbargraph/downloads/list">minified version (4.8kb)</a><br />
<a href="http://code.google.com/p/jqbargraph/downloads/list">packed version (3.6kb)</a>
</p>
</div>


<div id="imageRotatorHolder">

	<div id="imageRotator">
		<img src="http://ivframes.com/wp-content/uploads/2008/11/navagio3.jpg" alt="Morning after<br /><a href='http://ivframes.com'>http://ivframes.com</a>" />	
		<img src="http://fc03.deviantart.net/fs40/i/2009/030/7/1/Plain_Grass_by_sniperyu.jpg" alt="Stolen banner" />
		<img src="01.jpg" alt="Marlboro party in Belgrade Fair Hall" />
		<img src="02.jpg" alt="My friend Alek is party maniac" />
		<img src="http://lh5.ggpht.com/_mCj40vYK9_0/Rr4g6wM_JlI/AAAAAAAAAjA/EgC61Pvy6-w/s640/Picture-002.jpg" alt="Goran Jovanovic" />
		<img src="http://www.igorsrdanovic.com/wp-content/uploads/2009/11/DSC_2529.jpg" alt="Driving to the next location" />
	</div>
	
</div>


<br clear="all" />


<div id="dva">
	<img src="02.jpg" />
	<img src="05.jpg" alt="eeee" />
</div>
<script>

$('#imageRotator').jqimagerotator({ delay: 3000 });


$('#dva').jqimagerotator({ width: 400, height: 200, barDelay: 50, noOfBars:1, barPosition: 'top', direction: 'fountainAlternate' });

/*
	var inc = 0;
	var el;
	//var arr = new Array(13,5,2,15,18,6,1,17,12,3,9,11,7,10,8,16,20,4,19,14);
	var arr = new Array(10,11,9,12,8,13,7,14,6,15,5,16,4,17,3,18,2,19,1,20);
	var arr = new Array();
	var img = new Array();
	var titles = new Array();
	//var img = new Array('06.jpg','01.jpg','02.jpg','03.jpg','04.jpg');
	//var titles = new Array(
	//	'Na mecavniku','Marlboro crazy party chicks','Alek luduje kao po obicaju','Gde cemo sad?','U kolima, kao idemo negde'
	//);
	var imgInc = 0;
	var barWidth = 20;
	var pause = false;
	var noOfBars = 30;

	// create images and titles arrays
	$.each($('#imageRotator img'), function(i,item){
		img[i] = $(item).attr('src');
		titles[i] = $(item).attr('alt');
		$(item).hide();
		
	});
	
	// set first image
	$('#imageRotator').css('background-image','url('+img[0]+')');
	$('#imageRotator').append("<div id='title'>"+titles[0]+"</div>");

	odd = 1;
	
	// creating bars
	for(j = 1; j < noOfBars+1; j++){
		$('#imageRotator').append("<div class='ir' id='ir"+j+"' style='width:"+barWidth+"px'></div>");

		// bars order
		
		// straight
		//arr[j-1] = j;
		
		// fountain 
		arr[j-1] = noOfBars/2 - (parseInt(j/2)*odd);
		odd *= -1;

	}

	// positining bars
	$.each($(".ir"), function(i,item){
		$(item).css({ 
			'background-position': -barWidth*i+'px top',
			'left' : barWidth*i
			});
		// if (i%2 == 0)
		//	$(item).css( 'bottom', 0 );  
	});

	$('.ir').mouseover(function(){
		pause = true;
	});

	$('.ir').mouseout(function(){
		pause = false;
	});	

	// set transition interval
	el2 = setInterval(function() { callChange()  }, 5000+50*noOfBars);

	// transition
	function callChange(){	
		if(pause == true) return;
		el = setInterval(function() { change(arr[inc])  }, 50);
		$('#imageRotator').css({ 'background-image': 'url('+img[imgInc]+')' });
		
		imgInc++;

		if  (imgInc == img.length) {
			imgInc = 0;
		}
		$('#title').animate({ opacity: 0 }, 1000, function(){
			$(this).html(titles[imgInc]).animate({ opacity: 0.85 }, 1000);
			});
		inc = 0;
		//fisherYates (arr);
		arr.reverse();
	}

	// bar animations
	function change(itemId){
		
		if (inc == noOfBars) {
			clearInterval(el);
			return;
		}

		$('#ir'+itemId).css({ height: 0, opacity: 0, 'background-image': 'url('+img[imgInc]+')' });
		$('#ir'+itemId).animate({ height: 450, opacity: 1 }, 1000);
		inc++;
	}


	// random function
	function fisherYates ( myArray ) {
		  var i = myArray.length;
		  if ( i == 0 ) return false;
		  while ( --i ) {
		     var j = Math.floor( Math.random() * ( i + 1 ) );
		     var tempi = myArray[i];
		     var tempj = myArray[j];
		     myArray[i] = tempj;
		     myArray[j] = tempi;
		   }
		}	
	*/
</script>

<br clear="all" />
<div id = "doc">

<h1>Documentation</h1>

<p>

This plugin is really easy to use. After you download plugin and include on your page, all you have to do is to create placeholder with some ID on you page and put next code bellow that:<br />
<br />
<code>
	$("#placeHolderID").jqImageRotator({ user: 'your_username' });
</code><br />
<br />
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
		<li>jqLastFM is jQuery plugin, so you'll need <a href="http://www.jquery.com" target="_blank">jQuery</a> if you want this to work.</li>
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