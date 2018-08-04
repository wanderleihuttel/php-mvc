# php-mvc
Project created in the course: https://www.udemy.com/object-oriented-php-mvc

### How to use
1) Clone the git repository with the command:
````
cd /var/www
git clone https://github.com/wanderleihuttel/php-mvc
````

2) Copy the apache configuration file to the folder /etc/apache/sites-available
````
cp /var/www/php-mvc/examples/mvc-apache2.conf /etc/apache2/sites-available
````

3) Enabled site and rewrite mode
````
a2ensite mvc-apache2.conf
a2enmod rewrite
````

4) Create database
````
# MySQL without password
mysql -u < /var/www/php-mvc/examples/mvc-create-database.sql 
# MySQL with password
mysql -u root -p < /var/www/php-mvc/examples/mvc-create-database.sql or 
````

5) Create a MySQL user and password
````
# Access MySQL without password
mysql -u root
# Access MySQL with password
mysql -u root -p

CREATE USER 'mvc'@'localhost';
GRANT ALL ON *.* TO 'mvc'@'localhost' IDENTIFIED BY 'mvc123' WITH GRANT OPTION;
````
6) Modify the 'URL_ROOT' in file /var/www/php-mvc/app/config/config.php to your real 'ip address' or use 'localhost' 
````
 define('URL_ROOT','http://192.168.1.87/php-mvc');
````

7) Restart apache
````
systemctl restart apache2
````

### Default credentials access
````
username: admin@admin.com
password: mvc123
````
