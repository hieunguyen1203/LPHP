<?php
class Demo {

    // khai báo thuộc tính tĩnh static
    public static int $a = 123;

    public int $b = 234;

    // khai báo method tĩnh
    public static function methodA(): void
    {
        echo "<br> methodA";
        // truy cập đến thuộc tính tĩnh trong method tĩnh bằng từ khóa self
        echo "<br> " . self::$a;
        echo "<br> " . self::methodB();

        // trong method tĩnh không được dùng $this
        //echo "<br>" . $this->b;
        // nếu muốn truy cập đến thuộc tính hay method thường
        // khởi tạo object = cú pháp new self()
        $self = new self();
        echo "<br>" . $self->b;
        echo "<br>" . $self->methodC();
    }

    public static function methodB(): void
    {
        echo "<br> methodB";
    }

    public function methodC(): void
    {
        echo "<br> methodC";
    }

}
// bình thường dùng object thông qua từ new khi tạo ra đối tượng từ class
// để truy cập vào thuộc tính và method của class đó
// $object = new Demo();

echo "<br>". Demo::$a;
echo "<br>". Demo::methodA();