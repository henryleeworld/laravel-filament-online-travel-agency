# Laravel 12 Filament 線上旅行社

Filament 線上旅行社採用快速建立簡捷的 TALL（Tailwind CSS、Alpine.js、Laravel 和 Livewire）堆疊應用程式的工具組，公寓、飯店因線上旅行社（OTA）能帶來可觀的流量而選擇與其建立合作關係，以增加曝光度、提升聲譽、填補住房淡季、提高銷售額、獲得競爭優勢等，對於旅客來說，住宿的價格是決定旅程的首要考量，但疫情讓旅程取消的彈性重視度緊隨其後。

## 使用方式
- 打開 php.ini 檔案，啟用 PHP 擴充模組 intl 和 zip，並重啟服務器。
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/admin/login` 來進行登入，預設的電子郵件和密碼分別為 __admin@admin.com__ 和 __password__ 。

----

## 畫面截圖
![](https://i.imgur.com/e0dY80Z.png)
> 面對的挑戰不僅僅是市場的激烈競爭，還有旅遊淡旺季、政策、疫情及成本等因素的考量

![](https://i.imgur.com/uzc6fKc.png)
> 在受理預訂之後，就會為預訂的顧客保留房間，但若是預訂被突然取消，原本預訂的客房就會變成空房，導致原本應該獲得的收益歸零，對於業主而言就是經營上的財物損失
