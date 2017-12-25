Laravel Türkiye Paketi 🇹🇷
==========

![](https://travis-ci.org/aozisik/laravel-turkiye.svg?branch=master)

Türkiye'ye hizmet eden Laravel uygulamalarınız için doğrulama ve dil yardımcıları içerir.

Laravel 5.* kullanan projenize eklemek için:
	
	composer require aozisik/laravel-turkiye

Laravel 5.5 sürümünü kullanıyorsanız, paketin kurulumu otomatik tamamlanacaktır.
Eğer daha eski bir sürüm kullanıyorsanız, aşağıdaki satırı app/config.php dosyanızda ilgili yere ekleyin.

	Aozisik\Turkiye\Providers\TurkiyeServiceProvider::class,
	
	
## Doğrulama

#### TC Kimlik No Doğrulama

Girilen TC kimlik numarasını uzunluk ve matematiksel özellikleri yönünden değerlendirir.

	$this->validate($request, ['kimlik_no' => 'required|tckn']);

#### Vergi Kimlik No Doğrulama

Girilen Vergi kimlik numarasını uzunluk ve matematiksel özellikleri yönünden 
değerlendirir.

	$this->validate($request, ['vergi_no' => 'required|vkn']);


## Dil Yardımcıları


#### İyelik ve Hâl Ekleri

İsimlerin yanına gelen ekleri koda gömdüğünüzde "Ahmet'nin" veya "Hikmet'ye" gibi Türkçe'ye uygun olmayan ve hiç doğal gözükmeyen bir sonuç elde edersiniz. Bu pakette gelen `ek` fonksiyonu tam olarak bu sorunu çözer.

	ek('İstanbul')->den(); // "İstanbul'dan"
	ek('Hatice')->i(); // "Hatice'yi"
	ek('Kemal')->in(); // "Kemal'in"
	ek('Kazım')->e(); // "Kazım'a"
	ek('Asu')->de(); // "Asu'da"

Kullanılabilen ekler:

* `i` (belirtme)
* `e` (yönelme)
* `de` (bulunma)
* `den` (ayrılma)
* `in` (iyelik)


#### Büyük-Küçük Harf Dönüştürme

I ve i harfleri büyük-küçük harfe dönüştürülürken i ve I oluyor. Bu sinir bozucu problem için üç adet basit global fonksiyon sunuyoruz.

	tr_strtolower('İZMİRİN ILIK İLKBAHARLARI'); // izmirin ılık ilkbaharları
	tr_strtoupper('izmirin ılık ilkbaharları'); // İZMİRİN ILIK İLKBAHARLARI
	tr_ucwords('izmirin ılık ilkbaharları'); // İzmirin Ilık İlkbaharları
	
## Katkıda Bulunma

Bu paket Türkçe Laravel uygulamalarında ihtiyaç duyulabilecek özellikleri kullanışlı ve kolay erişilebilir bir şekilde sunmak için oluşturuldu. Faydalı olacağını düşündüğünüz eklemeleri testleriyle birlikte gönderirseniz mutlu oluruz.
