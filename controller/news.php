<?php

class ControllerNews extends Controller
{
    public function index()
    {
        $loader = new Loader($this->registry);
        $loader->view('header', array());

        $data = array();
        $loader = new Loader($this->registry);
        $results = $loader->model('news', 'getCarousel', array());
        foreach ($results as $result) {
            $data['carousel'][] = array(
                'id' => $result['id'],
                'author' => $result['author'],
                'name' => $result['name'],
                'text' => mb_strimwidth($result['text'], 0, 99, '...'),
                'date' => date('d.m.Y', strtotime($result['date'])),
                'count' => $result['count']
            );
        }
        $loader = new Loader($this->registry);
        $loader->view('carousel', $data);

        $data = array();
        $loader = new Loader($this->registry);
        $results = $loader->model('news', 'getBlogs', array());
        foreach ($results as $result) {
            $data['blogs'][] = array(
                'id' => $result['id'],
                'author' => $result['author'],
                'name' => $result['name'],
                'text' => mb_strimwidth($result['text'], 0, 99, '...'),
                'date' => date('d.m.Y', strtotime($result['date'])),
                'count' => $result['count']
            );
        }
        $loader = new Loader($this->registry);
        $loader->view('news', $data);
    }

    public function add()
    {
        $loader = new Loader($this->registry);
        $post = $this->registry->get('request')->post;
        $loader->model('news', 'addBlog', array($post['author'], $post['name'], $post['text']));
        header('Location: /blog/?news');
    }

}