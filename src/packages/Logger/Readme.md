# DB Paketi

### Genel Bakış
`Logger`  paketi, PHP'de basit bir şekilde log (günlük) işlemleri yapmanızı sağlar. Hataları ve özel mesajları dosyalara kaydetmeyi destekler.

### Kurulum

`Logger` sınıfını projenize dahil edin:
```php
require_once 'path/to/Logger.php';
```

### Kullanım

##### Başlatma

Log dosyalarının kaydedileceği yolu geçirerek `Logger` sınıfının bir örneğini oluşturun:

```php
$logger = new Logger('path/to/log/directory');
```

#### Metotlar

- **error**
  
  Bir hatayı loglar. Hata mesajı ve hatanın türü belirtilmelidir.
  ```php
  $logger->error('ExceptionType', 'Exception message goes here');
  ```

- **write**
  
  Bir eylemi ve mesajı loglar.
  ```php
  $logger->write('ActionType', 'Action message goes here');
  ```


# Lisans
Bu paket açık kaynaklıdır ve MIT Lisansı altında mevcuttur.