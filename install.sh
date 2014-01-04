#!/bin/bash
# verzija 2
which unzip # Nu imal' ga
if [ $? !=0 ]; then
 echo -e "\n\e[1;31m :: ZAJEB ::\e[0m\n\n Nemaš instaliran unzip! \e[1;33m:P\e[0m\n"
 exit 1
fi
which wget # Nu imal' ga
if [ $? !=0 ]; then
 echo -e "\n\e[1;31m :: ZAJEB ::\e[0m\n\n Nemaš instaliran wget! \e[1;33m:P\e[0m\n"
 exit 1
fi
wget https://github.com/pulsir/pulsir/archive/master.zip && unzip master.zip
cd pulsir-master
clear
echo -e "\n\e[1;36m :: INFO ::\e[0m\n\n Sada napravite bazu za pulsir..\n Po završetku, pritisnite \e[1;32mEnter\e[0m za nastavak...\n"
read -p ""
clear
if [ $UID = 0 ]; then
 echo -e "\n\e[1;31m :: ZAJEB ::\e[0m\n\n Ovu skriptu ne smijete pokrenuti kao \e[1;31mroot\e[0m!\n"
 exit 1
fi
Korisnik="$(whoami)" # Pokupi ime usera (trebat će za kasnije, kad se user bude logirao kao root)
function ENTER_PASSWORD {
clear
echo -e "\n Upišite korisničku zaporku za MySQL:\n"
read PassWord1
clear
echo -e "\n Ponovo upišite korisničku zaporku za MySQL:\n"
read PassWord2
clear
if [ "$PassWord1" != "$PassWord2" ]; then
 echo -e "\n\e[1;31m :: ZAJEB ::\e[0m\n\n Zaporke se ne podudaraju!\n\n Pritisnite \e[1;32mEnter\e[0m za nastavak ili \e[1;31mCtrl\e[0m + \e[1;31mC\e[0m za prekid...\n"
 read -p ""
 ENTER_PASSWORD
fi
}
clear
echo -e "\n Upišite naziv MySQL servera:\n"
read LocalhostName
LocalhostName="${LocalhostName,,}" # konverzija u lowercase (iweb, zakomentiraj ili izbriši ako ti ovo ne treba)
clear
echo -e "\n Upišite ime korisnika za bazu:\n"
read UserName
UserName="${UserName,,}" # konverzija u lowercase (iweb, zakomentiraj ili izbriši ako ti ovo ne treba)
ENTER_PASSWORD
echo -e "\n Upišite ime baze podataka:\n"
read DataBaseName
DataBaseName="${DataBaseName,,}" # konverzija u lowercase (iweb, zakomentiraj ili izbriši ako ti ovo ne treba)
clear
echo "<?php
error_reporting(E_FATAL | E_ERROR);

\$dirname = dirname(\$_SERVER['PHP_SELF']);

if (\$dirname = '/') {
  require_once '_class/cms_class.php';
}
else {
  require_once '../_class/cms_class.php';
}
\$obj = new modernCMS();

// Sets the database connection variables
\$obj->host = '$LocalhostName';
\$obj->username = '$UserName';
\$obj->password = '$PassWord1';
\$obj->db = '$DataBaseName';

// Connects to the database
\$obj->connect();
error_reporting(E_FATAL | E_ERROR);" > boot.php # Zapisuje ovo u trenutnoj mapi, a to je /putanja/do/pulsir-master ;)
