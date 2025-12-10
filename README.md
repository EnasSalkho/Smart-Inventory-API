📦 Smart Inventory Management API

Smart Inventory API هو نظام إدارة مخزون احترافي مبني باستخدام Laravel، يوفر طريقة مرنة وآمنة لإدارة التصنيفات، المنتجات، كميات المخزون، وتتبع عمليات الإدخال والإخراج مع دعم التنبيهات عند انخفاض المخزون.

المشروع يعتبر تدريب عملي كامل لبناء RESTful API باستخدام Laravel 11، JWT، Events، Seeders، Resources، وBest Practices.

🚀 Features
🔐 Authentication (JWT)

تسجيل مستخدم جديد

تسجيل الدخول

تسجيل الخروج

حماية المسارات باستخدام JWT Middleware

🗂 Categories Module

إنشاء تصنيف جديد

تعديل تصنيف

عرض قائمة التصنيفات مع Pagination

حذف تصنيف

التحقق من المدخلات عبر Form Requests

استخدام CategoryResource لإرجاع البيانات

📦 Products Module

إضافة منتج

تعديل منتج

حذف منتج

عرض جميع المنتجات مع بيانات التصنيف

حساب حالة المخزون (Low Stock)

إطلاق Event عند تحديث الكمية

ProductResource + Requests + Seeders

🔁 Stock Transactions

إدخال مخزون (Stock In)

إخراج مخزون (Stock Out) مع منع السحب الزائد

تسجيل العمليات في جدول transactions

عرض تاريخ العمليات لمنتج محدد

StockTransactionResource

🔔 Events System

Event: StockUpdated

جاهز لربطه بـ Notifications أو Listeners لاحقاً

🧪 Seeders & Factories

Category Factory + Seeder

Product Factory + Seeder

StockTransaction Factory + Seeder

بناء بيانات تجريبية كاملة بضغطة واحدة

▶️ كيفية تشغيل المشروع (Installation Guide)
1️⃣ استنساخ المشروع
git clone https://github.com/username/smart-inventory-api.git
cd smart-inventory-api

2️⃣ تثبيت الحزم
composer install

3️⃣ إنشاء ملف البيئة
cp .env.example .env

4️⃣ توليد مفتاح التطبيق
php artisan key:generate

5️⃣ إعداد قاعدة البيانات

حدّث إعدادات MySQL في ملف .env:

DB_DATABASE=inventory
DB_USERNAME=root
DB_PASSWORD=

6️⃣ تشغيل الميجريشن + السييدرز
php artisan migrate --seed

7️⃣ توليد JWT Secret
php artisan jwt:secret

8️⃣ تشغيل السيرفر
php artisan serve

🧪 Postman Collection

ملف التجربة موجود داخل:

/postman/SmartInventoryAPI.postman_collection.json


يمكن استيراده في Postman لتجربة جميع الواجهات.

📡 API Endpoints
🔐 Authentication
Method	Endpoint	Description
POST	/register	إنشاء مستخدم
POST	/login	تسجيل الدخول
POST	/logout	تسجيل الخروج
🗂 Categories
Method	Endpoint	Action
GET	/categories	قائمة التصنيفات
POST	/categories	إضافة
GET	/categories/{id}	عرض
PUT	/categories/{id}	تعديل
DELETE	/categories/{id}	حذف
📦 Products
Method	Endpoint	Action
GET	/products	عرض جميع المنتجات
POST	/products	إضافة
GET	/products/{id}	عرض
PUT	/products/{id}	تعديل
DELETE	/products/{id}	حذف
🔁 Stock
Method	Endpoint	Action
POST	/stock/in	إدخال مخزون
POST	/stock/out	إخراج مخزون
GET	/stock/history?product_id=1	تاريخ العمليات
👩‍💻 Author

Enas — Backend Laravel Developer
مشروع تدريبي كامل لإنشاء API متكامل واحترافي.

⭐ إذا أعجبك المشروع، لا تنسَ ترك Star! ⭐
