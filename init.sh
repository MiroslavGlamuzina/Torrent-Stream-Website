#!bin/sh
echo "Installing Required Packages..."
apt-get install nodejs -y
echo "nodejs completed..."
apt-get install nodejs-legacy -y
echo "nodejs-legacy completed..."
apt-get install lamp-server^ -y
echo "Lamp-server Completed..."
cp -a .data/. /var/www/html/Torrent-Stream-Website/
sudo chmod a+x .other/Torrent-Stream-Website.desktop
cp -a .other/Torrent-Stream-Website.desktop ./Torrent-Stream-Website.desktop
#cp -a .Torrent-Stream-Website.sh Torrent-Stream-Website.sh
echo "Setup Completed!"
echo "Application Created"


