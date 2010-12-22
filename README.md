# Wettbewerb: 10.000 Zahlen ausschreiben

Via [PHP hates me](http://www.phphatesme.com/blog/php/wettbewerb-10-000-zahlen-ausschreiben/) wurde ich heute auf einen kleinen [Wettbewerb](http://www.phpgangsta.de/wettbewerb-10-000-zahlen-ausschreiben) aufmerksam. Dabei geht es darum die Zahlen 1 - 10'000 in natürlicher deutscher Sprache auszugeben.


## LOC vs. Performance

In seinem BlogPost interessiert sich der Autor vor allem für die Länge des Codes und bezeichnet Laufzeit und Speicherverbrauch als uninteressant. Wir sprechen hier wohl gemerkt von PHP. Einer Sprache, die im Gegensatz zu Javascript nicht erst aufwändig zur ausführenden Plattform übertragen muss. Die Länge des Codes spielt hier keine Rolle, sofern wir nicht gerade von Diskrepanzen im 1k LOC Bereich sprechen.

Mir persönlich sind 100 Zeilen Code deutlich lieber, wenn der Code lesbarer, verständlicher, wartbarer und erweiterbarer ist und der Code schon mal etwas von Performance gehört hat. Entschuldigt, wenn ich meine real-world-Anforderungen nicht für einen halbstündigen Spaß abschalten kann.


## Meine Lösung

… hat mich exakt 34 Minuten gekostet. Offenbar bin ich damit deutlich langsamer als Eric und Benedict, die jeweils wohl nur 10 Minuten brauchten. Werde ich alt und langsam? 


## Veröffentlichte Lösungen 

In den Kommentaren des [Artikels](http://www.phpgangsta.de/wettbewerb-10-000-zahlen-ausschreiben) kann man sich die bisher "eingesandten" Lösungen herausfischen. Auf die einzelnen Implementierungen will ich an dieser Stelle nicht eingehen, das darf gerne der Autor der Geschichte machen.

Ranking nach Ausführungszeit:

approach | time | memory | peak | characters | errors 
---------|------|--------|------|------------|--------
globe | 0.0546 | 2298.69 | 3301.73 | 881 | -
eric2 | 0.0952 | 334.59 | 1339.1 | 650 | -
eric | 0.0986 | 333.35 | 1337.81 | 726 | 60, 61, 66, 764, 1016, 2067
philip | 0.1587 | 333.88 | 1338.62 | 805 | 60, 61, 66, 764, 1000, 1001, 1016, 2067
blubber | 0.1683 | 334.59 | 1337.99 | 1092 | -
edo | 0.1896 | 356.83 | 2496.16 | 889 | 1, 33, 60, 61, 66, 70, 71, 77, 101, 174, 764, 1001, 1016, 2067
globe2 | 0.206 | 2322.84 | 3324.74 | 1436 | -
chrisb | 0.2229 | 351.86 | 1354.32 | 1114 | -
dominik | 0.3638 | 363.21 | 1367.51 | 2101 | 21, 33, 61, 71
be | 0.5247 | 366.8 | 1370.07 | 1591 | 26, 27, 66, 77, 100, 101, 174, 2067
martin | 0.6292 | 2776.81 | 4640.64 | 3248 | 21, 61, 71
benjamin2 | 0.6385 | 365.09 | 1369.27 | 1642 | -
benjamin | 0.8995 | 344.72 | 1363.09 | 414 | -
andre | 0.9394 | 415.37 | 1422.03 | 3864 | -

Ranking nach LOC (Lines Of Code) (wobei hier eher »Anzahl Zeichen«):

approach | time | memory | peak | characters | errors 
---------|------|--------|------|------------|--------
benjamin | 0.8995 | 344.72 | 1363.09 | 414 | -
eric2 | 0.0952 | 334.59 | 1339.1 | 650 | -
eric | 0.0986 | 333.35 | 1337.81 | 726 | 60, 61, 66, 764, 1016, 2067
philip | 0.1587 | 333.88 | 1338.62 | 805 | 60, 61, 66, 764, 1000, 1001, 1016, 2067
globe | 0.0546 | 2298.69 | 3301.73 | 881 | -
edo | 0.1896 | 356.83 | 2496.16 | 889 | 1, 33, 60, 61, 66, 70, 71, 77, 101, 174, 764, 1001, 1016, 2067
blubber | 0.1683 | 334.59 | 1337.99 | 1092 | -
chrisb | 0.2229 | 351.86 | 1354.32 | 1114 | -
globe2 | 0.206 | 2322.84 | 3324.74 | 1436 | -
be | 0.5247 | 366.8 | 1370.07 | 1591 | 26, 27, 66, 77, 100, 101, 174, 2067
benjamin2 | 0.6385 | 365.09 | 1369.27 | 1642 | -
dominik | 0.3638 | 363.21 | 1367.51 | 2101 | 21, 33, 61, 71
martin | 0.6292 | 2776.81 | 4640.64 | 3248 | 21, 61, 71
andre | 0.9394 | 415.37 | 1422.03 | 3864 | -

Von 14 Lösungen erfüllen nun 8 die Anforderungen vollständig. Die »errors« Spalte nennt falsch zusammengebaute Zahlen.

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

zwischenzeitlich korrigiert. Results are sound.

Benjamin hat wohl ordentlich Freude an [codegolf](http://codegolf.com). Seine Lösung verzichtet auf Lesbarkeit.

### Benjamin OOP (benjamin2.php)

*Exakt* das selbe Ergebnis wie globe.php und globe2.php. **yay!**

### Martin (martin.php)

* <code>einsundzwanzig</code>

Erlaubt mehrere Sprachen. Für Englisch und Deutsch. Frage mich ob das auch mit Französisch von Haus aus klappt.

