# 🏠 House Rental Management System

A modern, full-featured web application for managing properties and tenants. Built with **Laravel 12**, this system provides a robust interface for property owners to track houses and their occupants, complete with a RESTful API for external integration.

## ✨ Key Features

### 🏘️ Property Management
- **Dashboard View**: Visual grid layout of all properties with key details (address, bedrooms, year built).
- **CRUD Operations**: Full ability to create, read, update, and delete house records.
- **Occupancy Tracking**: Instantly view current tenants assigned to each property.

### 👥 Tenant Management
- **Tenant Directory**: Centralized list of all tenants and their rental status.
- **Assignment System**: Easily assign or transfer tenants between houses using a simple interface.
- **Profile Management**: Update tenant details and lease associations.

### 🔌 RESTful API
- **Full Coverage**: Comprehensive API endpoints for all house and tenant operations.
- **JSON Responses**: Standardized JSON output for seamless integration with mobile apps or third-party services.

---

## 🛠️ Technology Stack

- **Framework**: Laravel 12
- **Language**: PHP 8.2+
- **Database**: SQLite (Configurable for MySQL/PostgreSQL)
- **Frontend**: Blade Templates with Modern CSS (Glassmorphism design)
- **Scripting**: Python/PowerShell friendly API structure

---

## 🚀 Getting Started

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js & NPM

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/etxeen-alokairua.git
   cd etxeen-alokairua
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   Copy the example environment file and configure your database:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Migration & Seeding**
   This will set up the database schema and populate it with **7 sample houses** and **10 tenants**:
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Run the Application**
   ```bash
   php artisan serve
   ```
   Access the app at `http://localhost:8000` (or your configured local domain).

---

## 📖 Usage Guide

### Web Interface
- **Dashboard**: `http://your-domain/` - View all houses.
- **Tenants**: `http://your-domain/tenants` - Manage tenant records.

### API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| `GET` | `/api/houses` | List all houses with tenant info |
| `GET` | `/api/houses/{id}` | Get details of a specific house |
| `DELETE` | `/api/houses/{id}` | Delete a house |
| `GET` | `/api/tenants` | List all tenants |
| `PUT` | `/api/tenants/{id}` | Update tenant details/assignment |
| `DELETE` | `/api/tenants/{id}` | Remove a tenant |

**Example API Request (Update Tenant):**
```bash
curl -X PUT http://localhost:8000/api/tenants/1 \
  -H "Content-Type: application/json" \
  -d '{"name": "New Name", "house_id": 2}'
```

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
