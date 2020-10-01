#!bin/sh
echo "Installing Required packages..."
apt-get install nodejs -y
echo "Nodejs Completed.."
apt-get install nodejs-legacy -y
echo "Nodejs-egacy completed..."
apt-get install lamp-server^ -y
echo "lamp-server completed..."
cp -a .data/. /var/www/html/Torrent-Stream-Website/
sudo chmod a+x .other/Torrent-Stream-Website.desktop
cp -a .other/Torrent-Stream-Website.desktop ./Torrent-Stream-Website.desktop
#cp -a .Torrent-Stream-Website.sh Torrent-Stream-Website.sh
echo "setup completed!"
echo "Application Created"
echo "your program completed"


