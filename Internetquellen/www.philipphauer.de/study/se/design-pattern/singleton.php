<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Das Singleton Design Pattern (Singleton Entwurfsmuster)</title>
	<meta name="description" content="Eine ausführliche Analyse des Singleton Design Pattern (Singleton Entwurfsmuster) mit Einführung und Diskussion.">
	<meta name="keywords" content="design, design pattern, pattern, muster, entwurf, entwurfsmuster, uml, diagramm, bild, java, singleton">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <!-- CSS  -->
	<link rel="stylesheet" href="/philipphauer.css" type="text/css" />
	<link rel="stylesheet" href="/philipphauer-inhalt.css" type="text/css" />
    <link rel="stylesheet" href="/(slimbox)/css/slimbox2.css" type="text/css" media="screen" /> 
    
	<meta name="robots" content="index,follow" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<meta name="language" content="de" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<!--[if lt IE 7]>
	<link rel="stylesheet" href="/philipphauer-ie6.css" type="text/css" />
	<![endif]-->
    <!--[if IE 7]>
	<link rel="stylesheet" href="/philipphauer-ie7.css" type="text/css" />
	<![endif]-->
    
    <!-- CSS-Weiche für DesignPatternKatalog -->
    <link rel="stylesheet" href="/study/se/design-pattern.css" type="text/css" />    
     <!-- jquery -->
    <script type="text/javascript" src="/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="/jquery.emailSpamProtection.1.0.js"></script>
    <!-- meins -->
    <script type="text/javascript" language="javascript" src="/philipphauer.js"></script>
    <script type="text/javascript" language="javascript" src="/interaktiv/commentIt/js/scripts.js"></script>
	<!-- Slimbox  -->
	<script type="text/javascript" src="/(slimbox)/js/slimbox2.js"></script> 

    <!-- Google Analytics -->
    <script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10596131-1");
pageTracker._trackPageview();
} catch(err) {}
</script>
</head>

<body id="studium">
<!-- Beginn Container -->
<div class="container">
<div class="r"><div class="ro">
	<div class="l"><div class="lo">
		<div class="boxinhalt">
			<div class="logoumschlag">
				<div class="logo-l"></div>
				<div class="logo-r"></div>
				<div class="logo-bild"></div>  
			</div>

<!-- Beginn Navi -->
<div class="navi">
	<ul>
			<li class="h1" id="knowledge">Knowledge</li>
                    <li><a href="/info/" class="schule">Schule</a></li>
                    <li><a href="/study/study.php" class="studium">Studium</a></li>
                    <li><a href="/galerie/" class="galerie">Galerie</a></li>
                    <li><a href="/tut/" class="tut">Tutorials</a></li>
                    <li><a href="/woerterlexikon/" class="woerterlexikon">Wörterlexikon</a></li>
            
			<li class="h1">Applications</li>
                    <li><a href="/tools/" class="tools">Tools</a></li>   
			<li class="h1">Stuff </li>
        			<li><a href="/ueber-mich/kontakt.php" class="kontakt">Kontakt</a></li>
                    <li><a href="/ueber-mich/person.php" class="person">Über mich</a></li>
           
 	<br />
    </ul>
    
<div class="anzeig-navi">
		<script type="text/javascript"><!--
        google_ad_client = "pub-8970599184339653";
        /* Linkblock 120x90 */
        google_ad_slot = "6200753626";
        google_ad_width = 100;
        google_ad_height = 90;
        //-->
        </script>
        <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
</div>  

<!-- Ende Navi -->
</div>
<div class="inhaltheader"></div>

<div class="suche-oben">
<form action="http://www.philipphauer.de/home/suche.php" id="cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-8970599184339653:iz74hcemipu" />
    <input type="hidden" name="cof" value="FORID:10" />
    <input type="hidden" name="ie" value="ISO-8859-1" />
    <input type="text" name="q"/>  
    <input type="submit" name="sa" value="Suche"/>
  </div>
</form>
<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=de"></script>
</div>

	<!-- Inhalt Start -->
<div class="inhalt">
  <h1>Das Singleton Design Pattern</h1>
  <span class="h1-sub"> Studienprojekt von Philipp Hauer. 2009-2010.  &copy;</span>    <div class="dpindex">
    <a href="/study/se/design-pattern.php">Zur Katalog&uuml;bersicht</a><br />
    
    <a href="/study/se/design-pattern/strategy.php">Strategy</a>, <a href="/study/se/design-pattern/observer.php">Observer</a>, <a href="/study/se/design-pattern/decorator.php">Decorator</a>, <a href="/study/se/design-pattern/factory-method.php">Factory Method</a>, <a href="/study/se/design-pattern/abstract-factory.php">Abstract Factory</a>, <a href="/study/se/design-pattern/singleton.php">Singleton</a>, <a href="/study/se/design-pattern/command.php">Command</a>, <a href="/study/se/design-pattern/composite.php">Composite</a>, <a href="/study/se/design-pattern/facade.php">Facade</a>, <a href="/study/se/design-pattern/state.php">State<br />
    
    </a><a href="/study/se/design-pattern/literaturnachweis.php">Literaturverzeichnis</a></div>  <h2>Inhalt</h2>
  <ul>
    <li><a href="#einfuehrung">Einf&uuml;hrung</a></li>
    <li><a href="#analyse">Analyse und Diskussion</a></li>
      <ul>
        <li><a href="#gof">Gang Of Four-Definition</a></li>
        <li><a href="#beschreibung">Beschreibung</a></li>
        <li><a href="#variationen">Variationen</a></li>
        <li><a href="#vorteile">Vorteile</a></li>
        <li><a href="#nachteile">Nachteile</a></li>
        <li><a href="#java_api">Anwendung in der Java Standardbibliothek</a></li>
      </ul>
    
    </ul>
