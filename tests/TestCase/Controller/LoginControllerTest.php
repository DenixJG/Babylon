<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\LoginController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\LoginController Test Case
 *
 * @uses \App\Controller\LoginController
 */
class LoginControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Login',
    ];
}
