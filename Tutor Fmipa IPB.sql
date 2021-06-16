drop database db_tutor;
create database db_tutor;
\c db_tutor

-- TABEL TUTOR
drop table tutor;
create table tutor (
    ID_TUTOR CHAR(7) NOT NULL,
    Nama VARCHAR(64) NOT NULL,
    Tanggal_gabung DATE NOT NULL,
    Username VARCHAR(64) NOT NULL,
    Password_tutor VARCHAR(60) NOT NULL,
    CONSTRAINT tutor_ID_TUTOR_PK PRIMARY KEY(ID_TUTOR)
);

INSERT INTO tutor VALUES ('IDT0001', 'Andry Laumardy S', '2021-06-11','andrylsrg_','andrystat');
INSERT INTO tutor VALUES ('IDT0002', 'Dani Satya P', '2021-06-11','danisetya._','danistat');
INSERT INTO tutor VALUES ('IDT0003', 'Toni Alfan', '2021-06-11','tonyalfan','tonystat');
INSERT INTO tutor VALUES ('IDT0004', 'Perisai Zidane H', '2021-06-11','zidane_hnp','zidanestat');

-- TABEL SESI
drop table sesi;
create table sesi (
    IDS CHAR(5) NOT NULL,
    Hari VARCHAR(10) NOT NULL,
    Jam CHAR(11),
    CONSTRAINT sesi_IDS_PK PRIMARY KEY(IDS)
);

INSERT INTO sesi VALUES ('SEN16', 'Senin', '16.00-17.00');
INSERT INTO sesi VALUES ('SEN17', 'Senin', '17.00-18.00');
INSERT INTO sesi VALUES ('SEN18', 'Senin', '18.00-19.00');
INSERT INTO sesi VALUES ('SEL16', 'Selasa', '16.00-17.00');
INSERT INTO sesi VALUES ('SEL17', 'Selasa', '17.00-18.00');
INSERT INTO sesi VALUES ('SEL18', 'Selasa', '18.00-19.00');

-- TABEL MATKUL
drop table mata_kuliah;
create table mata_kuliah (
    IDM CHAR(3) NOT NULL,
    Nama_Mata_kuliah VARCHAR(64) not null,
    CONSTRAINT mata_kuliah_IDM_PK PRIMARY KEY(IDM)
);

INSERT INTO mata_kuliah VALUES ('BIO', 'Biologi');
INSERT INTO mata_kuliah VALUES ('FIS', 'Fisika');
--INSERT INTO mata_kuliah VALUES ('MBL', 'Matematika Berpikir Logis');
INSERT INTO mata_kuliah VALUES ('KIM', 'Kimia');
--INSERT INTO mata_kuliah VALUES ('SAD', 'Statistika dan Analisis Data');

-- TABEL KELAS
drop table kelas;
create table kelas (
    IDK CHAR(12) NOT NULL,
    IDM CHAR(3) not null,
    IDS CHAR(5) NOT NULL,
    ID_TUTOR CHAR(7) NOT NULL,
    CONSTRAINT kelas_IDA_PK PRIMARY KEY(IDK)
);

INSERT INTO kelas VALUES ('BIOSEN160001', 'BIO', 'SEN16','IDT0001');
INSERT INTO kelas VALUES ('BIOSEN170002', 'BIO', 'SEN17','IDT0002');
INSERT INTO kelas VALUES ('FISSEL160003', 'FIS', 'SEL16','IDT0003');
--INSERT INTO kelas VALUES ('MBLSEL170004', 'MBL', 'SEL17','IDT0004');

-- TABEL TUTEE
drop table pendaftar;
create table pendaftar (
    id_pendaftar VARCHAR(15) NOT NULL primary key,
    Nama_pendaftar VARCHAR(50) not null,
    No_HP VARCHAR(50),
    Email VARCHAR(50),
    paket CHAR(1) not null 
);

