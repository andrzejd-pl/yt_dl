<?php

    // arSANeLZdpqAmPS5

    if(isset($_POST['address'])) {
        exec( 'youtube-dl --extract-audio --audio-format mp3 --output "./yt/%(title)s.%(ext)s" '
            . $_POST['address']);
        exec('cd ./yt/ && ./yt/not_space.sh');
    }

	$files = "";

    foreach (new DirectoryIterator('yt') as $fileInfo) {
		$fileName = $urlFile = $fileInfo->getFilename();
        if ($urlFile == "." || $urlFile == ".." || $urlFile == "not_space.sh")
            continue;


        $fileName = str_replace(".mp3", '', $fileName);

		$urlFile = str_replace(" ", "&#32;", $urlFile);
		$urlFile = str_replace("'", "&#39;", $urlFile);
		$urlFile = str_replace('"', "&#34;", $urlFile);

		$files = $files . "<a href='/yt/" . $urlFile . "'>". $fileName . "</a>";
	}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8" />
	
	<meta name="keywords" content="youtube, pobieranie z youtube, download, mp3, audio, youtube-dl, youtube audio" />
	<meta name="description" content="Strona umożliwająca pobieranie ścieżki audio z fimów z serwisu http://youtube.com/" />
    <meta name="viewpoint" content="width=device-width, initial-scale=1" />
	<title>Pobieranie z YT</title>
	
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
	<link href="font/flaticon.css" rel="stylesheet" />
    <link href="img/icon-shortcut.png" rel="shortcut icon" />
</head>
<body>
    <header>
        <a href="https://yt.andrzejd.pl/">
            <div id="header">
                <div id="header-left">
                    <h1>Pobieranie z <span style="color: red;">YT</span></h1>
                </div>
                <div id="header-right">
                    <i class="flaticon-yt-icon"></i>
                </div>
            </div>
        </a>
    </header>

    <main>
        <article class="first">
            <div id="form">
                <h2>Pobieranie</h2>
                <form method="POST">
                    Podaj adres youtube do pobrania: <input type="text" name="address" />
                    <input id="download" type="submit" value="Pobierz" />
                </form>
            </div>
        </article>

        <article class="second">
            <div id="files">
                <h2><?php echo ($files != "")?"Pliki do pobrania":"Brak plików!"; ?></h2>
                    <?php
                        if($files != "") {
                            echo "<p>" . $files . "</p>\n";
                        }
                        else
                            echo "<p>Brak plików do pobrania, wpisz adres i pobierz. <br /> 
                                UWAGA!!! Pliki są usuwane o 24:00 każdego dnia!!!</p>\n";
                    ?>
            </div>
        </article>
    </main>

    <footer class="first">
        <div id="footer">
            <div id="copyright"><?php echo date("o"); ?> &#32; &copy; Copyright by Andrzej Dybowski. Wszelkie prawa zastrzeżone!</div>
            <div class="licensed">Icons made by <a href="http://www.flaticon.com/authors/chanut-is-industries" title="Chanut is Industries">
                    Chanut is Industries</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>
                is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
            </div>

            <div class="licensed">Icons made by <a href="http://www.flaticon.com/authors/google" title="Google">Google</a> from
                <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by
                <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
            </div>
        </div>
    </footer>
</body>
</html>