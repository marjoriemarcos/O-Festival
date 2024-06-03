# Routes de l'application

## Front Office

| URL                         | HTTP Method | Front Controller      | Method    | Title                          | Content                                   | Comment                                  |
| --------------------------- | ----------- | --------------------- | --------- | ------------------------------ | ----------------------------------------- | ---------------------------------------- |
| /                           | GET         | MainController        | home      | Accueil                        | Home page                                 | -                                        |
| /programmation              | GET         | ArtistController      | browse    | Programmation                  | List of scheduled artists                 | -                                        |
| /programmation/{date}       | GET         | ArtistController      | browse    | Programmation                  | List of scheduled artists sorted by date  | {date} is the date to filter by          |
| /programmation/scene/{id}   | GET         | ArtistController      | browse    | Programmation                  | List of scheduled artists sorted by stage | {id} is the stage to filter by           |
| /programmation/genre/{id}   | GET         | ArtistController      | browse    | Programmation                  | List of scheduled artists sorted by genre | {id} is the genre to filter by           |
| /programmation/artiste/{id} | GET         | ArtistController      | read      | Nom de l’artiste               | Artist details                            | {id} is the artist to display            |
| /billetterie/               | GET         | TicketController      | browse    | Billetterie                    | List and details of tickets               | -                                        |
| /infos-pratiques/           | GET         | InfosController       | browse    | Infos Pratiques                | Details of practical information          | -                                        |
| /404                        | GET         | ErrorController       | notFound  | Erreur 404                     | Details of the 404 error                  | -                                        |
| /403                        | GET         | ErrorController       | forbidden | Erreur 403                     | Details of the 403 error                  | -                                        |
| /mentions-legales           | GET         | LegalNoticeController | browse    | Mentions légales               | Details of the legal notice               | -                                        |
| /partenaires*               | GET         | SponsorController     | browse    | Nos Partenaires                | List of partners                          | -                                        |
| /boutique/*                 | GET         | ShopController        | browse    | Boutique                       | List of items                             | -                                        |
| /boutique/article/{id}*     | GET         | ShopController        | read      | Nom de l’article               | Item details                              | {id} is the item to display              |
| /boutique/panier*           | GET         | CartController        | browse    | Panier                         | List of items in the cart                 | -                                        |
| /boutique/panier*           | GET / POST  | CartController        | add       | Ajouter un article au panier   | Adding an item to the cart                | -                                        |
| /boutique/panier/{id}*      | GET / POST  | CartController        | delete    | Supprimer un article du panier | Removing an item from the cart            | {id} is the item to remove from the cart |

*Routes Bonus

## Back Office

| URL                             | HTTP Method | Back Controller    | Method | Title                       | Content                       | Comment                         |
| ------------------------------- | ----------- | ------------------ | ------ | --------------------------- | ----------------------------- | ------------------------------- |
| /back/login                     | GET / POST  | SecurityController | login  | Connexion                   | BackOffice login              | -                               |
| /back/logout                    | GET / POST  | SecurityController | logout | Déconnexion                 | BackOffice logout             | -                               |
| /back                           | GET         | MainController     | home   | Accueil                     | List of program slots         | -                               |
| /back/slot                      | GET         | SlotController     | browse | Liste des Créneaux          | List of program slots         | -                               |
| /back/slot/add                  | GET / POST  | SlotController     | add    | Ajouter un Créneau          | Form to add a slot            | -                               |
| /back/slot/{id}                 | GET         | SlotController     | read   | Détails du créneau          | Slot details                  | {id} is the slot to display     |
| /back/slot/{id}/edit            | GET / PATCH | SlotController     | edit   | Éditer le Créneau           | Form to edit a slot           | {id} is the slot to edit        |
| /back/slot/{id}/delete          | POST        | SlotController     | delete | Supprimer le Créneau        | Deleting a slot               | {id} is the slot to delete      |
| /back/artist                    | GET         | ArtistController   | browse | Liste des Artistes          | List of artists               | -                               |
| /back/artist/add                | GET / POST  | ArtistController   | add    | Ajouter un Artiste          | Form to add an artist         | -                               |
| /back/artist/{id}               | GET         | ArtistController   | read   | Détails de l’Artiste        | Artist details                | {id} is the artist to display   |
| /back/artist/{id}/edit          | GET / PATCH | ArtistController   | edit   | Éditer l’Artiste            | Form to edit an artist        | {id} is the artist to edit      |
| /back/artist/{id}/delete        | POST        | ArtistController   | delete | Supprimer l’Artiste         | Deleting an artist            | {id} is the artist to delete    |
| /back/genre                     | GET         | GenreController    | browse | Liste des Genres            | List of genres                | -                               |
| /back/genre/add                 | GET / POST  | GenreController    | add    | Ajouter un Genre            | Form to add a genre           | -                               |
| /back/genre/{id}/edit           | GET / PATCH | GenreController    | edit   | Éditer le Genre             | Form to edit a genre          | {id} is the genre to edit       |
| /back/genre/{id}/delete         | POST        | GenreController    | delete | Supprimer le Genre          | Deleting a genre              | {id} is the genre to delete     |
| /back/stage                     | GET         | StageController    | browse | Liste des Scènes            | List of stages                | -                               |
| /back/stage/add                 | GET / POST  | StageController    | add    | Ajouter une Scène           | Form to add a stage           | -                               |
| /back/stage/{id}/edit           | GET / PATCH | StageController    | edit   | Éditer la Scène             | Form to edit a stage          | {id} is the stage to edit       |
| /back/stage/{id}/delete         | POST        | StageController    | delete | Supprimer la Scène          | Deleting a stage              | {id} is the stage to delete     |
| /back/ticket                    | GET         | TicketController   | browse | Liste des Billets           | List of tickets               | -                               |
| /back/ticket/add                | GET / POST  | TicketController   | add    | Ajouter un Billet           | Form to add a ticket          | -                               |
| /back/ticket/{id}               | GET         | TicketController   | read   | Détails du Billet           | Ticket details                | {id} is the ticket to display   |
| /back/ticket/{id}/edit          | GET / PATCH | TicketController   | edit   | Éditer le Billet            | Form to edit a ticket         | {id} is the ticket to edit      |
| /back/ticket/{id}/delete        | POST        | TicketController   | delete | Supprimer le Billet         | Deleting a ticket             | {id} is the ticket to delete    |
| /back/customer                  | GET         | CustomerController | browse | Liste des Clients           | List of customers             | -                               |
| /back/customer/{id}             | GET         | CustomerController | read   | Détails du Client           | Customer details              | {id} is the customer to display |
| /back/customer/{id}/delete      | POST        | CustomerController | delete | Supprimer le Client         | Deleting a customer           | {id} is the customer to delete  |
| /back/contact                   | GET         | ContactController  | browse | Liste des Messages          | List of messages              | -                               |
| /back/contact/{id}/edit         | GET / PATCH | ContactController  | edit   | Éditer le Message           | Updating the message status   | {id} is the message to edit     |
| /back/user                      | GET         | UserController     | browse | Liste des Administrateurs   | List of administrators        | -                               |
| /back/user/add                  | GET / POST  | UserController     | add    | Ajouter un Administrateur   | Form to add an administrator  | -                               |
| /back/user/{id}                 | GET         | UserController     | read   | Détails de l’Administrateur | Administrator details         | {id} is the user to display     |
| /back/user/{id}/edit            | GET / PATCH | UserController     | edit   | Éditer l’Administrateur     | Form to edit an administrator | {id} is the user to edit        |
| /back/user/{id}/delete          | POST        | UserController     | delete | Supprimer l’Administrateur  | Deleting an administrator     | {id} is the user to delete      |
| /back/sponsor*                  | GET         | SponsorController  | browse | Liste des Partenaires       | List of partners              | -                               |
| /back/sponsor/add*              | GET / POST  | SponsorController  | add    | Ajouter un Partenaire       | Form to add a partner         | -                               |
| /back/sponsor/{id}*             | GET         | SponsorController  | read   | Détails du Partenaire       | Partner details               | {id} is the sponsor to display  |
| /back/sponsor/{id}/edit*        | GET / PATCH | SponsorController  | edit   | Éditer le Partenaire        | Form to edit a partner        | {id} is the sponsor to edit     |
| /back/sponsor/{id}/delete*      | POST        | SponsorController  | delete | Supprimer le Partenaire     | Deleting a partner            | {id} is the sponsor to delete   |
| /back/shop*                     | GET         | ShopController     | browse | Liste des Articles          | List of items                 | -                               |
| /back/shop/article/add*         | GET / POST  | ShopController     | add    | Ajouter un Article          | Form to add an item           | -                               |
| /back/shop/article/{id}*        | GET         | ShopController     | read   | Détails de l’Article        | Item details                  | {id} is the article to display  |
| /back/shop/article{id}/edit*    | GET / PATCH | ShopController     | edit   | Éditer l’Article            | Form to edit an item          | {id} is the article to edit     |
| /back/shop/article/{id}/delete* | POST        | ShopController     | delete | Supprimer l’Article         | Deleting an item              | {id} is the article to delete   |

*Routes Bonus