INSERT INTO pendaftar VALUES ('G14190001', 'Adelia Putri P','082134567890','adel@gmail.com','A');
INSERT INTO pendaftar VALUES ('G14190002', 'Alya','082134532145','alya@gmail.com','B');
INSERT INTO pendaftar VALUES ('G14190004', 'Anggun Andini','081334457890','anggun@gmail.com','C');
--INSERT INTO pendaftar VALUES ('G14190005', 'MBLSEL170004', 'Azka','082343218971','azka@gmail.com','D');

-- TABEL ABSEN
drop table daftar_hadir;
create table daftar_hadir (
    IDK VARCHAR(25) NOT NULL,
    id_pendaftar VARCHAR(15) NOT NULL
);
---Memasukkan data
INSERT INTO daftar_hadir VALUES ('BIOSEN160001','G14190001');
INSERT INTO daftar_hadir VALUES ('BIOSEN170002','G14190002');
INSERT INTO daftar_hadir VALUES ('FISSEL160003','G14190004');
--INSERT INTO daftar_hadir VALUES ('MBLSEL160004','G14190005');

---Membuat FK availability references tutor dan sesi
---ALTER TABLE AVAILABILITY ADD CONSTRAINT kelas_IDK_FK FOREIGN KEY(IDK) REFERENCES TUTOR(ID_TUTOR);
---ALTER TABLE AVAILABILITY ADD CONSTRAINT kelas_IDS_FK FOREIGN KEY(IDK) REFERENCES sesi(IDS);

---Membuat FK 
---ALTER TABLE pendaftar ADD CONSTRAINT pendaftar_id_pendaftar_FK FOREIGN KEY(id_pendaftar) REFERENCES kelas(IDK);
---ALTER TABLE pendaftar ADD CONSTRAINT pendaftar_ida_pendaftar_FK FOREIGN KEY(id_pendaftar) REFERENCES kelas(IDK);

-- TUTOR AVAILABILITY
SELECT hari, jam, nama_mata_kuliah AS mata_kuliah, nama AS tutor
FROM (((kelas K
INNER JOIN sesi S ON K.ids = S.ids)
INNER JOIN tutor T ON K.id_tutor = T.id_tutor)
INNER JOIN mata_kuliah M ON K.idm = M.idm)
WHERE K.idm = 'BIO';
-- 'BIO', 'KIM', 'FIS'

-- CLASS PARTICIPANTS LIST
SELECT DH.idk, P.nama_pendaftar AS nama
FROM ((daftar_hadir DH
INNER JOIN kelas K ON DH.idk = K.idk)
INNER JOIN pendaftar P ON DH.id_pendaftar = P.id_pendaftar)
WHERE K.id_tutor = 'IDT0001';
-- 'IDT0002', 'IDT0003', 'IDT0004'

-- CLASS PARTICIPANTS HEADCOUNT
SELECT DH.idk, P.paket, COUNT(distinct DH.id_pendaftar) AS jumlah_murid
FROM ((daftar_hadir DH
INNER JOIN kelas K ON DH.idk = K.idk)
INNER JOIN pendaftar P ON DH.id_pendaftar = P.id_pendaftar)
WHERE K.id_tutor = 'IDT0001'
GROUP BY DH.idk, P.paket
ORDER BY DH.idk, P.paket;
-- 'IDT0002', 'IDT0003', 'IDT0004'

-- TUTOR'S COMPENSATION
SELECT CASE
WHEN paket = 'A' THEN 12000*COUNT(DH.id_pendaftar)
WHEN paket = 'B' THEN 8000*COUNT(DH.id_pendaftar)
WHEN paket = 'C' THEN 4000*COUNT(DH.id_pendaftar)
END AS upah_tutor
FROM ((daftar_hadir DH
INNER JOIN kelas K ON DH.idk = K.idk)
INNER JOIN pendaftar P ON DH.id_pendaftar = P.id_pendaftar)
WHERE K.id_tutor = 'IDT0003'
GROUP BY DH.idk, P.paket
ORDER BY DH.idk, P.paket;
