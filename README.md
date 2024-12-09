# Projet de Classe

Bienvenue dans ce projet de classe ! Ce document contient toutes les instructions nécessaires pour configurer et utiliser le projet.

---

## Configuration
 
### Fichier `.env`
Le fichier `.env.example` fourni est déjà une copie de mon environnement de travail.  
Renommez-le en `.env` si nécessaire et modifiez les paramètres qui ne correspondent pas à votre configuration.

### Base de données MySQL
- Ce projet utilise le port `3306` pour MySQL.  
- Si votre configuration utilise un autre port, modifiez la ligne suivante dans le fichier `.env` :
  ```.env
  DB_PORT=3306

### Compilation des fichiers CSS et JS
Ce projet utilise des fichiers CSS et JS personnalisés.  
Pour les compiler correctement, exécutez les commandes suivantes :  
1. Installez les dépendances PHP et js avec Composer et npm :
  

   composer install
   npm install


2.Compilez les fichiers CSS et JS avec la commande suivante:
 
 *npm run dev*
### Notifications par e-mail

Ce projet utilise mon adresse e-mail pour l'envoi des notifications.  
Un mot de passe d'application généré via mon compte Google est utilisé comme `MAIL_PASSWORD`.  
Assurez-vous que les paramètres suivants sont correctement configurés dans le fichier `.env` au cas où vous utiliseriez votre mail :

```.env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=VotreEmail@gmail.com
MAIL_PASSWORD=MotDePasseApplication
MAIL_ENCRYPTION=tls



