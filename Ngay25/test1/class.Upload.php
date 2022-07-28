<?php
class Upload{
    public bool $uploadStatus = false;
    public string $message = '';
    public array $fileExt = [];
    public int $maxFileSize = 0;
    public string $uploadDir = '';
    public array $document = [];
    /**
     * @param array $fileExt
     * @param int $maxFileSize
     * @param string $uploadDir
     */
    public function __construct(array $document, array $fileExt, int $maxFileSize, string $uploadDir)
    {
        $this->document = $document;
        $this->fileExt = $fileExt;
        $this->maxFileSize = $maxFileSize;
        $this->uploadDir = $uploadDir;
    }
    public function isFileExists(): bool
    {
        if(file_exists($this->uploadDir.'/'.$this->document['name'])) {
            return true;
        }
        return false;
    }
    public function validateFileSize($fileSize): bool
    {
        if($this->maxFileSize < $fileSize) {
            return true;
        }
        return false;
    }
    public function validateFileExt($fileExt): bool
    {
        if(in_array($fileExt, $this->fileExt)) {
            return true;
        }
        return false;
    }
    public function makeDir(): void
    {
        if (!file_exists($this->uploadDir) || !is_dir( $this->uploadDir)) {
            mkdir($this->uploadDir);
        }
    }
    public function uploadFile(): bool|string
    {
        $fileSize = $this->document['size'];
        $fileExt = pathinfo($this->document['name'], PATHINFO_EXTENSION);

        if($this->validateFileSize($fileSize)) {
            $this->message = 'Kích thước file quá lớn';
        }
        elseif (!$this->validateFileExt($fileExt)) {
            $this->message = 'Dinh dang file khong cho phep';
        }
        elseif($this->isFileExists()) {
            $this->message = 'File da ton tai';
        }
        else {
            $this->makeDir();
            $this->uploadStatus = move_uploaded_file($this->document['tmp_name'], $this->uploadDir.'/'.$this->document['name']);
            if($this->uploadStatus) {
                $this->message = 'Upload thanh cong';
            }
            else{
                $this->message = 'Co loi khi upload';
            }
        }
        return json_encode(['uploadStatus' => $this->uploadStatus, 'message' => $this->message]);
    }


}