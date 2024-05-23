# Routes de l'application

## Front Office

|                             |                 |                         |                  |                       |                                                                |
| :-------------------------: | :-------------: | :---------------------: | :--------------: | :-------------------: | :------------------------------------------------------------: |
|           **URL**           | **HTTP Method** |     **Controller**      |    **Method**    |       **Title**       |                          **Comment**                           |
|              /              |       GET       |     MainController      |       home_front       |        Accueil        |                         Page d’accueil                         |
|       /programmation        |       GET       |    LineupController     |   lineUpBrowse   |     Programmation     |                   Liste de la programmation                    |
| /programmation/artiste/{id} |       GET       | LineupController |    artistRead    |    \[artist.name]     | Page individuelle de chaque artiste\[i:id] is the id of Artist |
|        /billetterie/        |       GET       |    TicketController     |   ticketBrowse   |      Billetterie      |                     Page de la billetterie                     |
|        /billetterie/        |      POST       |    TicketController     |    ticketAdd     |      Billetterie      |                     Page d’achat de ticket                     |
|      /infos-pratiques/      |       GET       |     InfosController     |    infoBrowse    |    Infos Pratiques    |                    Page des infos pratiques                    |
|      /infos-pratiques/      |      POST       |     InfosController     |   sendRequest    | Formulaire envoi mail |               Envoi d’un message mail par l’user               |
|           /erreur           |       GET       |     ErrorController     |      error       |        Erreur         |                       Page d’erreur 404                        |
|            /cgv             |       GET       |      LegalNoticeController      |    legalNoticeBrowse     |          CGV          |                          Page des CGV                          |
|        */boutique/*         |       GET       |    _ShopController_     |   _shopBrowse_   |    _Liste article_    |                     _Page de la boutique_                      |
|      */boutique/{id}/*      |      GET        |    _ShopController_     |    _shopRead_    | _Détail d’un article_ |                      _Page d’un article_                       |
|      */boutique/{id}/*      |      POST       |    _ShopController_     |    _shopAdd_     |      _Boutique_       |                  _Achat de la page boutique_                   |
|        */sponsors/*         |       GET       |  _SponsorsController_   | _sponsorsBrowse_ |      _Sponsors_       |                      _Page des sponsors_                       |

## Back Office

|            **URL**            | **HTTP Method** |    **Controller**    |    **Method**    |               **Title**                |                        **Comment**                        |
| :---------------------------: | :-------------: | :------------------: | :--------------: | :------------------------------------: | :-------------------------------------------------------: |
|            /back/             |       GET       |    MainController    |     home_back    |                Accueil                 |                      Page d’accueil                       |
|       /back/slot_list         |       GET       |   SlotController     |    slotBrowse    |               Créneaux                 |                 Liste des créneaux                        |
|  /back/slot_list/{id}         |       GET       |   SlotController     |    slotRead      |           Détail de {slot.name}        |                 Affiche le détail du créneau              |
|  /back/slot_list/{id}/update  |    GET / PATCH  |   SlotController     |    slotEdit      |          Modifier {slot.name}          |       Affiche et traite le formulaire de MAJ              |
|  /back/slot_list/add          |    GET / POST   |   SlotController     |    slotAdd       |            Ajouter un créneau          |       Affiche et traite le formulaire d'ajout             |
|  /back/slot_list/{id}/delete  |      DELETE     |   SlotController     |   slotDelete     |            Supprimer un créneau        |                 Supprime et redirige vers la liste        |
|       /back/artist_list       |       GET       |  ArtistController    |   artistBrowse   |                Artistes                |                 Liste des artistes                        |
| /back/artist_list/{id}        |       GET       |  ArtistController    |    artistRead    |           Détail de {artist.name}      |                Affiche le détail de l'artiste             |
| /back/artist_list/{id}/update |    GET / PATCH  |  ArtistController    |    artistEdit    |         Modifier {artist.name}         |       Affiche et traite le formulaire de MAJ              |
| /back/artist_list/add         |    GET / POST   |  ArtistController    |    artistAdd     |             Ajouter un artiste         |       Affiche et traite le formulaire d'ajout             |
| /back/artist_list/{id}/delete |      DELETE     |  ArtistController    |   artistDelete   |            Supprimer un artiste        |                 Supprime et redirige vers la liste        |
|       /back/customer_list     |       GET       | CustomerController   |   customerBrowse |               Clients                  |                 Liste des clients                         |
| /back/customer_list/{id}      |       GET       | CustomerController   |   customerRead   |           Détail de {customer.name}    |                Affiche le détail du client                |
| /back/customer_list/{id}/delete|     DELETE     | CustomerController   |  customerDelete  |            Supprimer un client         |                 Supprime et redirige vers la liste        |
|       /back/genre_list        |       GET       |  GenreController     |    genreBrowse   |                Genres                  |                 Liste des genres                          |
| /back/genre_list/{id}         |       GET       |  GenreController     |    genreRead     |            Détail de {genre.name}      |                Affiche le détail du genre                 |
| /back/genre_list/{id}/update  |    GET / PATCH  |  GenreController     |    genreEdit     |          Modifier {genre.name}         |       Affiche et traite le formulaire de MAJ              |
| /back/genre_list/add          |    GET / POST   |  GenreController     |    genreAdd      |             Ajouter un genre           |       Affiche et traite le formulaire d'ajout             |
| /back/genre_list/{id}/delete  |      DELETE     |  GenreController     |   genreDelete    |            Supprimer un genre          |                 Supprime et redirige vers la liste        |
|       /back/stage_list        |       GET       |  StageController     |    stageBrowse   |                Scènes                  |                 Liste des scènes                          |
| /back/stage_list/{id}         |       GET       |  StageController     |    stageRead     |            Détail de {stage.name}      |                Affiche le détail de la scène              |
| /back/stage_list/{id}/update  |    GET / PATCH  |  StageController     |    stageEdit     |          Modifier {stage.name}         |       Affiche et traite le formulaire de MAJ              |
| /back/stage_list/add          |    GET / POST   |  StageController     |    stageAdd      |             Ajouter une scène          |       Affiche et traite le formulaire d'ajout             |
| /back/stage_list/{id}/delete  |      DELETE     |  StageController     |   stageDelete    |            Supprimer une scène         |                 Supprime et redirige vers la liste        |
|       /back/ticket_list       |       GET       | TicketController     |   ticketBrowse   |               Tickets                  |                 Liste des tickets                         |
| /back/ticket_list/{id}        |       GET       | TicketController     |    ticketRead    |            Détail de {ticket.id}       |                Affiche le détail du ticket                |
| /back/ticket_list/{id}/update |    GET / PATCH  | TicketController     |    ticketEdit    |          Modifier {ticket.id}          |       Affiche et traite le formulaire de MAJ              |
| /back/ticket_list/add         |    GET / POST   | TicketController     |    ticketAdd     |             Ajouter un ticket          |       Affiche et traite le formulaire d'ajout             |
| /back/ticket_list/{id}/delete |      DELETE     | TicketController     |   ticketDelete   |            Supprimer un ticket         |                 Supprime et redirige vers la liste        |
|       /back/user_list         |       GET       |   UserController     |    userBrowse    |                Utilisateurs            |                 Liste des utilisateurs                    |
| /back/user_list/{id}          |       GET       |   UserController     |    userRead      |           Détail de {user.username}    |                Affiche le détail de l'utilisateur         |
| /back/user_list/{id}/delete   |      DELETE     |   UserController     |   userDelete     |            Supprimer un utilisateur    |                 Supprime et redirige vers la liste        |
|       */back/product_list*      |       GET       | _ProductController_    | _productBrowse_    |           _Liste des produits_           |              _Affiche la liste des produits_               |
| */back/product_list/{id}*       |       GET       | _ProductController_    |   _productRead_    |        _Détail de {product.name}_        |             _Affiche le détail d’un produit_                |
| */back/product_list/{id}/update*|    GET / PATCH  | _ProductController_    | _productUpdate_    |        _Modifier {product.name}_         |              _Modification d’un produit_                   |
| */back/product_list/add*        |    GET / POST   | _ProductController_    |   _productAdd_     |           _Ajouter un produit_           |     _Affiche et traite le formulaire d’ajout d’un produit_  |
| */back/product_list/{id}/delete*|      DELETE     | _ProductController_    | _productDelete_    |         _Supprimer un produit_           |       _Supprime et redirige vers la liste des produits_     |
|       */back/sponsor_list*     |       GET       | _SponsorController_   | _sponsorBrowse_   |             _Liste sponsors_             |              _Affiche la liste des sponsors_                |
| */back/sponsor_list/{id}*      |       GET       | _SponsorController_   |   _sponsorRead_   |            _Détails du sponsor {sponsor.name}_           |             _Affiche le détail d’un sponsor_                |
| */back/sponsor_list/{id}/update*|    GET / PATCH | _SponsorController_   | _sponsorUpdate_   |          _Mise à jour du {sponsor.name}_         |              _Modification d’un sponsor_                    |
| */back/sponsor_list/add*       |    GET / POST   | _SponsorController_   |  _sponsorAdd_     |             _Ajout sponsor_              |     _Affiche et traite le formulaire d’ajout d’un sponsor_  |
| */back/sponsor_list/{id}/delete*|     DELETE     | _SponsorController_   | _sponsorDelete_   |          _Suppression sponsor_           |       _Supprime et redirige vers la liste des sponsors_     |


*italique* : routes en bonus
