# 📚 Capstone Project Repository Library

An **online Capstone Project Repository Library** built for academic institutions to efficiently **store, manage, and browse student capstone projects**.

---

## 🚀 Features

- 📁 Upload and manage capstone documents
- 🔍 Search functionality for project titles
- 🎓 Categorization by course and year level
- 📱 Responsive UI with Bootstrap
- ⚙️ Supports both Docker and XAMPP environments

---

## 🛠️ Tech Stack

- **Backend**: PHP  
- **Database**: MySQL  
- **Frontend**: HTML, CSS, Bootstrap 3  
- **Asset Builder**: Yarn (Node.js)  
- **Environment**: Docker, XAMPP  

---

## 📦 Project Setup

### 📁 Environment Variables

Create a `.env` file in the root directory with the following:

```env
DB_HOST=localhost
DB_PORT=3306
DB_NAME=capstone_db
DB_USER=root
DB_PASSWORD=
```

---

## 🚀 How to Run

### 🔧 1. Install Frontend Dependencies
Before running the app, install frontend assets using:
```
yarn install
```
### 🐳 2. Run with Docker
```
docker-compose up -d --build
```
Access the application:  
App: `http://localhost:9000`  
Database: `localhost:3306`

### 3. Run with XAMPP
Place the project in your `htdocs` directory.  
Import the `capstone_db.sql` into phpMyAdmin.

