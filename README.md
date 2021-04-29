# Tentang Booque Web And API
Dibuat dengan Laravel 8 

## Auth API
Belom ada

## Route API
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
- Register OAUTH

**POST** - /api/daftar-oauth

**PARAMETER**
Parameter | Mandatory
--------- | ---------
nama | Y
email | Y
password | Y

- Regiter Default

**POST** - /api/daftar

**PARAMETER**
Parameter | Mandatory
--------- | ---------
nama | Y
email | Y

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