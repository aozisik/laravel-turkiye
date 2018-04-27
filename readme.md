Laravel Türkiye Paketi 🇹🇷
==========

![](https://travis-ci.org/aozisik/laravel-turkiye.svg?branch=master)

Türkiye'ye hizmet eden Laravel uygulamalarınız için doğrulama yardımcıları içerir. Türkçe dil yardımcıları ayrı bir pakete taşınmıştır:
* [https://github.com/aozisik/turkce](https://github.com/aozisik/turkce)


## Kurulum

Laravel 5.* kullanan projenize eklemek için:
	
	composer require aozisik/laravel-turkiye

Laravel 5.5 sürümünü kullanıyorsanız, paketin kurulumu otomatik tamamlanacaktır.
Eğer daha eski bir sürüm kullanıyorsanız, aşağıdaki satırı app/config.php dosyanızda ilgili yere ekleyin.

	Aozisik\LaravelTurkiye\Providers\TurkiyeServiceProvider::class,
	
## Doğrulama

#### TC Kimlik No Doğrulama

Girilen TC kimlik numarasını uzunluk ve matematiksel özellikleri yönünden değerlendirir.

	$this->validate($request, ['kimlik_no' => 'required|tckn']);

#### Vergi Kimlik No Doğrulama

Girilen Vergi kimlik numarasını uzunluk ve matematiksel özellikleri yönünden 
değerlendirir.

	$this->validate($request, ['vergi_no' => 'required|vkn']);

## Katkıda Bulunma

Bu paket Türkçe Laravel uygulamalarında ihtiyaç duyulabilecek özellikleri kullanışlı ve kolay erişilebilir bir şekilde sunmak için oluşturuldu. Faydalı olacağını düşündüğünüz eklemeleri testleriyle birlikte gönderirseniz mutlu oluruz.
