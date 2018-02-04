<?php

class ControllerNew extends Controller
{
    public function index()
    {
        $loader = new Loader($this->registry);
        $loader->view('header', array());

        $data = array();
        $loader = new Loader($this->registry);
        $result = $loader->model('news', 'getBlog', func_get_args());
        if ($result) {
            $data['id'] = $result['id'];
            $data['author'] = $result['author'];
            $data['name'] = $result['name'];
            $data['text'] = $result['text'];
            $data['date'] = $result['date'];

            $loader = new Loader($this->registry);
            $results = $loader->model('news', 'getComments', array($result['id']));
            foreach ($results as $result) {
                $data['comments'][] = array(
                    'id' => $result['id'],
                    'author' => $result['author'],
                    'comment' => $result['comment'],
                    'date' => date('d.m.Y', strtotime($result['date']))
                );
            }
        }

        $loader = new Loader($this->registry);
        $loader->view('new', $data);
    }

    public function add()
    {
        $loader = new Loader($this->registry);
        $post = $this->registry->get('request')->post;
        $loader->model('news', 'addComment', array($post['id'], $post['author'], $post['comment']));
        header('Location: /blog/?news');
    }

}