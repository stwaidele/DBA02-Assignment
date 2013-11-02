<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head profile="http://purl.org/NET/erdf/profile">
 <title>PHP: Password Hashing - Manual</title>
 <style type="text/css" media="all">
  @import url("http://static.php.net/www.php.net/styles/site.css");
  @import url("http://static.php.net/www.php.net/styles/phpnet.css");
  
 </style>
 <!--[if IE]><![if gte IE 6]><![endif]-->
  <style type="text/css" media="print">
   @import url("http://static.php.net/www.php.net/styles/print.css");
  </style>
 <!--[if IE]><![endif]><![endif]-->
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <link rel="shortcut icon" href="http://static.php.net/www.php.net/favicon.ico" />
 <link rel="contents" href="index.php" />
 <link rel="index" href="faq.php" />
 <link rel="prev" href="faq.using.php" />
 <link rel="next" href="faq.html.php" />
 <link rel="schema.dc" href="http://purl.org/dc/elements/1.1/" />
 <link rel="schema.rdfs" href="http://www.w3.org/2000/01/rdf-schema#" />
 <link rev="canonical" rel="self alternate shorter shorturl shortlink" href="http://php.net/passwords" />
 <link rel="license" href="http://creativecommons.org/licenses/by/3.0/" about="#content" />
 <link rel="canonical" href="//php.net/manual/de/faq.passwords.php" />
 <script type="text/javascript" src="http://static.php.net/www.php.net/userprefs.js"></script>
 <base href="http://www.php.net/manual/de/faq.passwords.php" />
 <meta http-equiv="Content-language" content="de" />
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var toggleImage = function(elem) {
        if ($(elem).hasClass("shown")) {
            $(elem).removeClass("shown").addClass("hidden");
            $("img", elem).attr("src", "/images/notes-add.gif");
        }
        else {
            $(elem).removeClass("hidden").addClass("shown");
            $("img", elem).attr("src", "/images/notes-reject.gif");
        }
    };

    $(".soft-deprecation-notice h1.title").each(function() {
        $(this).prepend("<a class='toggler shown' href='#'><img src='/images/notes-reject.gif' alt='minimize' /></a> ");
    });
    $(".refsect1 h3.title").each(function() {
        url = "https://bugs.php.net/report.php?bug_type=Documentation+problem&amp;manpage=" + $(this).parent().parent().attr("id") + "%23" + $(this).parent().attr("id");
        $(this).parent().prepend("<div class='reportbug'><a href='" + url + "'>Report a bug</a></div>");
        $(this).prepend("<a class='toggler shown' href='#'><img src='/images/notes-reject.gif' alt='reject note' /></a> ");
    });
    $("#usernotes .head").each(function() {
        $(this).prepend("<a class='toggler shown' href='#'><img src='/images/notes-reject.gif' alt='reject note' /></a> ");
    });
    $(".soft-deprecation-notice h1.title .toggler").click(function() {
        $(this).parent().siblings().slideToggle("slow");
        toggleImage(this);
        return false;
    });
    $(".refsect1 h3.title .toggler").click(function() {
        $(this).parent().siblings().slideToggle("slow");
        toggleImage(this);
        return false;
    });
    $("#usernotes .head .toggler").click(function() {
        $(this).parent().next().slideToggle("slow");
        toggleImage(this);
        return false;
    });
});
</script>
<script type="text/javascript" src="/js/usernotes.js"></script>

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>

<div id="head-beta-warning">
  <a id="beta-warning" href="?setbeta=1&amp;beta=1">
    <span class="dismiss">dismiss</span>
    <span class="blurb">Step into the future! Click here to switch to the beta php.net site</span>
  </a>
</div>

<div id="headnav">
 <a href="/" rel="home"><img src="http://static.php.net/www.php.net/images/php.gif"
 alt="PHP" width="120" height="67" id="phplogo" /></a>
 <div id="headmenu">
  <a href="/downloads.php">downloads</a> |
  <a href="/docs.php">documentation</a> |
  <a href="/FAQ.php">faq</a> |
  <a href="/support.php">getting help</a> |
  <a href="/mailing-lists.php">mailing lists</a> |
  <a href="/license">licenses</a> |
  <a href="https://wiki.php.net/">wiki</a> |
  <a href="https://bugs.php.net/">reporting bugs</a> |
  <a href="/sites.php">php.net sites</a> |
  <a href="/conferences/">conferences</a> |
  <a href="/my.php">my php.net</a>
 </div>
