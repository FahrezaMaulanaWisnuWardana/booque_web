# Tentang Booque Web And API
Dibuat dengan Laravel 8 

## Auth API
Bearer Token
# Note
# Header : Accept : Application/json

## Route API

# Note Mandatory (Y = Wajib , N = Tidak Wajib)

## Profile
- Update Profile 

**POST** - /api/v1/update-profile/{id}

**PARAMETER**
Parameter | Mandatory
--------- | ---------
full_name | N
address | N
phone | N
city_id | N
province_id | N

- Detail Profile
**POST** - /api/v1/profile

**PARAMETER**
Parameter | Mandatory
--------- | ---------
id | Y

### Login
- Login OAUTH

**POST** - /api/v1/login-oauth

**PARAMETER**
Parameter | Mandatory
--------- | ---------
email | Y

- Login Default

**POST** - /api/v1/login

**PARAMETER**
Parameter | Mandatory
--------- | ---------
email | Y
password | Y

### Register
- Regiter Default

**POST** - /api/v1/daftar

**PARAMETER**

Parameter | Mandatory | value
--------- | --------- | -----
nama | Y |
email | Y |
password | Y |
type | Y | default , oauth

<!-- - Register OAUTH

**POST** - /api/daftar

**PARAMETER**
Parameter | Mandatory
--------- | ---------
nama | Y
email | Y -->

### Buku

- Tambah Buku

**POST** - /api/v1/tambah-buku

**REQUEST**
Parameter | Mandatory
--------- | ---------
book_name | Y
user_id		  | Y
description | Y
address		| Y
category_id | Y
thumbnail 	| Y
author 		| Y
year 		| Y
publisher 	| Y
city_id 	| Y
province_id | Y

- Update Buku

**POST** - /api/v1/update-buku/{id}

**REQUEST**
Parameter | Mandatory
--------- | ---------
book_name | Y
description | Y
address		| Y
category_id | Y
status | Y
thumbnail 	| N
author 		| Y
year 		| Y
publisher 	| Y
city_id 	| Y
province_id | Y

- Update Status Buku

**POST** - /api/v1/update-status-buku/{id}

**REQUEST**
Parameter | Mandatory
--------- | ---------
status | Y

- Buku (Buku berdasarkan area terdekat)

**POST** - /api/v1/buku

**REQUEST**
Parameter | Mandatory
--------- | ---------
lat | Y
lng | Y
dst | N
jml | N

- Cari Buku By name
**POST** - /api/v1/buku-cari

**REQUEST**
Parameter | Mandatory
--------- | ---------
lat | Y
lng | Y
book_name | Y
dst | N
jml | N

- Buku Detail By Id
**POST** - /api/v1/buku-detail

**REQUEST**
Parameter | Mandatory
--------- | ---------
id | Y

- Hapus
**DELETE** - /api/v1/hapus-buku/{id}

### Category
- Category 

**POST** - /api/v1/category/{buku?}/{id?}
### id = Category Id
## Jika kedua parameter terpenuhi maka silahkan kirim request dibawah
**REQUEST**
Parameter | Mandatory
--------- | ---------
lat | Y
lng | Y
dst | N
jml | N

### Kota
- Kota
**GET** - /api/v1/kota/{province_id?}
- Cari Kota By name
**GET** - /api/v1/kota/search/{city_name?}

### Provinsi
- Kota
**GET** - /api/v1/provinsi/{id?}
- Cari Kota By name
**GET** - /api/v1/provinsi/search/{province_name?}

### Transaksi

- Tambah Transaksi

**POST** - /api/v1/transaksi-buku
**REQUEST**
Parameter | Mandatory
--------- | ---------
user_id | Y
book_id | Y
thumbnail | Y
buyer_id | N

- Transaksiku

**POST** - /api/v1/transaksi-ku/{user_id}

- Transaksi detail

**POST** - /api/v1/transaksi-detail/{user_id}/{trx_id}






Jika Parameter terpenuhi maka akan menampilkan buku sesuai dengan isi dari paramater