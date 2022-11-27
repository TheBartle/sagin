#!/bin/sh

RED='\033[0;31m'
GREEN='\033[0;32m'
CYAN='\033[1;36m'
NC='\033[0m' #

OS=$(cat /etc/*release)
if echo $OS | grep -q "Ubuntu 22.04" ; then
    echo $CYAN
    cat << "EOF"
                         _ _ _                                _ 
                        | (_) |                              | |
   ___  _ __   ___ _ __ | |_| |_ ___  ___ _ __   ___  ___  __| |
  / _ \| '_ \ / _ \ '_ \| | | __/ _ \/ __| '_ \ / _ \/ _ \/ _` |
 | (_) | |_) |  __/ | | | | | ||  __/\__ \ |_) |  __/  __/ (_| |
  \___/| .__/ \___|_| |_|_|_|\__\___||___/ .__/ \___|\___|\__,_|
       | |                               | |                    
       |_|                               |_|        
EOF
    echo "${GREEN}Szurag - Bartosz Lemieszko${NC}"        
    sleep 2
    
    sed -i "1s/.*/\$nrconf{restart} = 'a';/" /etc/needrestart/needrestart.conf
    sed -i "2s/.*/\$nrconf{kernelhints} = 0;/" /etc/needrestart/needrestart.conf
    
    apt -y update
    apt install -y firewalld libexpat-dev wget git build-essential autoconf libtool bison re2c pkg-config libssl-dev libbz2-dev libcurl4-openssl-dev libffi-dev libzip-dev libpng-dev libjpeg-dev libwebp-dev libavif-dev libgmp-dev libc-client-dev libkrb5-dev libldap2-dev libonig-dev libreadline-dev libsodium-dev libxml2-dev libsqlite3-dev    
    wget https://openlitespeed.org/packages/openlitespeed-1.7.16.src.tgz
    tar -xvf openlitespeed-1.7.16.src.tgz
    cd openlitespeed-1.7.16

    chmod +x ./build.sh
    ./build.sh
    chmod +x ./install.sh
    ./install.sh

    echo "${GREEN}"
    cat << "EOF"
   _____ _    _  _____ _____ ______  _____ _____ 
  / ____| |  | |/ ____/ ____|  ____|/ ____/ ____|
 | (___ | |  | | |   | |    | |__  | (___| (___  
  \___ \| |  | | |   | |    |  __|  \___ \\___ \ 
  ____) | |__| | |___| |____| |____ ____) |___) |
 |_____/ \____/ \_____\_____|______|_____/_____/ 
                                                 

LITESPEED INSTALLED <3                               
EOF
echo "${NC}"

    cd ../
    wget https://www.php.net/distributions/php-5.6.35.tar.gz
    tar -xvf php-5.6.35.tar.gz
    cd php-5*
    
    ./configure --with-config-file-path=../conf --disable-all --with-litespeed --enable-session --enable-posix --enable-xml --with-libexpat-dir=/usr/lib/aarch64-linux-gnu/ --with-zlib --enable-sockets --enable-bcmath --enable-json

    rm ./Zend/zend_multiply.h
    wget https://raw.githubusercontent.com/TheBartle/auto-openlitespeed-install-on-arm-aarch/main/Zend/zend_multiply.h -P ./Zend/

    #wget https://www.php.net/distributions/php-8.1.13.tar.gz
    #tar -xvf php-8.1.13.tar.gz
    #cd php-8.1.13
    
    #./configure --prefix=/usr/local/lsws/lsphp81 --with-mysqli --with-zlib --enable-gd --enable-session --enable-posix --enable-shmop --enable-sockets --enable-sysvsem --enable-sysvshm --enable-mbstring --with-iconv --with-pdo-mysql --enable-ftp --with-zip --with-curl --enable-soap --enable-xml --with-openssl --enable-bcmath --enable-litespeed

    make -j4 -l4 && make install

    cd /usr/local/lsws/admin/fcgi-bin/ && rm -rf ./admin_php && cp /usr/local/bin/lsphp /usr/local/lsws/admin/fcgi-bin/admin_php && rm -rf /usr/local/lsws/fcgi-bin/lsphp* && cp /usr/local/bin/lsphp /usr/local/lsws/fcgi-bin/lsphp && cp /usr/local/bin/lsphp /usr/local/lsws/fcgi-bin/lsphp5 && cd /usr/local/lsws/admin/misc

    echo "${RED}-----------------------------------------------------------"
    echo "            CHANGE PASSWORD FOR OPENLITESPEED ADMIN"
    echo "-----------------------------------------------------------${NC}"
    
    sleep 5

    ./admpass.sh

    systemctl restart lsws

    firewall-cmd --permanent --add-port=7080/tcp --zone=public
    firewall-cmd --permanent --add-port=7080/udp --zone=public
    firewall-cmd --permanent --add-port=8088/tcp --zone=public
    firewall-cmd --permanent --add-port=8088/udp --zone=public
    firewall-cmd --permanent --add-port=80/tcp --zone=public
    firewall-cmd --permanent --add-port=80/udp --zone=public
    firewall-cmd --permanent --add-port=443/tcp --zone=public
    firewall-cmd --permanent --add-port=443/udp --zone=public

    firewall-cmd --reload

    chmod -R 755 /usr/local/lsws/

    rm -rf /usr/local/lsws/php
    rm -rf /usr/local/lsws/phpbuild

    sed -i "1s/.*/\$nrconf{restart} = 'i';/" /etc/needrestart/needrestart.conf
    sed -i "2s/.*/\$nrconf{kernelhints} = 1;/" /etc/needrestart/needrestart.conf

    echo "${GREEN}FINISHED${NC}"
else
    echo "Unsupported os"
fi