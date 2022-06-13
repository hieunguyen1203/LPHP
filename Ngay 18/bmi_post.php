<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <pre>
        xây dựng 1 form tính chỉ số bmi
        nhập vào chiều cao và cân nặng in ra chỉ số bmi và phân lọai
        sử dụng $_POST
        tham khảo : https://hiu.vn/y-te-suc-khoe/cach-do-va-tinh-chi-so-bmi/#:~:text=BMI%20%3D%20(c%C3%A2n%20n%E1%BA%B7ng%20)%2F(chi%E1%BB%81u,c%C3%B3%20c%C3%A2n%20n%E1%BA%B7ng%20l%C3%BD%20t%C6%B0%E1%BB%9Fng.
    </pre>
    <?php
    $can_nang = "";
    $chieu_cao = "";
    if( !empty($_POST['can_nang']) && !empty($_POST['chieu_cao']) ){
        $can_nang = $_POST['can_nang'];
        $chieu_cao = $_POST['chieu_cao'];

        $bmi = tinhBMI($can_nang, $chieu_cao);
        echo "Chỉ số BMI là: ".$bmi['bmi'].", thuộc loại ".$bmi['phan_loai'];
    }

    function tinhBMI($can_nang, $chieu_cao){
        $bmi = ['bmi' => 0, 'phan_loai' => ''];

        $bmi['bmi'] = $can_nang/($chieu_cao*2);
        
        if($bmi['bmi'] < 18.75) {
            $bmi['phan_loai'] = "Gầy";
        }
        elseif($bmi['bmi'] <= 24.9) {
            $bmi['phan_loai'] = "Bình thường";
        }
        elseif($bmi['bmi'] <= 29.9) {
            $bmi['phan_loai'] = "Tăng cân";
        }
        else {
            $bmi['phan_loai'] = "Béo phì";
        }
        return $bmi;
    }
    ?>
    <form action="" method="post">
        <div>
            <label for="can_nang">Cân nặng (m)</label>
            <input type="text" value="<?php echo $can_nang ?>" name="can_nang">
        </div>
        <div>
            <label for="chieu_cao">Chiều cao (kg)</label>
            <input type="text" value="<?php echo $chieu_cao ?>" name="chieu_cao">
        </div>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>