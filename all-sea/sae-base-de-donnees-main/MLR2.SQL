/*
 ----------------------------------------------------------------------------
             Génération d'une base de données pour
                        SQL Server 2005
                       (11/1/2022 8:30:25)
 ----------------------------------------------------------------------------
     Nom de la base : LuxeyTchang
     Projet : LuxeyTchang
     Auteur : CRIIUT
     Date de dernière modification : 11/1/2022 8:26:01
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
      TABLE : CHÂTEAU
----------------------------------------------------------------------------- */

create table CHÂTEAU
  (
     IDCHÂTEAU int identity (1, 1)   ,
     IDVILLE int  not null  ,
     ADRESSE varchar(128)  null  ,
     IBAN varchar(128)  null  ,
     QUANTITÉSVINACHETÉES int  null  ,
     NUMÉROTÉLÉPHONE int  null  ,
     NOM char(32)  null  
     ,
     constraint PK_CHÂTEAU primary key (IDCHÂTEAU)
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
     IDCHÂTEAU int  not null  ,
     IDVILLE int  not null  ,
     DATECOMMANDE datetime  null  ,
     MONTANTCOMMANDE int  null  ,
     QUANTITÉCOMMANDÉE int  null  ,
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
     IDCHÂTEAU int  not null  ,
     NOM char(32)  null  ,
     ANNÉE datetime  null  ,
     APPELLATION char(32)  null  ,
     TYPEVIN char(32)  null  ,
     CLASSEMENT1855 int  null  ,
     PRIX int  null  ,
     QUANTITÉ int  null  
     ,
     constraint PK_VIN primary key (IDVIN)
  ) 
go



/* -----------------------------------------------------------------------------
      REFERENCES SUR LES TABLES
----------------------------------------------------------------------------- */



alter table CHÂTEAU 
     add constraint FK_CHÂTEAU_VILLE foreign key (IDVILLE) 
               references VILLE (IDVILLE)
go




alter table CLASSEMENT_1855 
     add constraint FK_CLASSEMENT_1855_VIN foreign key (IDVIN) 
               references VIN (IDVIN)
go




alter table COMMANDE 
     add constraint FK_COMMANDE_CHÂTEAU foreign key (IDCHÂTEAU) 
               references CHÂTEAU (IDCHÂTEAU)
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
     add constraint FK_VIN_CHÂTEAU foreign key (IDCHÂTEAU) 
               references CHÂTEAU (IDCHÂTEAU)
go




/*
 -----------------------------------------------------------------------------
               FIN DE GENERATION
 -----------------------------------------------------------------------------
*/