<?php

class TorrentFile
{
    var $name = "";
    var $magnet = "";

    public function TorrentFile($name, $magnet)
    {
        $this->magnet = $magnet;
        $this->name = $name;
    }


    public function getMagnet()
    {
        return $this->magnet;
    }

    public function setMagnet($magnet)
    {
        $this->magnet = $magnet;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}

?>