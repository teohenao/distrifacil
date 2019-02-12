<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testVistaInicio()
    {
        $this->visit('/')
            ->see(200)
            ->dontSee('ErrorException')
            ->see('HOLA ANA');
    }
    public function testVistaBuscarProductoInicio()
    {
        $this->visit('/search?nombre=')
            ->see(200)
             ->dontSee('ErrorException')
             ->see('DISTRI FACIL');
    }
    public function testRedirectView()
    {
    $this->visit('/admin/product')
        ->seePageIs('/auth/login')
        ->dontSee('ErrorException')
        ->see('DISTRI FACIL');
      }
      public function testLogin()
      {
      $this->visit('/auth/login')
          ->dontSee('ErrorException')
          ->see('DISTRI FACIL')
          ->type('mateohr880@gmail.com', 'email')
          ->type('mateo', 'password')
          ->press('Ingresar')
          ->seePageIs('/');
        }
        public function testRegister()
      {
      $this->visit('/auth/register')
            ->dontSee('ErrorException')
            ->see('DISTRI FACIL')
            ->type('documento', 'tipod')
            ->type('123456789', 'identificacion')
            ->type('test', 'nombre')
            ->type('1234', 'telefonor')
            ->type('test123', 'direccionr')
            ->type('test1', 'nombre_negocio')
            ->type('test@hotmail.com', 'email')
            ->type('test', 'user')
            ->type('test', 'password')
            ->press('Crear cuenta')
            ->seePageIs('/');
        }
        public function testCreateUserAdmin()
        {
        $this->visit('/auth/login')
            ->dontSee('ErrorException')
            ->see('DISTRI FACIL')
            ->type('mateohr880@gmail.com', 'email')
            ->type('mateo', 'password')
            ->press('Ingresar')
            ->visit('/admin/user/create')
            ->type('documento', 'tipod')
            ->type('1234567891', 'identificacion')
            ->type('testadmin', 'nombre')
            ->type('12345', 'telefonor')
            ->type('test123admin', 'direccionr')
            ->type('test1admin', 'nombre_negocio')
            ->type('testadmin@hotmail.com', 'email')
            ->type('testadmin', 'user')
            ->type('testadmin', 'password')
            ->type('administrador', 'tipo')
            ->press('Crear')
            ->seePageIs('/admin/user');
          }
          public function testEditUser()
          {
          $this->visit('/auth/login')
              ->dontSee('ErrorException')
              ->see('DISTRI FACIL')
              ->type('jcarlos.ad7@gmail.com', 'email')
              ->type('carlos', 'password')
              ->press('Ingresar')
              ->visit('/admin/user/42/edit')
              ->type('carlos', 'user')
              ->press('Actualizar')
              ->seePageIs('/');
            }
            public function testCreateProduct()
            {
            $this->visit('/auth/login')
                ->dontSee('ErrorException')
                ->see('DISTRI FACIL')
                ->type('mateohr880@gmail.com', 'email')
                ->type('mateo', 'password')
                ->press('Ingresar')
                ->visit('/admin/product/create')
                ->type('test', 'nombre')
                ->type('12345', 'cantidad')
                ->type('agua', 'tipo')
                ->type('uva', 'sabor')
                ->type('tests', 'descripcion')
                ->type('10.000', 'precio')
                ->type('https://www.webconsultas.com/sites/default/files/styles/encabezado_articulo/public/articulos/resultados-test_9.jpg', 'imagen')
                ->press('Guardar')
                ->seePageIs('/admin/product');
              }
                public function testEditProduct()
                {
                $this->visit('/auth/login')
                    ->dontSee('ErrorException')
                    ->see('DISTRI FACIL')
                    ->type('mateohr880@gmail.com', 'email')
                    ->type('mateo', 'password')
                    ->press('Ingresar')
                    ->visit('/admin/product/test/edit')
                    ->type('1', 'cantidad')
                    ->press('Actualizar')
                    ->seePageIs('/admin/product');
                  }









}
