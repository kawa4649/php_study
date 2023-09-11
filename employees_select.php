
<?php
// データベースへの接続情報
$hostname = "localhost"; // データベースホスト名
$username = "kawa"; // データベースユーザー名
$password = "123456"; // データベースパスワード
$database_name = "test"; // データベース名

// データベースに接続
$mysqli = new mysqli($hostname, $username, $password, $database_name);

if ($mysqli->connect_error) {
    die("データベース接続エラー: " . $mysqli->connect_error);
}

// データベースからデータを取得するSQLクエリ
$sql = "SELECT * FROM employees";

// SQLクエリを実行
$result = $mysqli->query($sql);

if ($result === false) {
    die("クエリ実行エラー: " . $mysqli->error);
}

// 取得したデータを表示
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>employee_id</th>";
    echo "<th>full_name</th>";
    echo "<th>job_title</th>";
    echo "<th>committee</th>";
    echo "<th>gender</th>";
    echo "<th>email</th>";
    echo "<th>hire_date</th>";
    echo "<th>birth_date</th>";
    echo "<th>birth_month</th>";
    echo "<th>age</th>";
    echo "<th>nickname</th>";
    echo "<th>hobbies_and_interests</th>";
    echo "<th>skills_and_technologies</th>";
    echo "<th>current_technologies</th>";
    echo "<th>hometown</th>";
    echo "<th>remarks</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["employee_id"] . "</td>";
        echo "<td>" . $row["full_name"] . "</td>";
        echo "<td>" . $row["job_title"] . "</td>";
        echo "<td>" . $row["committee"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["hire_date"] . "</td>";
        echo "<td>" . $row["birth_date"] . "</td>";
        echo "<td>" . $row["birth_month"] . "</td>";
        echo "<td>" . $row["age"] . "</td>";
        echo "<td>" . $row["nickname"] . "</td>";
        echo "<td>" . $row["hobbies_and_interests"] . "</td>";
        echo "<td>" . $row["skills_and_technologies"] . "</td>";
        echo "<td>" . $row["current_technologies"] . "</td>";
        echo "<td>" . $row["hometown"] . "</td>";
        echo "<td>" . $row["remarks"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "データがありません。";
}

// データベース接続をクローズ
$mysqli->close();
?>
