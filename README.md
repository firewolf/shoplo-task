symfony-task  

instalacja: 

- wymagania - zainstalowany composer, pdo-sqlite3

> symfony-task$ composer install  

uruchamianie:
> symfony-task$ php bin/console server:start  
> symfony-task$ php bin/console server:stop

testy:
> symfony-task$ phpunit

zdefiniowani użytkownicy:  
> test:test  
> example:example  

przykładowe dane:
> w katalogu var/data jest baza sqlite z przykładowymi danymi
> aby ją usunąć należy wykonać:  
> symfony-task$ php bin/console doctrine:database:drop --force  
> symfony-task$ php bin/console doctrine:schema:update --force

test
