<?php
interface Subject
{
    public function request(): void;
}
class RealSubject implements Subject
{
    public function request(): void
    {
        echo "<br> RealSubject: Handling request.<br>";
    }
}
class Proxy implements Subject
{
    private $realSubject;
    public function __construct(RealSubject $realSubject)
    {
        $this->realSubject = $realSubject;
    }
    public function request(): void
    {
        if ($this->checkAccess()) {
            $this->realSubject->request();
            $this->logAccess();
        }
    }
    private function checkAccess(): bool
    {
        echo "<br> Proxy: Checking access prior to firing a real request.<br>";

        return true;
    }
    private function logAccess(): void
    {
        echo "<br> Proxy: Logging the time of request.<br>";
    }
}
function clientCode(Subject $subject)
{
    $subject->request();
}
echo "<br> Client: Executing the client code with a real subject:<br>";
$realSubject = new RealSubject();
clientCode($realSubject);
echo "\n";
echo "<br> Client: Executing the same client code with a proxy:<br>";
$proxy = new Proxy($realSubject);
clientCode($proxy);
?>