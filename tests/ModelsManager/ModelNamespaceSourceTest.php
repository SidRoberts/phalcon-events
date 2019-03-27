<?php

namespace Sid\Phalcon\Events\Tests\Unit\ModelsManager;

use Codeception\TestCase\Test;

class ModelNamespaceSourceTest extends Test
{
    protected function _before()
    {
        \Phalcon\Di::reset();

        $di = new \Phalcon\Di\FactoryDefault();

        $di->set(
            "modelsManager",
            function () {
                $modelsManager = new \Phalcon\Mvc\Model\Manager();

                $eventsManager = new \Phalcon\Events\Manager();



                $eventsManager->attach(
                    "modelsManager",
                    new \Sid\Phalcon\Events\ModelsManager\ModelNamespaceSource()
                );



                $modelsManager->setEventsManager($eventsManager);

                return $modelsManager;
            },
            true
        );

        $this->dispatcher = $di->get("dispatcher");
    }



    public function testModelSourceIncludesNamespace()
    {
        $post = new \A\B\C\Posts();

        $this->assertEquals(
            "A_B_C_Posts",
            $post->getSource()
        );
    }
}
