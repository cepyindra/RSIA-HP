DROP DATABASE if exists db_rs;

CREATE DATABASE db_rs;

USE db_rs;

CREATE TABLE tbl_pasien(
  id_pasien CHAR(12) NOT NULL PRIMARY KEY,
  nama_pasien VARCHAR(40) NOT NULL,
  tanggal_lahir DATE,
  jenis_perawatan VARCHAR(30),
  alamat VARCHAR(50),
  no_telp VARCHAR(15)
)
ENGINE=InnoDb;

CREATE TABLE tbl_alokasiWaktu(
  kd_waktu CHAR(12) NOT NULL PRIMARY KEY,
  waktu_mulai_rawat DATE,
  waktu_selesai_rawat DATE,
  lama_rawat INT
)
ENGINE=InnoDb;

CREATE TABLE tbl_ruangan(
  kd_ruangan CHAR(8) NOT NULL PRIMARY KEY,
  nama_ruangan VARCHAR(30) not null,
  jenis VARCHAR(10),
  kelas VARCHAR(10),
  lokasi VARCHAR(20),
  status VARCHAR(10)
)
ENGINE=InnoDb;

CREATE TABLE tbl_admin(
  id_admin CHAR(12) NOT NULL PRIMARY KEY,
  password VARCHAR(12) NOT NULL,
  nama VARCHAR(10),
  tanggal_lahir DATE,
  alamat VARCHAR(50)
)
ENGINE=InnoDb;

CREATE TABLE tbl_reservasi(
  kd_reservasi CHAR(8) NOT NULL PRIMARY KEY,
  id_pasien CHAR(12) NOT NULL,
  kd_ruangan CHAR(8) NOT NULL,
  id_admin CHAR(12) NOT NULL,
  tanggal_reservasi DATE,
  foreign key(id_pasien) references tbl_pasien(id_pasien),
  foreign key(kd_ruangan) references tbl_ruangan(kd_ruangan),
  foreign key(id_admin) references tbl_admin(id_admin)
)
ENGINE=InnoDb;

CREATE TABLE tbl_dokter(
  id_dokter CHAR(12) NOT NULL PRIMARY KEY,
  nama_dokter VARCHAR(40) NOT NULL,
  spesialisasi VARCHAR(20),
  jabatan VARCHAR(30),
  tanggal_lahir DATE,
  alamat VARCHAR(50),
  no_telp VARCHAR(15),
  status VARCHAR(15)
)
ENGINE=InnoDb;

CREATE TABLE tbl_perawat(
  id_perawat CHAR(12) NOT NULL PRIMARY KEY,
  nama_perawat VARCHAR(40) NOT NULL,
  jabatan VARCHAR(30),
  tanggal_lahir DATE,
  alamat VARCHAR(50),
  no_telp VARCHAR(15),
  status VARCHAR(15)
)
ENGINE=InnoDb;

CREATE TABLE detail_dokter_ruangan(
  kd_ruangan CHAR(8) NOT NULL,
  id_dokter CHAR(12) NOT NULL,
  foreign key(kd_ruangan) references tbl_ruangan(kd_ruangan),
  foreign key(id_dokter) references tbl_dokter(id_dokter),
  tanggal DATE
)
ENGINE=InnoDb;

CREATE TABLE detail_perawat_ruangan(
kd_ruangan CHAR(8) NOT NULL,
id_perawat CHAR(12) NOT NULL,
foreign key(kd_ruangan) references tbl_ruangan(kd_ruangan),
foreign key(id_perawat) references tbl_perawat(id_perawat),
tanggal DATE
)
ENGINE=InnoDb;