</div>

<div id="headsearch">
 <form method="post" action="/search.php" id="topsearch">
  <p>
   <span title="Keyboard shortcut: Alt+S (Win), Ctrl+S (Apple)">
    <span class="shortkey">s</span>earch for
   </span>
   <input type="text" name="pattern" value="" size="30" accesskey="s" title="Search"/>
   <span>in the</span>
   <select name="show">
    <option value="all"      >all php.net sites</option>
    <option value="local"    >this mirror only</option>
    <option value="quickref" selected="selected">function list</option>
    <option value="manual"   >online documentation</option>
    <option value="bugdb"    >bug database</option>
    <option value="news_archive">Site News Archive</option>
    <option value="changelogs">All Changelogs</option>
    <option value="pear"     >just pear.php.net</option>
    <option value="pecl"     >just pecl.php.net</option>
    <option value="talks"    >just talks.php.net</option>
    <option value="maillist" >general mailing list</option>
    <option value="devlist"  >developer mailing list</option>
    <option value="phpdoc"   >documentation mailing list</option>
   </select>
   <input type="image"
          src="http://static.php.net/www.php.net/images/small_submit_white.gif"
          class="submit" alt="search" />
   <input type="hidden" name="lang" value="de" />
  </p>
 </form>
</div>

<div id="layout_2">
 <div id="leftbar">
<!--UdmComment-->
<ul class="toc">
 <li class="header home"><a href="index.php">PHP Manual</a></li>
 <li class="header up"><a href="faq.php">FAQ</a></li>
 <li><a href="faq.general.php">Allgemeine Informationen</a></li>
 <li><a href="faq.mailinglist.php">Mailing-Listen</a></li>
 <li><a href="faq.obtaining.php">PHP beziehen</a></li>
 <li><a href="faq.databases.php">PHP und Datenbanken</a></li>
 <li><a href="faq.installation.php">Installation</a></li>
 <li><a href="faq.build.php">Probleme bei der Kompilierung</a></li>
 <li><a href="faq.using.php">PHP benutzen</a></li>
 <li class="active"><a href="faq.passwords.php">Password Hashing</a></li>
 <li><a href="faq.html.php">PHP und HTML</a></li>
 <li><a href="faq.com.php">PHP and COM</a></li>
 <li><a href="faq.languages.php">PHP und andere Sprachen</a></li>
 <li><a href="faq.migration5.php">Migrating from PHP 4 to PHP 5</a></li>
 <li><a href="faq.misc.php">Verschiedene Fragen</a></li>
</ul><!--/UdmComment-->

 </div>
 <div id="content" class="manual/de">
<!--UdmComment-->
<div class="manualnavbar manualnavbar_top">
 <span class="next">
  <a href="faq.html.php">PHP und HTML<img src="http://static.php.net/www.php.net/images/caret-r.gif" alt="&gt;" width="11" height="7" /></a>
 </span>
 <span class="prev">
  <a href="faq.using.php"><img src="http://static.php.net/www.php.net/images/caret-l.gif" alt="&lt;" width="11" height="7" />PHP benutzen</a>
 </span>
 <hr />
 <span class="lastupdated">[<a href="https://edit.php.net/?project=PHP&amp;perm=de/faq.passwords.php">edit</a>] Last updated: Fri, 01 Nov 2013</span>
 <div class="langchooser">
  <form action="/manual/change.php" method="get">
   <p>view this page in </p><fieldset><select name="page">
    <option value="en/faq.passwords.php">English</option>
    <option value="pt_BR/faq.passwords.php">Brazilian Portuguese</option>
    <option value="zh/faq.passwords.php">Chinese (Simplified)</option>
    <option value="fr/faq.passwords.php">French</option>
    <option value="it/faq.passwords.php">Italian</option>
    <option value="ja/faq.passwords.php">Japanese</option>
    <option value="ro/faq.passwords.php">Romanian</option>
    <option value="ru/faq.passwords.php">Russian</option>
    <option value="es/faq.passwords.php">Spanish</option>
    <option value="tr/faq.passwords.php">Turkish</option>
    <option value="help-translate.php">Other</option>
   </select>
   <input type="image" src="http://static.php.net/www.php.net/images/small_submit.gif" id="changeLangImage" alt="Change language" />
  </fieldset></form>
 </div>
