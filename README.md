# Wettbewerb: 10.000 Zahlen ausschreiben

Via [PHP hates me](http://www.phphatesme.com/blog/php/wettbewerb-10-000-zahlen-ausschreiben/) wurde ich heute auf einen kleinen [Wettbewerb](http://www.phpgangsta.de/wettbewerb-10-000-zahlen-ausschreiben) aufmerksam. Dabei geht es darum die Zahlen 1 - 10'000 in natürlicher deutscher Sprache auszugeben.


## LOC vs. Performance

In seinem BlogPost interessiert sich der Autor vor allem für die Länge des Codes und bezeichnet Laufzeit und Speicherverbrauch als uninteressant. Wir sprechen hier wohl gemerkt von PHP. Einer Sprache, die im Gegensatz zu Javascript nicht erst aufwändig zur ausführenden Plattform übertragen muss. Die Länge des Codes spielt hier keine Rolle, sofern wir nicht gerade von Diskrepanzen im 1k LOC Bereich sprechen.

Mir persönlich sind 100 Zeilen Code deutlich lieber, wenn der Code lesbarer, verständlicher, wartbarer und erweiterbarer ist und der Code schon mal etwas von Performance gehört hat. Entschuldigt, wenn ich meine real-world-Anforderungen nicht für einen halbstündigen Spaß abschalten kann.


## Meine Lösung

… hat mich exakt 34 Minuten gekostet. Offenbar bin ich damit deutlich langsamer als Eric und Benedict, die jeweils wohl nur 10 Minuten brauchten. Werde ich alt und langsam? 


## Veröffentlichte Lösungen 

In den Kommentaren des [Artikels](http://www.phpgangsta.de/wettbewerb-10-000-zahlen-ausschreiben) kann man sich die bisher "eingesandten" Lösungen herausfischen. Auf die einzelnen Implementierungen will ich an dieser Stelle nicht eingehen, das darf gerne der Autor der Geschichte machen.

Ranking nach Ausführungszeig:


Ranking nach LOC (Lines Of Code) (wobei hier eher »Anzahl Zeichen«):





Von 11 Lösungen erfüllen nur 5 die Anforderungen vollständig.

### Benedict (be.php)

* <code>sechundzwanzig</code>
* <code>siebundvierzig</code>
* <code>einshundert</code>

### Dominik (dominik.php)

* <code>eindundzwanzig</code>
* <code>dreisig</code>

### Eric (eric.php)

* <code>sechszehn</code>, <code>sechsig</code>
* <code>achzig</code>

### ChrisB (chrisb.php)

Lassen wir <code>dreissig</code> mal <code>dreißig</code> sein und wir haben ein perfektes Ergebnis.. **yay!**

### Edo (edo.php)

* <code>ein</code>
* <code>sechszehn</code>, <code>sechszig</code>
* <code>siebenzehn</code>, <code>siebenzig</code>

### Philip (philip.php)

* <code>sechszehn</code>, <code>sechszig</code>
* <code>einstausend</code>

### André (andre.php)

Lassen wir <code>dreissig</code> mal <code>dreißig</code> sein und wir haben ein perfektes Ergebnis.. **yay!**

(Die Einzige Lösung mit großem Anfangsbuchstaben.)

### Benjamin (benjamin.php)

* <code>dreiszigzig</code>
* <code>vier</code>(zig!) , <code>einhundertvier</code>(zig!)

Ersetzt man <code>split()</code> durch <code>explode()</code> reduziert sich die Laufzeit von <code>0.9951</code> auf <code>0.6337</code> Sekunden. Der Benjamin möchte mal ein [Beispiel](https://gist.github.com/730197) anschauen und künftig auf Error Suppression verzichten… Vollkommen unnötiger Performancekiller.

### Benjamin OOP (benjamin2.php)

*Exakt* das selbe Ergebnis wie globe.php und globe2.php. **yay!**

### Martin (martin.php)

* <code>einsundzwanzig</code>

Erlaubt mehrere Sprachen. Für Englisch und Deutsch. Frage mich ob das auch mit Französisch von Haus aus klappt.

## Automated Testing

Value Assertions können auf allen Scripts mit Ausnahme der folgenden durchgeführt werden

* globe
* eric
* philip

