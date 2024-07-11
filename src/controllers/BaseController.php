<?php

class BaseController extends \Phalcon\Mvc\Controller
{

    /**
     * 处理响应，如果有自己的格式要求，则可以重写这部分的内容
     * @param \Phalcon\Mvc\Dispatcher $dispatcher
     * @return void
     */
    public function afterExecuteRoute(\Phalcon\Mvc\Dispatcher $dispatcher)
    {
        if ($this->response->isSent()) {
            return;
        }

        $data = $dispatcher->getReturnedValue() ?: []; // 接口返回的数据
        // 获取控制器响应内容，并根据请求样式判断数据响应方式
        if ($this->request->isAjax()) {
            $this->response
                ->setContentType('application/json', 'UTF-8')
                ->setContent(json_encode($data))
                ->send();
        } else {
            $this->view->setVar('api', $data);
        }
    }
}