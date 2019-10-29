# Laravel Türkiye Paketi 🇹🇷

![](https://travis-ci.org/aozisik/laravel-turkiye.svg?branch=master)

Türkiye'ye hizmet eden Laravel uygulamalarınız için doğrulama yardımcıları içerir. Türkçe dil yardımcıları ayrı bir pakete taşınmıştır:

- [https://github.com/aozisik/turkce](https://github.com/aozisik/turkce)

## Kurulum (Laravel 5.0-5.4)

```bash
composer require aozisik/laravel-turkiye "^2.0"
```

Kurulumdan sonra aşağıdaki satırı app/config.php dosyanızda ilgili yere ekleyin:

```php
Aozisik\LaravelTurkiye\Providers\TurkiyeServiceProvider::class,
```

## Kurulum (Laravel 5.5 ve sonrası)

```bash
composer require aozisik/laravel-turkiye
```

Laravel 5.5 ve sonraki sürümlerde ServiceProvider kaydını eklemeye gerek olmadan çalışır.

## Doğrulama

#### TC Kimlik No Doğrulama

Girilen TC kimlik numarasını uzunluk ve matematiksel özellikleri yönünden değerlendirir.

```php
$this->validate($request, ['kimlik_no' => ['required', new TcKimlikNoRule()]]);
```

#### Vergi Kimlik No Doğrulama

Girilen Vergi kimlik numarasını uzunluk ve matematiksel özellikleri yönünden
değerlendirir.

```php
$this->validate($request, ['vergi_no' => ['required', new VergiKimlikNoRule()]]);
```

#### Türkiye IBAN NO Doğrulama

Girilen IBAN no'yu doğrular ve Türkiye kodlu olduğunu garantiler.

```php
$this->validate($request, ['iban' => ['required', new TrIbanRule()]]);
```

## Katkıda Bulunma

Bu paket Türkçe Laravel uygulamalarında ihtiyaç duyulabilecek özellikleri kullanışlı ve kolay erişilebilir bir şekilde sunmak için oluşturuldu. Faydalı olacağını düşündüğünüz eklemeleri testleriyle birlikte gönderirseniz mutlu oluruz.
