<?php

class ArticleController extends BaseController
{

    /**
     * http://localhost:8072/article/index
     */
    public function IndexAction()
    {
        var_dump(Article::find()->toArray());
        die('Article.Index');
    }

    public function UpdateAction()
    {
        if (!$this->request->isPost()) {
            throw new \Exception('only support post');
        }
        $id = $this->request->getPost('id', 'int', 0);
        if (empty($id)) {
            throw new \Exception('id is empty');
        }
        $title = $this->request->getPost('title', 'string', '');
        if (empty($title)) {
            throw new \Exception('title is empty');
        }
        $model = Article::findFirst($id);
        if (empty($model)) {
            throw new \Exception('could not find record for ' . $id);
        }
        if (!$model->assign(['title' => $title])->save()) {
            $msgs = [];
            foreach ($model->getMessages() as $message) {
                $msgs[] = $message->getMessage();
            }
            throw new \Exception(join('<br>', $msgs));
        }
        return true;
    }

}