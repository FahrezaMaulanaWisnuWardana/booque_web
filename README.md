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
Email | Y

- Login Default

**POST** - /api/login

**PARAMETER**
Parameter | Mandatory
--------- | ---------
Email | Y
Password | Y

### Register
- Register OAUTH

**POST** - /api/daftar-oauth

**PARAMETER**
Parameter | Mandatory
--------- | ---------
Nama | Y
Email | Y
Password | Y

- Login Default

**POST** - /api/daftar

**PARAMETER**
Parameter | Mandatory
--------- | ---------
Nama | Y
Email | Y
