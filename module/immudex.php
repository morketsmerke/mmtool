#!/usr/bin/php -d log_errors=Off
<?php
  function getVersion($branch, $arch="64") {
    return trim(file_get_contents("https://ftp.morketsmerke.org/immudex/" . $branch . "/upgrades/latest/" . $arch . "/version"));
  }

  function getLink($branch, $version, $arch) {
    if ( $branch == "stable" ) {
      echo "<a href=\"https://ftp.morketsmerke.org/immudex/" . $branch . "/iso/" . $version . "/immudex" . $arch . ".iso\">https://ftp.morketsmerke.org/immudex/" . $branch . "/iso/" . $version . "/immudex" . $arch . ".iso</a>";
    } else {
      echo "<a href=\"https://ftp.morketsmerke.org/immudex/" . $branch . "/iso/" . $version . "/immudex-" . $branch . $arch . ".iso\">https://ftp.morketsmerke.org/immudex/" . $branch . "/iso/" . $version . "/immudex-" . $branch . $arch . ".iso</a>";
    }

  }
  
  function getCRC($branch, $version, $arch) {
    if ( $branch == "stable" ) {
      $crcArray=explode(' ', trim(file_get_contents("https://ftp.morketsmerke.org/immudex/" . $branch . "/iso/" . $version . "/immudex" . $arch . "_" . $version . "_crc.txt")));
      return $crcArray[0];
    } else {
      $crcArray=explode(' ', trim(file_get_contents("https://ftp.morketsmerke.org/immudex/" . $branch . "/iso/" . $version . "/immudex-" . $branch . $arch . "_" . $version . "_crc.txt")));
      return $crcArray[0];
    }
  }
  
  function getSHA1($branch, $version, $arch) {
    if ( $branch == "stable" ) {
      $sha1Array=explode(' ', trim(file_get_contents("https://ftp.morketsmerke.org/immudex/" . $branch . "/iso/" . $version . "/immudex" . $arch . "_" . $version . "_sha1.txt")));
      return $sha1Array[0];
    } else {
      $sha1Array=explode(' ', trim(file_get_contents("https://ftp.morketsmerke.org/immudex/" . $branch . "/iso/" . $version . "/immudex-" . $branch . $arch . "_" . $version . "_sha1.txt")));
      return $sha1Array[0];
    }

  }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="https://i.ibb.co/khy45hh/mm.png">
		<link rel="stylesheet" type="text/css" href="/style.css">
	</head>
	<body>
<pre>
 _                               _           
