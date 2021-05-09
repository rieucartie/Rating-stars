# RatingMulti

Projet qui permet d'ajouter des étoiles à un item , limiter les votes par utilisateurs et regrouper les moyennes et le nombre de votes sur la page d'accueil

techno : symfony ,fecth js

composer update

crer un .env.local

php bin/console d:d:c

php bin/console make:migration

php bin/console doctrine:migrations:migrate

remplir la base de donnée

INSERT INTO `product` (`id`, `name`) VALUES
(1, 'COCA'),
(2, 'ORANGINA');

-- --------------------------------------------------------
INSERT INTO `rating` (`id`, `notes`) VALUES
(1, 0),
(2, 1),
(3, 2),
(4, 3),
(5, 4),
(6, 5);
-- --------------------------------------------------------
TABLE USER :

php bin/console security:encode-password

roles : ["ROLE_USER"]

-- --------------------------------------------------------
IL FAUT INITIALISER POUR CHAQUE PRODUIT UNE PREMIERE VALEUR EN BASE AVEC LA NOTE QU'ON VEUT LUI ADJOINDRE  

INSERT INTO `products_rating` (`id`, `rating_id`, `product_id`, `users_id`, `created`) 
VALUES (NULL, '1', '4', NULL, '2021-05-04 00:00:00');

GO !



