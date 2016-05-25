
var dateFormat = function () {
	var	token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
		timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
		timezoneClip = /[^-+\dA-Z]/g,
		pad = function (val, len) {
			val = String(val);
			len = len || 2;
			while (val.length < len) val = "0" + val;
			return val;
		};

	// Regexes and supporting functions are cached through closure
	return function (date, mask, utc) {
		var dF = dateFormat;

		// You can't provide utc if you skip other args (use the "UTC:" mask prefix)
		if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
			mask = date;
			date = undefined;
		}

		// Passing date through Date applies Date.parse, if necessary
		date = date ? new Date(date) : new Date;
		if (isNaN(date)) throw SyntaxError("invalid date");

		mask = String(dF.masks[mask] || mask || dF.masks["default"]);

		// Allow setting the utc argument via the mask
		if (mask.slice(0, 4) == "UTC:") {
			mask = mask.slice(4);
			utc = true;
		}

		var	_ = utc ? "getUTC" : "get",
			d = date[_ + "Date"](),
			D = date[_ + "Day"](),
			m = date[_ + "Month"](),
			y = date[_ + "FullYear"](),
			H = date[_ + "Hours"](),
			M = date[_ + "Minutes"](),
			s = date[_ + "Seconds"](),
			L = date[_ + "Milliseconds"](),
			o = utc ? 0 : date.getTimezoneOffset(),
			flags = {
				d:    d,
				dd:   pad(d),
				ddd:  dF.i18n.dayNames[D],
				dddd: dF.i18n.dayNames[D + 7],
				m:    m + 1,
				mm:   pad(m + 1),
				mmm:  dF.i18n.monthNames[m],
				mmmm: dF.i18n.monthNames[m + 12],
				yy:   String(y).slice(2),
				yyyy: y,
				h:    H % 12 || 12,
				hh:   pad(H % 12 || 12),
				H:    H,
				HH:   pad(H),
				M:    M,
				MM:   pad(M),
				s:    s,
				ss:   pad(s),
				l:    pad(L, 3),
				L:    pad(L > 99 ? Math.round(L / 10) : L),
				t:    H < 12 ? "a"  : "p",
				tt:   H < 12 ? "am" : "pm",
				T:    H < 12 ? "A"  : "P",
				TT:   H < 12 ? "AM" : "PM",
				Z:    utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
				o:    (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
				S:    ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
			};

		return mask.replace(token, function ($0) {
			return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
		});
	};
}();

// Some common format strings
dateFormat.masks = {
	"default":      "ddd mmm dd yyyy HH:MM:ss",
	shortDate:      "m/d/yy",
	mediumDate:     "mmm d, yyyy",
	longDate:       "mmmm d, yyyy",
	fullDate:       "dddd, mmmm d, yyyy",
	shortTime:      "h:MM TT",
	mediumTime:     "h:MM:ss TT",
	longTime:       "h:MM:ss TT Z",
	isoDate:        "yyyy-mm-dd",
	isoTime:        "HH:MM:ss",
	isoDateTime:    "yyyy-mm-dd'T'HH:MM:ss",
	isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
};

// Internationalization strings
dateFormat.i18n = {
	dayNames: [
		"Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
		"Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
	],
	monthNames: [
		"Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
		"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
	]
};

// For convenience...
Date.prototype.format = function (mask, utc) {
	return dateFormat(this, mask, utc);
};



