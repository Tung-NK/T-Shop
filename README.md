# T-Shop E-Commerce

<table align="center">
  <tr>
    <td align="center">
      <a href="https://laravel.com" target="_blank" rel="noopener noreferrer">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" alt="Laravel Logo" height="100" />
      </a>
    </td>
    <td align="center" style="font-size: 40px;">+</td>
    <td align="center">
      <a href="https://vuejs.org" target="_blank" rel="noopener noreferrer">
        <img src="https://vuejs.org/images/logo.png" alt="Vue.js Logo" height="100" />
      </a>
    </td>
  </tr>
</table>


## Giới thiệu về T-Shop

Chào mừng bạn đến với **T-Shop**, một dự án thương mại điện tử đơn giản được xây dựng nhằm nâng cao kỹ năng lập trình của tôi. 

T-Shop là nền tảng mua sắm quần áo trực tuyến, được phát triển bởi tôi - **TungNK** với mục tiêu học hỏi và thực hành công nghệ hiện đại. Kết hợp sức mạnh của **Laravel 10** ở phía backend và **Vue.js 3** ở phía frontend, tạo nên một hệ thống mạnh mẽ, bảo mật và dễ dàng mở rộng.

Giao diện thân thiện, tốc độ mượt mà và chức năng cơ bản giúp tôi rèn luyện khả năng xây dựng các ứng dụng web thực tế. Rất mong nhận được góp ý từ bạn để dự án ngày càng hoàn thiện hơn!

## Hướng dẫn chạy dự án

### 1. Yêu cầu tối thiểu
Để chạy dự án T-Shop, bạn cần cài đặt các phần mềm và công cụ sau:

- **PHP**: Phiên bản 8.1 trở lên
- **Composer**: Quản lý thư viện cho PHP
- **Node.js**: Phiên bản 16.x trở lên
- **NPM** hoặc **Yarn**: Quản lý thư viện cho JavaScript
- **MySQL** hoặc **MariaDB**: Cơ sở dữ liệu
- **Git**: Để clone mã nguồn
- Máy chủ web (khuyến nghị **Apache** hoặc **Nginx**) nếu chạy trên môi trường production

### 2. Hướng dẫn chạy Backend (Laravel)
1. **Clone dự án**:
   ```bash
   git clone <repository-url>
   cd ecommerce/backend
   ```

2. **Cài đặt thư viện**:
   ```bash
   composer install
   ```

3. **Cấu hình môi trường**:
   - Sao chép file `.env.example` thành `.env`:
     ```bash
     cp .env.example .env
     ```
   - Cập nhật các thông tin trong file `.env`, bao gồm:
     - Kết nối cơ sở dữ liệu (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`)
     - Các biến môi trường khác nếu cần

4. **Tạo key ứng dụng**:
   ```bash
   php artisan key:generate
   ```

5. **Chạy migration và seeder** (nếu có):
   ```bash
   php artisan migrate --seed
   ```

6. **Khởi động server**:
   ```bash
   php artisan serve
   ```
   Backend sẽ chạy mặc định tại `http://localhost:8000`.

### 3. Hướng dẫn chạy Frontend (Vue.js)
1. **Di chuyển đến thư mục frontend**:
   ```bash
   cd ../frontend
   ```

2. **Cài đặt thư viện**:
   ```bash
   npm install
   ```
   Hoặc nếu dùng Yarn:
   ```bash
   yarn install
   ```

3. **Cấu hình API**:
   - Đảm bảo backend đang chạy.
   - Cập nhật URL của backend trong file cấu hình Vue (thường là `src/config.js` hoặc `.env`):
     ```env
     VUE_APP_API_URL=http://localhost:8000/api
     ```

4. **Chạy ứng dụng**:
   ```bash
   npm run dev
   ```
   Hoặc nếu dùng Yarn:
   ```bash
   yarn.cmd dev
   ```
   Frontend sẽ chạy mặc định tại `http://localhost:5173`.

## Lời kết

Dự án T-Shop là tâm huyết của tôi, được xây dựng với mong muốn học hỏi thêm phát triển thêm kĩ năng lập trình. Nếu bạn có bất kỳ câu hỏi hoặc góp ý, đừng ngần ngại liên hệ!

**Thân ái**  
**TungNK 😘**
