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
|        /boutique/\*         |       GET       |    _ShopController_     |   _shopBrowse_   |    _Liste article_    |                     _Page de la boutique_                      |
|      /boutique/{id}/\*      |      GET        |    _ShopController_     |    _shopRead_    | _Détail d’un article_ |                      _Page d’un article_                       |
|      /boutique/{id}/\*      |      POST       |    _ShopController_     |    _shopAdd_     |      _Boutique_       |                  _Achat de la page boutique_                   |
|        /sponsors/\*         |       GET       |  _SponsorsController_   | _sponsorsBrowse_ |      _Sponsors_       |                      _Page des sponsors_                       |

## Back Office

|                               |                 |                      |                  |                                        |                                                           |
| :---------------------------: | :-------------: | :------------------: | :--------------: | :------------------------------------: | :-------------------------------------------------------: |
|            **URL**            | **HTTP Method** |    **Controller**    |    **Method**    |               **Title**                |                        **Comment**                        |
|            /admin/            |       GET       |    MainController    |       home_back       |                Accueil                 |                      Page d’accueil                       |
|     /admin/programmation      |       GET       |   LineupController   |   lineUpBrowse   |             Programmation              |                 Liste de la programmation                 |
|        /admin/artistes        |       GET       |   ArtistController   |   artistBrowse   |           Liste des artistes           |                    Liste des artistes                     |
|     /admin/artistes/{id}      |       GET       |   ArtistController   |    artistRead    |       Détail de l’\[artist.name]       |              Affiche le détail de l’artiste               |
|  /admin/artistes/{id}/update  |   GET / PATCH   |   ArtistController   |    artistEdit    |        Modifier \[artist.name]         |          Affiche et traite le formulaire de MAJ           |
|      /admin/artistes/add      |   GET / POST    |   ArtistController   |    artistAdd     |           Ajouter un artiste           |          Affiche et traite le formulaire d’ajout          |
|  /admin/artistes/{id}/delete  |     DELETE      |   ArtistController   |   artistDelete   |          Supprimer un artiste          |            Supprime et redirige vers la liste             |
|         /admin/scenes         |       GET       |   StageController    |   sceneBrowse    |            Liste des scènes            |                     Liste des scènes                      |
|      /admin/scenes/{id}       |       GET       |   StageController    |    stageRead     |       Détail de la \[scène.name]       |               Affiche le détail de la scène               |
|   /admin/scenes/{id}/update   |   GET / PATCH   |   StageController    |    stageEdit     |         Modifier \[stage.name]         |          Affiche et traite le formulaire de MAJ           |
|       /admin/scenes/add       |   GET / POST    |   StageController    |     stageAdd     |           Ajouter une scène            |          Affiche et traite le formulaire d’ajout          |
|   /admin/scenes/{id}/delete   |     DELETE      |   StageController    |   stageDelete    |          Supprimer une scène           |            Supprime et redirige vers la liste             |
|         /admin/ticket         |       GET       |   TicketController   |   ticketBrowse   |           Liste des tickets            |                   Affiche les tickets                     |
|      /admin/ticket/{id}       |       GET       |   TicketController   |    ticketRead    | Clients ayant acheté le \[ticket.name] | Affiche le détail des acheteurs du forfait correspondant  |
|   /admin/ticket/{id}/update   |   GET / PATCH   |   TicketController   |    ticketEdit    |           Modifier un ticket           |          Affiche et traite le formulaire de MAJ           |
|       /admin/ticket/add       |   GET / POST    |   TicketController   |    ticketAdd     |           Ajouter un ticket            |          Affiche et traite le formulaire d’ajout          |
|   /admin/ticket/{id}/delete   |     DELETE      |   TicketController   |   ticketDelete   |          Supprimer le Ticket           |            Supprime et redirige vers la liste             |
|       /admin*/product/*       |      _GET_      | _ProductController_  | _productBrowse_  |          _Liste des produits_          |              _Affiche la liste des produit_               |
|     /admin*/product/{id}*     |      _GET_      | _ProductController_  |  _productRead_   |      _Détail de \[product.name]_       |             _Affiche le détail d’un produit_              |
| /admin*/product/{id}/update*  |  _GET / PATCH_  | _ProductController_  | _productUpdate_  |       _Modifier \[product.name]_       |                _Modification d’un produit_                |
|     /admin*/product/add*      |  _GET / POST_   | _ProductController_  |   _productAdd_   |          _Ajouter un produit_          |  _Affiche et traite le formulaire d’ajout d’un produit_   |
| /admin*/product/{id}/delete*  |    _DELETE_     | _ProductController_  | _productDelete_  |         _Supprimer un produit_         |     _Supprime et redirige vers la liste des produits_     |
|      /admin*/sponsors/*       |      _GET_      | _SponsorsController_ | _sponsorsBrowse_ |            _Liste sponsors_            |              _Affiche la liste des sponsors_              |
|    /admin*/sponsors/{id}*     |      _GET_      | _SponsorsController_ |  _sponsorsRead_  |           _Détails sponsors_           |             _Affiche le détail d’un sponsor_              |
| /admin*/sponsors/{id}/update* |  _GET / PATCH_  | _SponsorsController_ | _sponsorsUpdate_ |         _Mise à jour sponsors_         |                _Modification d’un sponsor_                |
|     /admin*/sponsors/add*     |  _GET / POST_   | _SponsorsController_ |  _sponsorsAdd_   |            _Ajout sponsor_             |  _Affiche et traite le formulaire d’ajout d’un sponsor_   |
| /admin*/sponsors/{id}/delete* |    _DELETE_     | _SponsorsController_ | _sponsorsDelete_ |         _Suppression sponsor_          |     _Supprime et redirige vers la liste des sponsors_     |

\*routes en bonus
