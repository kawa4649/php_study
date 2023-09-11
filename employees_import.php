<?php
// データベースへの接続情報
$hostname = "localhost"; // データベースホスト名
$username = "your_username"; // データベースユーザー名
$password = "your_password"; // データベースパスワード
$database_name = "your_database"; // データベース名

// CSVファイルのパス
$csv_file = "path_to_your_csv_file.csv";

// データベースに接続
$mysqli = new mysqli($hostname, $username, $password, $database_name);

if ($mysqli->connect_error) {
    die("データベース接続エラー: " . $mysqli->connect_error);
}

// CSVファイルを読み込み、データベースに挿入するSQLクエリを生成し実行
if (($handle = fopen($csv_file, "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        // データを変数に設定
        list($full_name, $job_title, $committee, $gender, $email, $hire_date, $birth_date, $birth_month, $age, $nickname, $hobbies_and_interests, $skills_and_technologies, $current_technologies, $hometown, $remarks) = $data;

        // SQLクエリを生成
        $sql = "INSERT INTO employees (full_name, job_title, committee, gender, email, hire_date, birth_date, birth_month, age, nickname, hobbies_and_interests, skills_and_technologies, current_technologies, hometown, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssssssiissssss", $full_name, $job_title, $committee, $gender, $email, $hire_date, $birth_date, $birth_month, $age, $nickname, $hobbies_and_interests, $skills_and_technologies, $current_technologies, $hometown, $remarks);

        // SQLクエリを実行
        if (!$stmt->execute()) {
            echo "データ挿入エラー: " . $stmt->error;
        }

        // ステートメントをクローズ
        $stmt->close();
    }
    fclose($handle);
}

// データベース接続をクローズ
$mysqli->close();

echo "CSVファイルのインポートが完了しました。";
?>