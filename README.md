# Product Module

A Laravel-based application for managing products.

---

## 🚀 Setup Instructions

Follow these steps to get the project running locally:

### 1. Clone the Repository

```bash
git clone https://github.com/RichmanLoveday/product_module.git
cd product_module
```

### 2. Install Dependencies

```bash
composer install
npm install
npm run dev
```

### 3. Configure Environment

Copy the example environment file and generate an application key:

```bash
cp .env.example .env
php artisan key:generate
```

Update your `.env` file with your database settings, for example:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=product_module
DB_USERNAME=root
DB_PASSWORD=
APP_URL=http://localhost:8000
```

### 4. Run Migrations and Seeders

```bash
php artisan migrate --seed
```

### 5. Start the Development Server

```bash
php artisan serve
```

---

## 🧪 Test Credentials

Use the following credentials to log in:

- **Email:** test@example.com
- **Password:** password

---

## 📦 Usage

- Users can register and log in.
- Authenticated users can create, view, update, and delete products.
- Each product belongs to a user.
- Image upload with preview functionality.

---

## 🚧 Possible Improvements

If given more time, the following enhancements could be added:

- **Role-based Access Control (RBAC):**  
    Add an admin role to manage all users and products. Restrict specific users from adding products or using the system.

- **Soft Deletes for Products:**  
    Allow restoring deleted items.

- **API Endpoints:**  
    Provide APIs for external or mobile app integration.

- **Pagination & Search Filters:**  
    Implement advanced search and pagination for large product lists.

---