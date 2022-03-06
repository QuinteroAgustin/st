INSERT INTO `slidershow`(`img`, `active`, `display`, `text`) VALUES 
('accueil.jpg',1, 'topleft', 'Chauffage'),
('clim.jpg',1, 'middle', 'Climatisation'),
('froid.jpg',1, 'topright', 'Froid'),
('banniere.png',0, 'right', 'Logo');

INSERT INTO `user`(`nom`, `prenom`, `pseudo`, `mail`, `password`, `telephone`, `portable`, `adresse`, `cp`, `ville`, `role`) VALUES 
('jose','quintero','jose.quintero','quintero.entreprise@gmail.com','123456','0534663264','0609303178','1 chem d\'en couyoulette','31250','revel','3');

INSERT INTO `post`(`title`, `sub_title`, `message`, `sub_message`, `img`, `position_img`, `active`, `id_user`) VALUES 
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1,1),
('Titre de test 2','petit sujet de test 2','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',1,1,1),
('Titre de test 3','petit sujet de test 3','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,0,1);

INSERT INTO `card_employee`(`nom_prenom`, `role`, `description`, `img`, `active`) VALUES 
('José Quintero','Président & fondateur','C\'est moi l\'expert en charge des chantiers et résolution de vos problèmes','team3.jpg', 1),
('Agustin Quintero','Responsable informatique','Fils de Mr Quintero, je suis le responsable des systèmes informatiques de l\'entreprise et développeur des applications web','team2.jpg', 1),
('Sylvia Quintero','Service comptable','La responsable du service comptablilité','team1.jpg', 1);

INSERT INTO `posts`(`title`, `sub_title`, `message`, `sub_message`, `img`, `position_img`, `active`, `date`,`user_id`, `created_at`) VALUES 
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),
('Titre de test','petit sujet de test','Le message est simple il sagit de faire comprendre que ici il y auras un message réel','sous messages (en italique ou gris je sais pas encore)','accueil.jpg',0,1, NOW(),1, NOW()),