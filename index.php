<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "arkatama_store";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error){
    die("Connection failed : " . $conn -> connect_error . "<br>");
}
echo "Connected successfully <br>";

$sql1 = "INSERT INTO categories (ctgr_id, category_name, created_at) VALUES (15,'kategori 15', current_timestamp())";
if ($conn->query($sql1) === TRUE) {
    echo "Data category berhasil ditambahkan.<br>";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$sql2 = "INSERT INTO products (product_id, category_id, product_name, price, status, created_at) VALUES (35, 15, 'product baru', 100000, 'accepted', current_timestamp())";
if ($conn->query($sql2) === TRUE) {
    echo "Data product berhasil ditambahkan.<br>";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$sql3 = "select c.category_name as category_name, p.product_id, p.product_name, p.price, p.status from categories as c inner join products as p on c.ctgr_id = p.category_id;" ;

$result = $conn->query($sql3);

echo "<table border = '1' RULES = 'all'>";
echo "<tr>
<th>Category_name</th>
<th>Product_id</th>
<th>Product_name</th>
<th>Price</th>
<th>Status</th>
</tr>";

while($row = mysqli_fetch_array($result)){
    echo "<tr>
    <td>" .$row['category_name']."</td>
    <td>" .$row['product_id']."</td>
    <td>" .$row['product_name']."</td>
    <td>" .$row['price']."</td>
    <td>" .$row['status']."</td>
    </tr>";
}
echo "</table>";
?>