</div>
<!--/UdmComment-->

<div id="faq.passwords" class="chapter">
  <h1>Safe Password Hashing</h1>

  
  
  <p class="para">
   This section explains the reasons behind using hashing functions
   to secure passwords, as well as how to do so effectively.
  </p>
  
  <div class="qandaset"><ol class="qandaset_questions"><li><a href="#faq.passwords.hashing">
     
      Why should I hash passwords supplied by users of my application?
     
    </a></li><li><a href="#faq.passwords.fasthash">
     
      Why are common hashing functions such as md5 and
      sha1 unsuitable for passwords?
     
    </a></li><li><a href="#faq.passwords.bestpractice">
     
      How should I hash my passwords, if the common hash functions are
      not suitable?
     
    </a></li><li><a href="#faq.passwords.salt">
     
      What is a salt?
     
    </a></li></ol></div>
   <dl class="qandaentry" id="faq.passwords.hashing">
    <dt><strong>
     
      Why should I hash passwords supplied by users of my application?
     
    </strong></dt>
    <dd class="answer">
     <p class="para">
      Password hashing is one of the most basic security considerations that
      must be made when designing any application that accepts passwords
      from users. Without hashing, any passwords that are stored in your
      application&#039;s database can be stolen if the database is compromised, and
      then immediately used to compromise not only your application, but also
      the accounts of your users on other services, if they do not use
      unique passwords.
     </p>
     <p class="para">
      By applying a hashing algorithm to your user&#039;s passwords before storing
      them in your database, you make it implausible for any attacker to
      determine the original password, while still being able to compare
      the resulting hash to the original password in the future.
     </p>
     <p class="para">
      It is important to note, however, that hashing passwords only protects
      them from being compromised in your data store, but does not necessarily
      protect them from being intercepted by malicious code injected into your
      application itself.
     </p>
    </dd>
   </dl>
   <dl class="qandaentry" id="faq.passwords.fasthash">
    <dt><strong>
     
      Why are common hashing functions such as  <span class="function"><a href="function.md5.php" class="function">md5()</a></span> and
       <span class="function"><a href="function.sha1.php" class="function">sha1()</a></span> unsuitable for passwords?
     
    </strong></dt>
    <dd class="answer">
     <p class="para">
      Hashing algorithms such as MD5, SHA1 and SHA256 are designed to be
      very fast and efficient. With modern techniques and computer equipment,
      it has become trivial to &quot;brute force&quot; the output of these algorithms,
      in order to determine the original input.
     </p>
     <p class="para">
      Because of how quickly a modern computer can &quot;reverse&quot; these hashing
      algorithms, many security professionals strongly suggest against
      their use for password hashing.
     </p>
    </dd>
   </dl>
   <dl class="qandaentry" id="faq.passwords.bestpractice">
    <dt><strong>
     
      How should I hash my passwords, if the common hash functions are
      not suitable?
     
    </strong></dt>
    <dd class="answer">
     <p class="para">
      When hashing passwords, the two most important considerations are the
      computational expense, and the salt. The more computationally expensive
      the hashing algorithm, the longer it will take to brute force its
      output.
     </p>
     <p class="para">
      There are two functions that are bundled with PHP that can perform
      hashing using a specified algorithm. 
     </p>
     <p class="para">
      The first hashing function is  <span class="function"><a href="function.crypt.php" class="function">crypt()</a></span>, which natively
      supports several hashing algorithms. When using this function,
      you are guaranteed that the algorithm you select is available, as PHP
      contains native implementations of each supported algorithm, in case
      one or more are not supported by your system.
     </p>
     <p class="para">
      The second hashing function is  <span class="function"><a href="function.hash.php" class="function">hash()</a></span>, which supports
      many more algorithms and variants than  <span class="function"><a href="function.crypt.php" class="function">crypt()</a></span>, but
      does not support some algorithms that  <span class="function"><a href="function.crypt.php" class="function">crypt()</a></span> does.
      The Hash extension is bundled with PHP, but can be disabled during
      compile-time, so it is not guaranteed to be available, while
       <span class="function"><a href="function.crypt.php" class="function">crypt()</a></span> is, being in the PHP core.
     </p>
     <p class="para">
      The suggested algorithm to use when hashing passwords is Blowfish, as it
      is significantly more computationally expensive than MD5 or SHA1, while
      still being scalable.
     </p>
    </dd>
   </dl>
   <dl class="qandaentry" id="faq.passwords.salt">
    <dt><strong>
     
      What is a salt?
     
    </strong></dt>
    <dd class="answer">
     <p class="para">
      A cryptographic salt is data which is applied during the hashing process
      in order to eliminate the possibility of the output being looked up
      in a list of pre-calculated pairs of hashes and their input, known as
      a rainbow table.
     </p>
     <p class="para">
      In more simple terms, a salt is a bit of additional data which makes
      your hashes significantly more difficult to crack. There are a number of
      services online which provide extensive lists of pre-computed hashes, as
      well as the original input for those hashes. The use of a salt makes it
      implausible or impossible to find the resulting hash in one of these
      lists.
     </p>
    </dd>
   </dl>
  
  
 </div>
