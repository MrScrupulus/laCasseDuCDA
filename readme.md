### commande de création projet full symfony 

symfony new my_project_directory --version="7.3.x-dev" --webapp

|-------------------------------------------------------------------|
### commandes création de database

php bin/console doctrine:database:create

php bin/console make:entity

php bin/console make:migration

php bin/console doctrine:migrations:migrate

php bin/console make:controller ProductController