<h2><a name="einfuehrung"></a>Einf&uuml;hrung</h2>
  <p>Wir werden gebeten, ein bestehendes Bankverwaltungsprogramm zu &uuml;berarbeiten, da dieses in der Vergangenheit h&auml;ufig <strong>fehlerhaft</strong> und <strong>langsam</strong> gearbeitet hat. Ein Fehler sei, dass die eingenommenen Kontof&uuml;hrungsgeb&uuml;hren bei Stammkunden immer weniger zu werden scheinen. Beim Durcharbeiten des Quellcodes treffen wir auf folgende Klasse.</p>
  <p><img src="/study/se/design-pattern/singleton/einleitung1.png" width="244" height="154" alt="Singleton Einf&uuml;hrung Negativbeispiel"></p>
  <p class="spoilerblock">
<i>Bedenkliche Klasse BankWerte:</i> 
<input value="Anzeigen"  type="button" />
 <code class="spoiled">

<!-- Generated by JavaCode4Web (philipphauer.de): -->
<span class="keyword">class</span>&#160;BankWerte&#160;{<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">static</span>&#160;<span class="keyword">double</span>&#160;kontenZinsen&#160;=&#160;0.0;<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">static</span>&#160;<span class="keyword">int</span>&#160;kontenTransaktionsvolumen&#160;=&#160;1000;<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">static</span>&#160;<span class="keyword">int</span>&#160;kontenGebuehren&#160;=&#160;10;<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">static</span>&#160;<span class="keyword">int</span>&#160;kontenDispositionskredit&#160;=&#160;-500;<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">static</span>&#160;Bilanz&#160;bilanz = berechneBilanz(){<br>
&#160;&#160;&#160;&#160;}<span class="comment-single">//aufwendige&#160;Methode</span><br/>
}<br/>


</code>
</p>

  <p>Diese Klasse stellt <strong>global verf&uuml;gbare Variabeln</strong> bereit. &Uuml;berall im Bankverwaltungscode (von Kontenerstellung bis zum internen Monitoring der Gesch&auml;ftsprozesse) verstreut, werden diese Variablen verwendet. Nat&uuml;rlich werden die Charakteristika eines Kontos (Zinsen, Geb&uuml;hren, Dispo etc.) auch ver&auml;ndert. Leider hat die globale Verf&uuml;gbarkeit die vergangenen Entwickler dazu verleitet, die Modifizierung der Variablen an vielen verschiedenen Stellen durchzuf&uuml;hren - dort wo es gerade am bequemsten war. Nach langen Fehlersuchen im Spagetticode fanden wir folgende Modifikationen: </p>
  <p class="spoilerblock">
<i>Manipulation der globalen Variablen ohne Plausibilit&auml;tspr&uuml;fung:</i> 
<input value="Anzeigen"  type="button" />
 <code class="spoiled">

<!-- Generated by JavaCode4Web (philipphauer.de): -->
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">if</span>&#160;(konto.status&#160;=&#160;<span class="stringliteral">"Stammkunde"</span>){<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;kontenGebuehren&#160;-=&#160;1;<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;}<br/>


</code>
</p>

  <p>Stammkunden erhalten in regelm&auml;&szlig;igen Abst&auml;nden Rabatt auf ihre Kontof&uuml;hrungsgeb&uuml;hren. Leider hat der Entwickler vergessen, Plausibilit&auml;tspr&uuml;fungen einzubauen.</p>
  <ul>
    <li> Es wird nicht sichergestellt, dass eine Variable nicht unter einen bestimmten Wert f&auml;llt oder gar unsinnige Werte (negative Zahlen) angenommen werden.</li>
    <li>An allen Stellen, an denen die Variable ver&auml;ndert wird, muss immer wieder eine Plausibilit&auml;tspr&uuml;fungen ausprogrammiert werden. Unn&ouml;tiger, redundanter Code entsteht, der schnell inkonsistent und damit fehlerhaft werden kann.</li>
    </ul>
  <p>Es bedarf einem Mechanismus, welche die <em>Werte bereitstellt und den Zugriff auf diese kontrolliert</em>. Um das bestehende Bankverwaltungsprogramm nicht komplett neu entwerfen zu m&uuml;ssen, soll auch dieser Mechanismus <em>global</em> verf&uuml;gbar sein. Vern&uuml;nftig ist dies zwar nicht (siehe <a href="#nachteile">Nachteile</a>), aber hinsichtlich der beschriebenen  Punkte zielf&uuml;hrend.</p>
<p>Es wird eine Klasse erstellt, deren Objekte die Variablen zugriffsgesch&uuml;tzt h&auml;lt und den Zugriff mittels Getter und Setter kontrolliert. Da die Daten zentral verwaltet werden sollen, und damit nicht mehrere Objekte verschiedene Werte tragen d&uuml;rfen, soll nur ein Objekt auf einmal instanziiert werden k&ouml;nnen. Es soll ein Einzelst&uuml;ck (engl. Singleton) sein. </p>
<p>Dazu wird der Konstruktor privatisiert, sodass er nur noch im BankWerte-Code selbst aufgerufen werden kann. Der Konstruktoraufruf erfolgt statisch zur Zeit des Klassenladens.</p>
<p><img src="/study/se/design-pattern/singleton/einleitung2.png" width="341" height="233" alt="Singleton Einleitung L&ouml;sung"></p>
<p class="spoilerblock">
<i>Die Klasse BankWerte wird zum statisch verf&uuml;gbaren Einzelst&uuml;ck und kapselt die sensiblen Werte:</i> 
<input value="Anzeigen"  type="button" />
 <code class="spoiled">

