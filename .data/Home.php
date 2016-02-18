<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="css/tor.png">

    <title>Cover Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="css/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="css/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php include "simple_html_dom.php";
include "TorrentFile.php";
include "MediaData.php"; ?>

<?php
//echo $_GET['srch-term'];
$obj = null;
$MAGNET = str_replace("/Torrent/OpenMagnet.php?magnet=", "", $_SERVER['REQUEST_URI']);
$CURRENT_QUERY = $_GET['srch-term'];
$CURRENT_QUERY = str_replace(' ', "+", $CURRENT_QUERY);
//echo $CURRENT_QUERY;
//echo "</br>".$CURRENT_QUERY;
$IS_MUSIC = "/0/99/100";
$IS_VIDEO = "/0/99/200";
$IS_PORN = "/0/99/500";
$html = file_get_html('https://thepiratebay.se/search/' . $CURRENT_QUERY . $IS_VIDEO);
$items = $html->find('a');
$MAGNET = "magnet";
//torrent class
$torrents = array();
foreach ($items as $e) {
    $temp = $e->href;
    if (strpos($temp, $MAGNET) !== false) {
        $tester = rtrim(split("=", $temp)[2], "&tr");
        $temp = str_replace('+', ' ', $tester);
        $temp = str_replace(".", ' ', $tester);
        $temp = str_replace('720p', '', $tester);
        $temp = str_replace('%5B', '[', $temp); //[
        $temp = str_replace('%5D', ']', $temp); //]
        $temp = str_replace('%7B', '{', $temp); //{
        $temp = str_replace('%7D', '}', $temp); //}
        $tor = new TorrentFile($temp, $e->href);
        array_push($torrents, $tor);
    }
}
//$torrents[0]->getMagnet() -- use this to stream Torrent
echo "<p style=background-color:black;>" . $torrents[0]->getName() . "</p>";
$obj = getMediaData($CURRENT_QUERY);
echo "<p style='z-index:-9;position: absolute;visibility: hidden;' id='mymagnet'>" . $torrents[0]->getMagnet() . "</p>";
?>


<body background="<?php echo $obj['Poster']; ?>">
<!--    style="background-image:url('-->
<!--/*');background-repeat: no-repeat;*/background-size: 100% 100%;-webkit-filter: grayscale(0.2) hue-rotate(150deg) invert(0.2) contrast(1.5);"*/-->


<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container" style="background-color:#111111; border-radius: 15px; padding: 20px">
            <div class="masthead clearfix">
                <div class="inner">
                    <a href="index.html"><h1 class="masthead-brand">The Torrent Streamer</h1></a>
                    <nav>
                        <ul class="nav masthead-nav">
                            <form class="navbar-form" role="search" action="Home.php">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <!--<li class="active"><a href="#">Home</a></li>-->
                            <!--<li><a href="#">Features</a></li>-->
                            <!--<li><a href="#">Contact</a></li>-->
                        </ul>
                    </nav>
                </div>
            </div>
            <!--<div class="cover" >-->
            <h1 class="" onclick='pressPlay()'><strong><strong>PLAY</strong></strong>&#09;&#09;&#09;&#09;
                <h1 class="" style=background-color:black;><strong><strong><?php echo $obj['Title']; ?></strong></strong>&#09;&#09;&#09;&#09;
                    <small>
                        <small><?php echo $obj['Runtime']; ?></small>
                    </small>
                </h1>

                <p class="lead" style=background-color:black;><strong><?php echo $obj['Plot']; ?></strong></p>
                <!--            <p class="small text-left"><strong>--><?php //echo "Year: ".$obj['Year']; ?><!--</strong></p>-->
                <p class="small text-left"><strong><?php echo "Rated: " . $obj['Rated']; ?></strong></p>
                <p class="small text-left"><strong><?php echo "Released: " . $obj['Released']; ?></strong></p>
                <p class="small text-left"><strong><?php echo "Director: " . $obj['Director']; ?></strong></p>
                <p class="small text-left"><strong><?php echo "Awards: " . $obj['Awards']; ?></strong></p>
                <!--</div>-->
        </div>
    </div>
</div>
<script>
    function pressPlay() {
        var mag = document.getElementById('mymagnet');
        window.location.assign("./OpenMagnet.php?magnet="+mag.innerHTML);

//        window.location.href = "http://www.google.com";
//        $.ajax({
//            url: "OpenMagnet.php?magnet=" +//, success: function (result) {
//            }
//        });
    }
</script>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="css/jquery.min.js"><\/script>')</script>
<script src="css/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="css/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
