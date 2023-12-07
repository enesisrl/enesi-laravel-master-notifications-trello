<?php
namespace Enesisrl\LaravelMasterNotificationsTrello\Front\Main\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TrelloController extends BaseController {

    public function authorize(Request $request) {

        $redirectUri = config('trello.redirect-url'); // L'URL a cui Trello reindirizzerà l'utente dopo l'autorizzazione
        $apiKey = $request->get('api_key') ?: config('trello.api-key');

        // Crea il link di autorizzazione
        $authorizeUrl = "https://trello.com/1/authorize?response_type=token&key=$apiKey&redirect_uri=$redirectUri&scope=read,write&expiration=never";

        // Reindirizza l'utente al link di autorizzazione
        return response()->redirectTo($authorizeUrl);

    }

    public function auth(Request $request) {

        dd($request->all());

    }

}
