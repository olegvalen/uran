<?php

class ModelNews extends Model
{
    public function getBlogs()
    {
        $query = $this->registry->get('db')->query("SELECT b.id, b.author, b.name, b.text, b.date, c.count FROM blog b LEFT JOIN (SELECT c.blog_id, count(*) count FROM comment c GROUP BY c.blog_id) c ON b.id = c.blog_id ORDER BY date DESC");
        return $query->rows;
    }

    public function getBlog()
    {
        $query = $this->registry->get('db')->query("SELECT * FROM blog WHERE id = ?", func_get_args());
        return $query->row;
    }

    public function getComments()
    {
        $query = $this->registry->get('db')->query("SELECT * FROM comment WHERE blog_id = ? ORDER BY DATE DESC", func_get_args());
        return $query->rows;
    }

    public function addBlog()
    {
        $query = $this->registry->get('db')->query("INSERT INTO blog (author, name, text, date) VALUES (?, ?, ?, NOW())", func_get_args());
        return $query->rows;
    }

    public function addComment()
    {
        $query = $this->registry->get('db')->query("INSERT INTO comment (blog_id, author, comment, date) VALUES (?, ?, ?, NOW())", func_get_args());
        return $query->rows;
    }

    public function getCarousel()
    {
        $query = $this->registry->get('db')->query("SELECT b.id, b.author, b.name, b.text, b.date, c.count FROM blog b LEFT JOIN (SELECT c.blog_id, count(*) count FROM comment c GROUP BY c.blog_id) c ON b.id = c.blog_id ORDER BY count DESC LIMIT 5");
        return $query->rows;
    }
}