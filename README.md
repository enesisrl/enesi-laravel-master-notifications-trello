# enesi-laravel-master-notifications-trello

Pacchetto per caricare delle schede su bacheche di Trello

1. Aggiungi a `composer.json`
    ```
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/enesisrl/enesi-laravel-master-notifications-telegram"
        }
    ]
    ```
2. Esegui
    ```
    composer enesisrl/laravel-master-notifications-telegram
    ```

3. Esegui 
    ```
    php artisan vendor:publish --provider="Enesisrl\LaravelMasterNotificationsTelegram\Providers\LaravelMasterNotificationsTelegram"    
    ```

4. Se non viene copiato alcun files con il comando precedente, anggiungere a `config/app.php`
    ```
    'providers' => [
        ...
        Enesisrl\LaravelMasterNotificationsTelegram\Providers\LaravelMasterNotificationsTelegram::class
        ...
    ]   
    ```
    e ripetere il comando del punto precedente

-----

### Come utilizzarlo

      use Illuminate\Support\Facades\Notification;
      use Master\Foundation\Notifications\TelegramNotifications;
      
      // $notifiable è una qualsiasi istanza di un model
      Notification::send($notifiable, new TelegramNotifications(['content'=>'Test message']));

L'array passato nel costruttore può contenere i seguenti parametri
     
      "contents" => (String)'Contenuto testuale del messaggio'
      "line" => (String|Array)'Contenuto testuale separato in linee'
      "button" => (Array|Array[])'Elenco pulsanti da mostrare nel messaggio: 
                   ogni pulsante è un array con due celle, 
                   "label" (Etichetta pulsante) 
                   "url" (link di destinazione alla pressione)'
