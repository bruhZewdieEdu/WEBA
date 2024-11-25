-- 1. Insertion des utilisateurs dans la table `UTILISATEUR`
INSERT INTO UTILISATEUR (
    UTILISATEUR_NOM,
    UTILISATEUR_PRENOM,
    UTILISATEUR_DATE_NAISS,
    UTILISATEUR_ADRESSE,
    UTILISATEUR_MAIL,
    UTILISATEUR_NUM_TEL,
    UTILISATEUR_STATUT,
    UTILISATEUR_MOT_DE_PASSE,
    UTILISATEUR_TYPE
) VALUES (
    'Benaoudia',
    'Fares',
    '1996-09-03',
    'Rue de la Gare 3, 1003 Lausanne',
    'FaresBenaoudia@gmail.com',
    '079 123 45 67',
    'Actif',
    '$2y$10$sx2th1bEScaftyWW8wUVzeCX65CjGBnIrjEuo0YtT2Dg5WKHkcnCy',
    'Barbier'
),
(
    'Zewdie',
    'Bruh',
    '1996-09-03',
    'Rue de la Gare 3, 1003 Lausanne',
    'bruh.zewdie@gmail.com',
    '079 234 56 78',
    'Actif',
    '$2y$10$sx2th1bEScaftyWW8wUVzeCX65CjGBnIrjEuo0YtT2Dg5WKHkcnCy',
    'Barbier'
),
(
    'Ngoma',
    'Isaac',
    '1996-09-03',
    'Rue de la Gare 3, 1003 Lausanne',
    'Isaac.Ngoma@gmail.com',
    '079 345 67 89',
    'Actif',
    '$2y$10$sx2th1bEScaftyWW8wUVzeCX65CjGBnIrjEuo0YtT2Dg5WKHkcnCy',
    'Barbier'
),
(
    'dupont',
    'david',
    '1996-09-03',
    'Rue de la Gare 3, 1003 Lausanne',
    'david.dupont@gmail.com',
    '079 123 67 89',
    'Actif',
    '$2y$10$sx2th1bEScaftyWW8wUVzeCX65CjGBnIrjEuo0YtT2Dg5WKHkcnCy',
    'Client'
),
(
    'Didinho',
    'Admin',
    '1998-10-07',
    '41 rue dancet',
    'didinho@gmail.com',
    '079 134 87 67',
    'Actif',
    '$2y$10$sx2th1bEScaftyWW8wUVzeCX65CjGBnIrjEuo0YtT2Dg5WKHkcnCy',
    'Administrateur'
),
(
    'lunsi',
    'noah',
    '1996-09-03',
    'Rue de la Gare 3, 1003 Lausanne',
    'noah@gmail.com.com',
    '079 234 55 78',
    'Actif',
    '$2y$10$sx2th1bEScaftyWW8wUVzeCX65CjGBnIrjEuo0YtT2Dg5WKHkcnCy',
    'Client'
);

-- 2. Insertion des administrateurs dans la table `ADMINISTRATEUR`
INSERT INTO ADMINISTRATEUR (
    UTILISATEURID
) VALUES (
    5
);

-- 3. Insertion des clients dans la table `CLIENT`
INSERT INTO CLIENT (
    CLIENT_DATE_INSCRIPTION,
    UTILISATEURID
) VALUES (
    '2024-03-09',
    4
),
(
    '2024-03-09',
    6
);

-- 4. Insertion des barbiers dans la table `BARBIER`
INSERT INTO BARBIER (
    BARBIER_DEBUT_CONTRAT,
    UTILISATEURID
) VALUES (
    '2024-03-09',
    1
),
(
    '2024-03-09',
    2
),
(
    '2024-03-04',
    3
);

-- 5. Insertion des disponibilités dans la table `CRENEAU_HORAIRE`
INSERT INTO CRENEAU_HORAIRE (
    CRENEAU_HORAIRE_DATE,
    CRENEAU_HORAIRE_HEURE_DEBUT,
    CRENEAU_HORAIRE_HEURE_FIN,
    CRENEAU_HORAIRE_STATUT,
    BARBIERID
) VALUES (
    '2024-10-10',
    '08:00:00',
    '08:30:00',
    'disponible',
    1
),
(
    '2024-10-10',
    '08:30:00',
    '09:00:00',
    'disponible',
    1
),
(
    '2024-10-10',
    '09:00:00',
    '09:30:00',
    'disponible',
    1
);

-- 6. Insertion des services dans la table `SERVICE`
INSERT INTO SERVICE (
    SERVICE_NOM,
    SERVICE_DESCRIPTION,
    SERVICE_PRIX,
    SERVICE_DUREE,
    SERVICE_STATUT
) VALUES (
    'Coupe',
    'Coupe de cheveux.',
    20.00,
    '00:30:00',
    'Actif'
),
(
    'Coupe + Barbe',
    'Coupe de cheveux et entretien de la barbe.',
    30.00,
    '01:00:00',
    'Actif'
),
(
    'Barbe',
    'Entretien et taillage de la barbe.',
    10.00,
    '00:30:00',
    'Actif'
);

-- 7. Insertion des catégories dans la table `CATEGORIE_PRODUIT`
INSERT INTO CATEGORIE_PRODUIT (
    CATEGORIE_NOM
) VALUES (
    'cheveux'
),
(
    'barbe'
),
(
    'soins'
);

