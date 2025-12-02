# Hostinqə Yükləmə - Sadə Təlimat

---

## 📍 Hostinqdə Qovluq Strukturu

Hostinqdə adətən 2 əsas qovluq var:

```
/home/istifadeci_adi/          ← Sizin əsas qovluğunuz (gizli)
/home/istifadeci_adi/public_html/   ← Saytın görünən hissəsi
```

Və ya:
```
/home/istifadeci_adi/
/home/istifadeci_adi/www/      ← Saytın görünən hissəsi
```

---

## 🎯 2 ÜSUL VAR

### ⭐ ÜSUL 1: Asan və Təhlükəsiz (Tövsiyə olunur)

#### Addım 1: Bütün proyekti yükləyin

**Hostinqdə əsas qovluğa** (public_html-dən KƏNARDA):

```
/home/istifadeci_adi/insaat.az/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/           ← BU ÇOX ÖNƏMLİDİR!
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── artisan
└── composer.json
```

#### Addım 2: public qovluğunun içini köçürün

**public_html-ə** yalnız `public/` qovluğunun **içindəkiləri** kopyalayın:

```
/home/istifadeci_adi/public_html/
├── css/
├── js/
├── storage/          ← Şəkillər burada
├── webcoder/
├── .htaccess         ← ÇOX ÖNƏMLİ!
└── index.php         ← ÇOX ÖNƏMLİ!
```

#### Addım 3: index.php faylını redaktə edin

`public_html/index.php` faylını açın və bu sətirlərı dəyişin:

**TAPI:**
```php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
```

**DƏYİŞDİR (yolun əvvəlinə qovluq adı əlavə et):**
```php
require __DIR__.'/../insaat.az/vendor/autoload.php';
$app = require_once __DIR__.'/../insaat.az/bootstrap/app.php';
```

✅ **HAZIRDIR!** Saytınız işləyəcək!

---

### ÜSUL 2: Hamısını public_html-ə (Sadə amma az təhlükəsiz)

Əgər hostinq document root dəyişməyə icazə verirsə:

#### Addım 1: Bütün proyekti public_html-ə yükləyin

```
/home/istifadeci_adi/public_html/
├── app/
├── bootstrap/
├── config/
├── public/          ← Bu problematikdir
├── storage/
├── .env
└── ...
```

#### Addım 2: Document Root dəyişin

cPanel → Domains → Document Root:
```
Köhnə: /home/istifadeci_adi/public_html
Yeni:  /home/istifadeci_adi/public_html/public
```

✅ **HAZIRDIR!**

---

## 📦 Yükləmə üçün Siyahı

### MÜTLƏQ yükləyin:

✅ **Qovluqlar:**
- `app/`
- `bootstrap/`
- `config/`
- `database/`
- `public/` (və ya onun içindəkilər)
- `resources/`
- `routes/`
- `storage/`
- `vendor/`

✅ **Fayllar:**
- `.env` ← **ÇOX ÖNƏMLİ!** (VB məlumatları burada)
- `.htaccess`
- `artisan`
- `composer.json`
- `composer.lock`

### Yükləməyin (lazım deyil):

❌ `node_modules/` - Çox böyük, lazım deyil
❌ `.git/` - Lazım deyil
❌ `.idea/` - Lazım deyil
❌ `*.zip` faylları
❌ `*.sql` faylları (ayrıca import edəcəksiniz)

---

## 🗄️ Verilənlər Bazası

### Addım 1: Hostinqdə VB yaradın

cPanel → MySQL Databases:
- Verilənlər bazası adı: məs. `user_insaat`
- İstifadəçi: məs. `user_admin`
- Şifrə: güclü şifrə
- İstifadəçini VB-yə əlavə edin (ALL PRIVILEGES)

### Addım 2: .env faylını yeniləyin

```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=user_insaat       ← Yeni VB adı
DB_USERNAME=user_admin        ← Yeni istifadəçi
DB_PASSWORD=yeni_şifrə        ← Yeni şifrə
```

### Addım 3: SQL faylını import edin

cPanel → phpMyAdmin:
- Verilənlər bazasını seçin
- Import → `hbecxexb_db.sql` faylını seçin
- Go

✅ **HAZIR!**

---

## 🔐 Təhlükəsizlik (Mühüm!)

### Qovluq icazələri (Permissions):

```bash
chmod 755 storage/
chmod 755 storage/app/
chmod 755 storage/framework/
chmod 755 storage/logs/
chmod 755 bootstrap/cache/
```

Və ya cPanel File Manager → Sağ klik → Permissions → 755

### .env faylı:

```bash
chmod 644 .env
```

**QEYD:** .env faylı public_html XARICINDƏ olmalıdır!

---

## ✅ Yoxlama

Saytı açın: `https://domeniniz.com`

### Əgər işləyirsə:
✅ Əsas səhifə açılır
✅ Şəkillər görünür
✅ Partnyorlar slayderində loqolar var
✅ Sertifikatlar görünür

### Əgər xəta varsa:

**"500 Internal Server Error":**
- `.htaccess` faylı düzgün yüklənibmi?
- `storage/` qovluğu 755 icazəsi var?

**"Mix file not found":**
- `public/css/` və `public/js/` qovluqları var?

**Şəkillər görünmür:**
- `public/storage/` qovluğu var?
- `public/storage/certificates/` faylları var?
- `public/storage/partners/` faylları var?

**VB xətası:**
- `.env` faylındakı VB məlumatları düzdürmü?
- VB import olunubmu?

---

## 📞 Texniki Dəstək

Əgər problem davam edirsə:
1. Hostinq dəstək xidmətinə müraciət edin
2. Laravel versiyasını deyin: Laravel 9.x
3. PHP versiyası: 8.1 və ya 8.2 tələb olunur

---

## 🎯 ÖNƏMLİ QEYDLƏR

✅ **Proyekt HAZİRDİR!**
- Bütün fayllar `public/storage/`-dadır
- Heç bir əlavə əmr lazım deyil
- Sadəcə yükləyin və işə düşsün

✅ **index.php redaktəsi:**
- Bu yeganə dəyişiklikdir
- Yalnız 2 sətr dəyişir

✅ **.env faylı:**
- Yalnız VB məlumatlarını dəyişin
- Başqa heç nə dəyişməyin

---

**Son yeniləmə:** 2025-11-21
**Status:** ✅ Test edilib, işləyir
