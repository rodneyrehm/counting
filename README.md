# Wettbewerb: 10.000 Zahlen ausschreiben

Via [PHP hates me](http://www.phphatesme.com/blog/php/wettbewerb-10-000-zahlen-ausschreiben/) wurde ich heute auf einen kleinen [Wettbewerb](http://www.phpgangsta.de/wettbewerb-10-000-zahlen-ausschreiben) aufmerksam. Dabei geht es darum die Zahlen 1 - 10'000 in natürlicher deutscher Sprache auszugeben.


## LOC vs. Performance

In seinem BlogPost interessiert sich der Autor vor allem für die Länge des Codes und bezeichnet Laufzeit und Speicherverbrauch als uninteressant. Wir sprechen hier wohl gemerkt von PHP. Einer Sprache, die im Gegensatz zu Javascript nicht erst aufwändig zur ausführenden Plattform übertragen muss. Die Länge des Codes spielt hier keine Rolle, sofern wir nicht gerade von Diskrepanzen im 1k LOC Bereich sprechen.

Mir persönlich sind 100 Zeilen Code deutlich lieber, wenn der Code lesbarer, verständlicher, wartbarer und erweiterbarer ist und der Code schon mal etwas von Performance gehört hat. Entschuldigt, wenn ich meine real-world-Anforderungen nicht für einen halbstündigen Spaß abschalten kann.


## Meine Lösung

… hat mich exakt 34 Minuten gekostet. Offenbar bin ich damit deutlich langsamer als Eric und Benedict, die jeweils wohl nur 10 Minuten brauchten. Werde ich alt und langsam? 


## Veröffentlichte Lösungen 

In den Kommentaren des [Artikels](http://www.phpgangsta.de/wettbewerb-10-000-zahlen-ausschreiben) kann man sich die bisher "eingesandten" Lösungen herausfischen.

Ranking nach Ausführungszeit:

approach | time | memory | peak | characters | errors 
---------|------|--------|------|------------|--------
benjamin3 | 0.0209 | 336.6 | 1340.59 | 536 | -
globe | 0.0718 | 2298.73 | 3302.9 | 881 | -
eric2 | 0.1113 | 334.61 | 1340.16 | 650 | -
eric | 0.1227 | 333.35 | 1338.86 | 726 | 60, 61, 66, 764, 1016, 2067
philip | 0.1805 | 333.89 | 1339.68 | 805 | 60, 61, 66, 764, 1000, 1001, 1016, 2067
blubber | 0.1846 | 334.58 | 1339.02 | 1092 | -
edo | 0.2072 | 356.83 | 2497.19 | 889 | 1, 33, 60, 61, 66, 70, 71, 77, 101, 174, 764, 1001, 1016, 2067
chrisb | 0.2246 | 351.88 | 1355.39 | 1114 | -
globe2 | 0.2247 | 2322.83 | 3325.78 | 1436 | -
dominik | 0.3737 | 363.23 | 1368.65 | 2101 | 21, 33, 61, 71
nick | 0.4479 | 378.13 | 1381.83 | 2403 | -
be | 0.5302 | 366.78 | 1371.09 | 1591 | 26, 27, 66, 77, 100, 101, 174, 2067
benjamin2 | 0.6314 | 365.12 | 1370.34 | 1642 | -
martin | 0.6623 | 2776.83 | 4641.7 | 3248 | 21, 61, 71
benjamin | 0.9107 | 344.72 | 1364.15 | 414 | -
andre | 0.936 | 415.37 | 1423.08 | 3864 | -

Ranking nach LOC (Lines Of Code) (wobei hier eher »Anzahl Zeichen«):

approach | time | memory | peak | characters | errors 
---------|------|--------|------|------------|--------
benjamin | 0.9107 | 344.72 | 1364.15 | 414 | -
benjamin3 | 0.0209 | 336.6 | 1340.59 | 536 | -
eric2 | 0.1113 | 334.61 | 1340.16 | 650 | -
eric | 0.1227 | 333.35 | 1338.86 | 726 | 60, 61, 66, 764, 1016, 2067
philip | 0.1805 | 333.89 | 1339.68 | 805 | 60, 61, 66, 764, 1000, 1001, 1016, 2067
globe | 0.0718 | 2298.73 | 3302.9 | 881 | -
edo | 0.2072 | 356.83 | 2497.19 | 889 | 1, 33, 60, 61, 66, 70, 71, 77, 101, 174, 764, 1001, 1016, 2067
blubber | 0.1846 | 334.58 | 1339.02 | 1092 | -
chrisb | 0.2246 | 351.88 | 1355.39 | 1114 | -
globe2 | 0.2247 | 2322.83 | 3325.78 | 1436 | -
be | 0.5302 | 366.78 | 1371.09 | 1591 | 26, 27, 66, 77, 100, 101, 174, 2067
benjamin2 | 0.6314 | 365.12 | 1370.34 | 1642 | -
dominik | 0.3737 | 363.23 | 1368.65 | 2101 | 21, 33, 61, 71
nick | 0.4479 | 378.13 | 1381.83 | 2403 | -
martin | 0.6623 | 2776.83 | 4641.7 | 3248 | 21, 61, 71
andre | 0.936 | 415.37 | 1423.08 | 3864 | -

Von 16 Lösungen erfüllen nun 10 die Anforderungen vollständig. Die »errors« Spalte nennt falsch zusammengebaute Zahlen.

Hervorzuheben sind die Lösungen von Martin und Benjamin. Martin liefert das Zahlenwunder gleich für mehrere Sprachen, Benjamin verkünstelt sich im Minimalismus.

Die "besonders schnellen" Lösungen <code>benjamin3</code>, <code>globe</code>, <code>eric2</code>, <code>eric</code>, <code>blubber</code> wurden für einen einzigen Durchlauf geschrieben. Sie erlauben deshalb nur die Ausgabe der kompletten Liste, statt auch einzelner spezifischer Zahlen.

Auf die einzelnen Implementierungen will ich an dieser Stelle nicht weiter eingehen, dafür fehlt mir die Zeit…

Gewinner nach Punkten: <code>Benjamin 3</code>.

[Und nun zurück zum Wettbewerb](http://www.phpgangsta.de/wettbewerb-10-000-zahlen-ausschreiben)