<!-- Generated by JavaCode4Web (philipphauer.de): -->
<span class="keyword">class</span>&#160;BankWerte&#160;{<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//verhinderte&#160;Instanziierung&#160;von&#160;au&#223;en.</span><br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;BankWerte()&#160;{<br/>
<br/>
&#160;&#160;&#160;&#160;}<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//die&#160;einzigartige&#160;Instanz</span><br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;<span class="keyword">static</span>&#160;BankWerte&#160;einzigartigeBankwerte = <span class="keyword">new</span> BankWerte();<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//globale&#160;Methode&#160;zum&#160;Erhalten&#160;der&#160;einen&#160;Instanz.</span><br/>
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">static</span>&#160;BankWerte&#160;getInstance()&#160;{<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">return</span>&#160;einzigartigeBankwerte;<br/>
&#160;&#160;&#160;&#160;}<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//Aus&#160;&#246;ffentlichen,&#160;statischen&#160;Variablen&#160;wurden&#160;private&#160;Instanzvariablen</span><br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;<span class="keyword">double</span>&#160;kontenZinsen&#160;=&#160;0.0;<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;<span class="keyword">int</span>&#160;kontenTransaktionsvolumen&#160;=&#160;1000;<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;<span class="keyword">int</span>&#160;kontenGebuehren&#160;=&#160;10;<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;<span class="keyword">int</span>&#160;kontenDispositionskredit&#160;=&#160;-500;<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;Bilanz&#160;bilanz = berechneBilanz()&#160;{<br>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Bilanz bilanz;<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="comment-single">//TEURE&#160;Methode</span><br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="comment-single">//...</span><br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">return</span>&#160;bilanz;<br/>
&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//Setter&#160;mit&#160;Plausiblit&#228;tspr&#252;fung</span><br/>
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">void</span>&#160;setKontenZinsen(<span class="keyword">double</span>&#160;pKontenZinsen)&#160;{<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">if</span>&#160;(pKontenZinsen&#160;&gt;&#160;0&#160;&amp;&amp;&#160;pKontenZinsen&#160;&lt;&#160;4){<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;kontenZinsen&#160;=&#160;pKontenZinsen;<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;}<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">void</span>&#160;setKontenGebuehren(<span class="keyword">int</span>&#160;pKontenGebuehren)&#160;{<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">if</span>&#160;(pKontenGebuehren&#160;&gt;&#160;0&#160;&amp;&amp;&#160;pKontenGebuehren&#160;&lt;&#160;50){<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;kontenGebuehren&#160;=&#160;pKontenGebuehren;<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;}<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//weitere&#160;Getter&#160;und&#160;Setter...</span><br/>
}<br/>


</code>
</p>


<p class="spoilerblock">
<i>Benutzung der neuen, robusten BankWerte-Klasse:</i> 
<input value="Anzeigen"  type="button" />
 <code class="spoiled">

<!-- Generated by JavaCode4Web (philipphauer.de): -->
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="comment-single">//globaler&#160;Zugriff&#160;auf&#160;einzigartige&#160;Instanz</span><br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;BankWerte&#160;bankWerte&#160;=&#160;BankWerte.getInstance();<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="comment-single">//Zugriff&#160;&#252;ber&#160;Methoden</span><br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;bankWerte.setKontenGebuehren(15);<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="comment-single">//Zentrale&#160;Plausiblit&#228;tspr&#252;fung</span><br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;bankWerte.setKontenZinsen(-20);<br/>


</code>
</p>

<p>Damit ist das Problem der groben Fehleranf&auml;lligkeit behoben. Bleibt das <strong>Performanceproblem</strong>. Es stellt sich heraus, dass viele Applikationssitzungen von der BankWerte-Klasse keinen Gebrauch machen. Trotzdem werden komplizierte und ressourcenintensive Bilanzberechnungen bei jedem Start durchgef&uuml;hrt. Das liegt darin, dass das Einzelst&uuml;ck zum Zeitpunkt des Klassenladens erstellt wird (static). Ob nun die Bilanz sp&auml;ter gebraucht wird  oder nicht - sie wird immer im Zuge der BankWerte-Instanziierung miterstellt.</p>
<p>Wir optimieren den Code dahingehend, dass erst beim ersten Aufruf von getInstance() das Einzelst&uuml;ck instanziiert wird. </p>
<p class="spoilerblock">
<i>BankWerte mit verz&ouml;gertem Laden:</i> 
<input value="Anzeigen"  type="button" />
 <code class="spoiled">

<!-- Generated by JavaCode4Web (philipphauer.de): -->
<span class="keyword">class</span>&#160;BankWerte&#160;{<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//solange nicht benutzt, wird das Einzelst&uuml;ck nicht instanziiert.</span><br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;<span class="keyword">static</span>&#160;BankWerte&#160;einzigartigeBankwerte;<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//Instanziierung bei erstmaligem Aufruf (nicht threadsafe).</span><br/>
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">static</span>&#160;BankWerte&#160;getInstance()&#160;{<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">if</span>&#160;(einzigartigeBankwerte&#160;==&#160;<span class="keyword">null</span>)&#160;{<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;einzigartigeBankwerte&#160;=&#160;<span class="keyword">new</span>&#160;BankWerte();<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">return</span>&#160;einzigartigeBankwerte;<br/>
&#160;&#160;&#160;&#160;}<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//restlicher code</span><br/>
}<br/>