/**
 * Tweetie: A simple Twitter feed plugin
 * Author: Sonny T. <hi@sonnyt.com>, sonnyt.com
 */(function(e){e.fn.twittie=function(){var t=arguments[0]instanceof Object?arguments[0]:{},n=typeof arguments[0]=="function"?arguments[0]:arguments[1],r=e.extend({username:null,count:10,hideReplies:!1,dateFormat:"%b/%d/%Y",template:"{{date}} - {{tweet}}",apiPath:"index/twitter"},t),i=function(e){var t=e.replace(/(https?:\/\/([-\w\.]+)+(:\d+)?(\/([\w\/_\.]*(\?\S+)?)?)?)/ig,'<a href="$1" target="_blank" title="Visit this link">$1</a>').replace(/#([a-zA-Z0-9_]+)/g,'<a href="http://twitter.com/search?q=%23$1&amp;src=hash" target="_blank" title="Search for #$1">#$1</a>').replace(/@([a-zA-Z0-9_]+)/g,'<a href="http://twitter.com/$1" target="_blank" title="$1 on Twitter">@$1</a>');return t},s=function(e){var t=e.split(" ");e=new Date(Date.parse(t[1]+" "+t[2]+", "+t[5]+" "+t[3]+" UTC"));var n=["January","February","March","April","May","June","July","August","September","October","November","December"],i={"%d":e.getDate(),"%m":e.getMonth()+1,"%b":n[e.getMonth()].substr(0,3),"%B":n[e.getMonth()],"%y":String(e.getFullYear()).slice(-2),"%Y":e.getFullYear()},s=r.dateFormat,o=r.dateFormat.match(/%[dmbByY]/g);for(var u=0,a=o.length;u<a;u++)s=s.replace(o[u],i[o[u]]);return s},o=function(e){var t=r.template,n=["date","tweet","avatar","url","retweeted"];for(var i=0,s=n.length;i<s;i++)t=t.replace(new RegExp("{{"+n[i]+"}}","gi"),e[n[i]]);return t};this.html("<ul><li>يجري تحميل الأخبار حاليَّاً ...</li></ul>");var u=this;e.getJSON(r.apiPath,{},function(e){
	var sss="<ul>";
	for(var i in e)
	{
		try{
			sss+="<li>"+e[i].text+"<div class=\"twitterDate\">"+dateFormat(e[i].created_at,"dd/mm/yyyy").toString() +"</div></li>";
		}
		catch(err)
		{
			sss+="<li>" + e[i].text +"</div></li>";
		}
	}
	sss+="</ul>";
	$('#lastNews').html(sss);
	$('#lastNews').vTicker();
 })}})(jQuery);
 
 
 (function(e){e.fn.twittieInternal=function(){var t=arguments[0]instanceof Object?arguments[0]:{},n=typeof arguments[0]=="function"?arguments[0]:arguments[1],r=e.extend({username:null,count:10,hideReplies:!1,dateFormat:"%b/%d/%Y",template:"{{date}} - {{tweet}}",apiPath:"../index/twitter"},t),i=function(e){var t=e.replace(/(https?:\/\/([-\w\.]+)+(:\d+)?(\/([\w\/_\.]*(\?\S+)?)?)?)/ig,'<a href="$1" target="_blank" title="Visit this link">$1</a>').replace(/#([a-zA-Z0-9_]+)/g,'<a href="http://twitter.com/search?q=%23$1&amp;src=hash" target="_blank" title="Search for #$1">#$1</a>').replace(/@([a-zA-Z0-9_]+)/g,'<a href="http://twitter.com/$1" target="_blank" title="$1 on Twitter">@$1</a>');return t},s=function(e){var t=e.split(" ");e=new Date(Date.parse(t[1]+" "+t[2]+", "+t[5]+" "+t[3]+" UTC"));var n=["January","February","March","April","May","June","July","August","September","October","November","December"],i={"%d":e.getDate(),"%m":e.getMonth()+1,"%b":n[e.getMonth()].substr(0,3),"%B":n[e.getMonth()],"%y":String(e.getFullYear()).slice(-2),"%Y":e.getFullYear()},s=r.dateFormat,o=r.dateFormat.match(/%[dmbByY]/g);for(var u=0,a=o.length;u<a;u++)s=s.replace(o[u],i[o[u]]);return s},o=function(e){var t=r.template,n=["date","tweet","avatar","url","retweeted"];for(var i=0,s=n.length;i<s;i++)t=t.replace(new RegExp("{{"+n[i]+"}}","gi"),e[n[i]]);return t};this.html("<ul><li>يجري تحميل الأخبار حاليَّاً ...</li></ul>");var u=this;e.getJSON(r.apiPath,{},function(e){
	var sss="<ul>";
	for(var i in e)
	{
		try{
			sss+="<li>"+e[i].text+"<div class=\"twitterDate\">"+dateFormat(e[i].created_at,"dd/mm/yyyy").toString() +"</div></li>";
		}
		catch(err)
		{
			sss+="<li>" + e[i].text +"</div></li>";
		}
	}
	sss+="</ul>";
	$('#lastNews').html(sss);
	$('#lastNews').vTicker();
 })}})(jQuery); 
 
 
 (function(e){e.fn.twittieInternal2=function(){var t=arguments[0]instanceof Object?arguments[0]:{},n=typeof arguments[0]=="function"?arguments[0]:arguments[1],r=e.extend({username:null,count:10,hideReplies:!1,dateFormat:"%b/%d/%Y",template:"{{date}} - {{tweet}}",apiPath:"../../index/twitter"},t),i=function(e){var t=e.replace(/(https?:\/\/([-\w\.]+)+(:\d+)?(\/([\w\/_\.]*(\?\S+)?)?)?)/ig,'<a href="$1" target="_blank" title="Visit this link">$1</a>').replace(/#([a-zA-Z0-9_]+)/g,'<a href="http://twitter.com/search?q=%23$1&amp;src=hash" target="_blank" title="Search for #$1">#$1</a>').replace(/@([a-zA-Z0-9_]+)/g,'<a href="http://twitter.com/$1" target="_blank" title="$1 on Twitter">@$1</a>');return t},s=function(e){var t=e.split(" ");e=new Date(Date.parse(t[1]+" "+t[2]+", "+t[5]+" "+t[3]+" UTC"));var n=["January","February","March","April","May","June","July","August","September","October","November","December"],i={"%d":e.getDate(),"%m":e.getMonth()+1,"%b":n[e.getMonth()].substr(0,3),"%B":n[e.getMonth()],"%y":String(e.getFullYear()).slice(-2),"%Y":e.getFullYear()},s=r.dateFormat,o=r.dateFormat.match(/%[dmbByY]/g);for(var u=0,a=o.length;u<a;u++)s=s.replace(o[u],i[o[u]]);return s},o=function(e){var t=r.template,n=["date","tweet","avatar","url","retweeted"];for(var i=0,s=n.length;i<s;i++)t=t.replace(new RegExp("{{"+n[i]+"}}","gi"),e[n[i]]);return t};this.html("<ul><li>يجري تحميل الأخبار حاليَّاً ...</li></ul>");var u=this;e.getJSON(r.apiPath,{},function(e){
	var sss="<ul>";
	for(var i in e)
	{
		try{
			sss+="<li>"+e[i].text+"<div class=\"twitterDate\">"+dateFormat(e[i].created_at,"dd/mm/yyyy").toString() +"</div></li>";
		}
		catch(err)
		{
			sss+="<li>" + e[i].text +"</div></li>";
		}
	}
	sss+="</ul>";
	$('#lastNews').html(sss);
	$('#lastNews').vTicker();
 })}})(jQuery);