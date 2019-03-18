<?php

namespace Sid\Phalcon\Events\Tests\Unit;

class ModelsManagerTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

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
                    new \Sid\Phalcon\Events\ModelsManager\ModelDynamicUpdate()
                );

                $eventsManager->attach(
                    "modelsManager",
                    new \Sid\Phalcon\Events\ModelsManager\ModelNamespaceSource()
                );

                $eventsManager->attach(
                    "modelsManager",
                    new \Sid\Phalcon\Events\ModelsManager\ModelSnapshots()
                );



                $modelsManager->setEventsManager($eventsManager);

                return $modelsManager;
            },
            true
        );

        $this->dispatcher = $di->get("dispatcher");
    }

    protected function _after()
    {
    }



    // tests
    public function testModelDynamicUpdate()
    {
        $post = new \A\B\C\Posts();

        $modelsManager = $post->getModelsManager();

        $this->assertTrue(
            $modelsManager->isUsingDynamicUpdate($post)
        );
    }

    public function testModelNamespaceSource()
    {
        $post = new \A\B\C\Posts();

        $this->assertEquals(
            "A_B_C_Posts",
            $post->getSource()
        );
    }

    public function testModelSnapshots()
    {
        $post = new \A\B\C\Posts();

        $modelsManager = $post->getModelsManager();

        $this->assertTrue(
            $modelsManager->isKeepingSnapshots($post)
        );
    }
}