</code>
</p>

  <p>Bilanzen werden fortan nur bei initialer Benutzung der BankWerte berechnet.</p>
  <p>Die angetragenen Probleme im Verwaltungsprogramm wurden dank Zugriffskontrolle und verz&ouml;gertem Laden  behoben.</p>
  <p> Allerdings erfolgte keine Ber&uuml;cksichtigung von Multithreadingproblematiken, siehe <a href="#variationen">Variationen</a>. </p>
  <p>Weiterhin sei hier auf die <a href="#nachteile">Nachteile des Singletons Patterns</a> hingewiesen. In unserem Fall w&auml;re eine komplette Neumodellierung der Banksoftware mit sauberer Trennung von Schichten und Verantwortlichkeiten sinnvoll.</p>
  <p>Nach dieser Einf&uuml;hrung wird im  folgenden Abschnitt das Singleton Design Pattern formalisiert, n&auml;her  analysiert und diskutiert.</p>
<h3>Das Bankbeispiel mit Singleton Pattern Termini</h3>
  <table border="0">
    <tr>
      <th>Klasse</th>
      <th>Singleton Teilnehmer</th>
    </tr>
    <tr>
      <td>BankWerte</td>
      <td>Singleton</td>
    </tr>
  </table>
  <h2><a name="analyse"></a>Analyse und Diskussion</h2>
  <h3><a name="gof"></a>Gang Of Four-Definition</h3>
  <blockquote>Singleton:<br>
&quot;Sichere ab, dass eine Klasse genau ein Exemplar besitzt, und stelle einen globalen Zugriffspunkt darauf bereit.&quot;<br>
    ([<a href="/study/se/design-pattern/literaturnachweis.php">GoF</a>], Seite 157) </blockquote>
  <h3><a name="beschreibung"></a>Beschreibung</h3>
  <p><img src="/study/se/design-pattern/singleton/singleton-schema.png" width="500" height="158" alt="Singleton"></p>
  <p>Das Singleton Entwurfsmuster sorgt daf&uuml;r, dass es von einer Klasse nur eine einzige Instanz gibt und diese global zug&auml;nglich ist.</p>
  <p>Damit es nur eine einzigartige Instanz gibt, muss eine Instanziierung durch den Client verhindert werden. Daf&uuml;r wird der Konstruktur privat deklariert. Nun kann einzig der Singletoncode selbst das Singleton instanziieren. </p>
  <p>Weiterhin definiert die Singletonklasse eine global verf&uuml;gbare Methode, in der diese einzigartige Singletoninstanz zur&uuml;ckgegeben wird. In Java wird dies mit den Modifiern public und static erreicht. Der Singletoncode muss (in der Methode) sicherstellen, dass immer nur ein und dasselbe Objekte an den Client gelangt. Die verschiedenen Varianten, dies zu realisieren, werden im Kapitel <a href="#variationen">Variationen</a> diskutiert.</p>
  <p><img src="/study/se/design-pattern/singleton/beschreibung.png" width="206" height="137" alt="Singleton Klassendiagramm"></p>
<p class="spoilerblock">
<i>Beispielimplementierung eines Singleton:</i> 
<input value="Anzeigen"  type="button" />
 <code class="spoiled">

<!-- Generated by JavaCode4Web (philipphauer.de): -->
<span class="keyword">public</span>&#160;<span class="keyword">class</span>&#160;Singleton&#160;{<br/>
&#160;&#160;&#160;&#160;<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//Field&#160;h&#228;lt&#160;Referenz&#160;auf&#160;einzigartige&#160;Instanz</span><br/>
&#160;&#160;&#160;&#160;<span class="keyword">private static</span>&#160;Singleton&#160;instance;<br/>
&#160;&#160;&#160;&#160;<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//&#160;Privater&#160;Konstruktur&#160;verhindert&#160;Instanziierung&#160;durch&#160;Client</span><br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;Singleton(){<br/>
&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//Stellt&#160;Einzigartigkeit&#160;sicher.&#160;Liefert&#160;Exemplar&#160;an&#160;Client.</span><br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//Hier:&#160;Unsynchronisierte&#160;Lazy-Loading-Variante</span><br/>
&#160;&#160;&#160;&#160;<span class="keyword">public static</span>&#160;Singleton&#160;getInstance(){<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">if</span>&#160;(instance&#160;==&#160;<span class="keyword">null</span>){<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;instance&#160;=&#160;<span class="keyword">new</span>&#160;Singleton();<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">return</span>&#160;instance;<br/>
&#160;&#160;&#160;&#160;}<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//logic&#160;code</span><br/>

}<br/>


</code>
</p>

  <h3><a name="variationen"></a>Variationen</h3>
  <h4>Eager vs. Lazy Loading</h4>
  <p>Besonders einfach zu implementieren, ist das <strong>Eager Loading</strong>, das <strong>vorgezogene</strong> Instanziieren des Singletons. Dabei findet die Objekterstellung beim Laden der Klasse statt.</p>
 <p class="spoilerblock">
<i>Eager Loading: Instanziierung w&auml;hrend die Klasse geladen wird:</i> 
<input value="Anzeigen"  type="button" />
 <code class="spoiled">

<!-- Generated by JavaCode4Web (philipphauer.de): -->
<span class="keyword">public</span>&#160;<span class="keyword">class</span>&#160;Singleton&#160;{<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;<span class="keyword">static</span>&#160;<span class="keyword">final</span>&#160;Singleton&#160;instance&#160;=&#160;<span class="keyword">new</span>&#160;Singleton();<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;Singleton()&#160;{<br/>
&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;<br/>
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">static</span>&#160;Singleton&#160;getInstance(){<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">return</span>&#160;instance;<br/>
&#160;&#160;&#160;&#160;}<br/>
<br/>
}<br/>


