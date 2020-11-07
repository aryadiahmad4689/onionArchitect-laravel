<?php
namespace Billing\App\DoctrineGateway;
use Doctrine\ORM\EntityManagerInterface;
use App\Providers\AppServiceProvider;

class DoctrineGatewayServiceProvider extends AppServiceProvider
{

public function register()
{
    $this->app->singleton(
    EntityManagerInterface::class, function($app) {
    $orm = new DoctrineGateway();
    $orm->setEntityPath($this
    ->app['config']['doctrine']['managers']['default']['paths']);
    $orm = $orm->createFromAnnotation($this->getDbParams());
    return $orm;
});
}

protected function getDbParams()
{
    $config = $this->app['config']['database']['connections']['mysql'];
    // the connection configuration
    $dbParams = array(
    'driver' => $config['driver'],
    'user' => $config['username'],
    'password' => $config['password'],
    'host' => $config['host'],
    'dbname' => $config['database'],
    );
    return $dbParams;
}
}