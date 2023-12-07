<?php

namespace Enesisrl\LaravelMasterNotificationsTrello\Classes;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class Trello {

    protected $apiKey;
    protected $token;
    protected $boardId;
    protected $listId;

    protected $payload = [];

    protected $url = null;

    public function __construct($config=[]){
        $this->apiKey = config('trello.api-key');
        $this->token = config('trello.token');
        if (Arr::get($config,'api-key')){
            $this->apiKey = Arr::get($config,'api-key');
        }
        if (Arr::get($config,'token')){
            $this->token = Arr::get($config,'token');
        }
        if (Arr::get($config,'board-id')){
            $this->boardId = Arr::get($config,'board-id');
        }
        if (Arr::get($config,'list-id')){
            $this->listId = Arr::get($config,'list-id');
        }

        $this->url = "https://api.trello.com/1/cards?key=".$this->apiKey."&token=".$this->token;

        Arr::set($this->payload,'name', null);
        Arr::set($this->payload,'desc', null);
        if (Arr::get($config,'name')){
            $this->name(Arr::get($config,'name'));
        }
        if (Arr::get($config,'desc')){
            $this->desc(Arr::get($config,'desc'));
        }
    }

    public function name($value){
        Arr::set($this->payload,'name', $value);
    }

    public function desc($value){
        Arr::set($this->payload,'desc', $value);
    }

    public function getBoards(){
        $url = "https://api.trello.com/1/members/me/boards?fields=name,url&key=".$this->apiKey."&token=".$this->token;
        $client = Http::get($url);
        dd($client->body());
    }

    public function getLists(){

        $url = "https://api.trello.com/1/boards/".$this->boardId."/lists?key=".$this->apiKey."&token=".$this->token;
        $client = Http::get($url);
        dd($url,$client->body());

    }

    public function send(){

        $cardData = [
            'name' => Arr::get($this->payload,'name') ?? 'Nuova scheda',
            'desc' => Arr::get($this->payload,'desc') ?? 'Descrizione della nuova scheda',
            'idList' => $this->listId,
        ];

        return (new \GuzzleHttp\Client())->post($this->url, ['form_params' => $cardData]);

    }


}
