# 🌐 PT. Smart CRM System

**Customer Relationship Management System untuk Internet Service Provider**

---

## 📋 Daftar Isi

-   [Latar Belakang](#-latar-belakang)
-   [Tujuan Sistem](#-tujuan-sistem)
-   [Fitur Utama](#-fitur-utama)
-   [Role & Hak Akses](#-role--hak-akses)
-   [Alur Sistem](#-alur-sistem)
-   [Diagram Sistem](#-diagram-sistem)
-   [Struktur Database](#-struktur-database)
-   [Data Dictionary](#-data-dictionary)

---

## 🏢 Latar Belakang

**PT. Smart** adalah perusahaan Internet Service Provider (ISP) yang bergerak dalam bidang penyediaan layanan internet untuk pelanggan residensial dan bisnis. Sebagai perusahaan yang berkembang pesat, PT. Smart menghadapi tantangan dalam mengelola proses bisnis yang masih berjalan secara semi konvensional.

### Permasalahan yang Dihadapi:

1. **Pencatatan Manual**: Divisi sales masih melakukan pencatatan data lead, customer, dan penjualan secara manual menggunakan spreadsheet
2. **Proses Approval Tidak Terstruktur**: Mekanisme persetujuan project dari manager belum terintegrasi dengan sistem
3. **Data Tersebar**: Informasi lead, customer, dan layanan tersimpan di berbagai file terpisah
4. **Tracking Sulit**: Sulit melacak progress dari lead hingga menjadi customer aktif
5. **Reporting Manual**: Pembuatan laporan memakan waktu lama dan rentan error

### Solusi yang Dibutuhkan:

Sistem CRM berbasis web yang dapat mengintegrasikan seluruh proses dari lead management hingga customer subscription dengan mekanisme approval yang terstruktur.

---

## 🎯 Tujuan Sistem

### Tujuan Utama:

-   **Digitalisasi Proses Bisnis**: Mengubah proses manual menjadi digital dan terintegrasi
-   **Meningkatkan Efisiensi**: Mempercepat proses dari lead hingga customer conversion
-   **Kontrol Kualitas**: Memastikan setiap project melalui approval manager sebelum eksekusi
-   **Centralized Data**: Menyatukan semua data customer dan layanan dalam satu sistem

### Tujuan Khusus:

1. Membantu divisi Sales dalam mengelola lead dan project secara efisien
2. Memberikan mekanisme approval yang terstruktur untuk Manager
3. Menyediakan dashboard untuk monitoring performa sales dan customer
4. Mengotomatisasi proses konversi lead menjadi customer aktif
5. Menyediakan laporan real-time untuk decision making

---

## ⚡ Fitur Utama

### 🔐 1. Sistem Autentikasi

-   **Login Multi-Role**: Sistem login dengan pembagian hak akses berdasarkan role
-   **Session Management**: Pengelolaan sesi user yang aman
-   **Demo Accounts**: Tersedia akun demo untuk testing

### 👥 2. Lead Management

-   **Input Lead Baru**: Form lengkap untuk mencatat prospective customer
-   **Data Lead Komprehensif**: Nama, email, phone, alamat, status, dan catatan
-   **Status Tracking**: Cold, Warm, Hot, Qualified, In Project, Lost
-   **Lead Profile**: Halaman detail lengkap setiap lead

### 📦 3. Master Layanan Internet

-   **Katalog Layanan**: Daftar lengkap paket internet yang tersedia
-   **Detail Paket**: Nama layanan, kecepatan, harga, deskripsi, dan fitur
-   **Management Layanan**: CRUD operations untuk layanan internet
-   **Status Layanan**: Active/Inactive untuk kontrol availability

### 🚀 4. Project Management dengan Approval

-   **Pembuatan Project**: Konversi lead menjadi project dengan pemilihan layanan
-   **Submit untuk Approval**: Mekanisme pengajuan project ke manager
-   **Review Project**: Interface untuk manager melakukan review
-   **Approval/Rejection**: Sistem approve/reject dengan catatan manager
-   **Status Tracking**: Draft → Pending → Approved/Rejected → Converted

### 👨‍💼 5. Customer Management

-   **Customer Profile**: Data lengkap customer yang sudah berlangganan
-   **Customer Code**: Sistem kode unik untuk setiap customer
-   **Subscription History**: Riwayat langganan dan layanan aktif
-   **Customer Analytics**: Statistik dan informasi customer

### 📊 6. Dashboard & Reporting

-   **Sales Dashboard**: Overview performa sales dan statistik
-   **Manager Dashboard**: Monitoring project pending dan approved
-   **Quick Actions**: Shortcut untuk operasi yang sering dilakukan
-   **Recent Activity**: Timeline aktivitas terbaru sistem

---

## 👤 Role & Hak Akses

### 🏷️ **Sales User**

**Credentials**: `sales@demo.com` / `password`

**Hak Akses**:

-   ✅ **Dashboard**: Akses penuh ke dashboard sales
-   ✅ **Leads**: Create, Read, Update, Delete lead
-   ✅ **Projects**: Create project dari lead, submit untuk approval
-   ✅ **Customers**: Read-only access untuk melihat customer
-   ✅ **Services**: Read-only access untuk melihat layanan

**Workflow**:

1. Input dan kelola data lead
2. Membuat project dari lead yang qualified
3. Submit project untuk approval manager
4. Menerima notifikasi hasil approval
5. Follow-up customer setelah approval

### 👔 **Manager User**

**Credentials**: `manager@demo.com` / `password`

**Hak Akses**:

-   ✅ **Dashboard**: Akses penuh ke dashboard manager
-   ✅ **Projects**: Review, approve, atau reject project
-   ✅ **Customers**: Full access untuk monitoring customer
-   ✅ **Services**: Full access untuk mengelola layanan
-   ❌ **Leads**: Tidak ada akses (separation of duties)

**Workflow**:

1. Review project yang disubmit sales
2. Analisis kelayakan project dan customer
3. Approve atau reject dengan catatan
4. Monitoring customer dan revenue
5. Mengelola master data layanan

### 🔒 **Separation of Duties**

-   **Sales** fokus pada lead generation dan project creation
-   **Manager** fokus pada approval dan strategic decision
-   **Tidak ada overlap** dalam pengelolaan data untuk menjaga integritas

---

## 🔄 Alur Sistem

### **Workflow Utama: Lead → Project → Approval → Customer → Subscription**

```
1. LEAD GENERATION
   Sales Input Lead → Lead Profile Created → Status: Cold/Warm/Hot

2. LEAD QUALIFICATION
   Sales Follow-up → Lead Status: Qualified → Ready for Project

3. PROJECT CREATION
   Sales Create Project → Select Services → Calculate Revenue → Status: Draft

4. PROJECT SUBMISSION
   Sales Submit Project → Status: Pending → Notification to Manager

5. MANAGER REVIEW
   Manager Review Project → Analyze Revenue & Services → Decision

6. APPROVAL PROCESS
   ├── APPROVED → Lead Converted to Customer → Subscriptions Created
   └── REJECTED → Back to Sales with Manager Notes

7. CUSTOMER ACTIVATION
   Customer Profile Created → Customer Code Generated → Services Activated

8. SUBSCRIPTION MANAGEMENT
   Active Subscriptions → Monthly Billing → Customer Relationship
```

### **Detailed Process Flow**:

#### **Phase 1: Lead Management**

-   Sales input data calon customer (lead)
-   Kategorisasi berdasarkan potensi (Cold/Warm/Hot)
-   Follow-up dan nurturing lead
-   Kualifikasi lead yang siap menjadi customer

#### **Phase 2: Project Development**

-   Pembuatan project dari qualified lead
-   Pemilihan paket layanan internet yang sesuai
-   Kalkulasi revenue dan pricing
-   Persiapan proposal untuk customer

#### **Phase 3: Approval Workflow**

-   Submit project ke manager untuk review
-   Manager analisis kelayakan bisnis
-   Keputusan approve/reject dengan justifikasi
-   Notifikasi hasil ke sales

#### **Phase 4: Customer Conversion**

-   Otomatis konversi lead menjadi customer (jika approved)
-   Generate customer code unik
-   Aktivasi subscription layanan
-   Setup billing dan contract

---

## 📊 Diagram Sistem

Diagram sistem dapat diakses melalui link berikut:

**🔗 [System Diagrams](https://drive.google.com/file/d/1XBDM5qLE9YsH6Q4O4C7TG-1lEyHbkfWW/view?usp=sharing)**

Diagram yang tersedia:

-   **Activity Diagram**: Menggambarkan alur aktivitas sistem dari lead hingga customer conversion
-   **Sequence Diagram**: Menunjukkan interaksi antar komponen dalam proses approval workflow

---

## 🗄️ Struktur Database

### **Tabel Inti Sistem**

#### **1. users**

```sql
- id (Primary Key)
- name (VARCHAR) - Nama lengkap user
- email (VARCHAR, UNIQUE) - Email login
- password (VARCHAR) - Encrypted password
- role (ENUM: 'sales', 'manager') - Role user
- created_at, updated_at (TIMESTAMP)
```

#### **2. leads**

```sql
- id (Primary Key)
- name (VARCHAR) - Nama calon customer
- email (VARCHAR) - Email lead
- phone (VARCHAR) - Nomor telepon
- address (TEXT) - Alamat lengkap
- status (ENUM: 'cold', 'warm', 'hot', 'qualified', 'in_project', 'lost')
- description (TEXT) - Catatan tambahan
- created_at, updated_at (TIMESTAMP)
```

#### **3. services**

```sql
- id (Primary Key)
- name (VARCHAR) - Nama layanan internet
- speed (VARCHAR) - Kecepatan (contoh: "100Mbps")
- price (DECIMAL) - Harga bulanan
- description (TEXT) - Deskripsi layanan
- features (TEXT) - Fitur-fitur layanan
- is_active (BOOLEAN) - Status aktif/nonaktif
- created_at, updated_at (TIMESTAMP)
```

#### **4. projects**

```sql
- id (Primary Key)
- lead_id (Foreign Key → leads.id)
- status (ENUM: 'draft', 'pending', 'approved', 'rejected', 'converted')
- description (TEXT) - Deskripsi project
- submitted_at (TIMESTAMP) - Waktu submit
- approved_at (TIMESTAMP) - Waktu approval
- reviewed_by (Foreign Key → users.id) - Manager yang review
- manager_note (TEXT) - Catatan manager
- created_at, updated_at (TIMESTAMP)
```

#### **5. project_services**

```sql
- id (Primary Key)
- project_id (Foreign Key → projects.id)
- service_id (Foreign Key → services.id)
- price_snapshot (DECIMAL) - Harga saat project dibuat
- created_at, updated_at (TIMESTAMP)
```

#### **6. customers**

```sql
- id (Primary Key)
- lead_id (Foreign Key → leads.id)
- customer_code (VARCHAR, UNIQUE) - Kode customer unik
- name (VARCHAR) - Nama customer
- email (VARCHAR) - Email customer
- phone (VARCHAR) - Nomor telepon
- address (TEXT) - Alamat lengkap
- subscribed_at (TIMESTAMP) - Tanggal berlangganan
- created_at, updated_at (TIMESTAMP)
```

#### **7. subscriptions**

```sql
- id (Primary Key)
- customer_id (Foreign Key → customers.id)
- service_id (Foreign Key → services.id)
- start_date (DATE) - Tanggal mulai langganan
- status (ENUM: 'active', 'suspended', 'terminated')
- created_at, updated_at (TIMESTAMP)
```

### **Relasi Antar Tabel**:

-   **One-to-Many**: leads → projects, projects → project_services
-   **Many-to-Many**: projects ↔ services (via project_services)
-   **One-to-One**: leads → customers
-   **One-to-Many**: customers → subscriptions

---

## 📚 Data Dictionary

### **Dummy Database**

Sistem dilengkapi dengan file dump database (`dump-endrico_crm-202512160826.sql`) yang berisi:

#### **Sample Data**:

-   **5 Lead Records**: Berbagai status dari cold hingga qualified
-   **4 Service Packages**: Paket internet dengan variasi speed dan harga
-   **6 Project Records**: Dalam berbagai tahap approval
-   **2 User Accounts**: Sales dan Manager untuk testing
-   **Sample Customers**: Customer yang sudah terkonversi
-   **Active Subscriptions**: Langganan aktif untuk testing

#### **Data Seeding**:

```php
// UserSeeder.php
- sales@demo.com (Role: Sales)
- manager@demo.com (Role: Manager)

// DummyDataSeeder.php
- Sample leads dengan berbagai karakteristik
- Paket layanan internet realistis
- Project dalam berbagai status
- Customer dengan subscription aktif
```

### **Konfigurasi Database**:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=endrico_crm
DB_USERNAME=postgres
DB_PASSWORD=
```

---

## 🛠️ Tech Stack

### **Backend Framework**

-   **Laravel 11.x**: PHP framework dengan arsitektur MVC
-   **PHP 8.3+**: Server-side programming language
-   **Composer**: Dependency management untuk PHP

### **Database**

-   **PostgreSQL 14+**: Primary database (production-ready)
-   **SQLite**: Development database (included)
-   **Eloquent ORM**: Database abstraction layer

### **Frontend**

-   **Blade Templates**: Laravel's templating engine
-   **Tailwind CSS**: Utility-first CSS framework
-   **Alpine.js**: Lightweight JavaScript framework
-   **Vite**: Modern build tool dan asset bundling

### **Development Tools**

-   **DBeaver**: Database administration tool
-   **Draw.io**: System diagram creation
-   **Artisan CLI**: Laravel command-line interface
-   **Tinker**: Laravel REPL untuk testing

### **Authentication & Security**

-   **Laravel Breeze**: Authentication scaffolding
-   **CSRF Protection**: Cross-site request forgery protection
-   **Password Hashing**: Bcrypt encryption
-   **Session Management**: Secure session handling

### **Additional Libraries**

-   **Carbon**: Date manipulation library
-   **Faker**: Test data generation
-   **PHPUnit**: Unit testing framework

---

## 🚀 Cara Menjalankan Aplikasi

### **Prerequisites**

```bash
- PHP >= 8.3
- Composer
- PostgreSQL >= 14 (atau SQLite untuk development)
- Node.js & NPM (untuk asset compilation)
```

### **1. Clone Repository**

```bash
git clone [repository-url]
cd pt-smart-crm
```

### **2. Install Dependencies**

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### **3. Environment Setup**

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### **4. Database Configuration**

Edit file `.env`:

```env
APP_NAME="PT. Smart"
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=endrico_crm
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### **5. Database Setup**

```bash
# Create database
createdb endrico_crm

# Run migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed
```

### **6. Asset Compilation**

```bash
# Development
npm run dev

# Production
npm run build
```

### **7. Start Application**

```bash
# Start development server
php artisan serve

# Access application
http://localhost:8000
```

### **8. Login Credentials**

```
Sales Account:
Email: sales@demo.com
Password: password

Manager Account:
Email: manager@demo.com
Password: password
```

### **Optional: Import Sample Database**

```bash
# Import provided SQL dump
psql -U postgres -d endrico_crm -f dump-endrico_crm-202512160826.sql
```

---
