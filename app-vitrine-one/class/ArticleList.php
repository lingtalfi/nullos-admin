<?php

class ArticleList
{
    private $articles;
    private $order;


    public function __construct()
    {
        $this->articles = [];
        $this->order = null;
    }

    public function addArticle(Article $article)
    {
        $this->articles[$article->getAnchor()] = $article;
        return $this;
    }

    public function setOrder(array $order)
    {
        $this->order = $order;
    }

    /**
     * @return Article
     */
    public function getArticle($anchor)
    {
        return $this->articles[$anchor];
    }

    /**
     * @return Article
     */
    public function removeArticle($anchor)
    {
        unset($this->articles[$anchor]);
    }

    public function getArticles()
    {
        $articles = array_merge($this->articles);
        if (null !== $this->order) {
            $order = array_flip($this->order);
            usort($articles, function ($art1, $art2) use ($order) {
                return ($order[$art1->getAnchor()] > $order[$art2->getAnchor()]);
            });
        }
        return $articles;
    }
}


