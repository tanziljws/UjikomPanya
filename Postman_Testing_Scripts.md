# 🧪 Postman Testing Scripts untuk SMK Negeri 4 Gallery API

## 📋 Daftar Isi
1. [Setup Environment](#setup-environment)
2. [Authentication Testing](#authentication-testing)
3. [Gallery API Testing](#gallery-api-testing)
4. [Content API Testing](#content-api-testing)
5. [Agenda API Testing](#agenda-api-testing)
6. [Information API Testing](#information-api-testing)
7. [Admin API Testing](#admin-api-testing)
8. [User Management Testing](#user-management-testing)

---

## 🔧 Setup Environment

### Environment Variables
Buat environment baru di Postman dengan variabel berikut:

```json
{
  "base_url": "http://127.0.0.1:8000",
  "user_token": "",
  "admin_token": "",
  "user_id": "",
  "gallery_id": "",
  "content_id": "",
  "agenda_id": "",
  "information_id": ""
}
```

---

## 🔐 Authentication Testing

### 1. User Login - Pre-request Script
```javascript
// Pre-request Script untuk User Login
pm.test("Preparing user login data", function () {
    pm.environment.set("test_email", "onya@example.com");
    pm.environment.set("test_password", "123");
});
```

### 2. User Login - Test Script
```javascript
// Test Script untuk User Login
pm.test("Status code is 200", function () {
    pm.response.to.have.status(200);
});

pm.test("Response has success property", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
});

pm.test("Response has token", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.data).to.have.property('token');
    
    // Simpan token ke environment
    if (jsonData.data.token) {
        pm.environment.set("user_token", jsonData.data.token);
        pm.environment.set("user_id", jsonData.data.user.id);
    }
});

pm.test("User data is correct", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.data.user).to.have.property('name');
    pm.expect(jsonData.data.user).to.have.property('email');
    pm.expect(jsonData.data.user.email).to.eql("onya@example.com");
});
```

### 3. Admin Login - Test Script
```javascript
// Test Script untuk Admin Login
pm.test("Status code is 200", function () {
    pm.response.to.have.status(200);
});

pm.test("Response has success property", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
});

pm.test("Response has admin token", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.data).to.have.property('token');
    
    // Simpan admin token ke environment
    if (jsonData.data.token) {
        pm.environment.set("admin_token", jsonData.data.token);
    }
});

pm.test("Admin data is correct", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.data.admin).to.have.property('username');
    pm.expect(jsonData.data.admin.username).to.eql("admin");
});
```

---

## 🖼️ Gallery API Testing

### 1. Get Public Gallery - Test Script
```javascript
// Test Script untuk Get Public Gallery
pm.test("Status code is 200", function () {
    pm.response.to.have.status(200);
});

pm.test("Response has gallery data", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
    pm.expect(jsonData).to.have.property('data');
    pm.expect(jsonData.data).to.be.an('array');
});

pm.test("Pagination is correct", function () {
    var jsonData = pm.response.json();
    if (jsonData.pagination) {
        pm.expect(jsonData.pagination).to.have.property('current_page');
        pm.expect(jsonData.pagination).to.have.property('per_page');
        pm.expect(jsonData.pagination).to.have.property('total');
    }
});

pm.test("Gallery items have required fields", function () {
    var jsonData = pm.response.json();
    if (jsonData.data.length > 0) {
        var firstItem = jsonData.data[0];
        pm.expect(firstItem).to.have.property('id');
        pm.expect(firstItem).to.have.property('judul');
        pm.expect(firstItem).to.have.property('deskripsi');
        
        // Simpan ID galeri pertama untuk testing selanjutnya
        pm.environment.set("gallery_id", firstItem.id);
    }
});
```

### 2. Create Gallery Item - Test Script
```javascript
// Test Script untuk Create Gallery Item
pm.test("Status code is 201", function () {
    pm.response.to.have.status(201);
});

pm.test("Response has success message", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
    pm.expect(jsonData).to.have.property('message');
    pm.expect(jsonData.message).to.include('berhasil');
});

pm.test("Gallery item created with correct data", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData.data).to.have.property('judul');
    pm.expect(jsonData.data).to.have.property('deskripsi');
    pm.expect(jsonData.data).to.have.property('kategori');
    pm.expect(jsonData.data).to.have.property('status');
    
    // Simpan ID galeri baru untuk testing selanjutnya
    pm.environment.set("gallery_id", jsonData.data.id);
});
```

---

## 📚 Content API Testing

### 1. Get Public Content - Test Script
```javascript
// Test Script untuk Get Public Content
pm.test("Status code is 200", function () {
    pm.response.to.have.status(200);
});

pm.test("Response has content data", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
    pm.expect(jsonData).to.have.property('data');
    pm.expect(jsonData.data).to.be.an('array');
});

pm.test("Content items have required fields", function () {
    var jsonData = pm.response.json();
    if (jsonData.data.length > 0) {
        var firstItem = jsonData.data[0];
        pm.expect(firstItem).to.have.property('id');
        pm.expect(firstItem).to.have.property('title');
        pm.expect(firstItem).to.have.property('content');
        
        // Simpan ID content pertama untuk testing selanjutnya
        pm.environment.set("content_id", firstItem.id);
    }
});
```

### 2. Create Content - Test Script
```javascript
// Test Script untuk Create Content
pm.test("Status code is 201", function () {
    pm.response.to.have.status(201);
});

pm.test("Content created successfully", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
    pm.expect(jsonData.data).to.have.property('title');
    pm.expect(jsonData.data).to.have.property('type');
    pm.expect(jsonData.data).to.have.property('status');
    
    // Simpan ID content baru
    pm.environment.set("content_id", jsonData.data.id);
});
```

---

## 📅 Agenda API Testing

### 1. Get Public Agenda - Test Script
```javascript
// Test Script untuk Get Public Agenda
pm.test("Status code is 200", function () {
    pm.response.to.have.status(200);
});

pm.test("Response has agenda data", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
    pm.expect(jsonData).to.have.property('data');
    pm.expect(jsonData.data).to.be.an('array');
});

pm.test("Agenda items have required fields", function () {
    var jsonData = pm.response.json();
    if (jsonData.data.length > 0) {
        var firstItem = jsonData.data[0];
        pm.expect(firstItem).to.have.property('id');
        pm.expect(firstItem).to.have.property('title');
        pm.expect(firstItem).to.have.property('date');
        pm.expect(firstItem).to.have.property('time');
        
        // Simpan ID agenda pertama
        pm.environment.set("agenda_id", firstItem.id);
    }
});
```

### 2. Create Agenda - Test Script
```javascript
// Test Script untuk Create Agenda
pm.test("Status code is 201", function () {
    pm.response.to.have.status(201);
});

pm.test("Agenda created successfully", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
    pm.expect(jsonData.data).to.have.property('title');
    pm.expect(jsonData.data).to.have.property('date');
    pm.expect(jsonData.data).to.have.property('time');
    pm.expect(jsonData.data).to.have.property('location');
    
    // Simpan ID agenda baru
    pm.environment.set("agenda_id", jsonData.data.id);
});
```

---

## ℹ️ Information API Testing

### 1. Get Public Information - Test Script
```javascript
// Test Script untuk Get Public Information
pm.test("Status code is 200", function () {
    pm.response.to.have.status(200);
});

pm.test("Response has information data", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
    pm.expect(jsonData).to.have.property('data');
    pm.expect(jsonData.data).to.be.an('array');
});

pm.test("Information items have required fields", function () {
    var jsonData = pm.response.json();
    if (jsonData.data.length > 0) {
        var firstItem = jsonData.data[0];
        pm.expect(firstItem).to.have.property('id');
        pm.expect(firstItem).to.have.property('title');
        pm.expect(firstItem).to.have.property('content');
        pm.expect(firstItem).to.have.property('category');
        
        // Simpan ID information pertama
        pm.environment.set("information_id", firstItem.id);
    }
});
```

---

## 🔒 Admin API Testing

### 1. Get Admin Dashboard - Test Script
```javascript
// Test Script untuk Get Admin Dashboard
pm.test("Status code is 200", function () {
    pm.response.to.have.status(200);
});

pm.test("Response has dashboard data", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
    pm.expect(jsonData).to.have.property('data');
});

pm.test("Dashboard has all required sections", function () {
    var jsonData = pm.response.json();
    var data = jsonData.data;
    
    pm.expect(data).to.have.property('users');
    pm.expect(data).to.have.property('gallery');
    pm.expect(data).to.have.property('content');
    pm.expect(data).to.have.property('agenda');
    pm.expect(data).to.have.property('information');
});

pm.test("Statistics are numbers", function () {
    var jsonData = pm.response.json();
    var data = jsonData.data;
    
    pm.expect(data.users.total).to.be.a('number');
    pm.expect(data.gallery.total).to.be.a('number');
    pm.expect(data.content.total).to.be.a('number');
});
```

### 2. Get Admin Statistics - Test Script
```javascript
// Test Script untuk Get Admin Statistics
pm.test("Status code is 200", function () {
    pm.response.to.have.status(200);
});

pm.test("Response has statistics data", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
    pm.expect(jsonData).to.have.property('data');
});

pm.test("All statistics sections exist", function () {
    var jsonData = pm.response.json();
    var data = jsonData.data;
    
    pm.expect(data).to.have.property('users');
    pm.expect(data).to.have.property('gallery');
    pm.expect(data).to.have.property('content');
    pm.expect(data).to.have.property('agenda');
    pm.expect(data).to.have.property('information');
});
```

---

## 👥 User Management Testing

### 1. Get Users List - Test Script
```javascript
// Test Script untuk Get Users List
pm.test("Status code is 200", function () {
    pm.response.to.have.status(200);
});

pm.test("Response has users data", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
    pm.expect(jsonData).to.have.property('data');
    pm.expect(jsonData.data).to.be.an('array');
});

pm.test("Pagination exists", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('pagination');
    pm.expect(jsonData.pagination).to.have.property('current_page');
    pm.expect(jsonData.pagination).to.have.property('total');
});

pm.test("Users have required fields", function () {
    var jsonData = pm.response.json();
    if (jsonData.data.length > 0) {
        var firstUser = jsonData.data[0];
        pm.expect(firstUser).to.have.property('id');
        pm.expect(firstUser).to.have.property('name');
        pm.expect(firstUser).to.have.property('email');
        pm.expect(firstUser).to.have.property('role');
        pm.expect(firstUser).to.have.property('status');
    }
});
```

### 2. Create User - Test Script
```javascript
// Test Script untuk Create User
pm.test("Status code is 201", function () {
    pm.response.to.have.status(201);
});

pm.test("User created successfully", function () {
    var jsonData = pm.response.json();
    pm.expect(jsonData).to.have.property('success');
    pm.expect(jsonData.success).to.be.true;
    pm.expect(jsonData).to.have.property('message');
    pm.expect(jsonData.message).to.include('berhasil');
});

pm.test("User data is correct", function () {
    var jsonData = pm.response.json();
    var user = jsonData.data;
    
    pm.expect(user).to.have.property('name');
    pm.expect(user).to.have.property('email');
    pm.expect(user).to.have.property('role');
    pm.expect(user).to.have.property('status');
    
    // Simpan ID user baru
    pm.environment.set("user_id", user.id);
});
```

---

## 🧹 Cleanup Scripts

### Cleanup Environment Variables
```javascript
// Script untuk membersihkan environment variables setelah testing
pm.test("Cleanup environment", function () {
    // Hapus token setelah testing
    pm.environment.unset("user_token");
    pm.environment.unset("admin_token");
    
    // Hapus ID yang sudah tidak diperlukan
    pm.environment.unset("user_id");
    pm.environment.unset("gallery_id");
    pm.environment.unset("content_id");
    pm.environment.unset("agenda_id");
    pm.environment.unset("information_id");
    
    console.log("Environment variables cleaned up");
});
```

---

## 📊 Test Results Summary

### Success Criteria
- ✅ Status code sesuai (200, 201, 204, 422, 401, 403)
- ✅ Response format JSON yang benar
- ✅ Required fields ada dan sesuai tipe data
- ✅ Pagination berfungsi dengan benar
- ✅ Authentication dan authorization berfungsi
- ✅ CRUD operations berhasil
- ✅ Error handling berfungsi

### Common Test Patterns
1. **Status Code Testing**: Selalu test status code response
2. **Response Structure**: Test struktur JSON response
3. **Data Validation**: Test field yang required dan optional
4. **Authentication**: Test dengan dan tanpa token
5. **Error Handling**: Test dengan data invalid
6. **Pagination**: Test jika ada pagination
7. **Environment Variables**: Simpan data yang diperlukan untuk testing selanjutnya

---

## 🚀 Tips Testing

1. **Urutan Testing**: Mulai dari authentication, lalu public endpoints, baru admin endpoints
2. **Data Dependencies**: Gunakan ID dari response sebelumnya untuk testing update/delete
3. **Environment Variables**: Manfaatkan environment variables untuk menyimpan token dan ID
4. **Test Collections**: Buat test collection yang terorganisir per modul
5. **Automated Testing**: Gunakan Postman Monitors untuk automated testing
6. **Documentation**: Update API documentation berdasarkan hasil testing

---

## 📝 Notes

- Pastikan server Laravel berjalan di `http://127.0.0.1:8000`
- Database sudah di-migrate dan di-seed
- File storage sudah dikonfigurasi dengan benar
- CORS sudah dikonfigurasi jika testing dari domain berbeda
- Rate limiting sudah dikonfigurasi dengan tepat

Happy Testing! 🎉
