# T-Shop E-Commerce

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo.svg" alt="Laravel Logo" width="100"/>
  <span style="font-size: 48px; margin: 0 20px;">+</span>
  <img src="https://vuejs.org/images/logo.png" alt="Vue.js Logo" width="100"/>
</p>

## Giới thiệu về T-Shop

Chào mừng bạn đến với **T-Shop**, nền tảng thương mại điện tử hiện đại và tinh tế, nơi mang đến trải nghiệm mua sắm quần áo trực tuyến đỉnh cao! T-Shop được thiết kế với giao diện thân thiện, tốc độ tải nhanh và tính năng vượt trội, giúp bạn dễ dàng khám phá và sở hữu những bộ sưu tập thời trang mới nhất. Dự án này được xây dựng từ tâm huyết của lập trình viên **Nguyễn Khắc Tùng**, kết hợp sức mạnh của **Laravel 10** ở phía backend và **Vue.js 3** ở phía frontend, tạo nên một hệ thống mạnh mẽ, bảo mật và dễ dàng mở rộng.

T-Shop không chỉ là một cửa hàng trực tuyến, mà còn là nơi truyền cảm hứng thời trang, giúp bạn tự tin thể hiện phong cách riêng. Hãy cùng khám phá ngay hôm nay!

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

Dự án T-Shop là tâm huyết của tôi, được xây dựng với mong muốn mang lại một trải nghiệm mua sắm trực tuyến tuyệt vời. Nếu bạn có bất kỳ câu hỏi hoặc góp ý, đừng ngần ngại liên hệ!

**Ký tên,**  
**Nguyễn Khắc Tùng**