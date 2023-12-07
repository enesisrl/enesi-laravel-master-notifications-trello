# enesi-laravel-master-notifications-trello

Pacchetto per caricare delle schede su bacheche di Trello

1. Aggiungi a `composer.json`
    ```
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/enesisrl/enesi-laravel-master-notifications-trello"
        }
    ]
    ```
2. Esegui
    ```
    composer enesisrl/laravel-master-notifications-trello
    ```

3. Esegui 
    ```
    php artisan vendor:publish --provider="Enesisrl\LaravelMasterNotificationsTrello\Providers\LaravelMasterNotificationsTrello"    
    ```

4. Se non viene copiato alcun files con il comando precedente, anggiungere a `config/app.php`
    ```
    'providers' => [
        ...
        Enesisrl\LaravelMasterNotificationsTrello\Providers\LaravelMasterNotificationsTrello::class
        ...
    ]   
    ```
    e ripetere il comando del punto precedente

-----

### Come utilizzarlo

Per prima cosa generare API Key di Trello https://trello.com/power-ups/admin

Salvare nel file .env la variabile

TRELLO_REDIRECT_URL

che deve contenere l'url di redirect dopo l'autorizzazione su Trello

In seguito, accedere da browser a: https://miohost.com/trello/token (sostituire miohost.com con il nome host del progetto)
Leggere dalla url di ritorno il token di autenticazione e salvarlo nel file .env insieme alle altre variabili

TRELLO_API_KEY
TRELLO_TOKEN

----

### Invio di una scheda su Trello

Ottenere l'elenco delle proprie bacheche richiamando 

    use Enesisrl\LaravelMasterNotificationsTrello\Classes\Trello;
    $trello = new Trello();
    $trello->getBoards();  

Una volta ottenuto l'elenco delle bacheche e i relativi ID, potete recuperare gli id delle liste in questo modo

    use Enesisrl\LaravelMasterNotificationsTrello\Classes\Trello;
    $trello = new Trello(['board-id'=>'123456789']);
    $trello->getLists(); 

Ottenuto quindi l'id della lista, potete inviare una nuova scheda a Trello nel seguente modo

    use Enesisrl\LaravelMasterNotificationsTrello\Classes\Trello;
    $trello = new Trello(['list-id'=>'123456789']);
    $trello->name('Nome della scheda');
    $trello->desc('Descrizione della scheda');
    $trello->send(); 

La cancellazione delle schede non è al momento prevista
