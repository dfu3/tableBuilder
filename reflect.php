<?php


class Nettuts {

  function publishNextArticle($editor) {
    $editor->setNextArticle('135523');
    $editor->publish();

    $reflector = new ReflectionClass($editor);
    $publishMethod = $reflector->getMethod('publish');
    $publishMethod->invoke($editor);

    $editorName = $reflector->getProperty('name');
    $editorName->setAccessible(true);
    $editorName->setValue($editor, 'Mark Twain');

    var_dump($editorName->getValue($editor));
    var_dump($reflector->getMethods());
    var_dump($reflector->getProperties());
  } 
 
}

class Editor {
 
  private $name;
  public $articleId;
 
  function __construct($name) {
    $this->name = $name;
  }
 
  public function setNextArticle($articleId) {
    $this->articleId = $articleId;
  }
 
  public function publish()
  {
    echo ("HERE\n");
    return true;
  }

  function getEditorName() {
    return $this->name;
  }
 
}

class ReflectionTest
{
 
  function testItCanReflect()
  {
    $editor = new Editor('John Doe');
    $tuts = new Nettuts();
    $tuts->publishNextArticle($editor);
  }
 
}

$test = new ReflectionTest;
$test->testItCanReflect();

?>