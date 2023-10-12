#!/usr/bin/php -d log_errors=Off
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="https://i.ibb.co/khy45hh/mm.png">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
<pre>
			 __        __                           __
   ____ ___  ____  _____/ /_____  / /__________ ___  ___  _____/ /_____
  / __ `__ \/ __ \/ ___/ //_/ _ \/ __/ ___/ __ `__ \/ _ \/ ___/ //_/ _ \
 / / / / / / /_/ / /  / ,< /  __/ /_(__  ) / / / / /  __/ /  / ,< /  __/
/_/ /_/ /_/\____/_/  /_/|_|\___/\__/____/_/ /_/ /_/\___/_/  /_/|_|\___/

</pre>
		<div class="main">
			<p class="links">
				<a href="articles/linux/index.html">linux</a>
				<a href="articles/bsd/index.html">bsd</a>
				<a href="articles/raspberrypi/index.html">raspberry pi</a>
				<a href="articles/terminallog/index.html">terminallog</a>
				<a href="articles/tnt/index.html">tips&amp;ticks</a>
        <a href="articles/immudex/index.html">immudex - docs</a>
        <a href="https://github.com/xf0r3m">git</a>
        <a href="articles/immudex/immudex.html">immudex</a>
			</p>
      <p>&nbsp;</p>
      <p>
        <strong>Changelog</strong>:
      </p>
			<ul class="reduced-list">
      <?php
        $chPath="resources/fp_changelog.txt";
        if (isset($argv[2]) && ($argv[2] == "changelog")) {
          writeChangelogEntry($chPath, $argv[3]);
        }
        printChangelog($chPath);
      ?>
			</ul>
      <p><strong>Ostatnie zmiany w projektach</strong>: <a href="https://github.com/xf0r3m">https://github.com/xf0r3m</a></p>
      <ul id="chprojects" class="reduced-list" style="height: 100px;">
      <?php
        $output="";
        if (isset($argv[2]) && ($argv[2] != "changelog")) {
          $output = $output . shell_exec('repoSource="https://github.com/xf0r3m" bash mmtool_gitlcommit.sh "' . $argv[2] . '"');
        } else {
          $output = $output . shell_exec('repoSource="https://github.com/xf0r3m" bash mmtool_gitlcommit.sh "immudex immudex-testing bugtrack"');
          $output = $output . shell_exec('repoSource="https://github.com/morketsmerke" bash mmtool_gitlcommit.sh "morketsmerke-dev"');
        }
        echo $output;
      ?>
      </ul> 
      <p><strong>Ostatnie zgłoszenia w serwisie BugTrack</strong>: <a href="https://bugtrack.morketsmerke.org">https://bugtrack.morketsmerke.org</a></p>
      <ul id="chbugtrack" class="reduced-list" style="height: 100px;">
      <?php
        $output = shell_exec('ssh -p 2022 xf0r3m@bugtrack.morketsmerke.org "/usr/bin/php /home/xf0r3m/mmtool_btquery.php"');
        echo $output;
      ?>
      </ul>
      <p>&nbsp;</p>
      <p>
        <strong>O mnie</strong></li>
      </p>
      		<div>
		<img src="https://i.ibb.co/D9CYmS5/mm-lb.png" style="display: block; float: left;" />
		<p> 
	    Cześć, mam imię Jakub i jestem entuzajstą systemów uniksopodobnych,
        serwerów (zarówno fizycznych maszyn jak i demonów) oraz różnych 
        dziwnych
        rozwiązań komputerowych jak np. cienkie klienty. Żaden ze mnie
        <em>sysadmin</em>. Ta strona jest przedłużeniem mojej pamięci i
        powstała w jednym celu - zapisać wszystko z czym miałem styczność
        podczas moich zabaw z komputerami (if u know what i mean ;)). Często
        korzystałem z różnych źródeł próbując coś sobie skonfigurować na
        Linuksie czy innym Uniksie i zawarte tam informacje nie zawsze były 
        trafne, akurat w moim przypadku. (Oczywiście!) Dlatego też zamiast
        15 minut, spędzałem nad nią kilka godzin.
        Kiedy już osiągnąłem cel, doszedłem do wniosku że tyle pracy nie może
        przecież pójść na marne i zacząłem te swoje rozwiązania spisywać
        do plików .txt. Później wpadłem na pomysł, że przecież mogę utworzyć
        bloga i tam wszystko umieszczać. Ta strona miała kilka wersji,
        charakteryzujących się różnorakim <em>designem</em>, <em>layoutem</em>. 
	czy rozwiązaniem. Ta jest wersją 6. Czy ostateczną? Tego niewiadomo.
        Sądząc po tym jak szybko się nudze i jak bardzo nie służy mi stagnacja
        z dużym prawdopodobieństwem chyba nie.
      <!--
                Po chyba pięciu wersjach jest... Najbardziej hakerska wersja tej strony. 
                Wygląda jakby autorowi ewidentnie się nie chciało. Chociaż dzisiaj w 
                czasach ogólnej, ekscytującej brzydoty design ukradziony z pierwszych 
                stron sieci World Wide Web, gdzie dzieciaki przenosiły to co widziały 
                na BBS, pójdzie to nawet na tosterze na ziemiaki. Szczerze żałuje, że 
                nie urodziłem się wcześniej. Żałuje że, nie dorastałem w raz rodzącymi 
                się w bólach globalnymi sieciami, chociaż czy wtedy dorastając w takim 
                samym środowisku potrafiłbym myśleć w podobny sposób jak dzisiaj? Może
                kierowałbym się innymi wartościami? To jest tylko wypełniacz. Oryginalne
                Lorem Ipsum. Tutaj wpisz przykładowy tekst.</li>
                 </li>
                ~xf0r3m
      -->
			</p>
		</div>
      <p>
        Materiały tutaj zamieszczone, tworzę wyłącznie z myślą o sobie samym.
        Materiały są pełne literówek, błędów językowych, gramatycznych czy 
        ortograficznych (spędzając wiecej czasu w książkach o Linuksie czy
        jezykach oprogramowania nabawiłem się chyba jakiejś dysleksji, może te
        akapity uda się napisać poprawnie).
        Te można sobie darować, jednak pracuje nad tym aby każdy materiał był
        jak najbardziej merytoryczny i zawierał jak najmniej tego typu błędów.
        Jednym słowem grafomania. Materiały zawarte na tej stronie są publikowne
        w oparciu o <em>copyleft</em>. (Nie chce mi się przytaczać pełnej nazwy
        tej licencji. Nawet jej nie znam. W kwestajach licencyjnych jestem
        straszym ignoratem, liczą się tylko te najbardziej liberalne jak
        <em>GPL</em> [zaraz i tak się dowiem, że GPL nie jest, aż tak mocno
        liberalna], zatem moją licencje mogę określić mianem JCh - "Bierzcie i
        korzystajcie z tego wszyscy, to jest moja praca wydana na wieki 
        wieków", wszystkie inne licencje ograniczające użytkownika to ściek.)
        Dlatego też śmiało można korzystać ze wszystkich materiałów tutaj
        umieszczonych. Nie obiecuje, że ta strona będzie komukolwiek przydatna,
        ale jak już jesteście to siadajcie. Brawo dotarłeś do końca internetu.
      </p>
      <p>
      	Jakby ktoś potrzebował kontaktu ze mną, to znajdzie go pod tym
	adresem mailowm: <a href="mailto:xf0r3m@gmail.com">itaktegonieodczytam@gmail.com</a>.
      </p>
			<p>&nbsp;</p>
			<p>
				<strong>Oznaczenia tekstu stosowane w materiałach:</strong><br />
        <em>(autor zastrzega sobie możliwość niestosowania się do poniższych
        reguł)</em>
			</p>
			<ul>
				<li>
<pre class="code-block">
# rcctl enable dnsmasq
</pre>
					(<strong>&lt;pre class=".code-block"&gt;&lt;/pre&gt;</strong>) - bloki kodu; 
                    zawartość plików konfiguracyjnych powyżej jednej linii; informacje zwracane 
                    przez programy,
				</li>
				<li>
					<code class="code-inline">rcctl enable dhcpd</code>
					(<strong>&lt;code class="code-inline"&gt;&lt;/code&gt;</strong>) - fragmenty 
                    bloków oznaczonych klasą <em>.code-block</em>; pojedyńcze linie poleceń lub 
                    linie plików konfiguracyjnych oraz ewentualne ich fragmenty użyte w innych 
                    elementach niż te opisane powyższą klasą; informacje zwracane przez programy 
                    wykorzystane w akapitach,
                </li>
				<li><strong>&lt;em&gt;&lt;/em&gt;</strong> - wyrazy obce; nazwy programów; scieżki; 
                    nazwy plików,
                </li>
				<li><strong>&lt;strong&gt;&lt;/strong&gt;</strong> - przedstawienia znaków; 
                    szczególny nacisk na fragmenty tekstu; pierwsze wystąpienie frazy w 
                    przeznaczonym dla niej fragmencie tekstu.
                </li>
        <li><strong>&lt;u&gt;&lt;/u&gt;</strong> - nałożenie nacisku na termin
                    mniej istotny niż znacznik <em>strong</em>
                </li>
			</ul>
      			</div>
			<p>&nbsp;</p>
			<p class="footer">
				2023; COPYLEFT; ALL RIGHTS REVERSED;
			</p>

		</body>
	</html>
