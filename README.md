Project 3

STEP 1: install composer on mac os:

  I followed this link for installation:
    https://getcomposer.org/doc/00-intro.md

  In my terminal:

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"



STEP 2: install Twig:

 In my terminal:

composer require "twig/twig:^2.0"

STEP 3: install bootstrap:

 In my terminal:

composer require twbs/bootstrap:4.1.3

STEP 4: install tinymce:

 In my terminal:

composer require tinymce/tinymce
