# bbs-php 

![2018-03-26 13 38 21](https://user-images.githubusercontent.com/5633085/37887142-1700d8c2-30fb-11e8-90d1-26eeee0098b3.png)

## Use  
It can be used by specifying DB and pass   
https://blog.adachin.me/archives/835

----------------  

# bbs-rails  

![2018-03-26 13 38 30](https://user-images.githubusercontent.com/5633085/37887146-2014e638-30fb-11e8-944b-35b69ceeec40.png)

## Use    
Bulletin board running on docker server  
http://docker.adachin.me:3000/  
https://blog.adachin.me/archives/4140  
* Db users and passages are appropriate  

## How to start docker   
## 1.adachin-maria  
````
$ docker run --cpuset-cpus=1 --memory=1024mb --name adachin-maria -p 3306:3306 -e MYSQL_ROOT_PASSWORD=xxxxxx -e MYSQL_DATABASE=bbs -d adachin-maria:1027 --character-set-server=utf8mb4 --collation-server=utf8mb4_unicode_ci  
````

## 2.adachin-newbbs01  
````
$ docker run -it -p 3000:3000 --cpuset-cpus=1 --memory=1024mb --name=adachin-newbbs01 adachin-newbbs01:1105 /bin/bash
````

## 3.adachin-newbbs01 deploy   
````
$ docker inspect CONTAINER ID |grep IPAddress
$ docker exec -it xxxxxxx bash
# source ~/.bash_profile
# cd /var/www/
# mkdir bbs
# git clone git@github.com:RVIRUS0817/adachin_bbs.git
# cp -r bbs-rails bbs
# cd bbs
# vim config/databases.yml #add DB IP
# bundle install
# rake db:migrate
# nohup rails s -b 0.0.0.0 &

````
