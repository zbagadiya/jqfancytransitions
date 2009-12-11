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
	
	$.fn.jqLastFM = $.fn.jqlastfm = function(options){
	
	init = function(el){

		opts[el.id] = $.extend({}, $.fn.jqLastFM.defaults, options);
		eval(opts[el.id].methoda+"(el);");

	};
	
	getrecenttracks = function(el){
		params = opts[el.id];
		$.getJSON("http://ws.audioscrobbler.com/2.0/?method=user."+params.methoda+"&user="+params.user+"&limit="+params.limit+"&api_key=b25b959554ed76058ac220b7b2e0a026&format=json&callback=?",
				function(data){
					//console.log(data);
					$('#simpleLastFM').html('');
					$.each(data.recenttracks.track, function(i,item){
						$('#simpleLastFM').append("<div>"+item.artist['#text']+" - "+item.name+"</div>");
						//console.log(item);
					});
		});
	}
		
	gettopalbums = function(el){
		params = opts[el.id];
		albumsArr = new Array();
		$.getJSON("http://ws.audioscrobbler.com/2.0/?method=user."+params.methoda+"&user="+params.user+"&api_key=b25b959554ed76058ac220b7b2e0a026&format=json&callback=?",
				function(data){
					$('#simpleLastFM').html('');
					$.each(data.topalbums.album, function(i,item){
						if(i < params.limit)
							albumsArr[i] = item;
					});
					
					//albumsArr.sort(sortNumberAsc);
					//console.log(albumsArr);
					
					$.each(albumsArr, function(i,item){
						$('#simpleLastFM').append("<div>"+item.name+" - "+item.artist['name']+" : "+item.playcount+"</div>");
					});
		});		
	}	
	
	
	gettopartists =function(el){
		params = opts[el.id];
		artistsArr = new Array();
		$(el).append(params.loading);
		$.getJSON("http://ws.audioscrobbler.com/2.0/?method=user."+params.methoda+"&user="+params.user+"&api_key=b25b959554ed76058ac220b7b2e0a026&format=json&callback=?",
				function(data){
					$('#simpleLastFM').html('');
					$.each(data.topartists.artist, function(i,item){
						if(i < params.limit)
							artistsArr[i] = item;
					});
					
					max = artistsArr[0].playcount;
					min = artistsArr[artistsArr.length-1].playcount;
					
					artistsArr.sort(sortNumberAsc);
					//console.log(artistsArr);
					$.each(artistsArr, function(i,item){
						
						if (item.playcount == max) 
							size = 0;
						else if (item.playcount < artistsArr[parseInt(params.limit/5)].playcount)
							size = 1;
						else if (item.playcount < artistsArr[parseInt(params.limit/3)].playcount)
							size = 2;
						else size = 3;
						
						$('#simpleLastFM').append(" <a href='"+item.url+"' class='jqlastfm_record jqlastfm_record_"+size+"'>"+item.name+"</a>");
					});					
		});			
		
	}

	function sortNumberAsc(a,b){
		if (a.name < b.name) return -1;
		if (a.name > b.name) return 1;
		return 0;
	}		
		
	this.each (
		function(){ init(this); }
	)
	
};

	// default values
	$.fn.jqLastFM.defaults = {	
		user: 'kopipejst',
		api_key: 'b25b959554ed76058ac220b7b2e0a026',
		limit: 10,
		methoda: 'getrecenttracks',
		loading: 'loading...'
	};
	

})(jQuery);