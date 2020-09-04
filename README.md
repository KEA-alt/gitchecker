
# HACKATHON 2020
#### Team : NULL
##### GitChecker is code checker, host at ovh : http://185.216.25.177
##### Proudly powered by :
[
![N|Solid](http://icons.iconarchive.com/icons/papirus-team/papirus-apps/48/mysql-workbench-icon.png)](https://www.mysql.com/fr/) [![N|Solid](https://laravel.com/img/logomark.min.svg)](https://laravel.com/) [![N|Solid](https://cdn.discordapp.com/attachments/377437096522153985/751351814242435092/1200px-Vue.js_Logo_2.svg.png)](https://vuejs.org/) [![N|Solid](https://cdn.discordapp.com/attachments/377437096522153985/751352239120973844/22965283.png)](https://vuejs.org/) 


# GitChecker
## Features

-   Code download via GitHub repository
-   Code analysis using PhpStan
-   Code analysis using PhpCS
-   Generates the report and sends mail with the report

## [](https://github.com/go-sql-driver/mysql#requirements)Requirements

-   Server running Ubuntu 18.04
-   Access to the server via root account using ssh



# [](https://github.com/go-sql-driver/mysql#installation)Installation

## How to Install Laravel on Ubuntu

Before we start, you’ll need to SSH into your VPS server.

Following the steps below will walk you through the easiest way to install Laravel on Ubuntu:

### 1. Install Apache Web Server

For Laravel to work, you’ll need Apache. It is one of the most popular HTTP server tools, so it’s likely that your VPS has it installed. Luckily, you can check easily!Once you connect to your server using  **SSH**, verify that an Apache system service exists. To do so, we have to run this command.

    sudo systemctl status apache2

As you can see, on our VPS there is no Apache service, so we have to install it. To do this, execute the following command.

    sudo apt install apache2

Ubuntu by default, starts the Apache service and makes it boot during system loading.

Now, if you’re using a firewall, it is necessary to establish a rule in the Firewall so that Apache can run smoothly. If you have no firewall installed, feel free to skip this step.

    sudo ufw allow “Apache Full”

After that, we can check the Apache service status again.

    sudo systemctl status apache2

![Apache server status command output on Ubuntu](https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2019/02/ubuntu-apache-status.png)Finally, open a web browser and we go to the IP address of your server or its domain name.

If you see this screen, that means Apache is up and running.

![Apache default screen on a browser](https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2019/02/apache-browser-screen.png)

### 2. Install PHP

The next step is to install PHP. Fortunately, PHP 7 comes by default in Ubuntu’s official repositories, which makes the installation very easy. You will need to install the language itself and some extra module. To do this, execute the following command:

sudo apt install php libapache2-mod-php php-mbstring php-xmlrpc php-soap php-gd php-xml php-cli php-zip php-bcmath php-tokenizer php-json php-pear

If the following command produced an output saying some packages were not found, simply update your Ubuntu by running the following command, and rerun the previous one:

    apt-get update

Now, we can test if PHP is working correctly. To do this, we need to create a file in Apache’s root directory. Let’s call it test.php. Run the following command:

    sudo nano /var/www/html/test.php

And add the call to the phpinfo function.

    <?php
    phpinfo();
    ?>

We have to save it and close it. To save, hit  **CTRL+O**, and to exit, hit  **CTRL+X**  Then, open the web browser and go to  **http://Your-serverIP/test.php**.

If you see this screen, you can be sure that PHP is working as it should.

![PHP info screen on a browser](https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2019/02/php-info-screen.png)

### 3. Download and Install a Database Manager

If we are going to develop using Laravel in Ubuntu 18.04, for that it is necessary to install a database manager. Laravel supports PostgreSQL, MySQL, MariaDB, SQLite and SQL server. We can install and configure the one we want. For this tutorial we will install MariaDB.

    sudo apt install mariadb-server

After that, you can set a password for the root. To do this, you need to use the mysql_secure_installation script. Keep in mind that this step is optional, but recomended for security reasons.

    sudo mysql_secure_installation

After we define the root password, we will be asked several MariaDB configuration questions. The answers you should input are next to the lines of code:

    Remove anonymous users? [Y/n] y
    Disallow root login remotely? [Y/n] n
    Remove test database and access to it? [Y/n] y
    Reload privilege tables now? [Y/n] y

![Maria DB configuration on ubuntu](https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2019/02/mariadb-configuration-ubuntu.png)

Congratulations, MariaDB was installed successfully.

### 4. Install Composer

Composer is a PHP dependency manager that facilitates the download of PHP libraries in our projects. Composer both works great with and makes it much easier to install Laravel.

First, we need to download Composer.

    curl -sS https://getcomposer.org/installer | php

Next, we have to make sure Composer can be used globally and make it executable. The following commands will take care of that.

    sudo mv composer.phar /usr/local/bin/composer

    sudo chmod +x /usr/local/bin/composer

### 5. Install GitChecker on Ubuntu Using Git

With Git installed, now we can clone GitChecker. To do this, run the following command:

    cd /var/www/html/
    git clone https://github.com/KEA-alt/gitchecker.git
    cd gitchecker/


## Using Laravel to Deploy an Application

On the contrary, if we are going to use our VPS as the server of a Laravel application, then we have to make some adjustments to avoid problems.

After that, set the necessary permissions to ensure the project runs smoothly:

    sudo chgrp -R www-data /var/www/html/gitchecker/

    sudo chmod -R 775 /var/www/html/gitchecker/storage

It is necessary to create a new virtual host for the project. It can be done easily with the commands below:

    cd /etc/apache2/sites-available

    sudo nano laravel_project.conf

Add the following to create the new Virtual host. Remember to replace  **thedomain.com**  with your server’s  **IP address**.

    <VirtualHost *:80>
       ServerName thedomain.com
       ServerAdmin webmaster@thedomain.com
       DocumentRoot /var/www/html/gitchecker/public
    
       <Directory /var/www/html/gitchecker>
           AllowOverride All
       </Directory>
       ErrorLog ${APACHE_LOG_DIR}/error.log
       CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>

Save the file and close it.

After that, disable the default configuration file of the virtual hosts in Apache with this command:

    sudo a2dissite 000-default.conf

Afterwards, enable the new virtual host:

    sudo a2ensite laravel_project

Enable the Apache rewrite module, and finally, restart the Apache service:

    sudo a2enmod rewrite

    sudo systemctl restart apache2


#### You have to install correctly the project now:

  

    rm -rf node_modules
    
    rm package-lock.json yarn.lock
    
    npm cache clear --force
    
    npm install
    
    composer install
    
    copy .env.example .env
    
    php artisan key:generate
    
    npm run dev

  

#### Set-up the .env :

    MAIL_MAILER=smtp
    
    MAIL_HOST=smtp.gmail.com
    
    MAIL_PORT=465
    
    MAIL_USERNAME=gitcheckerapp@gmail.com
    
    MAIL_PASSWORD=Gitcheckerdu69
    
    MAIL_ENCRYPTION=ssl

    QUEUE_CONNECTION=database

  

####  Set-up the queue system :

    php artisan queue:table
    
    php artisan migrate
    
    php artisan queue:work

  

Now, open the web browser and go to the servers IP and voila. If you get the same Laravel landing screen you have seen last time, you’re ready to start working.

1.  Create a new text file, `startWorker.sh`  at the root of gitchecker
2.  Add the following lines to the file:
    
    ```default
    #!/bin/bash
    php artisan queue:work
    ```
    
    and save the file.
    
3.  Make the script executable.
4.  use this command  `crontab -e`
5.  put  `@reboot sh $var/www/html/gitcheker/startWorker.sh &` 
6.  save it by clicking ctrl+o then ctrl+x

  

Now we can get to work with GitChecker.
Code with love ❤️ !