# Wettbewerb: 10.000 Zahlen ausschreiben

Via [PHP hates me](http://www.phphatesme.com/blog/php/wettbewerb-10-000-zahlen-ausschreiben/) wurde ich heute auf einen kleinen [Wettbewerb](http://www.phpgangsta.de/wettbewerb-10-000-zahlen-ausschreiben) aufmerksam. Dabei geht es darum die Zahlen 1 - 10'000 in natürlicher deutscher Sprache auszugeben.


## LOC vs. Performance

In seinem BlogPost interessiert sich der Autor vor allem für die Länge des Codes und bezeichnet Laufzeit und Speicherverbrauch als uninteressant. Wir sprechen hier wohl gemerkt von PHP. Einer Sprache, die im Gegensatz zu Javascript nicht erst aufwändig zur ausführenden Plattform übertragen muss. Die Länge des Codes spielt hier keine Rolle, sofern wir nicht gerade von Diskrepanzen im 1k LOC Bereich sprechen.

Mir persönlich sind 100 Zeilen Code deutlich lieber, wenn der Code lesbarer, verständlicher, wartbarer und erweiterbarer ist und der Code schon mal etwas von Performance gehört hat. Entschuldigt, wenn ich meine real-world-Anforderungen nicht für einen halbstündigen Spaß abschalten kann.


## Meine Lösung

… hat mich exakt 34 Minuten gekostet. Offenbar bin ich damit deutlich langsamer als Eric und Benedict, die jeweils wohl nur 10 Minuten brauchten. Werde ich alt und langsam? 


## Veröffentlichte Lösungen 

In den Kommentaren des [Artikels](http://www.phpgangsta.de/wettbewerb-10-000-zahlen-ausschreiben) kann man sich die bisher "eingesandten" Lösungen herausfischen. Auf die einzelnen Implementierungen will ich an dieser Stelle nicht eingehen, das darf gerne der Autor der Geschichte machen.

rank | approach | time | memory | peak | characters | korrekt  
-----|----------|------|--------|------|------------|---------
1 | globe | 0.0552 | 2298.62 | 3287.59 | 881 | ja
2 | eric | 0.098 | 333.33 | 1323.76 | 726 | nein
3 | philip | 0.1584 | 333.86 | 1324.52 | 805 | nein
4 | globe2 | 0.1762 | 2318.23 | 3306.13 | 1244 | ja
5 | edo | 0.1873 | 356.8 | 2482.12 | 889 | nein
6 | chrisb | 0.2273 | 351.84 | 1340.22 | 1114 | nein
7 | dominik | 0.3569 | 363.22 | 1353.45 | 2101 | nein
8 | be | 0.4995 | 366.77 | 1356.02 | 1591 | nein
9 | benjamin | 0.6054 | 338.81 | 1343.42 | 449 | nein
10 | benjamin2 | 0.6136 | 365.06 | 1354.59 | 1642 | ja
11 | andre | 0.9275 | 415.34 | 1408.03 | 3864 | ja


rank | approach | time | memory | peak | characters | korrekt  
-----|---------|------|--------|------|------------|---------
1 | benjamin | 0.6021 | 338.81 | 1343.42 | 449 | nein
2 | eric | 0.0967 | 333.33 | 1323.76 | 726 | nein
3 | philip | 0.1574 | 333.86 | 1324.52 | 805 | nein
4 | globe | 0.0547 | 2298.62 | 3287.59 | 881 | ja
5 | edo | 0.1832 | 356.8 | 2482.12 | 889 | nein
6 | chrisb | 0.2207 | 351.84 | 1340.22 | 1114 | ja
7 | globe2 | 0.1765 | 2318.23 | 3306.13 | 1244 | ja
8 | be | 0.4986 | 366.77 | 1356.02 | 1591 | nein
9 | benjamin2 | 0.6416 | 365.06 | 1354.59 | 1642 | nein
10 | dominik | 0.3519 | 363.22 | 1353.45 | 2101 | nein
11 | andre | 0.924 | 415.34 | 1408.03 | 3864 | ja

Von 11 Lösungen erfüllen nur 4 die Anforderungen vollständig.

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

Ich würde lassen wir <code>dreissig</code> mal <code>dreißig</code> sein und wir haben ein perfektes Ergebnis. yay!

### Edo (edo.php)

* <code>ein</code>
* <code>sechszehn</code>, <code>sechszig</code>
* <code>siebenzehn</code>, <code>siebenzig</code>

### Philip (philip.php)

* <code>sechszehn</code>, <code>sechszig</code>
* <code>einstausend</code>

### André (andre.php)

Die Einzige Lösung mit großem Anfangsbuchstaben.
Ich würde lassen wir <code>dreissig</code> mal <code>dreißig</code> sein und wir haben ein perfektes Ergebnis. yay!

### Benjamin (benjamin.php)

* <code>dreiszigzig</code>
* <code>vier</code>(zig!) , <code>einhundertvier</code>(zig!)

Ersetzt man <code>split()</code> durch <code>explode()</code> reduziert sich die Laufzeit von <code>0.9951</code> auf <code>0.6337</code> Sekunden. Der Benjamin möchte mal ein [Beispiel](https://gist.github.com/730197) anschauen und künftig auf Error Suppression verzichten… Vollkommen unnötiger Performancekiller.

### Benjamin OOP (benjamin2.php)

*Exakt* das selbe Ergebnis wie globe.php und globe2.php. yay!

