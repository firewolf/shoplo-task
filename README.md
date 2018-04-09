project 

instalacja: 

- wymagania - zainstalowany composer, pdo-sqlite3

> project$ composer install  

uruchamianie:
> project$ php bin/console server:start  
> project$ php bin/console server:stop

testy:
> project$ phpunit

zdefiniowani użytkownicy:  
> test:test  
> example:example  

przykładowe dane:
> w katalogu var/data jest baza sqlite z przykładowymi danymi
> aby ją usunąć należy wykonać:  
> project$ php bin/console doctrine:database:drop --force  
> project$ php bin/console doctrine:schema:update --force
