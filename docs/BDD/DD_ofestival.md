# Dictionnaire de données

## Genres Musicaux (`genre`)

| Champ       | Type       | Spécificités                                 | Description                      |
|-------------|------------|----------------------------------------------|----------------------------------|
| id          | INT        | PRIMARY KEY, NOT NULL, AUTO_INCREMENT        | Unique identifier for musical genre |
| name        | VARCHAR(64)| NOT NULL                                     | Name of the musical genre        |
| created_at  | TIMESTAMP  | NOT NULL, DEFAULT CURRENT_TIMESTAMP          | Date when the record was created |
| updated_at  | TIMESTAMP  | NULL, DEFAULT CURRENT_TIMESTAMP              | Date when the record was last updated |

## Table pivot Artistes x Genres (`artist_genre`)

| Champ       | Type   | Spécificités  | Description                          |
|-------------|--------|---------------|--------------------------------------|
| artiste_id  | ENTITY | FOREIGN KEY   | Foreign key to the artist table      |
| genre_id    | ENTITY | FOREIGN KEY   | Foreign key to the musical genre table |

## Artistes (`artist`)

| Champ       | Type        | Spécificités                                  | Description                     |
|-------------|-------------|-----------------------------------------------|---------------------------------|
| id          | INT         | PRIMARY KEY, NOT NULL, AUTO_INCREMENT         | Unique identifier for artist    |
| name        | VARCHAR(64) | NOT NULL                                      | Name of the artist              |
| description | TEXT        | NOT NULL                                      | Description of the artist       |
| picture     | VARCHAR(255)| NOT NULL                                      | File path of the artist's picture |
| video       | VARCHAR(255)| NULL                                          | The artist's video URL          |
| facebook    | VARCHAR(255)| NULL                                          | The artist's Facebook URL       |
| twitter     | VARCHAR(255)| NULL                                          | The artist's Twitter URL        |
| instagram   | VARCHAR(255)| NULL                                          | The artist's Instagram URL      |
| snapchat    | VARCHAR(255)| NULL                                          | The artist's Snapchat URL       |
| spotify     | VARCHAR(255)| NULL                                          | The artist's Spotify URL        |
| website     | VARCHAR(255)| NULL                                          | The artist's website URL        |
| tiktok      | VARCHAR(255)| NULL                                          | The artist's TikTok URL         |
| created_at  | TIMESTAMP   | NOT NULL, DEFAULT CURRENT_TIMESTAMP           | Date when the artist was created|
| updated_at  | TIMESTAMP   | NULL, DEFAULT CURRENT_TIMESTAMP               | Date when the artist was last updated |

## Créneaux (`slot`)

| Champ       | Type       | Spécificités                                | Description                        |
|-------------|------------|---------------------------------------------|------------------------------------|
| id          | INT        | PRIMARY KEY, NOT NULL, AUTO_INCREMENT       | Unique identifier for slot         |
| date        | DATE       | NULL                                        | Date of the performance            |
| day         | STRING     | NULL                                        | The day of the festival            |
| hour        | STRING     | NULL                                        | Time of the performance            |
| artist_id   | ENTITY     | FOREIGN KEY                                 | Foreign key to the artist table    |
| stage_id    | ENTITY     | FOREIGN KEY                                 | Foreign key to the stage table     |
| created_at  | TIMESTAMP  | NOT NULL, DEFAULT CURRENT_TIMESTAMP         | Date when the record was created   |
| updated_at  | TIMESTAMP  | NULL, DEFAULT CURRENT_TIMESTAMP             | Date when the record was last updated |

## Scènes (`stage`)

| Champ       | Type        | Spécificités                                  | Description                     |
|-------------|-------------|-----------------------------------------------|---------------------------------|
| id          | INT         | PRIMARY KEY, NOT NULL, AUTO_INCREMENT         | Unique identifier for the stage |
| name        | VARCHAR(64) | NOT NULL                                      | Name of the stage               |
| created_at  | TIMESTAMP   | NOT NULL, DEFAULT CURRENT_TIMESTAMP           | Date when the record was created|
| updated_at  | TIMESTAMP   | NULL, DEFAULT CURRENT_TIMESTAMP               | Date when the record was last updated |

## Administrateurs (`user`)

