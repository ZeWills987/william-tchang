/*
 ----------------------------------------------------------------------------
             Génération d'une base de données pour
                        SQL Server 2005
                       (7/1/2022 10:55:18)
 ----------------------------------------------------------------------------
     Nom de la base : S1A_LuxeyTchang
     Projet : LuxeyTchang
     Auteur : CRIIUT
     Date de dernière modification : 7/1/2022 10:51:06
 ----------------------------------------------------------------------------
*/

drop database S1A_LuxeyTchang
go

/* -----------------------------------------------------------------------------
      OUVERTURE DE LA BASE S1A_LuxeyTchang
----------------------------------------------------------------------------- */

create database S1A_LuxeyTchang
go

use S1A_LuxeyTchang
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
     NUMÉROTÉLÉPHONE int  null  
     ,
     constraint PK_CHÂTEAU primary key (IDCHÂTEAU)
  ) 
go



/* -----------------------------------------------------------------------------
      TABLE : COMMANDE
----------------------------------------------------------------------------- */

create table COMMANDE
  (
     BONCOMMAND int identity (1, 1)   ,
     IDCHÂTEAU int  not null  ,
     IDVILLE int  not null  ,
     DATECOMMANDE datetime  null  ,
     MONTANTCOMMANDE int  null  ,
     QUANTITÉCOMMANDÉE int  null  ,
     DATELIVRAISON datetime  null  ,
     ADRESSEFACTURATION varchar(128)  null  ,
     NOMFOURNISSEUR char(32)  null  
     ,
     constraint PK_COMMANDE primary key (BONCOMMAND)
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
     BONCOMMAND int  null  ,
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




alter table COMMANDE 
     add constraint FK_COMMANDE_CHÂTEAU foreign key (IDCHÂTEAU) 
               references CHÂTEAU (IDCHÂTEAU)
go




alter table COMMANDE 
     add constraint FK_COMMANDE_VILLE foreign key (IDVILLE) 
               references VILLE (IDVILLE)
go




alter table VIN 
     add constraint FK_VIN_COMMANDE foreign key (BONCOMMAND) 
               references COMMANDE (BONCOMMAND)
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