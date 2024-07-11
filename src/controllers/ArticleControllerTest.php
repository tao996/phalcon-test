<?php


class ArticleControllerTest extends \PHPUnit\Framework\TestCase
{
    public function testUpdateAction()
    {
        $ctrl = new ArticleController();
        if (method_exists($ctrl, 'initialize')) {
            call_user_func([$ctrl, 'initialize']);
        }
        try {
            $ctrl->UpdateAction();
            $this->assertTrue(false);
        } catch (\Exception $e) {
            $this->assertTrue(str_contains($e->getMessage(), 'post'));
        }

        $_SERVER["REQUEST_METHOD"] = "POST";
        try {
            $ctrl->UpdateAction();
            $this->assertTrue(false);
        } catch (\Exception $e) {
            $this->assertTrue(str_contains($e->getMessage(), 'id is empty'));
        }
        $_POST['id'] = 1;
        $_POST['title'] = 'demo';
        $rst = $ctrl->UpdateAction();
        $this->assertTrue($rst === true);
    }
}