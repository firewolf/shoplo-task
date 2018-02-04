shoplo-task  

instalacja:  

> ../shoplo-task$ composer install  

uruchamianie:
> ../shoplo-task$ php bin/console server:start
> ../shoplo-task$ php bin/console server:stop

testy:
> ../shoplo-task$ phpunit

zdefiniowani użytkownicy:  
> test:test  
> example:example  

przykładowe dane:
> w katalogu var/data jest baza sqlite z przykładowymi danymi
> aby ją usunąć należy wykonać:
> ../shoplo-task$ php bin/console doctrine:database:drop --force
> ../shoplo-task$ php bin/console doctrine:schema:update --force