</code>
</p>

  <p>Ein gro&szlig;er Vorteil dieser Variante ist, neben der Einfachheit, die Threadsicherheit und Performance. Bevor die Applikation &uuml;berhaupt startet und  Threads parallel auf das Singleton zugreifen k&ouml;nnen, wird das Objekt erstellt. Eine teure Synchronisierung von getInstance() ist nicht n&ouml;tig. </p>
  <p>Der entscheidende Nachteil beim vorgezogenem Laden (Eager Loading) ist die Gefahr von verfr&uuml;hter oder gar unn&ouml;tiger Instanziierung. Diese Problematik ist besonders bei Singletons, deren Erstellung mit einem umfangreichen und ressourcenintensiven Vorgang einhergehen, relevant. Ebenfalls spricht gegen das vorzeitige Laden, dass zur statischen Initialisierungszeit noch nicht alle n&ouml;tigen Informationen zur Initialisierung des Singletons bereitstehen k&ouml;nnen. Das Singleton kann Werte ben&ouml;tigen, die erst im Zuge des Programmablaufs verf&uuml;gbar sind.</p>
  <p>Sinnvoll ist das Eager Loading, wenn man relativ kleine Singletons mit einfachem Erstellungsprozess hat, die mehrfach gebraucht werden.</p>
  <p>Das <strong>Lazy Loading</strong> l&ouml;st das Problem der pauschalen Erstellung durch <strong>verz&ouml;gerter</strong> Instanziierung. Das Singleton wird erst erstellt, wenn es das erste Mal gebraucht wird, also beim ersten Aufruf von getInstance(). </p>
<p class="spoilerblock">
<i>Lazy Loading: Instanziierung beim ersten Bedarf:</i> 
<input value="Anzeigen"  type="button" />
 <code class="spoiled">

<!-- Generated by JavaCode4Web (philipphauer.de): -->
<span class="keyword">public</span>&#160;<span class="keyword">class</span>&#160;Singleton&#160;{<br/>
&#160;&#160;&#160;&#160;<br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;<span class="keyword">static</span>&#160;Singleton&#160;instance;<br/>
&#160;&#160;&#160;&#160;<br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;Singleton(){&#160;&#160;&#160;<br/>
&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;<br/>
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">static</span>&#160;Singleton&#160;getInstance(){<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">if</span>&#160;(instance&#160;==&#160;<span class="keyword">null</span>){<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;instance&#160;=&#160;<span class="keyword">new</span>&#160;Singleton();<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">return</span>&#160;instance;<br/>
&#160;&#160;&#160;&#160;}<br/>
}<br/>


</code>
</p>

  <p><strong>Synchronisierung</strong></p>
  <p>Das Lazy Loading schafft allerdings ein neues Problem im Bereich des Multithreadings. So kann es zur Erstellung zweier Singletons kommen, wenn ein Thread nach der null-Pr&uuml;fung - direkt vor der Instanziierung - den Fokus abgibt und ein anderer Thread getInstance() durchl&auml;uft. Dieser andere Thread erstellt dann ein Singleton. Der erste Thread erh&auml;lt nun den Fokus wieder und wei&szlig; nicht, dass das Singleton bereits erzeugt wurde, und erstellt es noch einmal. Die Einmaligkeit des Singletons ist verletzt.</p>
  <p>Daher bedarf es einer Synchronisation. Synchronisationen sind allerdings teuer und erzeugen einen Overhead bei jedem Aufruf von getInstance(). Bei einer performancekritischen Applikation mit zahlreichen Aufrufen von getInstance() sollte von dieser Variante Abstand genommen werden.</p>
  <p class="spoilerblock">
<i>Lazy Loading mit einfach synchronisierter getInstance()-Methode:</i> 
<input value="Anzeigen"  type="button" />
 <code class="spoiled">

<!-- Generated by JavaCode4Web (philipphauer.de): -->
&#160;&#160;&#160;&#160;<span class="keyword">public&#160;synchronized</span>&#160;<span class="keyword">static</span>&#160;Singleton&#160;getInstance(){<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">if</span>&#160;(instance&#160;==&#160;<span class="keyword">null</span>){<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;instance&#160;=&#160;<span class="keyword">new</span>&#160;Singleton();<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">return</span>&#160;instance;<br/>
&#160;&#160;&#160;&#160;}<br/>


</code></p>
  <p>Allerdings l&auml;sst sich auch dies noch weiter optimieren, sodass der normale getInstance()-Aufruf nicht mehr synchronisiert werden muss. Stattdessen wird nur die Erstellung synchronisiert und ein doppelter Null-Check verwendet. Dadurch wird (nach der einmaligen Erstellung) keine Performance im Normalbetrieb (getInstance()-Aufruf) verloren und trotzdem die Einmaligkeit der Singleton-Instanz gew&auml;hrleistet.</p>
  <p class="spoilerblock">
<i>Lazy Loading mit  unsynchronisierter getInstance()-Methode, aber mit synchronizierter Instanziierung und doppelten Null-Check:</i> 
<input value="Anzeigen" type="button" />
 <code class="spoiled">
<!-- Generated by JavaCode4Web (philipphauer.de): -->
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">static</span>&#160;Singleton&#160;getInstance()&#160;{<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">if</span>&#160;(instance&#160;==&#160;<span class="keyword">null</span>)&#160;{<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">synchronized</span>&#160;(instance)&#160;{<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">if</span>&#160;(instance&#160;==&#160;<span class="keyword">null</span>)&#160;{<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;instance&#160;=&#160;<span class="keyword">new</span>&#160;Singleton();<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;}<br/>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<span class="keyword">return</span>&#160;instance;<br/>
&#160;&#160;&#160;&#160;}<br/>

