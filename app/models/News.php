<?php

namespace app\models;
use app\core\Model;

class News extends Model
{
    public function getNews()
    {
//
//        $result = $this->db->row('SELECT * FROM news');
//        return $result;
    }

    public function showPost($id)
    {
        $params = [
          'id' => $id,
        ];
        $result = $this->db->row('SELECT * FROM news WHERE id = :id', $params);
        return $result;
    }

    public function updatePost($id, $post, $filename)
    {
        $title = [
            'id' => $id,
            'title' => $post['title'],
        ];

        $body = [
            'id' => $id,
            'body' => $post['body'],
        ];

        $image = [
            'id' => $id,
            'image'=> $filename
        ];

        if($post['title'] != ""){
            $result1 = $this->db->row('UPDATE news SET title = :title WHERE id = :id', $title);
        }
        if($post['body'] != ""){
            $result2 = $this->db->row('UPDATE news SET body = :body WHERE id = :id', $body);
        }
        if($filename){
            $result3 = $this->db->row('UPDATE news SET image =:image WHERE id = :id', $image);
        }
        return [$result1,$result2,$result3];

    }


    public function deletePost($id)
    {
        $params = [
            'id'=> $id,
        ];
        $result = $this->db->query('DELETE FROM news WHERE id=:id', $params);
        return $result;
    }

    public function addPost($post, $filename)
    {
        if($post['body'] == "") {
            $post['body'] = 'you did\'t write text';
        }
        if($post['title'] == "") {
            $post['title'] = 'you did\'t write title';
        }
        $post = [
            'id' => null,
            'title' => $post['title'],
            'body' => $post['body'],
            'image' => $filename
        ];
        if($filename == null) {
            $post['image'] = 'error.jpg';
        }
        $result = $this->db->query('INSERT INTO news VALUES (:id, :title, :body, :image) ', $post);
        return $result;
    }

    public function postsCount()
    {
       return $this->db->column('SELECT COUNT(id) from news');
    }

    public function postsList($route)
    {
        $max = 10;
        $params = [
            'max' => $max,
            'start' => ($route['page'] * $max - $max),
        ];
        return $result = $this->db->row('SELECT * FROM news ORDER BY id LIMIT :start, :max', $params);


    }

}