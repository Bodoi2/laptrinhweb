<?php 
// Biến kết nối toàn cục
global $conn;
 
// Hàm kết nối database
function connect_db() {
    global $conn;

    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn) {
        try {
            $conn = new PDO("mysql:host=sql110.infinityfree.com;dbname=if0_37127401_qlsinhvien;charset=utf8", "if0_37127401", "Tung12a52004");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $e) {
            die("Cannot connect to database: " . $e->getMessage());
        }
    }
}
 
// Hàm ngắt kết nối
function disconnect_db()
{
    global $conn;
    if ($conn) {
        $conn = null;
    }
}
 
// Hàm lấy tất cả sinh viên
function get_all_students()
{
    global $conn;
    connect_db();
     
    $sql = "SELECT * FROM sinhvien";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
    return $result;
}
 
// Hàm lấy sinh viên theo ID
function get_student($student_id)
{
    global $conn;
    connect_db();
     
    $sql = "SELECT * FROM sinhvien WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
     
    return $result;
}
 
// Hàm thêm sinh viên
function add_student($student_name, $student_sex, $student_birthday)
{
    global $conn;
    connect_db();
     
    $sql = "INSERT INTO sinhvien (hoten, gioitinh, ngaysinh) VALUES (:hoten, :gioitinh, :ngaysinh)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':hoten', $student_name);
    $stmt->bindParam(':gioitinh', $student_sex);
    $stmt->bindParam(':ngaysinh', $student_birthday);
    
    return $stmt->execute();
}
 
// Hàm sửa sinh viên
function edit_student($student_id, $student_name, $student_sex, $student_birthday)
{
    global $conn;
    connect_db();
     
    $sql = "
        UPDATE sinhvien SET
        hoten = :hoten,
        gioitinh = :gioitinh,
        ngaysinh = :ngaysinh
        WHERE id = :id
    ";
     
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hoten', $student_name);
    $stmt->bindParam(':gioitinh', $student_sex);
    $stmt->bindParam(':ngaysinh', $student_birthday);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
    
    return $stmt->execute();
}
 
// Hàm xóa sinh viên
function delete_student($student_id)
{
    global $conn;
    connect_db();
    
    $sql = "DELETE FROM sinhvien WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
    
    return $stmt->execute();
}