</code>
</p>
  <h4>Initialize()-Methode</h4>
  <p>Ist die  Initialisierung des Singletons von seiner ersten Verwendung explizit trennbar, so kann die Instanziierung mit Hilfe einer initialize()-Methode separat durchgef&uuml;hrt werden. Diese L&ouml;sung ist besonders robust, da  Exceptions geworfen werden k&ouml;nnen, wenn initialize() mehrfach  oder getInstance() vor initialize() aufgerufen wird. ([PK], Seite 33)</p>
  <h3><a name="anwendung"></a>Anwendungsf&auml;lle</h3>
  <ul>
    <li>Einmalige und zustandslose Strukturen, wie Factorys oder Utilityklassen. Bei Factorys sollte die Instanziierung verz&ouml;gert erfolgen, da sie unter Umst&auml;nden teuer sein kann. Beispielsweise durch das dynamische Suchen nach passenden und verf&uuml;gbaren Factoryimplementierungen.</li>
  </ul>
<h3><a name="vorteile"></a>Vorteile</h3>
<ul>
  <li><strong>Einfache Anwendung.</strong> Eine Singletonklasse ist schnell und unkompliziert geschrieben.</li>
  </ul>
<p>Gegen&uuml;ber <em>globalen Variablen</em> ergeben sich eine Reihe von Vorteilen:</p>
<ul>
  <li><strong>Zugriffskontrolle</strong>. Das Singleton kapselt seine eigenen Erstellung und kann damit genau kontrollieren, wann und wie Zugriff auf das Singleton erlaubt wird. Setter und Getter k&ouml;nnen  Plausibilit&auml;tspr&uuml;fungen beinhalten.</li>
  <li><strong>Sauber<em>er</em> Namensraum.</strong> Der Namensraum wird nicht mit unz&auml;hligen globalen Variablen &uuml;berfrachtet, sondern gekapselt in einem Singleton bereitgestellt.</li>
  <li><strong>Spezialisierung</strong>. Ein Singleton kann abgeleitet werden, um ihm neue Funktionalit&auml;t zuweisen zu k&ouml;nnen. Die Integration in bestehenden Code gestaltet sich einfach. Welche Unterklasse genutzt werden soll, kann <strong>dynamisch</strong> zur Laufzeit entschieden werden.</li>
  <li><strong>Lazy-Loading</strong>. Singletons k&ouml;nnen erst erzeugt werden, wenn sie auch wirklich gebraucht werden.</li>
</ul>
<h3><a name="nachteile"></a>Nachteile</h3>
  <ul>
    <li><strong>Prozedurales Programmieren</strong>. Die ausgiebige Verwendung von Singletons f&uuml;hrt zu einem &auml;hnlich ung&uuml;nstigen Zustand wie bei globalen Variablen. Dies entspricht der prozeduralen Programmierung und hat nichts mit Objektorientierung und Kapselung zu tun.</li>
    <li><strong>Globale Verf&uuml;gbarkeit</strong>. Durch die globale Verf&uuml;gbarkeit wird das Singleton   <em>&uuml;berall</em> in der Applikation verf&uuml;gbar. Enth&auml;lt das Singleton Daten, so ist dies ein sehr  fragw&uuml;rdiges Design. Welche Daten k&ouml;nnen es sein, die in <em>allen</em> Schichten (wie View, Controller, Remote, Businesslogik, Persistenz oder gar in Beans) verf&uuml;gbar sein sollen? Kann es nicht sogar gef&auml;hrlich sein, bestimmte Daten oder Funktionalit&auml;ten &uuml;berall frei verf&uuml;gbar zu machen? Kann man diese nicht doch einer Schicht sauber zu ordnen und jede Schicht hinter wohldefinierten Schnittstellen und Datenaustausch kapseln? Singletons verleiten zu unsauberen und intransparenten Programmieren. Die Notwendigkeit  von Singletons sollte stets hinterfragt werden.</li>
    <li><strong>Intransparenz</strong>. Ob eine Klasse ein Singleton verwendet, wird nicht aus deren Schnittstelle klar, sondern aus deren Implementierung. Diese wird hart ans Singleton <strong>gekoppelt</strong>. Auf die Definition der Schnittstelle allein kann sich nicht mehr verlassen werden, da die Implementierung <strong>unspezifizierte Abh&auml;ngigkeiten</strong> besitzt. <strong>&Uuml;bersichtlichkeit</strong>, <strong>Wartbarkeit</strong> und <strong>Wiederverwendbarkeit</strong> leiden ernorm. Bei &Auml;nderungen am Singleton wird nicht klar, welche Programmteile betroffen sind. Fehlfunktionen k&ouml;nnen schwer zur&uuml;ckverfolgt werden. </li>
    <li><strong>Problematisches Zerst&ouml;ren. </strong>Um in Sprachen mit Garbage Collection Objekte zu zerst&ouml;ren, darf ein Objekt nicht mehr referenziert werden. Dies ist bei Singletons schwierig sicherzustellen. Durch die globale Verf&uuml;gbarkeit, passiert es sehr schnell, dass Codeteile noch eine Referenz auf das Singleton halten.</li>
    <li>Besonders bei Mehrbenutzeranwendungen kann ein Singleton die <strong>Performance</strong> senken, da er - besonders in der synchronisierten Form - ein Flaschenhals darstellt.</li>
    <li><strong>Einmaligkeit &uuml;ber physikalische Grenzen</strong>. Die Einzigartigkeit eines Singletons &uuml;ber physikalische Grenzen hinweg (JVM) zu gew&auml;hrleisten, ist schwierig.</li>
    <li><strong>Konfigurierbarkeit</strong>. Oft soll das Singleton mit bestimmten Daten erstellt werden. Die Parametrisierung der getInstance()-Methode ist jedoch keine L&ouml;sung, weil ein Aufrufer mit anderen Parametern ein &quot;falsches&quot; Singleton (n&auml;mlich das des ersten Aufrufers) erh&auml;lt. Somit muss auf Registry oder Konfigurationsdateien zur&uuml;ckgegriffen werden, um das Singleton mit Informationen zu versorgen.</li>
    </ul>
  <p>Singleton ist ein prozedurales Relikt im vermeidlich gl&auml;nzendem OO-Gewand. Die oft bedingungslose und globale Verf&uuml;gbarkeit widerspricht  jedoch vielem, was Objektorientierte Programmierung ausmacht (Kapselung, Schnittstellen, Schichten, Wiederverwendbarkeit etc.). Seine Verwendung sollte wohl&uuml;berlegt sein und sich auf F&auml;lle mit <strong>einmaligen Strukturen (wie Factorys)</strong>, die <em>keinen Zustand</em> besitzen, beschr&auml;nken.</p>
