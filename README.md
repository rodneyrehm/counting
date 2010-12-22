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

approach | time | memory | peak | characters | errors 
---------|------|--------|------|------------|--------
globe | 0.0546 | 2298.65 | 3297.36 | 881 | -
eric | 0.102 | 333.35 | 1333.54 | 726 | 60, 61, 66, 764, 1016, 2067
philip | 0.1586 | 333.88 | 1334.29 | 805 | 60, 61, 66, 764, 1000, 1001, 1016, 2067
globe2 | 0.1773 | 2318.26 | 3315.82 | 1244 | 1
edo | 0.1904 | 356.83 | 2491.79 | 889 | 1, 33, 60, 61, 66, 70, 71, 77, 101, 174, 764, 1001, 1016, 2067
chrisb | 0.2197 | 351.85 | 1349.91 | 1114 | -
dominik | 0.3562 | 363.24 | 1363.25 | 2101 | 21, 33, 61, 71
be | 0.5051 | 366.8 | 1365.69 | 1591 | 26, 27, 66, 77, 100, 101, 174, 2067
benjamin2 | 0.6121 | 365.08 | 1365.08 | 1642 | -
martin | 0.6158 | 2776.78 | 4636.64 | 3248 | 21, 61, 71
benjamin | 0.6163 | 338.82 | 1353.46 | 449 | 33, 764
andre | 0.9277 | 415.35 | 1417.78 | 3864 | -


Ranking nach LOC (Lines Of Code) (wobei hier eher »Anzahl Zeichen«):

approach | time | memory | peak | characters | errors 
---------|------|--------|------|------------|--------
benjamin | 0.6025 | 338.82 | 1353.46 | 449 | 33, 764
eric | 0.0989 | 333.35 | 1333.54 | 726 | 60, 61, 66, 764, 1016, 2067
philip | 0.1636 | 333.88 | 1334.29 | 805 | 60, 61, 66, 764, 1000, 1001, 1016, 2067
globe | 0.0638 | 2298.65 | 3297.36 | 881 | -
edo | 0.1861 | 356.83 | 2491.79 | 889 | 1, 33, 60, 61, 66, 70, 71, 77, 101, 174, 764, 1001, 1016, 2067
chrisb | 0.2187 | 351.85 | 1349.91 | 1114 | -
globe2 | 0.2207 | 2318.26 | 3315.82 | 1244 | 1
be | 0.5023 | 366.8 | 1365.69 | 1591 | 26, 27, 66, 77, 100, 101, 174, 2067
benjamin2 | 0.6091 | 365.08 | 1365.08 | 1642 | -
dominik | 0.3574 | 363.24 | 1363.25 | 2101 | 21, 33, 61, 71
martin | 0.6187 | 2776.78 | 4636.64 | 3248 | 21, 61, 71
andre | 0.9211 | 415.35 | 1417.78 | 3864 | -




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

