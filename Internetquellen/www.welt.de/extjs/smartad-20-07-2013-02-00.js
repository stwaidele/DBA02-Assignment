var bild_smart_test = 1; // var fuer bild.de
var adakey = ''; // Adprobe keyword - important: has to be outside if clause... for AdTag call
var kruxkey = ''; // Krux keyword - important: has to be outside if clause... for AdTag call
var adrequest_url = "http://ww251.smartadserver.com";

// if object is using subdomain/CNAME then adjust variable adrequest_url
if (window.location.toString().toLowerCase().indexOf("bz-berlin.de") != -1 ){
   adrequest_url = "http://ww251.bz-berlin.de";
}

//if (window.location.toString().toLowerCase().indexOf(".bild.de") == -1 ){
   // Adprobe
   var wlCus = "13115,13116,13118,13120,13121,13122,13123,13132,13133,13134,13135";
   var wlOrd = new Date().getTime();
   try { document.write('<scr' + 'ipt src="http://req.connect.wunderloop.net/AP/1627/6657/13115/js?cus=' + wlCus + '&ord=' + wlOrd + '"></scr'+'ipt>');}
   catch(err) { }
   // Gateway
   document.write('<scr'+'ipt src="http://js.revsci.net/gateway/gw.js?csid=F12351&auto=t"></scr'+'ipt>');
//}

//krux begin
// include krux_container.js - Krux Control Tags
document.write('<scr'+'ipt src="http://cdn1.smartadserver.com/diff/251/divscripte/krux_container.js"></scr'+'ipt>');
// krux InterchangeDirect Integration
window.Krux||((Krux=function(){Krux.q.push(arguments);}).q=[]);
(function(){
   function retrieve(n){
      var m, k='kx'+n;
      if (window.localStorage) {
         return window.localStorage[k] || "";
      } else if (navigator.cookieEnabled) {
         m = document.cookie.match(k+'=([^;]*)');
         return (m && unescape(m[1])) || "";
      } else {
         return '';
      }
   }
   var kvs = [];
   Krux.user = retrieve('user');
   if (Krux.user) {
      kvs.push('u=' + Krux.user);
   }
   Krux.segments = retrieve('segs') && retrieve('segs').split(',') || [];
   for (var i = 0; i < Krux.segments.length; i++ ) {
      kvs.push('ksgmnt=' + Krux.segments[i]);
   }
   Krux.dartKeyValues = kvs.length ? kvs.join(';') + ';': '';
})();
if (window.Krux.dartKeyValues) {
   kruxkey = ";" + window.Krux.dartKeyValues;
}
//krux end

// SAS ASMI GENERIC FUNCTION
sas_tmstp=Math.round(Math.random()*10000000000);
sas_masterflag = 1;
sas_skyexcluded = 0;


function SmartAdServer(sas_pageid,sas_formatid,sas_target) {
   //meetrics - Test measurement
   //if (!window.de_meetrics || (window.de_meetrics && !window.de_meetrics["978228"])) {
   // document.write('<scr'+'ipt src="http://s361.meetrics.net/bb-mx/prime/mtrcs_978228.js?pjid=978228&place=' + escape(sas_pageid) + '"></scr'+'ipt>');
   //}
   // Ad Audience
   //if (window.location.toString().toLowerCase().indexOf(".bild.de") == -1 ){
      adakey = ''; // important: initialise for every AdTag call
      // superbanner, exp. superbanner, wallpaper, exp. wallpaper - important: ada3648sb and ada3648sbx doesn't work properly in smart -keyword substring-, therefore ada3648xsb
      if (sas_formatid == 3648) {
         if (wl13115camp > 0){
            adakey += ';ada3648sb';
         }
         if (wl13135camp > 0){
            adakey += ';ada3648xsb';
         }
         if (wl13121camp > 0){
            adakey += ';ada3648wp';
         }
         if (wl13133camp > 0){
            adakey += ';ada3648xwp';
         }
      }
      // superbanner02
      if (  sas_formatid == 7348 && wl13115camp > 0) {
         adakey += ';ada3648sb';
      }
      // skyscraper, exp. skyscraper - important: ada3650sk and ada3650skx doesn't work properly in smart -keyword substring-, therefore ada3650xsk
      if (sas_formatid == 3650) {
         if (wl13118camp > 0){
            adakey += ';ada3650sk';
         }
         if (wl13134camp > 0){
            adakey += ';ada3650xsk';
         }
      }
      // billboard
      if (sas_formatid == 5419 && wl13132camp > 0) {
         adakey += ';ada5419bb';
      }
      // medium rectangle, halfpage ad
      if (sas_formatid == 4459) {
         if (wl13116camp > 0){
            adakey += ';ada4459mr';
         }
         if (wl13120camp > 0){
            adakey += ';ada4459hpa';
         }
      }
      // rectangle02
      if (  sas_formatid == 4460 && wl13116camp > 0) {
         adakey += ';ada4459mr';
      }
      // layer, banderole ad
      if (sas_formatid == 3651) {
         if (wl13123camp > 0){
            adakey += ';ada3651rm';
         }
         if (wl13122camp > 0){
            adakey += ';ada3651bra';
         }
      }
   //}
   if (SmartAdServer.efid && SmartAdServer.efid.indexOf('#'+ sas_formatid +'#')>=0) return;
   if (sas_masterflag==1) {sas_masterflag=0;sas_master='M';} else {sas_master='S';};
   document.write('<scr'+'ipt src="' + adrequest_url + '/call/pubj/' + sas_pageid + '/' + sas_formatid + '/' + sas_master + '/' + sas_tmstp + '/' + escape(sas_target) + escape(kruxkey) + escape(adakey) + '?"></scr'+'ipt>');
	
   if (sas_skyexcluded == 0 && SmartAdServer.efid && SmartAdServer.efid.indexOf('#3650#')>=0) {
      sas_skyexcluded = 1;
      var img = new Image();
      img.src='http://ww251.smartadserver.com/track/excludeformat.asp?3650;' + sas_tmstp;
   }
}

function SmartAdServer_iframe(sas_pageid,sas_formatid,sas_target,sas_w,sas_h) {
   if (sas_masterflag==1) {sas_masterflag=0;sas_master='M';} else {sas_master='S';};
   document.write('<iframe src="' + adrequest_url + '/call/pubif/' + sas_pageid + '/' + sas_formatid + '/' + sas_master + '/' + sas_tmstp + '/' + escape(sas_target) + escape(kruxkey) + escape(adakey) +'?" width=' + sas_w + ' height=' + sas_h + ' marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling=no>');
    document.write('</iframe>');
}