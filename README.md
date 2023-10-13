## Tentang Sekolahku

Sekolahku adalah aplikasi manajemen sekolah berbasis website yang di bangun dan di kembangkan dengan Framework Laravel. Fitur-fitur pada aplikasi Sekolahku antara lain :
<<<<<<< HEAD

- Website Sekolah (Done)
- PPDB (Done)
- Perpustakaan (Done)
- Alumni

Download tools pendukung:
1. Xampp php versi 8: https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.1.2/xampp-windows-x64-8.1.2-0-VS16-installer.exe/download
2. Composer: https://getcomposer.org/Composer-Setup.exe
3. Node Js: https://nodejs.org/en/download/
4. Git Bash: https://git-scm.com/download/win

## Installation

* Install [Composer](https://getcomposer.org/download) and [Npm](https://nodejs.org/en/download)
* Clone the repository: `git clone https://github.com/andes2912/sekolahku`
* Install dependencies: `composer install ; npm install ; npm run dev`
* Run `cp .env.example .env` for create .env file
* Run `php artisan migrate --seed` for migration database
* Run `php artisan storage:link` for create folder storage
