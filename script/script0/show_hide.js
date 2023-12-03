// Lấy tham chiếu đến các phần tử HTML cần sử dụng
const showButton = document.getElementById('showButton');
const hideButton = document.getElementById('hideButton');
const quickReview = document.getElementById('quick-review');

// Thêm sự kiện click cho nút "Hiện"
showButton.addEventListener('click', function() {
    quickReview.style.display = 'block'; // Hiện đoạn mã HTML
});

// Thêm sự kiện click cho nút "Ẩn"
hideButton.addEventListener('click', function() {
    quickReview.style.display = 'none'; // Ẩn đoạn mã HTML
});

