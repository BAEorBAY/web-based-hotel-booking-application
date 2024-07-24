<?php 
include("koneksi.php"); 

$id_admin = $_GET['id']; // Get the admin ID from URL parameter

if ($stmt = $koneksi->prepare("DELETE FROM tbl_admin WHERE id_admin = ?")) {
    $stmt->bind_param("i", $id_admin);
    if (!$stmt->execute()) {
        // If there's an error (likely due to foreign key constraint)
        header("location:admin_read.php?error=Could not delete admin. There are related records.");
    } else {
        header("location:admin_read.php?success=Admin deleted successfully.");
    }
    $stmt->close();
} else {
    header("location:admin_read.php?error=Failed to prepare the SQL statement.");
}
$koneksi->close();
?>
