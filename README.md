# BINGO !!
Bingo is a game of chance played using cards with numbers printed on them, which are marked off of the card as the
caller reads out some manner of random numbers. Play usually ceases once a certain pattern is achieved on a card,
where the winner will shout out "Bingo!" in order to let the caller and the room know that there may be a winner.
There are lots of different variations of Bingo, each with their own specific rules. Classic US Bingo is perhaps the most
well known, where the game is played using a 5x5 grid of numbers between 1 and 75, with a FREE space in the
middle. There is also a UK version of Bingo, which uses a 9x3 grid of spaces containing numbers between 1 and 90, of
which five spaces on each row are filled in

# Entities
In order to create the bingo game, we first differentiated the different entities of the game
1. Cards with numbers from 1 to 75 without repetitions.
2. Players, who own a card
3. Bingo, having the rules of the game

##Player
The Player Class has a primer that is automatically generated when the player is created.
This player belongs to a BINGO game.
And by default his BINGO status is false
##Card
The chart has a constructor bounded by its 'x' and 'y' dimensions, which are 5x5.
At the beginning of the creation of the chart it is filled with zeros, and then the corresponding numbers are entered in the function 'generateCard', with random numbers according to the interval that corresponds to it:
> $this->card_interval = [ [1,15],[16,30],[31,45],[46,60],[61,75] ];

## Bingo
The BINGO class has the list of players, so that it can be updated and new players can be added.
It also has the 'callNumber' function, which calls a random number from the list that has not been called before. And then it updates the list of cards for each player.

# URLS
    
    Route::get('player/getCard/{id}', 'App\Http\Controllers\BingoController\CardController@getCard')->name('getCard');
    Route::get('player/create/{id}', 'App\Http\Controllers\BingoController\CardController@createPlayer')->name('createPlayer');
    Route::get('player/all/', 'App\Http\Controllers\BingoController\CardController@getAllPlayers')->name('getAllPlayers');
    Route::get('player/removeAll/', 'App\Http\Controllers\BingoController\CardController@removeAllPlayers')->name('removeAllPlayers');
    Route::get('bingo/number', 'App\Http\Controllers\BingoController\CardController@callNumber')->name('callNumber');
	
# Arquitecture
The CARD controller calls and creates the different entities, and these store the information in the browser sessions.
It could also be stored in a database.
