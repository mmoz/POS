<?php
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);     
require("connect.php");
if(isset($_GET['q']) && $_GET['q']!=""){
    $q = urldecode($_GET["q"]);
    $q = $mysqli->real_escape_string($q);
     
    $pagesize = 50; // จำนวนรายการที่ต้องการแสดง
    $table_db="product"; // ตารางที่ต้องการค้นหา
    $find_field="productname"; // ฟิลที่ต้องการค้นหา
    $sql = "
    SELECT 
    product,
    product_name
    FROM $table_db WHERE LOCATE('$q', $find_field) > 0 
    ORDER BY LOCATE('$q', $find_field), $find_field LIMIT $pagesize
    ";
    $result = $mysqli->query($sql);
    if($result && $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            // กำหนดฟิลด์ที่ต้องการส่ง่กลับ ปกติจะใช้ primary key ของ ตารางนั้น
            $id = $row["province_id"]; // 
             
            // จัดการกับค่า ที่ต้องการแสดง 
            $name = trim($row["price"]);// ตัดช่องวางหน้าหลัง
            $name = addslashes($name); // ป้องกันรายการที่ ' ไม่ให้แสดง error
            $name = htmlspecialchars($name); // ป้องกันอักขระพิเศษ
 
            // กำหนดรูปแบบข้อความที่แใดงใน li ลิสรายการตัวเลือก
            $display_name = preg_replace("/(" .$q. ")/i", "<b>$1</b>", $name);
            echo "
                <li onselect=\"this.setText('$name').setValue('$id')\">
                    $display_name
                </li>
            ";  
        }
    }
    $mysqli->close();
}
?>