<?php
class upload{
	protected $fileName;
	protected $maxSize;
	protected $allowMime;
	protected $allowExt;
	protected $uploadPath;
	protected $imgFlag;
	protected $fileInfo;
	protected $error;
	/**
	 * @param string
	 * @param string
	 * @param [type]
	 * @param integer
	 * @param array
	 * @param array
	 */
	public function __construct($fileName='myFile',$uploadPath='./uploads',$imgFlag=ture,$maxSize=5242880,$allowExt=array('jpeg','jpg','png','gif'),$allowMime=array('image/jpeg','image/jpg','image/png','image/gif')){
		$this->fileName=$fileName;
		$this->maxSize = $maxSize;
		$this->allowMime = $allowMime;
		$this->allowExt = $allowExt;
		$this->uploadPath = $uploadPath;
		$this->imgFlag = $imgFlag;
		$this->fileInfo = $_FILE[$this->fileName];
	}
	/**
	 * 检测错误
	 * @return [type]
	 */
	protected function checkError(){
		if($this->fileInfo['error']>0){
			switch ($this->fileInfo['error']) {
				case 1:
					$this->error='超过了PHP配置文件中upload_max_filesize选项的值';
					break;
				case 2:
					$this->error='超过了表单中max_file_size设置的值';
					break;
				case 3:
					$this->error='文件部分被上传';
					break;
				case 4:
					$this->error='没有选择上传文件';
					break;
				case 6:
					$this->error='没有找到临时目录';
					break;
				case 7:
					$this->error='文件不可写';
					break;
				case 8:
					$this->error='由于PHP的扩展程序中断文件上传';
					break;
			}
			return false;
		}
		return ture;
	}

	/**
	 * 检测上传文件大小
	 * @return [type]
	 */
	protected function checkSize(){
		if($this->fileInfo['size']>$this->maxSize){
			$this->error = '上传文件过大';
			return false;
		}
		return ture;
	}

	protected function checkExt(){
		$this->ext = strtolower(pathinfo($this->fileInfo['name']))
		if(!in_array($this->ext,$this->allowExt)){

		}
	}

	public function uploadFile(){
		if($this->checkError()&&$this->checkSize()&&$this->checkExt()&&$this->check()){

		}else{
			$this->showError();
		}
	}
}
?>