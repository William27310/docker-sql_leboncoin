$host	Dire où se trouve le serveur MySQL
$dbname	Spécifier la base qu’on veut utiliser
$user	Indiquer l’utilisateur MySQL
$pass	Son mot de passe
$pdo	Garder la connexion une fois ouverte

/**

*/

--------------------------------------------------------------------------

Pourquoi les objets sont utiles ?

Ils regroupent données et actions au même endroit.
Ils permettent de mieux organiser un programme (plus proche du monde réel).
On peut créer autant d’objets qu’on veut à partir de la même classe (réutilisation).
Ils favorisent la maintenance et l’évolution du code (modulaire, clair).

Pourquoi les méthodes c’est utile ?

Les méthodes permettent :
d’organiser le code (chaque classe a ses actions),
de lier données (propriétés de la classe) et comportements (méthodes),
de réutiliser et structurer le code de manière claire.

--------------------------------------------------------------------------

public = accessible partout (à l’intérieur comme à l’extérieur de la classe).
protected = accessible uniquement depuis la classe et ses classes filles.
private = accessible uniquement depuis la classe elle-même.
static : signifie que la méthode appartient à la classe elle-même et non à une instance, pas besoin de créer l'objet pour utiliser une méthode, tu peux directement citer la classe sans utiliser un objet.

--------------------------------------------------------------------------

// Création de deux instances
$medor = new Chien();
$medor->nom = "Médor";

$rex = new Chien();
$rex->nom = "Rex";

Chien = la classe (le modèle).

$medor et $rex = deux instances différentes de la classe Chien.

Chaque instance a ses propres données (nom différent), mais partage les mêmes méthodes (aboyer()).

------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

$_POST : On récupère les données grâce à la superglobal Post.