-- 8. Insertion du fournisseur
INSERT INTO FOURNISSEUR (
    FOURNISSEUR_NOM,
    FOURNISSEUR_ADRESSE,
    FOURNISSEUR_NUM,
    FOURNISSEUR_MAIL
) VALUES (
    'Cantu',
    'Rue de la Terrassière 22',
    '+417777777',
    'isaac.ngm@eduge.ch'
),
(
    'Babyliss',
    'Rue de la Terrassière 22',
    '+417777777',
    'bruh.zwd@eduge.ch'
);

-- 9. Insertion des produits dans la table `PRODUIT`
INSERT INTO PRODUIT (
    PRODUIT_NOM,
    PRODUIT_PRIX,
    PRODUIT_DESCRIPTION,
    PRODUIT_QUANTITE_STOCK,
    PRODUIT_STATUT,
    PRODUIT_TYPE_DESTINATAIRE,
    PRODUIT_IMAGE,
    CATEGORIEID,
    FOURNISSEURID
) VALUES (
    'Brosse de Luxe Barbe',
    16.00,
    'Brosse en bois pour un entretien parfait de la barbe',
    100,
    'actif',
    'client',
    'image_produit/brosse_barbe.png',
    2,
    2
),
(
    'Crème Barbe Hydratante Premium',
    19.00,
    'Crème hydratante pour une barbe douce et soignée',
    80,
    'actif',
    'client',
    'image_produit/creme_barbe.png',
    2,
    2
),
(
    'Huile Nourrissante Barbe Royale',
    20.00,
    'Huile nourrissante pour barbe, enrichie en huiles essentielles',
    60,
    'actif',
    'client',
    'image_produit/huile_barbe.png',
    2,
    2
),
(
    'Cire Sculptante Coiffure',
    12.50,
    'Cire de fixation ultra forte pour une coiffure impeccable',
    150,
    'actif',
    'client',
    'image_produit/Cire_Coiffante.png',
    1,
    1
),
(
    'Cire Effet Mat Pro',
    13.00,
    'Cire coiffante pour un effet mat naturel',
    120,
    'actif',
    'client',
    'image_produit/Cire_mat.png',
    1,
    1
),
(
    'Mousse Structurante Cheveux',
    12.00,
    'Mousse coiffante pour structurer les cheveux et ajouter du volume',
    90,
    'actif',
    'client',
    'image_produit/mousse_coiffante.png',
    1,
    1
),
(
    'Peigne Prestige Barbe et Cheveux',
    8.00,
    'Peigne en bois pour barbe et cheveux, idéal pour tous types de poils',
    300,
    'actif',
    'client',
    'image_produit/peigne.webp',
    1,
    1
),
(
    'Sérum Capillaire Revitalisant',
    26.00,
    'Sérum réparateur pour renforcer et revitaliser les cheveux',
    50,
    'actif',
    'client',
    'image_produit/serum_capillaire.png',
    1,
    1
),
(
    'Shampoing Purifiant Naturel',
    9.00,
    'Shampoing purifiant pour un cuir chevelu sain et équilibré',
    100,
    'actif',
    'client',
    'image_produit/shampoing_1.png',
    1,
    1
),
(
    'Shampoing Hydra-Soin',
    11.00,
    'Shampoing hydratant pour cheveux secs, formule nourrissante',
    70,
    'actif',
    'client',
    'image_produit/Shampoing_Hydratant.png',
    1,
    1
),
(
    'Gel Rasage Précision',
    10.00,
    'Gel pour un rasage de précision sans irritation',
    200,
    'actif',
    'client',
    'image_produit/gel_rasage.png',
    3,
    1
);

-- 10. Insertion des commandes
INSERT INTO COMMANDE (
    COMMANDE_DATE,
    COMMANDE_STATUT,
    UTILISATEURID, -- Replacing ADMINISTRATEURID with UTILISATEURID
    FOURNISSEURID
) VALUES (
    '2024-10-01 14:30:00',
    'livré',
    1, -- Assuming this refers to the user ID (UTILISATEURID) of the user placing the order
    1 -- Assuming this refers to the fournisseur ID
),
(
    '2024-10-02 16:45:00',
    'en cours',
    2, -- Assuming another user ID (UTILISATEURID)
    1 -- Same fournisseur ID
);

-- 11. Insertion des séances (les CLIENTID et BARBIERID doivent exister)
INSERT INTO SEANCE (
    SEANCE_STATUT,
    CLIENTID,
    BARBIERID,
    CRENEAU_HORAIREID
) VALUES (
    'terminé',
    1,
    1,
    1
),
(
    'terminé',
    2,
    2,
    2
);

-- 12. Insertion des services pour chaque séance
INSERT INTO SEANCE_SERVICE (
    SEANCEID,
    SERVICEID
) VALUES (
    1,
    1
), -- Coupe pour la 1ère séance
(
    1,
    2
), -- Coupe + Barbe pour la 1ère séance
(
    2,
    1
), -- Coupe pour la 2ème séance
(
    2,
    3
);

-- Barbe pour la 2ème séance

-- 13. Insertion des avis (Commentaires)
INSERT INTO COMMENTAIRE (
    COMMENTAIRE_TEXTE,
    COMMENTAIRE_DATE,
    COMMENTAIRE_NOTE,
    COMMENTAIRE_STATUT,
    CLIENTID,
    SEANCEID
) VALUES (
    'Très satisfait de la coupe et du service.',
    '2024-10-02',
    5,
    'actif',
    2,
    1
),
(
    'Service impeccable, je recommande vivement.',
    '2024-10-03',
    4,
    'actif',
    2,
    2
);