(_)_ __ ___  _ __ ___  _   _  __| | _____  __
| | '_ ` _ \| '_ ` _ \| | | |/ _` |/ _ \ \/ /
| | | | | | | | | | | | |_| | (_| |  __/>  < 
|_|_| |_| |_|_| |_| |_|\__,_|\__,_|\___/_/\_\
</pre>
	  <p class="header_link">
		  &#9760;&nbsp;<a href="https://morketsmerke.github.io">morketsmerke</a>&nbsp;&#9760;
	  </p>
	  <div class="main">
		  <h1 class="title">IMMutable DEbian with Xfce</h1>
      <p>
        <strong>Aktualności:</strong>
      </p>
      <ul class="reduced-list">
      <?php
        $chPath="resources/idx_changelog.txt";
        if (isset($argv[2]) && ($argv[2] == "changelog")) {
          writeChangelogEntry($chPath, $argv[3]);
        }
        printChangelog($chPath);
      ?>
      </ul>
      <p>
        <strong>O dystrybucji:</strong>
      <p>
      <p>
        Immudex to wersja debian zawierająca niezmienne środowisko pracy.
        Wykorzystuje ona bowiem archiwum .squashfs znane z LiveCD. Przyczym 
        pozwala ona na pełen dostęp do partycji zawierające archiwum, w razie
        aktualizacji. Tak przygotowana wersja popularnego systemu operacyjnego
        pozwoli bezpieczniejsze korzystanie z komputera oraz zasobów internetu.
        Jeśli coś się stanie, wystarczy uruchomić komputer ponownie.
      </p>
      <p>
        Immudex nastawiowny jest na wykorzystanie do przechowywania danych 
        szyfrowanych partycji za pomocą mechanizmu LUKS. Domyślnie
        przeglądarka WWW (<em>firefox-esr</em>) uruchamiany jest przez
        sandboxer FireJail z własną emulacją stosu TCP/IP. Tak uruchomiana
        przeglądarka nia posiada dostępu do otwartych szyfrowanych partycji.
        Immudex tworzony jest również z myślą o nie narzucaniu rozwiązań
        dlatego też wiele z nich można w łatwy sposób pominąć, oczywiście na
        własną odpowiedzialność. W więcej informacji na temat rozwiązań w
        Immudex znajduje się w artykule "Koncepcje immudex" na stronie z
        dokumentacją systemu. Wszelkie połączenia przychodzące do są 
        zablokowane poprzez firewall <em>ufw</em>.
      </p>
      <p>
        <strong>Oprogramowanie:</strong>
      </p>
      <p>
        Immudex domyślnie korzysta z wolnego oprogramowania, nie zainstalowano
        na nim niewolnych pakietów w konfiguracji nie ma również niewolnych 
        repozytoriów.
      </p>
      <p>
        Oficjalnie immudex wspiera instalację
        niewolnego oprogamowania wyłącznie w postacji <em>addonsów</em>
        dostępnych w postacji samodzielnych skryptów na repozytorium projektu
        lub poprzez narzędzie <em>immudex_addons</em>. Do dyspozycji mamy:
      </p>
      <table>
        <thead>
          <tr>
            <th rowspan="2">Oprogramowanie</th>
            <th colspan="3" class="centered-text">Wersja immudex</th>
          </tr>
          <tr>
            <th class="centered-text">Stable</th>
            <th class="centered-text">Testing</th>
            <th class="centered-text">LHE*</th>
          </tr>
        </thead>
        <tbody>
        <tr>
          <td>Środowisko XFCE</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2716;</td>
        </tr>
        <tr>
          <td>Menadżer okien Ratpoison</td>
          <td class="centered-text">&#x2716;</td>
          <td class="centered-text">&#x2716;</td>
          <td class="centered-text">&#x2714;</td>
        </tr>
        <tr>
          <td>Odtwarzacz multimedialny VLC</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2716;</td>
        </tr>
        <tr>
          <td>Odtwarzacz multimedialny mpv</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2714;</td>
        </tr>
        <tr>
          <td>Skrypt yt-dlp</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2714;</td>
        </tr>
        <tr>
          <td>Przeglądarka Mozilla Firefox ESR</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2716;</td>
        </tr>
        <tr>
          <td>Przeglądarka GNU IceCat</td>
          <td class="centered-text">&#x2716;</td>
          <td class="centered-text">&#x2716;</td>
          <td class="centered-text">&#x2714;</td>
        </tr>
        <tr>
          <td>Wirtualizacja KVM (libvirtd + virt-manager):</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2716;</td>
        </tr>
        <tr>
          <td>Narzędzia autorskie immudex:</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2714;</td>
          <td class="centered-text">&#x2714;</td>
        </tr>
        </tbody>
      </table>
      <p>
        <em>* - Low Hardware Edition, Debian 10 Buster, 32-bit</em>
      </p>
      <p>
        Pełna lista oprogramowania wraz z listą pakietów z znajduje się w 
        pod tym linkiem: 
        <a href="https://ipr.morketsmerke.org">Lista oprogramowania immudex</a>
      </p>
      <p>
        <strong>Obrazy płyt:</strong>
      </p>
      <table border="1" style="border-collapse: collapse;">
        <tr>
          <th colspan="3">&bull;&nbsp;immudex (stable, Debian 12 Bookworm)&nbsp;&bull;</th>
          <?php $branch="stable"; ?>
        </tr>
        <tr>
          <td rowspan="2">64-bit:</td>
          <?php $version=getVersion($branch); $arch="64"; ?>
          <td colspan="3"><?php getLink($branch, $version, $arch); ?></td>
        </tr>
        <tr>
          <td><?php echo "CRC: " . getCRC($branch, $version, $arch); ?></td>
          <td><?php echo "SHA1: " . getSHA1($branch, $version, $arch); ?></td>
        </tr>
        <tr>
          <td rowspan="2">32-bit:</td>
          <?php $arch="32"; ?>
          <td colspan="3"><?php getLink($branch, $version, $arch); ?></td>
        </tr>
        <tr>
          <td><?php echo "CRC: " . getCRC($branch, $version, $arch); ?></td>
          <td><?php echo "SHA1: " . getSHA1($branch, $version, $arch); ?></td>
        </tr>
        <tr>
          <td colspan="3">&bull;&nbsp;<a href="https://github.com/xf0r3m/immudex/blob/main/changelogs/<?php echo $version; ?>.txt">Lista zmian dla wydania</a></td>
        </tr>
        <tr>
          <th colspan="3">&bull;&nbsp;immudex-testing (Debian testing, 13 Trixie)&nbsp;&bull;</th>
          <?php $branch="testing"; ?>
        </tr>
        <tr>
          <td rowspan="2">64-bit:</td>
          <?php $version=getVersion($branch); $arch="64"; ?>
          <td colspan="3"><?php getLink($branch, $version, $arch); ?></td>
        </tr>
        <tr>
          <td><?php echo "CRC: " . getCRC($branch, $version, $arch); ?></td>
          <td><?php echo "SHA1: " . getSHA1($branch, $version, $arch); ?></td>
        </tr>
        <tr>
          <td rowspan="2">32-bit:</td>
          <?php $arch="32"; ?>
          <td colspan="3"><?php getLink($branch, $version, $arch); ?></td>
        </tr>
        <tr>
          <td><?php echo "CRC: " . getCRC($branch, $version, $arch); ?></td>
          <td><?php echo "SHA1: " . getSHA1($branch, $version, $arch); ?></td>
        </tr>
        <tr>
          <td colspan="3">&bull;&nbsp;<a href="https://github.com/xf0r3m/immudex-testing/blob/main/changelogs/<?php echo $version; ?>.txt">Lista zmian dla wydania</a></td>
        </tr>
        <tr>
          <th colspan="3">&bull;&nbsp;immudex-lhe (oldoldstable, Debian 10 Buster)&nbsp;&bull;</th>
          <?php $branch="lhe"; ?>
        </tr>
        <tr>
          <td rowspan="2">32-bit:</td>
          <?php $arch="32"; $version=getVersion($branch, $arch); ?>
          <td colspan="3"><?php getLink($branch, $version, $arch); ?></td>
        </tr>
        <tr>
          <td><?php echo "CRC: " . getCRC($branch, $version, $arch); ?></td>
          <td><?php echo "SHA1: " . getSHA1($branch, $version, $arch); ?></td>
        </tr>
        <tr>
          <td colspan="3">&bull;&nbsp;<a href="https://github.com/xf0r3m/immudex-testing/blob/main/changelogs/<?php echo $version; ?>.txt">Lista zmian dla wydania</a></td>
        </tr>
      </table>
      <p>
        Domyślnym użytkownikiem jest <strong>user</strong>, dostęp to niego 
        uzyskujemy za pomocą hasła <em>user1</em>. Możemy również skorzystać z
        konta superużytkownika <em>root</em> z hasłem <em>toor</em>.
      </p>
      <p>
        <strong>Dokumentacja projektu:</strong>
      </p>
      <p>
        Dokumentacja systemu znajduje się pod tym linkiem: <a href="https://morketsmerke.github.io/articles/immudex/index.html">Dokumentacja immudex</a>.
      </p>
      <p>
        <strong>Zastrzeżenia i uznanie autorstwa:</strong>
      </p>
      <p>
        immudex is not affiliated with Debian. Debian is a registered trademark
        owned by Software in the Public Interest, Inc.
      </p>
      <p>
        <a href="https://www.flaticon.com/free-icons/rss">Rss icons created by Freepik - Flaticon</a> 
      </p>
			<p class="footer">
				2023; COPYLEFT; ALL RIGHTS REVERSED;
			</p>
    </div>
  </body>
</html>
