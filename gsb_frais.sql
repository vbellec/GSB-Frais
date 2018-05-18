CREATE TABLE etat (
  id char(2) COLLATE utf8_swedish_ci NOT NULL,
  libelle varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE fichefrais (
id int(11) NOT NULL,
  idVisiteur char(4) COLLATE utf8_swedish_ci NOT NULL,
  mois tinyint(3) unsigned NOT NULL,
  annee tinyint(4) unsigned NOT NULL,
  nbJustificatifs int(11) DEFAULT NULL,
  montantValide decimal(10,2) DEFAULT NULL,
  dateModif date DEFAULT NULL,
  idEtat char(2) COLLATE utf8_swedish_ci DEFAULT 'CR'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=19 ;

CREATE TABLE forfait (
  id char(3) COLLATE utf8_swedish_ci NOT NULL,
  libelle char(20) COLLATE utf8_swedish_ci DEFAULT NULL,
  montant decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

CREATE TABLE lignefraisforfait (
  idFicheFrais int(11) NOT NULL,
  idForfait char(3) COLLATE utf8_swedish_ci NOT NULL,
  quantite int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

ALTER TABLE etat
 ADD PRIMARY KEY (id);

ALTER TABLE fichefrais
 ADD PRIMARY KEY (id), ADD KEY idEtat (idEtat), ADD KEY idVisiteur (idVisiteur);

ALTER TABLE forfait
 ADD PRIMARY KEY (id);

ALTER TABLE lignefraisforfait
 ADD PRIMARY KEY (idFicheFrais,idForfait), ADD KEY idForfait (idForfait);

ALTER TABLE fichefrais
MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;

ALTER TABLE fichefrais
ADD CONSTRAINT fichefrais_ibfk_1 FOREIGN KEY (idEtat) REFERENCES etat (id),
ADD CONSTRAINT fichefrais_ibfk_2 FOREIGN KEY (idVisiteur) REFERENCES visiteur (id);

ALTER TABLE lignefraisforfait
ADD CONSTRAINT lignefraisforfait_ibfk_2 FOREIGN KEY (idForfait) REFERENCES forfait (id);


INSERT INTO `forfait` (`id`, `libelle`, `montant`) VALUES
('ETP', 'Forfait Etape', 110.00),
('KM', 'Frais Kilométrique', 0.62),
('NUI', 'Nuitée Hôtel', 80.00),
('REP', 'Repas Restaurant', 25.00);

INSERT INTO `etat` (`id`, `libelle`) VALUES
('RB', 'Remboursée'),
('CL', 'Saisie clôturée'),
('CR', 'Fiche créée, saisie en cours'),
('VA', 'Validée et mise en paiement');