<h3><a name="java_api"></a>Anwendung in der Java Standardbibliothek</h3>
<h4>Runtime</h4>
<p> java.lang.Runtime erm&ouml;glicht  einer Applikation mit ihrer JVM, in der sie l&auml;uft, zu kommunizieren. Es erlaubt unter anderem das Absetzen von Kommandozeilenbefehlen (exec()), das Erfassen des verf&uuml;gbaren und verbrauchten Speichers, der Prozessoranzahl oder das dynamische Laden von Bibliotheken.</p>
<p>Dabei ist die Runtime-Klasse ein klassischer Vertreter des Singleton Design Entwurfsmusters und zwar in der unsynchronisierten Version mit vorgezogenem Laden.</p>
<p class="spoilerblock">
<i>Auszug aus der Klasse Runtime mit originalen JavaDoc-Kommentaren:</i> 
<input value="Anzeigen"  type="button" />
 <code class="spoiled">

<!-- Generated by JavaCode4Web (philipphauer.de): -->
<span class="keyword">public</span>&#160;<span class="keyword">class</span>&#160;Runtime&#160;{<br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;<span class="keyword">static</span>&#160;Runtime&#160;currentRuntime&#160;=&#160;<span class="keyword">new</span>&#160;Runtime();<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="comment-javadoc">/**<br/>
&#160;&#160;&#160;&#160;&#160;*&#160;Returns&#160;the&#160;runtime&#160;object&#160;associated&#160;with&#160;the&#160;current&#160;Java&#160;application.<br/>
&#160;&#160;&#160;&#160;&#160;*&#160;Most&#160;of&#160;the&#160;methods&#160;of&#160;class&#160;&lt;code&gt;Runtime&lt;/code&gt;&#160;are&#160;instance&#160;<br/>
&#160;&#160;&#160;&#160;&#160;*&#160;methods&#160;and&#160;must&#160;be&#160;invoked&#160;with&#160;respect&#160;to&#160;the&#160;current&#160;runtime&#160;object.&#160;<br/>
&#160;&#160;&#160;&#160;&#160;*&#160;<br/>
&#160;&#160;&#160;&#160;&#160;*&#160;<span class="javadoc-tag">@return</span>&#160;&#160;the&#160;&lt;code&gt;Runtime&lt;/code&gt;&#160;object&#160;associated&#160;with&#160;the&#160;current<br/>
&#160;&#160;&#160;&#160;&#160;*&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Java&#160;application.<br/>
&#160;&#160;&#160;&#160;&#160;*/</span><br/>
&#160;&#160;&#160;&#160;<span class="keyword">public</span>&#160;<span class="keyword">static</span>&#160;Runtime&#160;getRuntime()&#160;{&#160;<br/>
	&#160;&#160;&#160;&#160;&#160;<span class="keyword">return</span>&#160;currentRuntime;<br/>
&#160;&#160;&#160;&#160;}<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="comment-javadoc">/**&#160;Don't&#160;let&#160;anyone&#160;else&#160;instantiate&#160;this&#160;class&#160;*/</span><br/>
&#160;&#160;&#160;&#160;<span class="keyword">private</span>&#160;Runtime()&#160;{}<br/>
<br/>
&#160;&#160;&#160;&#160;<span class="comment-single">//weiterer&#160;Runtimecode&#160;(exec(), freeMemory(), availableProcessors(), totalMemory() etc. )...</span><br/>
}<br/>


</code>
</p>

<div class="dpindex">
    <a href="/study/se/design-pattern.php">Zur Katalog&uuml;bersicht</a><br />
    
    <a href="/study/se/design-pattern/strategy.php">Strategy</a>, <a href="/study/se/design-pattern/observer.php">Observer</a>, <a href="/study/se/design-pattern/decorator.php">Decorator</a>, <a href="/study/se/design-pattern/factory-method.php">Factory Method</a>, <a href="/study/se/design-pattern/abstract-factory.php">Abstract Factory</a>, <a href="/study/se/design-pattern/singleton.php">Singleton</a>, <a href="/study/se/design-pattern/command.php">Command</a>, <a href="/study/se/design-pattern/composite.php">Composite</a>, <a href="/study/se/design-pattern/facade.php">Facade</a>, <a href="/study/se/design-pattern/state.php">State<br />
    
    </a><a href="/study/se/design-pattern/literaturnachweis.php">Literaturverzeichnis</a></div></div>

	<!-- Inhalt Ende -->
<div class="inhaltfooter-auslauf"><div class="inhaltfooter-logo"></div></div>
<div class="inhaltclearer"></div>
		
		<div class="commentarea">
		<h6><a name="comments" id="comments"></a>Kommentare</h6>
