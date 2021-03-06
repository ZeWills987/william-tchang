/*
 ----------------------------------------------------------------------------
             G�n�ration d'une base de donn�es pour
                        SQL Server 2005
                       (7/1/2022 10:55:18)
 ----------------------------------------------------------------------------
     Nom de la base : S1A_LuxeyTchang
     Projet : LuxeyTchang
     Auteur : CRIIUT
     Date de derni�re modification : 7/1/2022 10:51:06
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
      TABLE : CH�TEAU
----------------------------------------------------------------------------- */

create table CH�TEAU
  (
     IDCH�TEAU int identity (1, 1)   ,
     IDVILLE int  not null  ,
     ADRESSE varchar(128)  null  ,
     IBAN varchar(128)  null  ,
     QUANTIT�SVINACHET�ES int  null  ,
     NUM�ROT�L�PHONE int  null  
     ,
     constraint PK_CH�TEAU primary key (IDCH�TEAU)
  ) 
go



/* -----------------------------------------------------------------------------
      TABLE : COMMANDE
----------------------------------------------------------------------------- */

create table COMMANDE
  (
     BONCOMMAND int identity (1, 1)   ,
     IDCH�TEAU int  not null  ,
     IDVILLE int  not null  ,
     DATECOMMANDE datetime  null  ,
     MONTANTCOMMANDE int  null  ,
     QUANTIT�COMMAND�E int  null  ,
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




alter table COMMANDE 
     add constraint FK_COMMANDE_CH�TEAU foreign key (IDCH�TEAU) 
               references CH�TEAU (IDCH�TEAU)
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
     add constraint FK_VIN_CH�TEAU foreign key (IDCH�TEAU) 
               references CH�TEAU (IDCH�TEAU)
go




/*
 -----------------------------------------------------------------------------
               FIN DE GENERATION
 -----------------------------------------------------------------------------
*/