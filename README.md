# LOL API

Projet personelle réaliser pendant ma formation en licence professionnelle.


##Contexte

League of Legends est un jeu compétitif en ligne, où deux équipes s'affrontent pour remporter la victoire.

Le RIOT Games API est une API mise à disposition pour les internautes afin de récupérer des informations sur le profil des joueurs, leurs historiques de partie, etc.

L'objectif de ce projet est de récupérer ses différentes informations et de les afficher sur notre site web.

##Portion de code

Obtenir le classement d'un joueur : 

```sh
$rank = json_decode(file_get_contents('https://euw1.api.riotgames.com/lol/league/v4/entries/by-summoner/'.$idjoueur.'?api_key='.$api_key));
      if (!empty($rank)) {
            if (!empty($rank[1])) {
                $html .= "<img class='histo-rank' src='img/rank/" . $rank[1]->tier . ".png' >";
            } else  {
                $html .= "<img class='histo-rank' src='img/rank/" . $rank[0]->tier . ".png' >";
            }
        }
```

##Sources

[RIOT Games API] (https://developer.riotgames.com/)
[League of Legends] (https://play.euw.leagueoflegends.com/fr_FR)
