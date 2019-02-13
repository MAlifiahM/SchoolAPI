# API

This API about Create and Select data.

## Getting Started
You must run 
``` php -S localhost:8080 ```
for run this program.

## Running and test

### Get all data Kelas
``` http://localhost:8080/kelas/read.php ```
### Get data Kelas detail
You can get detail data kelas using params (key)kode_kelas and (value) and using same endpoint

### Get all data Peserta
``` http://localhost:8080/peserta/read.php ```
### Get data Peserta detail
You can get detail data peserta using params (key)nis and (value) and using same endpoint

### Post data Peserta
``` http://localhost:8080/peserta/create.php ```
You can input data peserta using Body(raw) with example value 
```
{
	"nis" : "1234123124122",
	"nama" : "asdasdw",
	"kode_kelas" : "B1", 
	"tanggal_lahir" : "2018-02-13", 
	"tempat_lahir" : "asdawda", 
	"alamat" : "asdqwda", 
	"nama_orang_tua" : "asdwada", 
	"pekerjaan_orang_tua" : "asdawqd", 
	"agama" : "asdqwq", 
	"tanggal_absensi" : "2018-02-13"
}
```
Data must be filled in all.

### Post data Peserta
``` http://localhost:8080/kelas/create.php ```
You can input data peserta using Body(raw) with example value 
```
{
	"kode_kelas" : "C1",
	"nama_kelas" : "BAHASA 1"
}
```
Data must be filled in all.