<input value="Kommentar hinzuf&uuml;gen" type="button" class="button buttonShowCommentForm" />
<div id="commentformblock">
  <form action="/interaktiv/commentIt/insert.php" method="post" name="commentIt-form"><input type="hidden" value="/study/se/design-pattern/singleton.php" name="originURL">  <table>
    <tr>
      <th colspan="4">Kommentar hinzuf&uuml;gen:</th>
    </tr>
    <tr>
      <td>Name*:</td>
      <td><input type="text" name="author" /></td>
      <td>E-Mail:</td>
      <td><input type="text" name="email" /></td>
    </tr>
    <tr>
      <td>Nachricht*:</td>
      <td colspan="3"><textarea name="content" rows="7"></textarea></td>
    </tr>
    <tr>
      <td>Spamschutz:*</td>
      <td colspan="3"><input type="radio" name="sp" id="spd" value="dc" checked="checked" />
        <label for="spd">Diesen Kommentar l&ouml;schen</label>
        <br />
        <input type="radio" name="sp" id="spk" value="kc" />
        <label for="spk">Diesen Kommentar nicht l&ouml;schen, sondern einf&uuml;gen</label></td>
    </tr>
    <tr>
      <td colspan="4" id="commentIt-status"></td>
    </tr>
    <tr>
      <td colspan="3"><input type="submit" name="formaction" value="Eintragen" class="button"/></td>
    </tr>
  </table>
  </form></div>
<div class="beitrag">
<div class="head">
    <span class="author"><a href="mailto:ladidadadu{{ a t }}googlemail{{ d o t }}com">Lars</a></span>
    <span class="date">2013-08-05 11:38:05</span>
</div>
<div class="entry">
Hi Philipp,<br />
<br />
ja, sehr schöner verständlicher Artikel.<br />
<br />
Ich frage mich jetzt, was wäre da eine bessere Alternative zum Singleton, auch in Bezug Parameter für das Singleton-Objekt.<br />
<br />
Grüße,<br />
Lars</div>
</div>

<div class="beitrag">
<div class="head">
    <span class="author"><a href="mailto:malte{{ d o t }}ni{{ a t }}web{{ d o t }}de">Malguni</a></span>
    <span class="date">2013-02-14 11:37:51</span>
</div>
<div class="entry">
Wow! Mach doch mal ein Buch daraus! Ich würd\'s kaufen!</div>
</div>

<div class="beitrag">
<div class="head">
    <span class="author">Philipp</span>
    <span class="date">2012-07-17 21:30:02</span>
</div>
<div class="entry">
Hallo Malte,<br />
<br />
ja, das wäre ein Lösung. Mit Hilfe eines synchronized-Blocks bräuchte man sogar keine zweite Methode mehr. Vielleicht baue ich das bei Zeit in den Artikel ein. Danke.<br />
<br />
Die \&quot;2\&quot; hinter Singleton2 spielt keine Rolle und verwirrt nur, daher habe ich es entfernt. Danke für den Hinweis.<br />
<br />
Philipp</div>
</div>

<div class="beitrag">
<div class="head">
    <span class="author">Malte</span>
    <span class="date">2012-07-17 15:42:18</span>
</div>
<div class="entry">
@Lazy Loading mit Synchronisierung:<br />
Wie wäre es damit:<br />
    public static Singleton getInstance(){<br />
        if (instance == null){<br />
            createInstance();<br />
        }<br />
        return instance;<br />
    }<br />
<br />
    public synchronized static void createInstance() {<br />
        if (instance == null){<br />
            instance = new Singleton2();<br />
        }<br />
    }<br />
<br />
btw, du gibst ein Singleton zurück, erzeugst aber ein Singleton2. Erbt Singleton2 von Singleton oder ist das ein Fehler?</div>
</div>

<div class="beitrag">
<div class="head">
    <span class="author">student</span>
    <span class="date">2012-01-23 22:34:14</span>
</div>
<div class="entry">
Echt gut erklärt, Respekt und Dank!!</div>
</div>

<p> Seite: 1 - </p></div>
         <div class="suche-unten">
                    <form action="http://www.philipphauer.de/home/suche.php" id="cse-search-box">
                      <div>
                        <input type="hidden" name="cx" value="partner-pub-8970599184339653:ruy7o4ujl5q" />
                        <input type="hidden" name="cof" value="FORID:10" />
                        <input type="hidden" name="ie" value="ISO-8859-1" />
                        <input type="text" name="q"/>   
                        <input type="submit" name="sa" value="Suche"/>
                      </div>
                    </form>
                    <script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=de"></script>
        </div>

<!-- Ende Boxinhalt -->
</div>



		<!-- Ende lo -->
		</div></div>
    <!-- Ende ro -->
	</div></div>
<!-- Ende Container -->
</div>

<!-- Beginn Footer -->
<div class="footer-r">
  <div class="footer-l">
        &copy; by Philipp Hauer since 2005 | Webdesign by Philipp Hauer
        <br />
        <a href="/">Home</a> | <a href="/home/impressum.php">Impressum</a> | <a href="/home/bildernachweis.php">Bildernachweis</a> </div>
<!-- Ende Footer -->
</div>

<!-- browser-statistik.de - Welche Browser werden benutzt? -->
  <img src="http://www.browser-statistik.de/browser.png?style=0" width="1" height="1" style="border: 0px;" alt="" />
<!-- browser-statistik.de - Ende -->

<div class="anzeig-skyscraper">
		<script type="text/javascript"><!--
				google_ad_client = "pub-8970599184339653";
				/* skyscraper120x600 */
				google_ad_slot = "2112202784";
				google_ad_width = 120;
				google_ad_height = 600;
				//-->
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
</div>

</body>
</html>
</body>
</html>
