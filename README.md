ppay_diy
========

***"PostePay do it yourself" by [danix] [1]***


What is this all about
-------------------------

it's a php page that you can run on your local server and will help you monitor
your movements on one or more credit cards.

Why are you doing this?
-------------------------

I have one of those credit cards which you can put money in it and use,
but it's really a mess to know how much money you have in it.
Going online is a no-go because they have made it impossible to retrieve
your data for accessing theyr website, I could make them send me an sms
with the info I'm looking for but they want money and I don't want to pay them,
so I've decided to write a small script that will just help me keep track of 
what I do with my credit cards

Credit cards?! Are you crazy?
------------------------------

This script does not keep track of anything on it's own, so is perfectly safe to
have it run even on a webserver that's accessible from the internet, but since
I'm writing it just because I'm bored, it may do something in a way that is not
100% secure.
**ppay_diy** stores just the last 4 digits of a credit card number, so there's no
risk at all.

What have I done till now
-------------------------

* Added various routines to manage a database table for credit cards storage;
* Added a form that will ask the user for a __complete__ credit card number and 
an initial amount of money. These infos are required to initialize the database
entry for that credit card;
* Now the script is able to create a database table for every card that we add
using the form;

What I want to accomplish
-------------------------

* kill my boredom :P
* It has to be able to do all the math regarding card movements;
* I want to play a little with css just to make it look good! ;)
* I will probably add a print css that will output all movements for a specific
card, like the ticket that you print at every bancomat;


  [1]: http://danixland.net/        "danixland.net"

