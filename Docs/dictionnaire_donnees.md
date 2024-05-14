# Dictionnaire de données



## Genre (`genre`)



|Champ|Type|Spécificités|Description|

|-|-|-|-|

|id|INT|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED|L'identifiant de notre artiste|

|name|VARCHAR(64)|NOT NULL|Le nom du genre musical|

|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de création de la table|

|updated_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de mise à jour de la table|



## Table d'association entre genre et artist (`artist_genre`)

|Champ|Type|Spécificités|Description|

|-|-|-|-|

|artist_id|INT|FOREIGN KEY (artist.id)|L'identifiant de l'artiste|

|genre_id|INT|FOREIGN KEY (genre.id)|L'identifiant du genre musical|





## Artist (`artist`)



|Champ|Type|Spécificités|Description|

|-|-|-|-|

|id|INT|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED|L'identifiant de notre artiste|

|name|VARCHAR(64)|NOT NULL|Le nom de notre artiste|

|description|TEXT|NOT NULL|Présentation de notre artiste|

|picture|VARCHAR(255)|NOT NULL|Photo de l'artiste|

|video|VARCHAR(255)|NULL|Lien vidéo d'une chanson de l'artiste|

|website|VARCHAR(255)|NULL|Lien du site de l'artiste|

|facebook|VARCHAR(255)|NULL|Lien de la page Facebook de l'artiste|

|twitter|VARCHAR(255)|NULL|Lien de la page Twitter/X de l'artiste|

|instagram|VARCHAR(255)|NULL|Lien de la page Instagram de l'artiste|

|spotify|VARCHAR(255)|NULL|Lien de la page Spotify de l'artiste|

|snapchat|VARCHAR(255)|NULL|Lien du profil Snapchat de l'artiste|

|tiktok|VARCHAR(255)|NULL|Lien du profil TikTok de l'artiste|





## Créneau (`slot`)



|Champ|Type|Spécificités|Description|

|-|-|-|-|

|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant du créneau|

|date|DATE|NULL|Le jour de la performance|

|hour|TIME|NULL|L'horaire de la performance|

|artist_id|INT|FOREIGN KEY (artist.id)|Identifiant de l'artiste associé|

|stage_id|INT|FOREIGN KEY (stage.id)|Identifiant de la scène associée|

|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de création de la table|

|updated_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de mise à jour de la table|





## Scène (`stage`)



|Champ|Type|Spécificités|Description|

|-|-|-|-|

|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la scène|

|name|VARCHAR(64)|NOT NULL|Le nom de la scène|

|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de création de la table|

|updated_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de mise à jour de la table|



## Utilisateur (`user`)



|Champ|Type|Spécificités|Description|

|-|-|-|-|

|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de l'utilisateur|

|firstname|VARCHAR(64)|NOT NULL|Le prénom de l'utilisateur|

|lastname|VARCHAR(64)|NOT NULL|Le nom de famille de l'utilisateur|

|email|VARCHAR(255)|NOT NULL|L'e-mail de l'utilisateur|

|password|VARCHAR(255)|NOT NULL|Le mot de passe de l'utilisateur|

|role|VARCHAR(255)|NOT NULL|Le rôle de l'utilisateur|

|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de création de la table|

|updated_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de mise à jour de la table|





## Client (`customer`)



|Champ|Type|Spécificités|Description|

|-|-|-|-|

|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant du client|

|firstname|VARCHAR(64)|NOT NULL|Le prénom du client|

|lastname|VARCHAR(64)|NOT NULL|Le nom de famille du client|

|birthdate|DATE|NOT NULL|La date de naissance du client|

|email|VARCHAR(255)|NOT NULL|L'e-mail du client|

|phone_number|INT|LENGTH (10) NOT NULL|Le numéro de téléphone du client|

|postcode|INT|LENGTH (10) NOT NULL|Le code postal du client|

|town|VARCHAR(64)|NOT NULL|La ville du client|

|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de création de la table|

|updated_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de mise à jour de la table|



## Billet (`ticket`)



|Champ|Type|Spécificités|Description|

|-|-|-|-|

|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant du billet|

|title|VARCHAR(64)|NOT NULL|Le titre du billet|

|price|FLOAT|NOT NULL|Le prix du billet|

|quantity|INT|NOT NULL|La quantité de billets|

|duration_id|INT|FOREIGN KEY|Identifiant de la durée|

|festival_goer_category_id|INT|FOREIGN_KEY|Identifiant de la catégorie du client|

|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de création de la table|

|updated_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de mise à jour de la table|



## Table d'association entre ticket et customer (`ticket_buy`)



|Champ|Type|Spécificités|Description|

|-|-|-|-|

|ticket_id|INT|FOREIGN KEY (role.id)|L'identifiant du billet|

|customer_id|INT|FOREIGN KEY (user.id)|L'identifiant du client|





## Durée (`duration`)



|Champ|Type|Spécificités|Description|

|-|-|-|-|

|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la durée du billet|

|day_quantity|INT|NOT NULL|Le nombre de jours|

|day_name|VARCHAR(64)|NOT NULL|Le nom des jours|

|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de création de la table|

|updated_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de mise à jour de la table|



## Catégorie de festivalier (`festival_goer_category`)



|Champ|Type|Spécificités|Description|

|-|-|-|-|

|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la catégorie|

|title|VARCHAR(64)|NOT NULL|Le nom de la catégorie|

|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de création de la table|

|updated_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|Date de mise à jour de la table|
