<?php
// +----------------------------------------------------------------------
// | 游渔实验室内容管理系统 [ youyucms ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 All rights reserved.
// +----------------------------------------------------------------------
// | Author: 游渔 <shang.knight@qq.com> <http://aincrad.sinaapp.com/>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Think\Upload;
/**
 * 文件控制器
 * 主要用于下载模型的文件上传和下载
 */
class FileController extends AdminController {

    public function uploadPicture(){
        $return  = array('status' => 1, 'info' => '上传成功', 'data' => '');
        if (!empty($_FILES)) {
            $setting = C('PICTURE_UPLOAD');
            $upload = new Upload($setting);
            $images = $upload->upload();
            if ($images) {
                foreach ($images as $key => &$value) {
                    $value['path'] = substr($setting['rootPath'], 1).$value['savepath'].$value['savename']; //在模板里的url路径
                    $id = M('picture')->add($value);
                    if ($id) {
                        $return['id']   = $id;
                        $return['path'] = $value['path'];
                    }else{
                        $return['status'] = 0;
                        $return['info']   = '保存数据库失败！';
                    }
                }
            }else{
                $return['status'] = 0;
                $return['info']   = $upload->getError();
            }
        }
        
        $this->ajaxReturn($return);
    }
}
