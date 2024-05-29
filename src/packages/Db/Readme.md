#### Genel Bakış
`DB` paketi, PHP'de PDO kullanarak bir veritabanı ile etkileşimde bulunmanın basit ve verimli bir yolunu sağlar. Temel CRUD işlemlerini, sorgulamayı ve bir tablodaki kayıtları saymayı destekler.

#### Kurulum 

`DB` sınıfını projenize dahil edin:
```php
require_once 'path/to/DB.php';

```

#### Kullanım
##### Başlatma
Bağlantı dizesini, kullanıcı adını ve şifreyi geçirerek `DB`  sınıfının bir örneğini oluşturun:
```php
$db = new DB('mysql:host=your_host;dbname=your_db', 'your_username', 'your_password');
```
##### Metotlar
- **countTable**
  
  Belirtilen bir tablodaki kayıt sayısını döndürür.
  ```php
  $count = $db->countTable('your_table_name');
  ```
- **query**

  Opsiyonel koşullarla bir tablodan kayıtları getirir.
  ```php
    $results = $db->query('your_table_name', ['column1' => 'value1', 'column2' => 'value2']);
    ```
- **queryorder**

  Opsiyonel koşullarla ve sıralama ile bir tablodan kayıtları getirir.
    ```php
    $results = $db->queryorder('your_table_name', 'column_to_order', ['column1' => 'value1']);
    ```
- **queryAll**

    Opsiyonel koşullarla bir tablodan tüm kayıtları getirir.
   ```php
  $results = $db->queryAll('your_table_name', ['column1' => 'value1']);
    ```

- **insert**

    Bir tabloya yeni bir kayıt ekler.
   ```php
  $insertId = $db->insert('your_table_name', ['column1' => 'value1', 'column2' => 'value2']);
    ```

- **delete**

    Belirtilen koşullara göre bir tablodan kayıtları siler.
   ```php
  $rowCount = $db->delete('your_table_name', ['column1' => 'value1']);
    ```

- **update**

    Belirtilen koşullara göre bir tablodaki kayıtları günceller.
   ```php
  $success = $db->update('your_table_name', ['column1' => 'new_value'], 'column2 = value2');
    ```

# Lisans
Bu paket açık kaynaklıdır ve MIT Lisansı altında mevcuttur.
  