| Champ       | Type        | Spécificités                                  | Description                     |
|-------------|-------------|-----------------------------------------------|---------------------------------|
| id          | INT         | PRIMARY KEY, NOT NULL, AUTO_INCREMENT         | Unique identifier for the user  |
| firstname   | VARCHAR(64) | NOT NULL                                      | Firstname of user               |
| lastname    | VARCHAR(64) | NOT NULL                                      | Lastname of user                |
| email       | VARCHAR(255)| NOT NULL                                      | Email of user                   |
| password    | VARCHAR(255)| NOT NULL                                      | Password of user                |
| role        | VARCHAR(255)| NOT NULL                                      | Role of user                    |
| created_at  | TIMESTAMP   | NOT NULL, DEFAULT CURRENT_TIMESTAMP           | Date when the user was created  |
| updated_at  | TIMESTAMP   | NULL, DEFAULT CURRENT_TIMESTAMP               | Date when the user was last updated |

## Clients (`customer`)

| Champ        | Type        | Spécificités                                  | Description                     |
|--------------|-------------|-----------------------------------------------|---------------------------------|
| id           | INT         | PRIMARY KEY, NOT NULL, AUTO_INCREMENT         | Unique identifier for the customer |
| firstname    | VARCHAR(64) | NOT NULL                                      | Firstname of customer           |
| lastname     | VARCHAR(64) | NOT NULL                                      | Lastname of customer            |
| birthdate    | DATE        | NOT NULL                                      | Birthdate of customer           |
| email        | VARCHAR(255)| NOT NULL                                      | Email of customer               |
| phone_number | INT         | LENGTH (10) NOT NULL                          | Phone number of customer        |
| address      | VARCHAR(255)| NOT NULL                                      | Address of customer             |
| post_code    | INT         | LENGTH (5) NOT NULL                           | Postcode of customer            |
| town         | VARCHAR(64) | NOT NULL                                      | Town of customer                |
| created_at   | TIMESTAMP   | NOT NULL, DEFAULT CURRENT_TIMESTAMP           | Date when the customer was created |
| updated_at   | TIMESTAMP   | NULL, DEFAULT CURRENT_TIMESTAMP               | Date when the customer was last updated |

## Table pivot Clients x Billets (`customer_ticket`)

| Champ        | Type   | Spécificités  | Description                          |
|--------------|--------|---------------|--------------------------------------|
| customer_id  | ENTITY | FOREIGN KEY   | Foreign key to the customer table    |
| ticket_id    | ENTITY | FOREIGN KEY   | Foreign key to the ticket table      |

## Billets (`ticket`)

| Champ       | Type        | Spécificités                                  | Description                     |
|-------------|-------------|-----------------------------------------------|---------------------------------|
| id          | INT         | PRIMARY KEY, NOT NULL, AUTO_INCREMENT         | Unique identifier for the ticket|
| title       | VARCHAR(64) | NOT NULL                                      | Title of ticket                 |
| price       | FLOAT       | NOT NULL                                      | Price of ticket                 |
| quantity    | INT         | NULL                                          | Quantity of ticket              |
| startAt     | TIMESTAMP   | NULL, DEFAULT CURRENT_TIMESTAMP               | Date of the first day           |
| endAt       | TIMESTAMP   | NULL, DEFAULT CURRENT_TIMESTAMP               | Date of the end day             |
| fee         | VARCHAR(64) | NULL                                          | Type of fee                     |
| type        | VARCHAR(64) | NULL                                          | Duration of the festival        |
| created_at  | TIMESTAMP   | NOT NULL, DEFAULT CURRENT_TIMESTAMP           | Date when the ticket was created|
| updated_at  | TIMESTAMP   | NULL, DEFAULT CURRENT_TIMESTAMP               | Date when the ticket was last updated |

## Messages (`contact`)

| Champ       | Type         | Spécificités                                  | Description                     |
|-------------|--------------|-----------------------------------------------|---------------------------------|
| id          | INT          | PRIMARY KEY, NOT NULL, AUTO_INCREMENT         | Unique identifier for the contact |
| name        | VARCHAR(64)  | NULL                                          | Name of the contact             |
| email       | VARCHAR(255) | NULL                                          | Email of the contact            |
| content     | TEXT         | NULL                                          | Content of the message          |
| created_at  | TIMESTAMP    | NOT NULL, DEFAULT CURRENT_TIMESTAMP           | Date when the contact was created|
| updated_at  | TIMESTAMP    | NULL, DEFAULT CURRENT_TIMESTAMP               | Date when the contact was last updated |
