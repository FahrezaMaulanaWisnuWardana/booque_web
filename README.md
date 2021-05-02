# Tentang Booque Web And API
Dibuat dengan Laravel 8 

## Auth API
Belom ada

## Route API

# Note Mandatory (Y = Wajib , N = Tidak Wajib)

## Profile
- Update Profile 

**POST** - /api/update-profile/{id}

**PARAMETER**
Parameter | Mandatory
--------- | ---------
full_name | N
address | N
phone | N
city_id | N
province_id | N

- Detail Profile
**POST** - /api/profile

**PARAMETER**
Parameter | Mandatory
--------- | ---------
id | Y

### Login
- Login OAUTH

**POST** - /api/login-oauth

**PARAMETER**
Parameter | Mandatory
--------- | ---------
email | Y

- Login Default

**POST** - /api/login

**PARAMETER**
Parameter | Mandatory
--------- | ---------
email | Y
password | Y

### Register
- Regiter Default

**POST** - /api/daftar

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

- Buku (List Buku dan Pencarian)

**POST** - /api/buku

**PARAMETER**
Parameter | Mandatory
--------- | ---------
book_name | N

Jika Parameter terpenuhi maka akan menampilkan buku sesuai dengan isi dari paramater

- List Buku Sekitar

**POST** - /api/buku-sekitar

**PARAMETER**
Parameter | Mandatory
--------- | ---------
city_name | Y

Jika Parameter terpenuhi maka akan menampilkan buku sesuai dengan daerah tersebut
