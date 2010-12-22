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
benjamin3 | 0.0204 | 336.63 | 1340.07 | 536 | -
globe | 0.0551 | 2298.67 | 3302.3 | 881 | -
eric2 | 0.0939 | 334.61 | 1339.63 | 650 | -
eric | 0.0974 | 333.38 | 1338.35 | 726 | 60, 61, 66, 764, 1016, 2067
philip | 0.1576 | 333.89 | 1339.15 | 805 | 60, 61, 66, 764, 1000, 1001, 1016, 2067
blubber | 0.1609 | 334.59 | 1338.5 | 1092 | -
globe2 | 0.2062 | 2322.88 | 3325.37 | 1436 | -
edo | 0.2093 | 356.83 | 2496.66 | 889 | 1, 33, 60, 61, 66, 70, 71, 77, 101, 174, 764, 1001, 1016, 2067
chrisb | 0.2147 | 351.85 | 1354.83 | 1114 | -
dominik | 0.3569 | 363.23 | 1368.12 | 2101 | 21, 33, 61, 71
be | 0.5006 | 366.82 | 1370.56 | 1591 | 26, 27, 66, 77, 100, 101, 174, 2067
benjamin2 | 0.6141 | 365.12 | 1369.81 | 1642 | -
martin | 0.6268 | 2776.82 | 4641.15 | 3248 | 21, 61, 71
benjamin | 0.8955 | 344.72 | 1363.67 | 414 | -
andre | 0.9287 | 415.34 | 1422.69 | 3864 | -

Ranking nach LOC (Lines Of Code) (wobei hier eher »Anzahl Zeichen«):

approach | time | memory | peak | characters | errors 
---------|------|--------|------|------------|--------
benjamin | 0.8955 | 344.72 | 1363.67 | 414 | -
benjamin3 | 0.0204 | 336.63 | 1340.07 | 536 | -
eric2 | 0.0939 | 334.61 | 1339.63 | 650 | -
eric | 0.0974 | 333.38 | 1338.35 | 726 | 60, 61, 66, 764, 1016, 2067
philip | 0.1576 | 333.89 | 1339.15 | 805 | 60, 61, 66, 764, 1000, 1001, 1016, 2067
globe | 0.0551 | 2298.67 | 3302.3 | 881 | -
edo | 0.2093 | 356.83 | 2496.66 | 889 | 1, 33, 60, 61, 66, 70, 71, 77, 101, 174, 764, 1001, 1016, 2067
blubber | 0.1609 | 334.59 | 1338.5 | 1092 | -
chrisb | 0.2147 | 351.85 | 1354.83 | 1114 | -
globe2 | 0.2062 | 2322.88 | 3325.37 | 1436 | -
be | 0.5006 | 366.82 | 1370.56 | 1591 | 26, 27, 66, 77, 100, 101, 174, 2067
benjamin2 | 0.6141 | 365.12 | 1369.81 | 1642 | -
dominik | 0.3569 | 363.23 | 1368.12 | 2101 | 21, 33, 61, 71
martin | 0.6268 | 2776.82 | 4641.15 | 3248 | 21, 61, 71
andre | 0.9287 | 415.34 | 1422.69 | 3864 | -

Von 15 Lösungen erfüllen nun 9 die Anforderungen vollständig. Die »errors« Spalte nennt falsch zusammengebaute Zahlen.

Hervorzuheben sind die Lösungen von Martin und Benjamin. Martin liefert das Zahlenwunder gleich für mehrere Sprachen, Benjamin verkünstelt sich im Minimalismus.

Die "besonders schnellen" Lösungen <code>globe</code>, <code>eric2</code>, <code>eric</code>, <code>blubber</code> wurden für einen einzigen Durchlauf geschrieben. Sie erlauben deshalb nur die Ausgabe der kompletten Liste, statt auch einzelner spezifischer Zahlen.

Auf die einzelnen Implementierungen will ich an dieser Stelle nicht weiter eingehen, dafür fehlt mir die Zeit…

Gewinner nach Punkten: <code>Benjamin 3</code>.

[Und nun zurück zum Wettbewerb](http://www.phpgangsta.de/wettbewerb-10-000-zahlen-ausschreiben)