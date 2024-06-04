# O'Festival 🪇

Le **O'Festival** est un événement de 3 jours qui célèbre la diversité des univers musicaux.

En tant qu'organisateurs, nous cherchons à créer une expérience immersive pour nos participants, en mettant en avant la richesse de la programmation, la facilité d'accès aux informations pratiques et la possibilité d'acheter des billets et des articles de merchandising en ligne.
Notre projet a été designé en nous inspirant des célèbres sites de Festival tels que le Cabaret Vert, Les Vieilles Charrues...

<div style="text-align:center;">
    <img src="./docs/integration html-css/images/logo.png" alt="Description de l'image">
</div>

## Installation

- Cloner le projet avec l'instruction ```git clone git@github.com:O-clock-Liegeois/projet-15-o-festival.git```
- Ouvrir le projet dans votre IDE,
- Ouvrir un Terminal depuis votre IDE et faire un ```composer install```. Dans le cas où ```composer install```ne fonctionne pas, faire ```composer update``` puis ```composer install```.

## Base de données

### Création du dossier ```.env.local```

Pour créer la base de données, il faudra copier/coller le fichier ```.env```et le renommer en ```.env.local```(ce fichier contiendra des données sensibles à ne pas envoyer sur le repository distant).

Dans ce fichier, il faudra copier/coller l'une de ces syntaxes se trouvant initiallement dans le fichier ```.env``` dans le fichier ```.env.local```

```DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4``` (correspond à Mysql)
```DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=10.11.2-MariaDB&charset=utf8mb4``` (correspond à MariaDB)
```DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"``` (correspond à PostgreSQL)

- **Nom d'utilisateur** (```app```): Changez ```app``` pour le nom d'utilisateur de votre base de données.
- **Mot de passe** (```!ChangeMe!```): Changez ```!ChangeMe!``` pour le mot de passe de votre base de données.
- **Adresse IP** (```127.0.0.1```): Si votre base de données n'est pas en local, changez cette adresse pour celle de votre serveur de base de données.
- **Port** (```3306```): Assurez-vous que ce port est correct pour votre base de données.
- **Nom de la base de données** (```app```): Changez ```app``` pour le nom de votre base de données.
- **Version du serveur** (```10.11.2-MariaDB```): Modifiez cette version pour correspondre à la version de votre serveur MariaDB/MySQL si nécessaire.

### Création de la base de données

Dans le Terminal mettre l'instruction suivante pour créer votre base de données : 
```php bin/console doctrine:database:create```
```php bin/console doctrine:migrations:migrate```


### Fixtures

Pour visualiser les fixtures présentes dans ```src > DataFixtures > AppFixtures.php``` dans les vues faire ```php bin/console doctrine:fixture:load```

## Weezevent

Le paiement des billets de O'Festival se fait avec l'intégration **Weezevent**
Il faudra donc créer un compte sur ```https://www.weezevent.com/``` puis créer l'évènement avec les billets, les templates pour les ticket... 
Pour cela, il faudra se référer à la documentation de **Weezevent** (```https://support.weezevent.com/fr/weezticket```).

Afin de faire le lien entre l'interface et l'API de **Weezevent**, il faudra renseigner les informations dans le dossier ```.env.local``` : 

```USERNAME=``` : va correspondre au login de connexion.
```PASSWORD=``` : va correspondre au mot de passe.
```APIKEY=``` : va correspondre à la clés API à récupèrer sur le site de **Weezevent**
```EVENT=``` : l'identifiant de l'évènement (ex : 1146829)


## Mailgun

Lors de l'envoie d'une requete par l'utilisateur depuis notre foamulaire de contact, un mail est automatiquement envoyé à l'utilisateur afin de signaler qu'un administrateur y répondra très prochainnement.
Ce mail est automatiquement envoyé via **Mailgun**.

Ici aussi, il faudra créer un compte sur ```https://app.mailgun.com/``` et il faudra vérifier une adresse email si l'option "gratuite" est choisie.
Puis il faudra renseigner encore dans le fichier ```.env.local```l'instruction suivante : 

```MAILER_DSN=mailgun+api://KEY:DOMAIN@default?region=us```

Il faudra mettre à la place de: 
- ```KEY```: La clés API trouvée sur le site de **Mailgun**,
- ```DOMAIN```: Le nom de domaine généré sur le site de **Mailgun**