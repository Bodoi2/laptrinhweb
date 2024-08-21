<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sách</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th {
            padding: 8px;
            text-align: center; 
        }
        td {
            padding: 8px;
        }
        td:nth-child(1) {
            text-align: center; 
        }
        td:nth-child(2), td:nth-child(3) {
            text-align: left; 
        }
        .pagination button {
            margin: 5px;
            padding: 5px 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<?php

$books = [];

for ($i = 1; $i <= 100; $i++) {
    $books[] = [
        'stt' => $i,
        'ten_sach' => 'Tensach' . $i,
        'noi_dung' => 'Noidung' . $i,
    ];
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$rows_per_page = 10;

$start = ($page - 1) * $rows_per_page;

$current_page_books = array_slice($books, $start, $rows_per_page);

$total_pages = ceil(count($books) / $rows_per_page);
?>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sách</th>
                <th>Nội dung sách</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($current_page_books as $book): ?>
                <tr>
                    <td><?php echo $book['stt']; ?></td>
                    <td><?php echo $book['ten_sach']; ?></td>
                    <td><?php echo $book['noi_dung']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php if ($page > 1): ?>
            <form method="get" style="display:inline;">
                <input type="hidden" name="page" value="<?php echo $page - 1; ?>">
                <button type="submit">Trang trước</button>
            </form>
        <?php endif; ?>

        <?php if ($page < $total_pages): ?>
            <form method="get" style="display:inline;">
                <input type="hidden" name="page" value="<?php echo $page + 1; ?>">
                <button type="submit">Trang sau</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
