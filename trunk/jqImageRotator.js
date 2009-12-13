/**
 * jqBarGraph - jQuery plugin
 * @version: 1.0 (2009/11/12)
 * @requires jQuery v1.2.2 or later 
 * @author Ivan Lazarevic
 * website: http://www.workshop.rs/jqbargraph/
 
 * @param data: arrayOfData // array of data for your graph
 * @param title: false // title of your graph, accept HTML
 * @param barSpace: 10 // this is default space between bars in pixels
 * @param width: 400 // default width of your graph
 * @param height: 200 //default height of your graph
 * @param color: '#000000' // if you don't send colors for your data this will be default bars color
 * @param colors: false // array of colors that will be used for your bars and legends
 * @param lbl: '' // if there is no label in your array
 * @param sort: false // sort your data before displaying graph, you can sort as 'asc' or 'desc'
 * @param position: 'bottom' // position of your bars, can be 'bottom' or 'top'. 'top' doesn't work for multi type
 * @param prefix: '' // text that will be shown before every label
 * @param postfix: '' // text that will be shown after every label
 * @param animate: true // if you don't need animated appereance change to false
 * @param speed: 2 // speed of animation in seconds
 * @param legendWidth: 100 // width of your legend box
 * @param legend: false // if you want legend change to true
 * @param legends: false // array for legend. for simple graph type legend will be extracted from labels if you don't set this
 * @param type: false // for multi array data default graph type is stacked, you can change to 'multi' for multi bar type
 * @param showValues: true // you can use this for multi and stacked type and it will show values of every bar part
 * @param showValuesColor: '#fff' // color of font for values 

 * @example  $('#divForGraph').jqBarGraph({ data: arrayOfData });  
  
**/

(function($) {
	var opts = new Array;
	var level = new Array;
	var img = new Array;
	var titles = new Array;
	var order = new Array;
	var imgInc = new Array;
	var inc = new Array;
	var barInt = new Array;
	
	
	$.fn.jqImageRotator = $.fn.jqimagerotator = function(options){
	
	init = function(el){

		opts[el.id] = $.extend({}, $.fn.jqImageRotator.defaults, options);
		img[el.id] = new Array(); // images array
		titles[el.id] = new Array(); // titles array
		order[el.id] = new Array(); // bars order array
		imgInc[el.id] = 0;
		inc[el.id] = 0;
		
		startMe(el);

	};
	
	startMe = function(el){
		params = opts[el.id];

		// width of bars
		barWidth = parseInt(params.width / params.noOfBars); 
		gap = params.width - barWidth*params.noOfBars; // number of pixels
		barLeft = 0;

		// create images and titles arrays
		$.each($('#'+el.id+' img'), function(i,item){
			img[el.id][i] = $(item).attr('src');
			titles[el.id][i] = $(item).attr('alt') ? $(item).attr('alt') : '';
			$(item).hide();
		});

		// set first image
		$('#'+el.id).css({
			'background-image':'url('+img[el.id][0]+')',
			'width': params.width,
			'height': params.height,
			'position': 'relative',
			'background-position': 'top left'
			});
		$('#'+el.id).append("<div class='irTitle' id='title"+el.id+"' style='position: absolute; bottom:0; z-index: 1000'>"+titles[el.id][0]+"</div>");
	
		if(titles[el.id][imgInc[el.id]])
			$('#title'+el.id).css('opacity',opts[el.id].titleOpacity);
		else
			$('#title'+el.id).css('opacity',0);

		odd = 1;
		// creating bars
		// and set their position
		for(j=1; j < params.noOfBars+1; j++){
			
			if( gap > 0){
				tbarWidth = barWidth + 1;
				gap--;
			} else {
				tbarWidth = barWidth;
			}
				
			$('#'+el.id).append("<div class='ir"+el.id+"' id='ir"+el.id+j+"' style='width:"+tbarWidth+"px; height:"+params.height+"px; float: left; position: absolute;'></div>");

			// positioning bars
			$("#ir"+el.id+j).css({ 
				'background-position': -barLeft +'px top',
				'left' : barLeft 
			});
			
			barLeft += tbarWidth;

			if(params.barPosition == 'bottom')
				$("#ir"+el.id+j).css( 'bottom', 0 );
				
			if (j%2 == 0 && params.barPosition == 'alternate')
				$("#ir"+el.id+j).css( 'bottom', 0 );
	
			// bars order
				// fountain
				if(params.direction == 'fountain' || params.direction == 'fountainAlternate'){ 
					order[el.id][j-1] = parseInt(params.noOfBars/2) - (parseInt(j/2)*odd);
					order[el.id][params.noOfBars-1] = params.noOfBars; // fix for odd number of bars
					odd *= -1;
				} else {
				// linear
					order[el.id][j-1] = j;
				}
	
		}

			$('.ir'+el.id).mouseover(function(){
				opts[el.id].pause = true;
			});
		
			$('.ir'+el.id).mouseout(function(){
				opts[el.id].pause = false;
			});	
			
			$('#title'+el.id).mouseover(function(){
				opts[el.id].pause = true;
			});
		
			$('#title'+el.id).mouseout(function(){
				opts[el.id].pause = false;
			});				
		
		imgInt = setInterval(function() { callChange(el)  }, params.delay+params.barDelay*params.noOfBars);

	};

	// transition
	callChange = function(el){

		if(opts[el.id].pause == true) return;

		barInt[el.id] = setInterval(function() { change(order[el.id][inc[el.id]], el)  },opts[el.id].barDelay);
		
		$('#'+el.id).css({ 'background-image': 'url('+img[el.id][imgInc[el.id]]+')' });
		
		imgInc[el.id]++;

		if  (imgInc[el.id] == img[el.id].length) {
			imgInc[el.id] = 0;
		}
		
		if(titles[el.id][imgInc[el.id]]!=''){
			$('#title'+el.id).animate({ opacity: 0 }, opts[el.id].titleSpeed, function(){
				$(this).html(titles[el.id][imgInc[el.id]]).animate({ opacity: opts[el.id].titleOpacity }, opts[el.id].titleSpeed);
			});
		} else {
			$('#title'+el.id).animate({ opacity: 0}, opts[el.id].titleSpeed);
		}
		
		inc[el.id] = 0;

		if(opts[el.id].direction == 'random')
			fisherYates (order[el.id]);
			
		if((opts[el.id].direction == 'right' && order[el.id][0] == 1) 
			|| opts[el.id].direction == 'alternate'
			|| opts[el.id].direction == 'fountainAlternate')			
				order[el.id].reverse();		
	};


	// bar animations
	change = function(itemId, el){

		temp = opts[el.id].noOfBars;
		if (inc[el.id] == temp) {
			clearInterval(barInt[el.id]);
			return;
		}
		
		$('#ir'+el.id+itemId).css({ height: 0, opacity: 0, 'background-image': 'url('+img[el.id][imgInc[el.id]]+')' });
		$('#ir'+el.id+itemId).animate({ height: opts[el.id].height, opacity: 1 }, 1000);
		inc[el.id]++;
		
	};

	// shuffle array function
	fisherYates = function(myArray) {
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
		
	this.each (
		function(){ init(this); }
	);
	
	
	
	
};

	// default values
	$.fn.jqImageRotator.defaults = {	
		width: 500,
		height: 332,
		noOfBars: 20,
		delay: 5000,
		barDelay: 50,
		titleOpacity: 0.8,
		titleSpeed: 1000,
		barPosition: 'top', // top, bottom, alternate
		direction: 'alternate' // left, right, alternate, random, fountain, fountainAlternate
		
	};
	
})(jQuery);