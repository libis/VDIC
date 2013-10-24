if (typeof  fodhealth == 'undefined' || !fodhealth  ){ fodhealth = {}; };

fodhealth.carouselManager = {
	initPage : function(){
		jQuery(".carousel").each(
			function(){
				new fodhealth.carousel(this).init();
			}
		)
	}
};

fodhealth.carousel = function(obj){
	this.obj = jQuery(obj);
};

fodhealth.carousel.prototype = {
	options : {
		animate : true,
		duration : 150,
		fadeTime : 1200,
		nextItemTime : 380000
	},
	init : function (){
		this.obj.get(0).carousel = this;
		var elm = this.obj.find(".carouselBody .newsList ul");
		elm.css("height", elm.height());
		var elmIntro = this.obj.find(".carouselBody .introList ul");
		elmIntro.bind("click", this, this._introListClickHandler );
		elmIntro.children("li").hover(
			function(){jQuery(this).addClass("hover");/*console.log($(this).parent().children() );*/ },
			function(){jQuery(this).removeClass("hover");/*console.log($(this).parent().children());*/}
		);
		this.currentOffset = 0;
		this.maxOffset = elm.children("li").length -1;
		this.animation = null;
		this._setTimer(this.obj, this.options.nextItemTime);
	},
	// function construction needed to pass this.obj to timer function
	_setTimer : function(o,t){
		var nextItem = function(o){
			fodhealth.carousel.prototype.nextItem(jQuery(o));
		};
		this.timer = window.setInterval(function(){nextItem(o)},t);
	},
	nextItem : function(o){
		var carousel = jQuery(o);
		var obj = jQuery(o).get(0).carousel;

		var shiftUl = function(carousel){
			//
			var itemList = carousel.find(".carouselBody .newsList ul");
			var clone = itemList.children(":first").clone(true);
			clone.show(); // reset fadeOut
			clone.removeClass("first");
			clone.addClass("last");
			itemList.children(":last").removeClass("last");
			itemList.append( clone );
			itemList.children(":first").remove();
			itemList.children(":first").addClass("first");
			//var animate = itemList.children(":first");
			//obj.animation = animate;
			//animate.fadeIn( 1500 , function(){ obj.animation = null; } );
			//itemList.children(":first").queue(function(){$(this).fadeIn( 1500 );});
			//
			var introList = carousel.find(".carouselBody .introList ul");
			var currentIntro = introList.children(".active");
			currentIntro.removeClass("active");
			var nextIntro = currentIntro.next();
			if( nextIntro.length == 0){ nextIntro = introList.children(":first"); }
			// find the current news offset for clickhandler
			currentOffset = carousel.get(0).carousel.currentOffset;
			currentOffset++;
			if(currentOffset > carousel.get(0).carousel.maxOffset ) { currentOffset = 0}
			carousel.get(0).carousel.currentOffset = currentOffset;
			//
			nextIntro.addClass("active");
			//window.setTimeout( function(){nextIntro.addClass("active"); carousel.get(0).carousel.animation = null;  }, 150);
			//console.log( itemList.children(":first") );
		}
		
		var newsList = carousel.find(".carouselBody .newsList ul");
		var currentNews = newsList.children(":first");
		if(obj.options.animate){
			obj.animation = currentNews;
			currentNews.fadeOut( obj.options.fadeTime , function(){ shiftUl(carousel) });
		} else {
			shiftUl( carousel );
		}
	},
	_introListClickHandler : function(e){
		var carousel = e.data;
		clearInterval(carousel.timer);
		// check if there is an animation running
		if(carousel.animation != null){
			// carousel.animation holds the current animated item
			carousel.animation.stop();
			carousel.animation.css("opacity", 1);
			if(carousel.animation == e.target){ 
				carousel.animation = null;
				return; //  clicked the current item, nothing else to do
			}
			carousel.animation = null;
		}
		//
		var introList = jQuery(e.target).parents(".introList");
		var elm = introList.find("li");
		introList.find(":active").removeClass("active");
		jQuery(e.target).parents(".introWrap").parent("li").addClass("active");
		// find the new news offset
		var newOffset = 0;
		for(var l = elm.length; newOffset < l ; newOffset++){
			if(elm.eq(newOffset).hasClass("active")){ break; }
		}
		var currentOffset = carousel.currentOffset;
		var shiftLi = newOffset - currentOffset;
		var itemList = carousel.obj.find(".carouselBody .newsList ul");
		//
		if(shiftLi > 0){
			//console.log("shift " + shiftLi + " forward"  );
			for(var i=0; i < shiftLi; i++){
				var clone = itemList.children(":first").clone(true);
				clone.removeClass("first");
				clone.addClass("last");
				itemList.children(":last").removeClass("last");
				itemList.append( clone );
				itemList.children(":first").remove();
				itemList.children(":first").addClass("first");
				//console.log( itemList.children(":first") );
			}
		} else if (shiftLi < 0){
			shiftLi = Math.abs(shiftLi);
			//console.log("shift " + shiftLi + " back"  );
			for(var i=0; i < shiftLi; i++){
				var clone = itemList.children(":last").clone(true);
				clone.removeClass("last");
				clone.addClass("first");
				itemList.children(":first").removeClass("first");
				itemList.prepend( clone );
				itemList.children(":last").remove();
				itemList.children(":last").addClass("last");
				//console.log( itemList.children(":first") );
			}
		}
		carousel.currentOffset = newOffset; 
	}
}

fodhealth.ExpandCollapseManager = {
	initPage : function(){
		//
		fodhealth.ExpandCollapse.prototype.closeAll();
		//
		jQuery(".navAction .first").click( fodhealth.ExpandCollapse.prototype.openAll );
		jQuery(".navAction .last").click( fodhealth.ExpandCollapse.prototype.closeAll );
		//
		jQuery(".expandCollapse").each(
			function(){
				new fodhealth.ExpandCollapse(this).init();
			}
		)
	}
};

fodhealth.ExpandCollapse = function(obj){
	this.obj = jQuery(obj);
};

fodhealth.ExpandCollapse.prototype = {
	options : {
		duration : 600
	},
	init : function (){
		this.obj.get(0)._expandCollapse = this;
		//
		var f = function(e){ 
			e.preventDefault(); 
			var c = jQuery(this).closest(".expandCollapse");
			
			if( c.hasClass("opened") ){
				c.find("ul:first").slideUp("fast");
				c.removeClass("opened");
				c.addClass("closed");
			} else {
				c.find("ul:first").slideDown("fast");
				c.removeClass("closed");
				c.addClass("opened");
			}
		};
		//
		this.obj.find(" a.openClose:first").click(f);
	},
	closeAll : function(e){
		if(e){ e.preventDefault(); }
		jQuery("ul.cat3").each(
			function(){
				jQuery(this).find("li.expandCollapse").each(
					function(){
						jQuery(this).removeClass("opened");
						jQuery(this).addClass("closed");
						jQuery(this).find("ul:first").css("display","none");
					}
				)
			}
		)
	},
	openAll : function(e){
		if(e){ e.preventDefault(); }
		jQuery("ul.cat3").each(
			function(){
				jQuery(this).find("li.expandCollapse").each(
					function(){
						jQuery(this).removeClass("closed");
						jQuery(this).addClass("opened");
						jQuery(this).find("ul:first").css("display","block");
					}
				)
			}
		)
	}
}

jQuery(document).ready(
	function(){
		jQuery("body").addClass("js");
		fodhealth.carouselManager.initPage();
		fodhealth.ExpandCollapseManager.initPage();         
	}
)