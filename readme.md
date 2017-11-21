# php-mvc
Project created in the course: https://www.udemy.com/object-oriented-php-mvc


### Configuring Apache2

````
# mvc.conf
<Directory "/var/www/mvc">
    RewriteBase   /
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Order allow,deny
    Allow from all
</Directory>
<Directory "/var/www/mvc">

````