<br /><br /><!--UdmComment-->
<div class="manualnavbar manualnavbar_bottom">
 <span class="next">
  <a href="faq.html.php">PHP und HTML<img src="http://static.php.net/www.php.net/images/caret-r.gif" alt="&gt;" width="11" height="7" /></a>
 </span>
 <span class="prev">
  <a href="faq.using.php"><img src="http://static.php.net/www.php.net/images/caret-l.gif" alt="&lt;" width="11" height="7" />PHP benutzen</a>
 </span>
 <hr />
 <span class="lastupdated">[<a href="https://edit.php.net/?project=PHP&amp;perm=de/faq.passwords.php">edit</a>] Last updated: Fri, 01 Nov 2013</span>
 <div class="langchooser">
  &nbsp;
 </div>
</div>
<!--/UdmComment-->


<div id="usernotes">
 <div class="head">
  <span class="action"><a href="/manual/add-note.php?sect=faq.passwords&amp;redirect=http://www.php.net/manual/de/faq.passwords.php"><img src="http://static.php.net/www.php.net/images/notes-add.gif" alt="add a note" width="13" height="13" class="middle" /></a> <small><a href="/manual/add-note.php?sect=faq.passwords&amp;redirect=http://www.php.net/manual/de/faq.passwords.php">add a note</a></small></span>
  <small>User Contributed Notes</small>
  <strong>Password Hashing</strong> - [<em>3</em> notes]
 </div><div id="allnotes">
  <div class="note" id="109002">  <div class="votes">
    <div id="Vu109002">
    <a href="/manual/vote-note.php?id=109002&amp;page=faq.passwords&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd109002">
    <a href="/manual/vote-note.php?id=109002&amp;page=faq.passwords&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V109002" title="70% like this...">
    10
    </div>
  </div>
  <a href="#109002" class="name">
  <strong class="user"><em>fluffy at beesbuzz dot biz</em></strong></a><a class="genanchor" href="#109002"> &para;</a><div class="date" title="2012-06-11 11:33"><strong>1 year ago</strong></div>
  <div class="text" id="Hcom109002">
<div class="phpcode"><code><span class="html">
The security issue with simple hashing (md5 et al) isn't really the speed, so much as the fact that it's idempotent; two different people with the same password will have the same hash, and so if one person's hash is brute-forced, the other one will as well.&nbsp; This facilitates rainbow attacks.&nbsp; Simply slowing the hash down isn't a very useful tactic for improving security.&nbsp; It doesn't matter how slow and cumbersome your hash algorithm is - as soon as someone has a weak password that's in a dictionary, EVERYONE with that weak password is vulnerable.<br />
<br />
Also, hash algorithms such as md5 are for the purpose of generating a digest and checking if two things are probably the same as each other; they are not intended to be impossible to generate a collision for.&nbsp; Even if an underlying password itself requires a lot of brute forcing to determine, that doesn't mean it will be impossible to find some other bit pattern that generates the same hash in a trivial amount of time.<br />
<br />
As such: please, please, PLEASE only use salted hashes for password storage.&nbsp; There is no reason to implement your own salted hash mechanism, either, as crypt() already does an excellent job of this.</span>
</code></div>
  </div>
 </div>
  <div class="note" id="110100">  <div class="votes">
    <div id="Vu110100">
    <a href="/manual/vote-note.php?id=110100&amp;page=faq.passwords&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd110100">
    <a href="/manual/vote-note.php?id=110100&amp;page=faq.passwords&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V110100" title="65% like this...">
    8
    </div>
  </div>
  <a href="#110100" class="name">
  <strong class="user"><em>sgbeal at googlemail dot com</em></strong></a><a class="genanchor" href="#110100"> &para;</a><div class="date" title="2012-09-19 01:21"><strong>1 year ago</strong></div>
  <div class="text" id="Hcom110100">
