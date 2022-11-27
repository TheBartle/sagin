#!/bin/sh

wget https://www.php.net/distributions/php-8.1.13.tar.gz
tar -xvf php-8.1.13.tar.gz
cd php-8.1.13
    
./configure --prefix=/usr/local/lsws/lsphp81 --with-mysqli --with-zlib --enable-gd --enable-session --enable-posix --enable-shmop --enable-sockets --enable-sysvsem --enable-sysvshm --enable-mbstring --with-iconv --with-pdo-mysql --enable-ftp --with-zip --with-curl --enable-soap --enable-xml --with-openssl --enable-bcmath --enable-litespeed

make -j4 -l4 && make install