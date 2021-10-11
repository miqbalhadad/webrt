/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     9/23/2021 9:26:20 PM                         */
/*==============================================================*/


drop table if exists KECAMATAN;

drop table if exists KELURAHAN;

drop table if exists KOTA;

drop table if exists PROVINSI;

drop table if exists USER;

drop table if exists WARGA;

drop table if exists WILAYAH;

/*==============================================================*/
/* Table: KECAMATAN                                             */
/*==============================================================*/
create table KECAMATAN
(
   KEC_ID               varchar(100) not null,
   KOTA_ID              varchar(100) not null,
   NAMA_KEC             varchar(100),
   primary key (KEC_ID)
);

/*==============================================================*/
/* Table: KELURAHAN                                             */
/*==============================================================*/
create table KELURAHAN
(
   KEL_ID               varchar(100) not null,
   KEC_ID               varchar(100) not null,
   NAMA_KEL             varchar(100),
   primary key (KEL_ID)
);

/*==============================================================*/
/* Table: KOTA                                                  */
/*==============================================================*/
create table KOTA
(
   KOTA_ID              varchar(100) not null,
   PROV_ID              varchar(100) not null,
   NAMA_KOTA            varchar(100),
   primary key (KOTA_ID)
);

/*==============================================================*/
/* Table: PROVINSI                                              */
/*==============================================================*/
create table PROVINSI
(
   PROV_ID              varchar(100) not null,
   WIL_ID1              varchar(100) not null,
   NAMA_PROV            varchar(100),
   primary key (PROV_ID)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   NIK                  varchar(100) not null,
   WIL_ID1              varchar(100) not null,
   EMAIL                varchar(100),
   PASSWORD             varchar(100),
   NICKNAME             varchar(100),
   ROLE                 varchar(100),
   primary key (NIK)
);

/*==============================================================*/
/* Table: WARGA                                                 */
/*==============================================================*/
create table WARGA
(
   NKK                  varchar(100) not null,
   NIK                  varchar(100) not null,
   WIL_ID1              varchar(100) not null,
   NAMA                 varchar(100),
   primary key (NKK)
);

/*==============================================================*/
/* Table: WILAYAH                                               */
/*==============================================================*/
create table WILAYAH
(
   WIL_ID1              varchar(100) not null,
   NAMA_WIL             varchar(100),
   primary key (WIL_ID1)
);

alter table KECAMATAN add constraint FK_MEMILIKI3 foreign key (KOTA_ID)
      references KOTA (KOTA_ID) on delete restrict on update restrict;

alter table KELURAHAN add constraint FK_MEMILIKI4 foreign key (KEC_ID)
      references KECAMATAN (KEC_ID) on delete restrict on update restrict;

alter table KOTA add constraint FK_MEMILIKI2 foreign key (PROV_ID)
      references PROVINSI (PROV_ID) on delete restrict on update restrict;

alter table PROVINSI add constraint FK_MEMILIKI foreign key (WIL_ID1)
      references WILAYAH (WIL_ID1) on delete restrict on update restrict;

alter table USER add constraint FK_MEMILIKI1 foreign key (WIL_ID1)
      references WILAYAH (WIL_ID1) on delete restrict on update restrict;

alter table WARGA add constraint FK_MEMILIKI7 foreign key (NIK)
      references USER (NIK) on delete restrict on update restrict;

alter table WARGA add constraint FK_MEMILIKI8 foreign key (WIL_ID1)
      references WILAYAH (WIL_ID1) on delete restrict on update restrict;