<div class="phpcode"><code><span class="html">
sha1 in conjunction with one or more salt values need not be as insecure as the above makes it out to be. e.g. the Fossil SCM creates an sha1 password hash based on a user's clear-text password combined with the user's name and a shared secret known only to the specific source repository for which the user is set up.</span>
</code></div>
  </div>
 </div>
  <div class="note" id="112915">  <div class="votes">
    <div id="Vu112915">
    <a href="/manual/vote-note.php?id=112915&amp;page=faq.passwords&amp;vote=up" title="Vote up!" class="usernotes-voteu">up</a>
    </div>
    <div id="Vd112915">
    <a href="/manual/vote-note.php?id=112915&amp;page=faq.passwords&amp;vote=down" title="Vote down!" class="usernotes-voted">down</a>
    </div>
    <div class="tally" id="V112915" title="37% like this...">
    -2
    </div>
  </div>
  <a href="#112915" class="name">
  <strong class="user"><em>owlstead</em></strong></a><a class="genanchor" href="#112915"> &para;</a><div class="date" title="2013-08-06 01:50"><strong>2 months ago</strong></div>
  <div class="text" id="Hcom112915">
<div class="phpcode"><code><span class="html">
Clearly you should by now use PBKDF2, bcrypt or scrypt to store secure "hashes" of passwords. Unfortunately the PHP crypto implementations and documentation keeps propagating insecure protocols and algorithms. Isn't there a single PHP programmer that could clean up the cryptographic functions and libraries?</span>
</code></div>
  </div>
 </div></div>

 <div class="foot"><a href="/manual/add-note.php?sect=faq.passwords&amp;redirect=http://www.php.net/manual/de/faq.passwords.php"><img src="http://static.php.net/www.php.net/images/notes-add.gif" alt="add a note" width="13" height="13" class="middle" /></a> <small><a href="/manual/add-note.php?sect=faq.passwords&amp;redirect=http://www.php.net/manual/de/faq.passwords.php">add a note</a></small></div>
</div><br />
 </div>
 <div class="cleaner">&nbsp;</div>
</div>

<div id="footnav">
   <a href="/source.php?url=/manual/de/faq.passwords.php">show source</a> |
 <a href="/credits.php">credits</a> |
 <a href="/stats/">stats</a> |
 <a href="/sitemap.php">sitemap</a> |
 <a href="/contact.php">contact</a> |
 <a href="/contact.php#ads">advertising</a> |
 <a href="/mirrors.php">mirror sites</a>
</div>

<div id="pagefooter">
 <div id="copyright">
  <a href="/copyright.php">Copyright &copy; 2001-2013 The PHP Group</a><br />
  All rights reserved.
 </div>

 <div id="thismirror">
  <a href="/mirror.php">This mirror</a> generously provided by:
  <a href="http://developer.yahoo.com/">Yahoo! Inc.</a><br />
  Last updated: Sat Nov  2 18:20:50 2013 UTC
 </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
    function showBetaWarning() {
        return document.cookie.indexOf("BetaWarning=") == -1;
    }

    // ----- BETA WARNING CODE -----
    var headBetaWarning = $('#head-beta-warning');

    // Wire up the beta warning.
    headBetaWarning.find('.dismiss').click(function(e) {
        e.preventDefault();
        $('body').css('margin-top', 0);
        headBetaWarning.slideUp("fast");

        // Hide it for a month by default.
        var expiry = new Date();
        expiry.setTime(expiry.getTime() + (30 * 24 * 60 * 60 * 1000));

        document.cookie = "BetaWarning=off; expires=" + expiry.toGMTString() + "; path=/";
    });

    if (showBetaWarning()) {
        headBetaWarning.show();
        $('body').css('margin-top', '25px');
        $('#beta-warning').slideDown(300, function() {
           $(this).find('.blurb').fadeIn('slow');
        });
    }

});
</script>

<!--[if IE 6]>
<script type="text/javascript">
    var IE6UPDATE_OPTIONS = {
        icons_path: "/ie6update/images/"
    }
</script>
<script type="text/javascript" src="/ie6update/ie6update.js"></script>
<![endif]-->

</body>
</html>