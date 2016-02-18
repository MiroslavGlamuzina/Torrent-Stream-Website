<?php
function getMediaData($search){
    $obj = json_decode(file_get_contents('http://www.omdbapi.com/?t=' . $search.'&y=&plot=short&r=json'), true);
    return $obj;
}

function listMediaData($obj){
    echo $obj['Response'];
    echo $obj['Title'];
    echo $obj['Year'];
    echo $obj['Rated'];
    echo $obj['Released'];
    echo $obj['Runtime'];
    echo $obj['Director'];
    echo $obj['Plot'];
    echo $obj['Language'];
    echo $obj['Country'];
    echo $obj['Awards'];
    echo "<img width='150px' height='225px' src='".$obj['Poster']."' />";
}