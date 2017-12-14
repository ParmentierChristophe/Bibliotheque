# Bibliotheque
"Correction" de l'excercice d'evaluation sur le Framework PHP Laravel 

Vous allez créer une application qui permet à un/une bibliothécaire de gérer son catalogue de livres ainsi que les prêts et les rendus

### Installation ###

* type `git clone git@github.com:ParmentierChristophe/Bibliotheque.git projectname` to clone the repository 
* type `cd projectname`
* type `composer install`
* type `composer update`
* copy *.env.example* to *.env*
* type `php artisan key:generate`to generate secure key in *.env* file
* if you use MySQL in *.env* file :
   * set DB_CONNECTION
   * set DB_DATABASE
   * set DB_USERNAME
   * set DB_PASSWORD
* if you use sqlite :
   * type `touch database/database.sqlite` to create the file
* type `php artisan migrate --seed` to create and populate tables
* edit *.env* for emails configuration

### Include ###


### Features ###



### Tricks ###



### Tests ###



### License ###

