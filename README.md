# 🌟 OAS - Organizational Administration System  

**OAS** is a robust and scalable **FilamentPHP** starter kit designed to streamline the development of **admin panels**. This project is a **fork of [Kaido Kit](https://github.com/siubie/kaido-kit)**, incorporating additional optimizations, custom configurations, and enhanced features tailored for a **seamless developer experience**.

## 🎯 Purpose  

OAS aims to provide a **powerful, pre-configured foundation** for developers building administrative dashboards, management systems, and enterprise applications. It focuses on:  

✅ **Accelerated Development** – Prebuilt **FilamentPHP** components for rapid CRUD generation.  
✅ **Authentication & Authorization** – Role-Based Access Control (RBAC), **Google login**, **2FA**, and user impersonation.  
✅ **API-Ready** – Seamless **Filament API Service** integration for building scalable applications.  
✅ **Content & Media Management** – Integrated **Spatie Media Library** for handling images and files.  
✅ **Performance & Customization** – Optimized structure with flexible configuration options.  

---

## 🚀 Quick Start  

To set up OAS, follow the steps below:  

### 1️⃣ Clone the Repository  
```sh
git clone https://github.com/juniyasyos/OAS.git
cd OAS
```

### 2️⃣ Install Dependencies  
```sh
composer install && npm install
composer run post-update-cmd
```

### 3️⃣ Environment Setup  
```sh
composer run post-root-package-install
composer run post-create-project-cmd
```
Modify the `.env` file to configure your **database** and **third-party integrations**.  

### 4️⃣ Migrate Database  
```sh
composer run setup
```

### 5️⃣ Serve the Application  
```sh
composer run dev
```

---

## ⚙️ Key Features  

### 🏗️ **Developer-Friendly**  
- Pre-configured **FilamentPHP** for efficient admin panel creation.  
- Custom **stubs & utilities** for rapid development.  
- **Auto-reload & hot module replacement** for a smoother workflow.  

### 🔐 **Advanced Authentication & Authorization**  
- **RBAC (Role-Based Access Control)** using [Filament Shield](https://filamentphp.com/plugins/bezhansalleh-shield).  
- **Google OAuth Login** powered by [Filament Socialite](https://filamentphp.com/plugins/dododedodonl-socialite).  
- **Two-Factor Authentication (2FA)** support.  
- **User Impersonation** via [Filament Impersonate](https://filamentphp.com/plugins/joseph-szobody-impersonate).  

### 🔄 **API & Integration**  
- **REST API** support with [Filament API Service](https://filamentphp.com/plugins/rupadana-api-service).  
- Secure **API authentication & token management**.  
- **Resend Email Integration** for streamlined email sending.  

### 🖼️ **Media & Content Management**  
- **File & image handling** with [Spatie Media Library](https://spatie.be/docs/laravel-medialibrary).  
- **Dynamic settings management** with [Spatie Laravel Settings](https://github.com/spatie/laravel-settings).  
- **Drag & Drop File Uploads** with preview functionality.  

### ⚙️ **Performance & Customization**  
- Optimized **Tailwind CSS** theme for a clean UI.  
- **Modular design** with extendable configurations.  
- **Flexible panel settings** for easy customization.  

---

## 🔧 Configuration  

### **Database Configuration**  
Edit your `.env` file with your database credentials:  
```ini
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=oas
DB_USERNAME=postgres
DB_PASSWORD=
```

### **Google Authentication (Optional)**  
```ini
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=http://localhost:8000/admin/oauth/callback/google
```

### **Email Setup (Optional - Resend API)**  
```ini
MAIL_MAILER=resend
RESEND_API_KEY=
MAIL_FROM_ADDRESS="admin@domain.com"
MAIL_FROM_NAME="${APP_NAME}"
```

---

## 📢 Why Choose OAS?  

OAS builds upon **Kaido Kit** and **FilamentPHP**, offering a **production-ready** admin panel framework with:  
✔ **Seamless UI/UX** – Modern, polished, and intuitive admin interface.  
✔ **Enhanced Security** – Multi-factor authentication and robust access control.  
✔ **Scalability** – Designed to support enterprise-level applications.  
✔ **Developer Efficiency** – Focus on **building features**, not boilerplate code.  

---

## 🤝 Contributing  

We welcome contributions from the community! To contribute:  
1. **Fork the repository**  
2. **Create a feature branch** (`git checkout -b feature/amazing-feature`)  
3. **Commit your changes** (`git commit -m 'Add some amazing feature'`)  
4. **Push to the branch** (`git push origin feature/amazing-feature`)  
5. **Open a Pull Request**  

---

## 💬 Support & Community  

📌 **Issues & Bugs** – [Open an Issue](https://github.com/YOUR_USERNAME/OAS/issues)  
💡 **Feature Requests** – [Request a Feature](https://github.com/YOUR_USERNAME/OAS/issues)  
📧 **Contact** – [Email Support](mailto:your-email@example.com)  
💬 **FilamentPHP Community** – [Join the Discord](https://discord.com/invite/RwqXDUJGPg)  

---

## ⭐ Show Your Support  

If you find **OAS** useful, **give it a ⭐ on GitHub** and help spread the word! 🚀  
