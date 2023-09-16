# GRISAFI BRUNO - TFE 2019 - 2020 - BES WEB DEV
## Galerie d'art - Back

### 1. Descriptif
* Site vitrine d'une gallerie d'art
* Avec partie blog pour la création d'articles et la possibilité de commenter


### 2. Changelog

#### 1.0.0
* Gestion des connexions
* Connexion au backoffice
* Logout
* Changement d'entity d'utilisateur
* Ajout de tables dans le backoffice


#### 0.3.2
* SubRessource artiste -> oeuvres
* SubRessource catégorie -> oeuvres

#### 0.3.1
* Gestion de la pagination backend

#### 0.3.0
* Ajout de FOS_ckeditor (WYSIWYG pour les textarea)
* Configuration de easy admin:
    * Ajout des oeuvres
    * Modification de l'affichage des champs de formulaire
* Correction de bugs lors de l'ajout d'une oeuvre
* Ajout d'une directive 'ApiSubresource' pour récupérer aisément un endpoint se rapportant a une sous ressource d'une oeuvre

#### 0.2.2
* Date par défaut pour les commentaires
* Sub ressource commentaires dans les articles

#### 0.2.1
* Configuration rapide de easy admin
* Page d'accueil dirigeant vers easy admin
* Correction de bugs liés à l'API

#### 0.2.0
* Gestion d'erreurs CORS
* Correction d'un bug au niveau de plusieurs entités
* Ajout de easy admin (non configuré)
* Modification de l'API pour classer les articles par ordre de parution

#### 0.1.2
* Modification du .env:
    * CORS_ALLOW_ORIGIN
* Modification du nelmio_cors.yaml
    * allow_origin


#### 0.1.1
* Ajout de apache-pack

#### 0.1.0
* Commit initial, projet créé et dépendances fonctionelles
* Base de données créée (vide)
* API fonctionelle

---

© Bruno Grisafi - 2020
