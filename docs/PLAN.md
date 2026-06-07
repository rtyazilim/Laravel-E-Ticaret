## YAPILANLAR
- Mimari Kurulum: Modular Monolith (app/Modules)
- Modüller: Product, Cart, Order, Payment
- API & Auth: Standart JSON yanıtları ve Sanctum Auth eklendi.
- Frontend: `home.blade.php` ve Web Entry Layer (HomeController) eklendi.
- CI/CD: GitHub Actions FTP Deployment eklendi, hataları düzeltildi ve güvenli hale getirildi (Secrets).

## DEVAM EDENLER
- Veritabanı mock veri üretimi.

## YAPILACAKLAR
- Admin role middleware.
- Payment webhook güvenliği (imza kontrolü).
- Stok concurrency (Row-level lock).

## PRODUCTION CHECKLIST
- [ ] `.env` oluştur ve `APP_KEY` ayarla.
- [ ] `vendor/` klasörünü sunucuya yükle.
- [ ] cPanel'de kök dizini (DocumentRoot) `/public` yap.
- [ ] DB bağlantılarını test et.
- [ ] `storage/` izinlerini ver (775).

## KRİTİK BLOKERLER
- Kök dizinin `/public` OLMAMASI (Açık kaynak kodu sızıntısı ve 404).
- `vendor/` eksikliği (500 hatası).
- `.env` eksikliği (Veritabanı hatası).
