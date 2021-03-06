/*
 ----------------------------------------------------------------------------
             G�n�ration d'une base de donn�es pour
                        SQL Server 2005
                       (11/1/2022 8:30:25)
 ----------------------------------------------------------------------------
     Nom de la base : LuxeyTchang
     Projet : LuxeyTchang
     Auteur : CRIIUT
     Date de derni�re modification : 11/1/2022 8:26:01
 ----------------------------------------------------------------------------
*/

drop database LuxeyTchang
go

/* -----------------------------------------------------------------------------
      OUVERTURE DE LA BASE LuxeyTchang
----------------------------------------------------------------------------- */

create database LuxeyTchang
go

use LuxeyTchang
go



/* -----------------------------------------------------------------------------
      TABLE : CH�TEAU
----------------------------------------------------------------------------- */

create table CH�TEAU
  (
     IDCH�TEAU int identity (1, 1)   ,
     IDVILLE int  not null  ,
     ADRESSE varchar(128)  null  ,
     IBAN varchar(128)  null  ,
     QUANTIT�SVINACHET�ES int  null  ,
     NUM�ROT�L�PHONE int  null  ,
     NOM char(32)  null  
     ,
     constraint PK_CH�TEAU primary key (IDCH�TEAU)
  ) 
go



/* -----------------------------------------------------------------------------
      TABLE : CLASSEMENT_1855
----------------------------------------------------------------------------- */

create table CLASSEMENT_1855
  (
     IDCLASSEMENT char(32)  not null  ,
     IDVIN int  not null  ,
     CRU char(32)  null  ,
     COULEUR char(32)  null  ,
     CLASSEMENT smallint  null  
     ,
     constraint PK_CLASSEMENT_1855 primary key (IDCLASSEMENT)
  ) 
go



/* -----------------------------------------------------------------------------
      TABLE : COMMANDE
----------------------------------------------------------------------------- */

create table COMMANDE
  (
     BONCOMMANDE int identity (1, 1)   ,
     IDCH�TEAU int  not null  ,
     IDVILLE int  not null  ,
     DATECOMMANDE datetime  null  ,
     MONTANTCOMMANDE int  null  ,
     QUANTIT�COMMAND�E int  null  ,
     DATELIVRAISON datetime  null  ,
     NOMFOURNISSEUR char(32)  null  
     ,
     constraint PK_COMMANDE primary key (BONCOMMANDE)
  ) 
go



/* -----------------------------------------------------------------------------
      TABLE : APPELLATION
----------------------------------------------------------------------------- */

create table APPELLATION
  (
     IDAPPELLLATION smallint identity (1, 1)   ,
     NOM char(32)  null  ,
     SOUSNOM char(32)  null  
     ,
     constraint PK_APPELLATION primary key (IDAPPELLLATION)
  ) 
go



/* -----------------------------------------------------------------------------
      TABLE : VILLE
----------------------------------------------------------------------------- */

create table VILLE
  (
     IDVILLE int identity (1, 1)   ,
     NOMVILLE varchar(128)  null  ,
     CODEPOSTALE int  null  
     ,
     constraint PK_VILLE primary key (IDVILLE)
  ) 
go



/* -----------------------------------------------------------------------------
      TABLE : VIN
----------------------------------------------------------------------------- */

create table VIN
  (
     IDVIN int identity (1, 1)   ,
     IDAPPELLLATION smallint  not null  ,
     BONCOMMANDE int  null  ,
     IDCH�TEAU int  not null  ,
     NOM char(32)  null  ,
     ANN�E datetime  null  ,
     APPELLATION char(32)  null  ,
     TYPEVIN char(32)  null  ,
     CLASSEMENT1855 int  null  ,
     PRIX int  null  ,
     QUANTIT� int  null  
     ,
     constraint PK_VIN primary key (IDVIN)
  ) 
go



/* -----------------------------------------------------------------------------
      REFERENCES SUR LES TABLES
----------------------------------------------------------------------------- */



alter table CH�TEAU 
     add constraint FK_CH�TEAU_VILLE foreign key (IDVILLE) 
               references VILLE (IDVILLE)
go




alter table CLASSEMENT_1855 
     add constraint FK_CLASSEMENT_1855_VIN foreign key (IDVIN) 
               references VIN (IDVIN)
go




alter table COMMANDE 
     add constraint FK_COMMANDE_CH�TEAU foreign key (IDCH�TEAU) 
               references CH�TEAU (IDCH�TEAU)
go




alter table COMMANDE 
     add constraint FK_COMMANDE_VILLE foreign key (IDVILLE) 
               references VILLE (IDVILLE)
go




alter table VIN 
     add constraint FK_VIN_APPELLATION foreign key (IDAPPELLLATION) 
               references APPELLATION (IDAPPELLLATION)
go




alter table VIN 
     add constraint FK_VIN_COMMANDE foreign key (BONCOMMANDE) 
               references COMMANDE (BONCOMMANDE)
go




alter table VIN 
     add constraint FK_VIN_CH�TEAU foreign key (IDCH�TEAU) 
               references CH�TEAU (IDCH�TEAU)
go




/*
 -----------------------------------------------------------------------------
               FIN DE GENERATION
 -----------------------------------------------------------------------------
*/