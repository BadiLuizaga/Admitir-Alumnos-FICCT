<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    /**
     * Verifica que la página de login carga correctamente.
     */
    public function test_login_page_renders_successfully(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('CUP ADMISIÓN');
        $response->assertSee('Correo Electrónico');
    }

    /**
     * Verifica que se disparen las validaciones si los campos de login están vacíos.
     */
    public function test_login_validation_errors(): void
    {
        $response = $this->post('/login', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email', 'password']);
    }

    /**
     * Verifica que el inicio de sesión simulado funcione con campos válidos.
     */
    public function test_login_simulated_success(): void
    {
        $response = $this->post('/login', [
            'email' => 'juan.perez@ficct.uagrm.edu',
            'password' => 'secret123',
        ]);

        $response->assertRedirect('/dashboard');
        
        // Comprobar que la sesión simulada tiene los datos correctos
        $this->assertTrue(session()->has('authenticated'));
        $this->assertEquals('juan.perez@ficct.uagrm.edu', session('user_email'));
        $this->assertEquals('juan.perez', session('user_name'));
    }

    /**
     * Verifica que el Dashboard esté protegido para usuarios invitados (guests).
     */
    public function test_dashboard_protected_for_guests(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
        $response->assertSessionHas('error');
    }

    /**
     * Verifica que el Dashboard sea accesible para usuarios autenticados simulados.
     */
    public function test_dashboard_accessible_for_authenticated_users(): void
    {
        // Simulamos el estado de sesión activa
        $response = $this->withSession([
            'authenticated' => true,
            'user_email' => 'test@example.com',
            'user_name' => 'test',
            'login_time' => now()->toDateTimeString(),
        ])->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('test@example.com');
        $response->assertSee('Bienvenido al Sistema de Admisión CUP');
    }

    /**
     * Verifica que el cierre de sesión simulado limpie la sesión y redirija.
     */
    public function test_logout_simulated(): void
    {
        // Iniciamos sesión en la petición y llamamos a logout
        $response = $this->withSession([
            'authenticated' => true,
            'user_email' => 'test@example.com',
            'user_name' => 'test',
        ])->post('/logout');

        $response->assertRedirect('/login');
        
        // Comprobar que las variables de sesión fueron eliminadas
        $this->assertFalse(session()->has('authenticated'));
        $this->assertNull(session('user_email'));
    }
}
