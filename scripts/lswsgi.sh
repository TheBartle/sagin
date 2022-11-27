#!/bin/sh

apt-get install build-essential wget python3-dev

wget https://www.litespeedtech.com/packages/lsapi/wsgi-lsapi-2.1.tgz

tar -xvf wsgi-lsapi-2.1.tgz

rm -rf wsgi-lsapi-2.1.tgz

cd wsgi-lsapi-2.1

python3 ./configure.py
make -j4 -l4
cp lswsgi /usr/local/lsws/fcgi-bin/

cd ..
rm -rf wsgi-lsapi-2.1

echo "completed"