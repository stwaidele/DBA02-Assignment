var addCount = 0;

$(document).ready(function(){
	
	//Spoiler
	$("p.spoilerblock code.spoiled").hide();
	$("p.spoilerblock input").click(function() {
	   $(this).next("code.spoiled").toggle(500);
	   if ($(this).attr("value")=="Anzeigen"){
			$(this).attr("value","Ausblenden");
	   }else{
		   $(this).attr("value","Anzeigen");
		}
	});
	
	
	
	//E-Mail-Spam-Protection
	//$("body").emailSpamProtection("em");
	

	//Lightbox-Bildunterschrift automatisch aus Bild-alt-Att ziehen
	//(Übertragung des alt-Att-Value eines img-Tags auf das title-Att des umschließenden a-Tags)
	$("a:not([title]) > img[alt]").each(function(i){//nur, wenn title-att noch nicht gesetzt
		$(this).parent().attr("title", $(this).attr("alt"));
	});
	
	//Damit man nicht für die Lightbox überall händisch das Attribut rel="lightbox[w]" setzen muss...
	$("a:not([rel]) > img").filter(function(){
		return /(jpe?g|png|gif)$/i.test($(this).parent().attr('href'));//nur, wenn href von a auf ein Bild zeigt
	})
	.filter(function(){
		var hrefValue = $(this).parent().attr('href');
		return !/\/galerie\/(.)*$/.test(hrefValue) //Galeriebilder rausfiltern. 
		&& !/\/info\/ku\/ddr-kunst\/(.)*$/.test(hrefValue)//Willy Wolff Bild rausfiltern.
		&& !/\/info\/d\/nathan-der-weise\/(.)*$/.test(hrefValue)
		;		
	})
	.each(function(){
		$(this).parent().attr("rel", "lightbox[w]");
	});
	
	$("h1,h2,h3,h4").each(function (i) {
		return false;/* under development...*/
		if (i == 0 || addCount >= 2){//nicht gleich am anfang und auch nur maximal 2x aufrufen... google erlaubt nur max 3 blockanzeigen/seite
			return true;	//continue in jquery
		}
		if (i % 4 == 0) {//alle 4 überschriften werbung einblenden
			//TODO mit JQUERY einfügen!!! Wie war das nochmal?
			var div = document.createElement('div');
			var id = "googleAdd"+i;
			div.setAttribute("id",id);
			
			var domThis = $(this).get(0);//holt underlaying js-dom-node
			var parent = domThis.parentNode;
			//parent.insertBefore(div, domThis.nextSibling);//= insertAfter()
			parent.insertBefore(div, domThis);
			
			if (addCount == 0){
				domWrite(
					  id,
					  'http://pagead2.googlesyndication.com/pagead/show_ads.js',
					function(){
						google_ad_client = "ca-pub-8970599184339653";
						google_ad_slot = "9011398059";
						google_ad_width = 336;
						google_ad_height = 280;
					}
				);
			} else {
				domWrite(
					  id,
					  'http://pagead2.googlesyndication.com/pagead/show_ads.js',
					function(){
						google_ad_client = "ca-pub-8970599184339653";
						google_ad_slot = "3021956883";
						google_ad_width = 336;
						google_ad_height = 280;
					}
				);
			}
			addCount = addCount + 1;
		}
	});
});















//http://www.webmasterpro.de/coding/article/ajax-loesung-verzoegertes-laden-von-js-code-der-documentwrite-enthaelt.html
var domWrite = (function(){            // by Frank Thuerigen
 // private 

 var dw = document.write,              // save document.write()
          myCalls = [],                // contains all outstanding Scripts
          t = '';                      // timeout
 
 function startnext(){                 // start next call in pipeline
  if ( myCalls.length > 0 ) {
   if ( Object.watch ) console.log( 'next is '+myCalls[0].f.toString() );
   myCalls[0].startCall();
   }
  }

 function evals( pCall ){            // eval embedded script tags in HTML code
  var scripts = [],
      script,
      regexp = /<script[^>]*>([\s\S]*?)<\/script>/gi;
  while ((script = regexp.exec(pCall.buf))) scripts.push(script[1]);
  scripts = scripts.join('\n');
  if (scripts) {
   eval(scripts);
   }
  }

 function finishCall( pCall ){
   pCall.e.innerHTML = pCall.buf;             // write output to element
   evals( pCall );
   document.write=dw;                        // restore document.write()
   myCalls.shift();
   window.setTimeout( startnext, 50 );
   }

 function testDone( pCall ){
   var myCall = pCall;
   return function(){
    if ( myCall.buf !== myCall.oldbuf ){
     myCall.oldbuf = myCall.buf;
     t=window.setTimeout( testDone( myCall ), myCall.ms );
     }
    else {
     finishCall( myCall );
     }
    }
   }  
   
 function MyCall( pDiv, pSrc, pFunc ){                    // Class
  this.e = ( typeof pDiv == 'string' ? 
             document.getElementById( pDiv ) :
             pDiv ),                     // the div element
  this.f = pFunc || function(){},
  this.stat = 0,                         // 0=idle, 1=waiting, 2=running, 3=finished
  this.src = pSrc,                       // script source address
  this.buf = '',                         // output string buffer
  this.oldbuf = '',                      // compare buffer
  this.ms = 100,                         // milliseconds
  this.scripttag;                        // the script tag 
  }
 
 MyCall.prototype={
  startCall: function(){
   this.f.apply( window );                 // execute settings function
   this.stat=1;
   var that = this;                            // status = waiting
   document.write = (function(){
    var o=that,
        cb=testDone( o ),
        t;
    return function( pString ){            // overload document.write()
     window.clearTimeout( t );
     o.stat=2;                             // status = running
     window.clearTimeout(t);
     o.oldbuf = o.buf;
     o.buf += pString;                     // add string to buffer
     t=window.setTimeout( cb, o.ms );
     };
    })();
   var s=document.createElement('script');
   s.setAttribute('language','javascript');
   s.setAttribute('type','text/javascript');
   s.setAttribute('src', this.src);
   document.getElementsByTagName('head')[0].appendChild(s);
   }
  }
  
 return function( pDiv, pSrc, pFunc ){  // public
  var c = new MyCall( pDiv, pSrc, pFunc );
  myCalls.push( c );
  if ( myCalls.length === 1 ){
   startnext();
   }
  }
 })();