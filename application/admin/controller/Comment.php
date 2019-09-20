<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\index\model\Comment as CommentModel;
use app\index\model\Goods;
use app\index\model\Comment_replay;
use app\admin\model\Admin;

class Comment extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = CommentModel::all();
        if($data){
            foreach($data  as $k=>$v){
               $name = Goods::getGoodsByid($v['goods_id'], [], 'goods_name');
               $data[$k]['goods_name'] = $name['goods_name'];
            }
        }
        //dump($data);die;
        $this->assign('data', $data);
        return view();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function show($id)
    {
        $data = CommentModel::find($id);
        $name = Goods::getGoodsByid($data['goods_id'], [], 'goods_name');
        $data['goods_name'] = $name['goods_name'];
        //dump($data);die;
        
        $user_id = session('adminInfo')['admin_id'];
        $user = Admin::where('admin_id',$user_id)->find();
       
        $this->assign('data', $data);
        $this->assign('user', $user);
        return view();
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function changeStatus()
    {
        $c_id = input('post.c_id');
        $status = input('post.status');
        
        $data = ['status'=>!$status];
        $res = CommentModel::where('c_id',$c_id)->update($data);
        echo $res;
 
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function replay(Request $request, $id)
    {
        $content = input('post.content');
        //echo $content;die;
        $array = [
            'c_id'=>$id,
            're_user_id'=>session('adminInfo')['admin_id'],
            're_content'=>$content,
            'add_time'=>time(),
        ];
       // dump($array);
       $res = Comment_replay::create($array); 
       if( $res ){
           $this->redirect('Comment/index');
       } 
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
