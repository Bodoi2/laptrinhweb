<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validate and Submit</title>
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form id="bookForm" method="post" action="bai1buoi3clientkq.php">
            <div class="form-group">
                <label for="bookTitle">Tên sách:</label>
                <input type="text" id="bookTitle" name="bookTitle">
                <span class="error" id="bookTitleError"></span>
            </div>
            <div class="form-group">
                <label for="author">Tác giả:</label>
                <input type="text" id="author" name="author">
                <span class="error" id="authorError"></span>
            </div>
            <div class="form-group">
                <label for="publisher">Nhà xuất bản:</label>
                <input type="text" id="publisher" name="publisher">
                <span class="error" id="publisherError"></span>
            </div>
            <div class="form-group">
                <label for="publishYear">Năm xuất bản:</label>
                <input type="number" id="publishYear" name="publishYear">
                <span class="error" id="publishYearError"></span>
            </div>
            <button type="submit">Gửi</button>
        </form>
    </div>

    <script>
        document.getElementById('bookForm').addEventListener('submit', function(event) {
            let isValid = true;
            
            
            document.getElementById('bookTitleError').textContent = '';
            document.getElementById('authorError').textContent = '';
            document.getElementById('publisherError').textContent = '';
            document.getElementById('publishYearError').textContent = '';
            
            
            const bookTitle = document.getElementById('bookTitle').value.trim();
            const titleRegex = /^[a-zA-Z0-9\s'.,-]{3,}$/;
            if (bookTitle === '' || !titleRegex.test(bookTitle)) {
                document.getElementById('bookTitleError').textContent = 'Tên sách phải có ít nhất 3 ký tự và không chứa ký tự đặc biệt.';
                isValid = false;
            }
            
            
            const author = document.getElementById('author').value.trim();
            const authorRegex = /^[a-zA-Z\s'-]{3,}$/;
            if (author === '' || !authorRegex.test(author)) {
                document.getElementById('authorError').textContent = 'Tên tác giả phải có ít nhất 3 ký tự và chỉ chứa chữ cái.';
                isValid = false;
            }
            
            
            const publisher = document.getElementById('publisher').value.trim();
            const publisherRegex = /^[a-zA-Z0-9\s'.,-]{3,}$/;
            if (publisher === '' || !publisherRegex.test(publisher)) {
                document.getElementById('publisherError').textContent = 'Nhà xuất bản phải có ít nhất 3 ký tự và không chứa ký tự đặc biệt.';
                isValid = false;
            }
            
            
            const publishYear = document.getElementById('publishYear').value.trim();
            if (publishYear === '' || isNaN(publishYear) || publishYear < 1000 || publishYear > new Date().getFullYear()) {
                document.getElementById('publishYearError').textContent = 'Năm xuất bản không hợp lệ.';
                isValid = false;
            }
            
            
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
